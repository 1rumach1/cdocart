<?php
require("../conn.php"); // Database connection
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require("vendor/autoload.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //---------------------------------------------------LOGIN------------------------------------------
    if (isset($_GET["login"])) {
        $email = $_GET["InEmail"];
        $pass = $_GET["InPass"];

        try {
            $conn->begin_transaction();

            $stmt = $conn->prepare("SELECT * FROM tblaccount WHERE fldemail = ? AND fldpassword = ?");
            $stmt->bind_param("ss", $email, $pass);
            $stmt->execute();
            $result = $stmt->get_result();
            $rowCount = $result->num_rows;

            if ($rowCount == 1) {
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION["id"] = $row['ID'];
                $_SESSION["name"] = $row['fldname'];
                $_SESSION["email"] = $row['fldemail'];
                $_SESSION["address"] = $row['fldaddress'];
                $_SESSION["position"] = $row['fldposition'];

                if (!empty($row["authentication"])) {
                    if ($row['fldposition'] == 'admin') {
                        header("Location:../html/a_home.php");
                    } else {
                        header("Location:../html/c_home.php");
                    }
                } else {
                    header("Location:../index.php?Verify");
                }
            } else {
                header("Location:../index.php?Invalid");
            }

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            error_log("Login error: " . $e->getMessage());
            header("Location:../index.php?Error");
        }
    }
    //---------------------------------------------------SIGNUP------------------------------------------
    elseif (isset($_GET["signup"])) {
        $mail = new PHPMailer(true);

        $name = $_GET["UpName"];
        $email = $_GET["UpEmail"];
        $pass = $_GET["UpPass"];

        $houseNo = isset($_GET["hnum"]) ? $_GET["hnum"] : "";
        $barangay = isset($_GET["brgy"]) ? $_GET["brgy"] : "";
        $city = isset($_GET["city"]) ? strtolower(trim($_GET["city"])) : "";
        $province = isset($_GET["province"]) ? strtolower(trim($_GET["province"])) : "";

        // Validate the city and province
        $isValidCity = ($city === "lipa" || $city === "lipa city");
        $isValidProvince = ($province === "batangas");

        if (!$isValidCity || !$isValidProvince) {
            header("Location:../html/signup.php?LocationError");
            exit();
        }

        $city = "Lipa City";
        $province = "Batangas";

        // Combine address components
        $fullAddress = trim(implode(", ", array_filter([
            $houseNo,
            $barangay,
            $city,
            $province
        ])));

        try {
            // Configure PHPMailer
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "cdofoodsphereecart@gmail.com"; // Your Gmail address
            $mail->Password = "rloh wnzf wghh ukkx";          // Your Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom("cdofoodsphereecart@gmail.com", "cdofoodsphereecart.com");
            $mail->addAddress($email, $name);

            $mail->isHTML(true);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $mail->Subject = 'Account Verification';
            $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
            $mail->send();

            $conn->begin_transaction();

            // Check if email already exists
            $stmt = $conn->prepare("SELECT * FROM tblaccount WHERE fldemail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $rowCount = $result->num_rows;

            if ($rowCount == 0) {
                $stmt = $conn->prepare("INSERT INTO tblaccount (fldname, fldemail, fldpassword, fldposition, fldaddress, code) VALUES (?, ?, ?, 'customer', ?, ?)");
                $stmt->bind_param("sssss", $name, $email, $pass, $fullAddress, $verification_code);

                if ($stmt->execute()) {
                    error_log("User registered successfully: $email");
                    $conn->commit();
                    header("Location:../html/signup.php?Successful");
                    exit();
                } else {
                    error_log("Error inserting data: " . $stmt->error);
                    $conn->rollback();
                    header("Location:../html/signup.php?InsertError");
                }
            } else {
                error_log("Email already exists: $email");
                header("Location:../html/signup.php?Existing");
            }
        } catch (Exception $e) {
            $conn->rollback();
            error_log("Signup error: " . $e->getMessage());
            header("Location:../html/signup.php?Error");
        }
    }
    //---------------------------------------------------VERIFY------------------------------------------
    elseif (isset($_GET["verify"])) {
        if($_GET["code"]){
            session_start();
            $stmt = $conn->prepare("SELECT * FROM tblaccount WHERE fldemail = ?");
            $stmt->bind_param("s", $_SESSION["email"]);
            $stmt->execute();
            $result = $stmt->get_result();
            $rowCount = $result->num_rows;
            if ($rowCount > 0) {
                $row = $result->fetch_assoc();
                if($_GET["code"] == $row['code']){
                    $conn->query("UPDATE tblaccount SET authentication = 'True' WHERE fldemail = '$_SESSION[email]'");
                    header("Location:../html/verifyhere.php?Successful");
                }else{
                    header("Location:../html/verifyhere.php?Error=Code Incorrect.");
                }
            } else {
                header("Location:../html/verifyhere.php?Error=No account found.");
            }
        }
    }elseif(isset($_GET['resend'])){
        session_start();
        $mail = new PHPMailer(true);
        // Configure PHPMailer
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "cdofoodsphereecart@gmail.com"; // Your Gmail address
        $mail->Password = "rloh wnzf wghh ukkx";          // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom("cdofoodsphereecart@gmail.com", "cdofoodsphereecart.com");
        $mail->addAddress($_SESSION['email'], $_SESSION["name"]);

        $mail->isHTML(true);
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $mail->Subject = 'Account Verification';
        $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
        $mail->send();

        $conn->query("UPDATE tblaccount SET code = '$verification_code' WHERE fldemail = '$_SESSION[email]'");
        header("location:../html/verifyhere.php?resend");
    }
}