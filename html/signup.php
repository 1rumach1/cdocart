<?PHP
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

        <!-- Signup Section -->
        <div class="container py-5">
            <div class="row align-items-center">
                <!-- Left Side - Community Text and Image -->
                <div class="col-md-6 text-center text-md-start mb-4 mb-md-0 d-none d-sm-inline">
                    <h1 class="display-5 text-danger mb-4">Be a part of the CDO Community!</h1>
                    <img src="../pics/cart-min.png" class="img-fluid" style="max-width: 70%;" alt="Cart Image">
                </div>

                <!-- Right Side - Signup Form -->
                <div class="col-md-5 ms-auto">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-4 p-sm-5">
                            <h3 class="card-title text-center mb-4">SIGN UP</h3>
                            <form action="../sql/userAuth.php" method="get">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingName" type="text" name="UpName" placeholder="Full name (Lastname, Firstname MI)" required>
                                    <label for="floatingName">Full Name</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingEmail" type="email" name="UpEmail" placeholder="Email Address" required>
                                    <label for="floatingEmail">Email Address</label>
                                </div>

                                <div class="mb-3">
                                    <a class="btn btn-outline-success" data-bs-toggle="collapse" href="#addAddress" role="button" aria-expanded="false" aria-controls="addAddress">
                                        Add Address
                                    </a>
                                </div>

                                <div class="collapse" id="addAddress">
                                    <div class="card card-body mb-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <b class="me-2">Add Address</b>
                                            <div class="dropdown-center">
                                                <a class="remBut d-flex text-black align-items-center" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-question-circle fs-6 text-danger"></i>
                                                </a>
                                                <ul class="reminder dropdown-menu p-2">
                                                    <small>
                                                        <font color="red">Reminder!</font><br>Our Shop only caters to customers living at Lipa City Batangas.
                                                    </small>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="floatingHouseNo" type="number" name="hnum" placeholder="House No.">
                                                    <label for="floatingHouseNo">House No.</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-floating mb-3">
                                                    <select name="brgy" class="form-select" id="floatingBarangay" required>
                                                        <?PHP
                                                        $barangays = [
                                                            "Adya",
                                                            "Anilao",
                                                            "Anilao Labac",
                                                            "Antipolo Del Norte",
                                                            "Antipolo Del Sur",
                                                            "Bagong Pook",
                                                            "Balintawak",
                                                            "Banay-Banay",
                                                            "Bolbok",
                                                            "Bugtong",
                                                            "Bulacan",
                                                            "Bulaklakan",
                                                            "Calamias",
                                                            "Cumba",
                                                            "Dagatan",
                                                            "Duhatan",
                                                            "Fernando",
                                                            "Halang",
                                                            "Inosluban",
                                                            "Kayumanggi",
                                                            "Latag",
                                                            "Lodlod",
                                                            "Lumbang",
                                                            "Mabini",
                                                            "Malagonlong",
                                                            "Malitlit",
                                                            "Mataas na Lupa",
                                                            "Marawoy",
                                                            "Munting Pulo",
                                                            "Pagolingin Bata",
                                                            "Pagolingin East",
                                                            "Pagolingin West",
                                                            "Pinagtongulan",
                                                            "Pinagkawitan",
                                                            "Plaridel",
                                                            "Pusil",
                                                            "Quezon",
                                                            "Rizal",
                                                            "Sabang",
                                                            "San Benito",
                                                            "San Carlos",
                                                            "San Celestino",
                                                            "San Francisco",
                                                            "San Guillermo",
                                                            "San Isidro",
                                                            "San Jose",
                                                            "San Lucas",
                                                            "San Salvador",
                                                            "Sico",
                                                            "Sampaguita",
                                                            "Sto Nino",
                                                            "Sto Toribio",
                                                            "Talisay",
                                                            "Tangway",
                                                            "Tangob",
                                                            "Tipacan",
                                                            "Tibig",
                                                            "Tambo",
                                                            "Barangay 10",
                                                            "Barangay 11",
                                                            "Barangay 4",
                                                            "Barangay 5",
                                                            "Barangay 6",
                                                            "Barangay 7",
                                                            "Barangay 8",
                                                            "Barangay 9",
                                                            "Barangay Dos",
                                                            "Barangay Tres",
                                                            "Barangay Uno"
                                                        ];
                                                        foreach ($barangays as $brgy) {
                                                            echo "<option value='$brgy'>$brgy</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingBarangay">Barangay</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="floatingCity" type="text" name="city" value="Lipa City" readonly>
                                                    <label for="floatingCity">City</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="floatingProvince" type="text" name="province" value="Batangas" placeholder="Province" required>
                                                    <label for="floatingProvince">Province</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingPassword" type="password" name="UpPass" placeholder="Password" required>
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="floatingConfirmPassword" type="password" name="UpCPass" placeholder="Confirm Password" required onchange="cpass()">
                                    <label for="floatingConfirmPassword">Confirm Password</label>
                                </div>

                                <div class="text-center mt-3">
                                    <small>Have an account? <a href="../index.php" class="text-success">Log In</a></small>
                                </div>

                                <div class="d-grid mt-3">
                                    <button class="btn btn-success btn-lg rounded-pill" type="submit" name="signup" disabled>S I G N U P</button>
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
            echo "toastr.success('Account registered.');";
        } elseif (isset($_GET["Existing"])) {
            echo "toastr.info('Account Already Exist.');";
        } elseif (isset($_GET["Error"])) {
            echo "toastr.error('$_GET[Error]');";
        } elseif (isset($_GET["LocationError"])) {
            echo "toastr.warning('Address Out of Service Coverage (Lipa City Batangas)');";
        }
        ?>

        function cpass() {
            var pass = document.querySelector('input[name="UpPass"]');
            var cpass = document.querySelector('input[name="UpCPass"]');
            var submitButton = document.querySelector('button[type="submit"]');

            if (cpass.value === pass.value && cpass.value !== "") {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
    </script>
</body>

</html>