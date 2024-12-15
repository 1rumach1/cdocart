<html>
<?PHP
session_start();
require("components/head.php");
?>
<!DOCTYPE html>
<html lang="en">

<body class="bg-secondary bg-opacity-25">
    <div class="">
        <!-- Top Contact Bar -->
        <div class="bg-success text-white py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <i class="bi bi-telephone me-2"></i> 8-588-5900
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-envelope-at me-2"></i> cdofoodsphereecart@gmail.com
                    </div>
                </div>
            </div>
        </div>

        <!-- Header with Logo -->
        <nav class="navbar navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="../pics/logo.png" alt="Logo" height="40" class="me-2">
                    <span class="fw-bold d-none d-sm-inline">CDO Foodsphere E-Cart</span>
                    <span class="fw-bold d-sm-none" style="font-size: 15px;">CDO Foodsphere E-Cart</span>
                </a>
            </div>
        </nav>

        <!-- Verify Account Section -->
        <div class="container py-5">
            <div class="row align-items-center">
                <!-- Left Side - Community Text and Image -->
                <div class="col-md-6 text-center text-md-start mb-4 mb-md-0 d-none d-sm-inline">
                    <h1 class="display-5 text-danger mb-4">Be a part of the CDO Community!</h1>
                    <img src="../pics/cart-min.png" class="img-fluid" style="max-width: 70%;" alt="Cart Image">
                </div>

                <!-- Right Side - Verification Form -->
                <div class="col-md-5 ms-auto">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-4 p-sm-5">
                            <h3 class="card-title text-center mb-4">VERIFY ACCOUNT</h3>
                            <form action="../sql/userAuth.php" method="get">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingEmail" type="email" name="UpEmail" value="<?PHP echo $_SESSION['email'] ?>" readonly>
                                    <label for="floatingEmail">Email Address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingCode" type="text" name="code" placeholder="Verification Code" required>
                                    <label for="floatingCode">Verification Code</label>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="text-center">
                                        <small>Account verified? <a href="../index.php" class="text-success">Log In</a></small>
                                    </div>
                                    <a href="../sql/userAuth.php?resend" type="button" class="btn btn-secondary btn-sm">Resend</a>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-success btn-lg rounded-pill" type="submit" name="verify">V E R I F Y</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        <?PHP
        if (isset($_GET["Successful"])) {
            echo "toastr.success('Account Verified.');";
        } elseif (isset($_GET["resend"])) {
            echo "toastr.success('Verification code resend successfully.');";
        } elseif (isset($_GET["Error"])) {
            echo "toastr.error('$_GET[Error]');";
        }
        ?>
    </script>
</body>

</html>