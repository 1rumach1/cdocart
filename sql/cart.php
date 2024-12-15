<?PHP
include("../conn.php");
session_start();

if(isset($_POST["addToCart"])){
    $cusname = $_SESSION["name"];
    $prodname = $_POST["prodname"];
    $prodprice = $_POST["prodprice"];
    $prodquan = $_POST["quan"];
    $prodimage = $_POST["prodimage"];

    $conn->begin_transaction();

    $stmt = $conn->prepare("SELECT * FROM tblcart WHERE cusname = ? and prodname = ? and prodstatus = ''");
    $stmt->bind_param("ss", $cusname, $prodname);
    $stmt->execute();
    $result = $stmt->get_result();
    $quanRow = $result->fetch_assoc();
    $rowCount = $result->num_rows;

    if ($rowCount == 1) {
        $prodquan = $prodquan + $quanRow["quan"];
        $stmt = $conn->prepare("UPDATE tblcart SET quan = ? WHERE cusname = ? and prodname = ? and prodstatus = ''");
        $stmt->bind_param("iss", $prodquan, $cusname, $prodname);
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("INSERT INTO tblcart (cusname, prodimage, prodname, quan, price) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", $cusname, $prodimage, $prodname, $prodquan, $prodprice);
        $stmt->execute();
    }

    if(isset($_POST["from"])){
        header("location:../html/c_home.php?Successful");
    }else{
        header("location:../html/item.php?product=$prodname&Successful");
    }

    $conn->commit();
}elseif(isset($_POST['checkout'])){
    $uploadDir = '../pics/payment/';
    $ext = strtolower(pathinfo($_FILES['proof']['name'], PATHINFO_EXTENSION));
    $uniqid = uniqid();
    $paymentproof = "$uniqid.$ext";
    $uploadFile = $uploadDir . basename($paymentproof);
    move_uploaded_file($_FILES['proof']['tmp_name'], $uploadFile);

    $paymentMethod = $_POST["paymentMethod"];
    $proof = $paymentproof;
    $method = ($paymentMethod == "COD")? $paymentMethod : $proof;
    $address = $_POST["address"];
    $id = uniqid();
    $total = $_POST["total"];
    $date = date('Y-m-d');

    $conn->begin_transaction();

    $stmt = $conn->prepare("SELECT * FROM tblcart WHERE cusname = ? and prodstatus = ''");
    $stmt->bind_param("s", $_SESSION["name"]);

    if($stmt->execute()){
        $result = $stmt->get_result();
        if(empty($result->num_rows)){
            header("location:../html/cart.php?Empty");
            exit();
        }
        while($row = $result->fetch_assoc()){
            $stmt1 = $conn->prepare("UPDATE tblcart SET orderid = ?, prodstatus = 'done' WHERE prodname = ? and prodstatus = ''");
            $stmt1->bind_param("ss", $id, $row['prodname']);
            $stmt1->execute();

            $stmt4= $conn->prepare("SELECT prodquantity FROM tblproduct WHERE prodname = ?");
            $stmt4->bind_param("s", $row['prodname']);
            if($stmt4->execute()){
                $res = $stmt4->get_result();
                $quanRow = $res->fetch_assoc();
                $updquan = $quanRow['prodquantity'] - $row['quan'];

                $stmt3 = $conn->prepare("UPDATE tblproduct SET prodquantity = ? WHERE prodname = ?");
                $stmt3->bind_param("ss", $updquan, $row['prodname']);
                $stmt3->execute();
    
            }
        }
        $stmt2 = $conn->prepare("INSERT INTO tblorders (orderid, date, cusname, total, method, address, status) VALUES (?, ?, ?, ?, ?, ?, 'Processing')");
        $stmt2->bind_param("sssiss", $id, $date, $_SESSION["name"], $total, $method, $address);
        $stmt2->execute();


        $conn->commit();
        header("location:../html/cart.php?Successful");
        exit();
    }else {
        $conn->rollback();
        echo "Error: " . $stmt->error;
    }
}elseif(isset($_GET["confirm_order"])){
    $id = $_GET['confirm_order'];
    $conn->begin_transaction();

    $stmt = $conn->prepare("UPDATE tblorders SET status='Shipping' where orderid = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    $conn->commit();
    header("location:../html/orders.php?Successful&ordid=$id");
    exit();
}elseif(isset($_GET["comp_order"])){
    $id = $_GET['comp_order'];
    $conn->begin_transaction();

    $stmt = $conn->prepare("UPDATE tblorders SET status='Completed' where orderid = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    $conn->commit();
    header("location:../html/orders.php?Successful");
    exit();
}elseif(isset($_GET["delete"])){
    $prodname = $_GET['delete'];
    $conn->begin_transaction();

    $stmt = $conn->prepare("DELETE FROM tblcart where prodname = ?");
    $stmt->bind_param("s", $prodname);
    $stmt->execute();

    $conn->commit();
    header("location:../html/cart.php?dSuccessful");
    exit();
}
?>