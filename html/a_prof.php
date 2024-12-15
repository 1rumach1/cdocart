<!DOCTYPE html>
<html lang="en">
<?PHP
require("components/head.php");
session_start();
$id = $_SESSION["id"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$position = $_SESSION['position'];
include("../security.php");
require("../conn.php");
require("components/a_header.php");
?>

<body class="bg-secondary bg-opacity-25">
    <!-- ---------------------------------------PROFILE_AREA--------------------------- -->
    <div class="container-fluid p-3 rounded">
        <div class="row d-flex" style="min-height: 350px;">
            <!-------------------CONTENT CONTAINER--------------->
            <div class="">
                <div class="content bg-white rounded p-3 pb-5">
                    <h2 class="p-3">Welcome to Your Profile</h2>
                    <hr>
                    <div class="px-2">
                        <form action="../sql/prof.php" method="POST">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <label class="col-md-6 col-form-label">Full Name</label>
                                        <div class="col-md-6">
                                            <input class="form-control fs-6" name="name" required type="text" value="<?PHP echo $name ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <label class="col-md-6 col-form-label">Email Address</label>
                                        <div class="col-md-6">
                                            <input class="form-control fs-6" name="email" required type="email" value="<?PHP echo $email ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <label class="col-md-6 col-form-label">Password</label>
                                        <div class="col-md-6">
                                            <input class="form-control fs-6" name="pass" required type="password" placeholder="Enter Old Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <label class="col-md-6 col-form-label">New Password</label>
                                        <div class="col-md-6">
                                            <input class="form-control fs-6" name="newpass" required type="password" placeholder="Enter New Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-3 d-flex">
                                    <input type="submit" style="max-width: 300px; letter-spacing: 4px; color: red; font-size: clamp(14px,2vw,16px);" value="SAVE CHANGES" class="bg-light border-thick rounded-pill fw-bold w-100 ms-auto">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    <?php
    if (isset($_GET["Successful"])) {
        echo "toastr.success('Profile Updated Successfully.');";
    } elseif (isset($_GET["Error"])) {
        $errorMessage = urldecode($_GET["Error"]);
        echo "toastr.error('An Error occurred: " . $errorMessage . "');";
    }
    ?>
</script>

</html>