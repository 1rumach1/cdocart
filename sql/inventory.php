<?PHP
include("../conn.php");
$prodid = isset($_POST["prodid"]) ? $_POST["prodid"] : "";
$prodname = isset($_POST["prodname"]) ? $_POST["prodname"] : "";
$prodprice = isset($_POST["prodprice"]) ? $_POST["prodprice"] : "";
$proddesc = isset($_POST["proddesc"]) ? $_POST["proddesc"] : "";
$prodquan = isset($_POST["prodquan"]) ? $_POST["prodquan"] : "";
$date = isset($_POST["date"]) ? $_POST["date"] : "";

try {
    if (isset($_POST["addProduct"])) {
        // ADD PRODUCT
        $uploadDir = '../pics/';
        $ext = pathinfo($_FILES["prodimage"]['name'], PATHINFO_EXTENSION);
        $uniqid = uniqid();
        $prodimage = "$uniqid.$ext";
        $uploadFile = $uploadDir . basename($prodimage);

        if (move_uploaded_file($_FILES['prodimage']['tmp_name'], $uploadFile)) {
            $conn->begin_transaction();

            // Check if product exists
            $stmt = $conn->prepare("SELECT * FROM tblproduct WHERE prodname = ?");
            $stmt->bind_param("s", $prodname);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                header("location:../html/inventory.php?Existing");
                exit();
            }

            // Insert the new product
            $stmt1 = $conn->prepare("INSERT INTO tblproduct (prodname, prodprice, proddesc, prodquantity, prodimage) 
                                    VALUES (?, ?, ?, ?, ?)");
            $stmt1->bind_param("sssis", $prodname, $prodprice, $proddesc, $prodquan, $prodimage);

            // Insert inventory record
            $stmt2 = $conn->prepare("INSERT INTO tblinventory (flddate, fldname, fldquan, flddesc, fldstatus) 
                                    VALUES (CURDATE(), ?, ?, 'Product Delivery', 'delivery')");
            $stmt2->bind_param("ss", $prodname, $prodquan);

            if ($stmt1->execute() && $stmt2->execute()) {
                $stmt3 = $conn->prepare("INSERT INTO tblallprod (prodname) VALUES (?)");
                $stmt3->bind_param("s", $prodname);
                $stmt3->execute();
                $conn->commit();
                header("location:../html/inventory.php?Successful");
            } else {
                throw new Exception('Error adding product.');
            }
            exit();
        } else {
            header("location:../html/a_home.php?Error=" . urlencode('Error uploading the image.'));
            exit();
        }
    } elseif (isset($_POST["addDelivery"])) {
        $conn->begin_transaction();

        // Check if product exists in inventory
        $stmt = $conn->prepare("SELECT * FROM tblproduct WHERE prodname = ?");
        $stmt->bind_param("s", $prodname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            header("location:../html/inventory.php?NotExisting");
            exit();
        }

        // Add delivery record to inventory
        $stmt1 = $conn->prepare("INSERT INTO tblinventory (flddate, fldname, fldquan, flddesc, fldstatus) 
                                VALUES (?, ?, ?, ?, 'delivery')");
        $stmt1->bind_param("ssss", $date, $prodname, $prodquan, $proddesc);

        if ($stmt1->execute()) {
            // Update product quantity
            $row = $result->fetch_assoc();
            $total = $row['prodquantity'] + $prodquan;

            $stmt2 = $conn->prepare("UPDATE tblproduct SET prodquantity = ? WHERE prodname = ?");
            $stmt2->bind_param("is", $total, $prodname);

            if ($stmt2->execute()) {
                $conn->commit();
                header("location:../html/inventory.php?Successful");
            } else {
                throw new Exception('Error updating product quantity.');
            }
        } else {
            throw new Exception('Error adding delivery record.');
        }
        exit();
    } elseif (isset($_POST["addWastages"])) {
        $conn->begin_transaction();

        // Check if product exists in inventory
        $stmt = $conn->prepare("SELECT * FROM tblproduct WHERE prodname = ?");
        $stmt->bind_param("s", $prodname);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if($prodquan > $row['prodquantity']){
            header("location:../html/inventory.php?Invalid_Quantity");
            exit();
        }else{
            if ($result->num_rows == 0) {
                header("location:../html/inventory.php?NotExisting");
                exit();
            }
    
            // Add delivery record to inventory
            $stmt1 = $conn->prepare("INSERT INTO tblinventory (flddate, fldname, fldquan, flddesc, fldstatus) 
                                    VALUES (?, ?, ?, ?, 'wastages')");
            $stmt1->bind_param("ssss", $date, $prodname, $prodquan, $proddesc);
    
            if ($stmt1->execute()) {
                // Update product quantity
                $total = $row['prodquantity'] - $prodquan;
    
                if($total == 0){
                    $stmt2 = $conn->prepare("DELETE FROM tblproduct WHERE prodname = ?");
                    $stmt2->bind_param("s", $prodname);
                }else{
                    $stmt2 = $conn->prepare("UPDATE tblproduct SET prodquantity = ? WHERE prodname = ?");
                    $stmt2->bind_param("is", $total, $prodname);
                }
    
                if ($stmt2->execute()) {
                    $conn->commit();
                    header("location:../html/inventory.php?Wastages");
                } else {
                    throw new Exception('Error updating product quantity.');
                }
            } else {
                throw new Exception('Error adding delivery record.');
            }
            exit();
        }
    } elseif (isset($_POST["updProduct"])) {
        $conn->begin_transaction();

        // Get current product data
        $stmt = $conn->prepare("SELECT * FROM tblproduct WHERE prodid = ?");
        $stmt->bind_param("i", $prodid);
        $stmt->execute();
        $result = $stmt->get_result();
        $currentProduct = $result->fetch_assoc();

        if (!$currentProduct) {
            header("location:../html/inventory.php?NotExisting");
            exit();
        }

        // Check if new image was uploaded
        if (!isset($_FILES['prodimage']) || $_FILES['prodimage']['error'] === UPLOAD_ERR_NO_FILE) {
            // No new image uploaded, keep existing image
            $stmt1 = $conn->prepare("UPDATE tblproduct SET 
                                    prodname = ?,
                                    prodprice = ?,
                                    proddesc = ?,
                                    prodquantity = ? 
                                    WHERE prodid = ?");
            $stmt1->bind_param("sssii", $prodname, $prodprice, $proddesc, $prodquan, $prodid);
        } else {
            // New image uploaded
            $uploadDir = '../pics/';
            $prodimage = $_FILES['prodimage']['name'];
            $uploadFile = $uploadDir . basename($prodimage);

            if (move_uploaded_file($_FILES['prodimage']['tmp_name'], $uploadFile)) {
                $stmt1 = $conn->prepare("UPDATE tblproduct SET 
                                        prodname = ?,
                                        prodprice = ?,
                                        proddesc = ?,
                                        prodquantity = ?,
                                        prodimage = ? 
                                        WHERE prodid = ?");
                $stmt1->bind_param("sssisi", $prodname, $prodprice, $proddesc, $prodquan, $prodimage, $prodid);
            } else {
                throw new Exception('Error uploading the image.');
            }
        }

        if ($stmt1->execute()) {
            $conn->commit();
            header("location:../html/reports.php?Successful");
        } else {
            throw new Exception('Error updating product.');
        }
        exit();
    }
} catch (Exception $e) {
    if (isset($conn)) {
        $conn->rollback();
    }
    error_log($e->getMessage());
    header("location:../html/inventory.php?Error=" . urlencode($e->getMessage()));
    exit();
}
