<?PHP
session_abort();
session_unset();
session_reset();
require("html/components/head.php");
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
                    <img src="pics/logo.png" alt="Logo" height="40" class="me-2">
                    <span class="fw-bold d-none d-sm-inline">CDO Foodsphere E-Cart</span>
                    <span class="fw-bold d-sm-none" style="font-size: 15px;">CDO Foodsphere E-Cart</span>
                </a>
            </div>
        </nav>

        <!-- Login Section -->
        <div class="container py-5">
            <div class="row align-items-center">
                <!-- Left Side - Community Text and Image -->
                <div class="col-md-6 text-center text-md-start mb-4 mb-md-0 d-none d-sm-inline">
                    <h1 class="display-5 text-danger mb-4">Be a part of the CDO Community!</h1>
                    <img src="pics/cart-min.png" class="img-fluid" style="max-width: 70%;" alt="Cart Image">
                </div>

                <!-- Right Side - Login Form -->
                <div class="col-md-5 ms-auto">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-4 p-sm-5">
                            <h3 class="card-title text-center mb-4">LOG IN</h3>
                            <form action="sql/userAuth.php" method="get">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" name="InEmail" placeholder="name@example.com" required>
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" name="InPass" placeholder="Password" required>
                                    <label for="floatingPassword">Password</label>
                                </div>
                                
                                <div class="d-grid">
                                    <button class="btn btn-success btn-lg rounded-pill" type="submit" name="login">L O G   I N</button>
                                </div>

                                <div class="text-center mt-3">
                                    <small>New to CDO Foodsphere E-Cart? <a href="html/signup.php" class="text-success">Sign Up</a></small>
                                </div>

                                <?php if(isset($_GET["Verify"])): ?>
                                    <div class="text-center mt-2">
                                        <small>Account not verified? Verify <a href="html/verifyhere.php" class="text-warning">here</a>.</small>
                                    </div>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        <?PHP
        
        if(isset($_GET["logout"])){
            echo "toastr.success('Logout Successfully.');";
        }elseif(isset($_GET["Verify"])) {
            echo "toastr.warning('Account not Verified.');";
        }elseif(isset($_GET["Invalid"])) {
            echo "toastr.warning('Invalid Credentials or account does not exist.');";
        }elseif (isset($_GET["Error"])) {
            $errorMessage = urldecode($_GET["Error"]);
            echo "toastr.error('An Error occurred: " . $errorMessage . "');";
        }
        ?>
    </script>
</body>

</html>