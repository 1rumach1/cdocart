<?php 
session_start();
$id = $_SESSION["id"];
$oldname = $_SESSION["name"];
$oldemail = $_SESSION["email"];
require("../conn.php");

if (empty($id)) {
    header("Location: ../index.php?Error=" . urlencode("Session Expired. "));
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['name']) && isset($_POST['pass'])) {
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $oldPass = $_POST['pass'];
    $newPass = $_POST['newpass'];

    try {
        $conn->begin_transaction();

        $stmt = $conn->prepare("SELECT * FROM tblaccount WHERE ID = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if ($oldPass !== $row['fldpassword']) {
                throw new Exception('Current password is incorrect.');
            }

            $stmt = $conn->prepare("UPDATE tblaccount 
            SET fldname = ?, fldemail = ?, fldpassword = ? 
            WHERE ID = ?");
            $stmt->bind_param('sssi', $newName, $newEmail, $newPass, $id);

            if ($stmt->execute()) {
                $conn->commit();

                $_SESSION["name"] = $newName;   // update sessionbs
                $_SESSION["email"] = $newEmail;
                echo $_SESSION["position"];
                if($_SESSION["position"] == 'admin'){
                    header("location:../html/a_prof.php?Successful");
                }elseif($_SESSION["position"] == 'customer'){
                    header("location:../html/c_prof.php?Successful");
                }
            } else {
                throw new Exception('Error updating credentials.');
            }
        } else {
            throw new Exception('User not found.');
        }
    } catch (Exception $e) {
        $conn->rollback();
        error_log($e->getMessage());
        header("location:../html/a_prof.php?Error=" . urlencode($e->getMessage()));
        exit();
    }
}

?>