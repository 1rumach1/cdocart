<html lang="en">
<?php
require("components/head.php");
session_start();
$id = $_SESSION["id"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$position = $_SESSION['position'];
require("../conn.php");
include("../security.php");
require("components/c_header.php");
require("components/modal_msg.php");
?>

<body class="bg-secondary bg-opacity-25">
    <!-- ---------------------------------------PROFILE_AREA--------------------------- -->
        <div class="container-fluid p-3 rounded">
            <div class="row d-flex m-2 flex-column flex-md-row">
                <!-- CART -->
                <div class="shadow p-4 px-3 col-12 col-md-7 bg-light rounded-start" style="min-height: 200px; max-height: 600px; overflow-y: auto;">
                    <h3 class="ps-3"><b>SHOPPING CART</b></h3>
                    <hr>
                    <div class="mx-3">
                        <?php
                        $total = 0;                        
                        $cart = $conn->query("SELECT * FROM  tblcart WHERE cusname='$_SESSION[name]' and prodstatus = ''");
                        $cartCount = $cart->num_rows;
                        if($cartCount == 0 ){
                            echo"";
                        }else{
                            while ($row = $cart->fetch_assoc()) {
                                $stock = $conn->query("SELECT * FROM tblproduct WHERE prodname='$row[prodname]'");
                                $stockcount = $stock->fetch_assoc();
                                $total = $total + ($row["quan"] * $row["price"]);
                                echo "
                                <div class='d-flex flex-column flex-lg-row align-items-center justify-content-between p-2 px-3'>
                                    <div id='prodImg' class='p-2' style='background-image: url(../pics/$row[prodimage]);'></div>
                                    <div class='fw-bold text-center text-lg-start mt-3 mt-lg-0'>$row[prodname]</div>
                                    <div class='fw-bold mt-3 mt-lg-0'>P $row[price]</div>
                                    <div class='d-flex align-items-center mt-3 mt-lg-0 fw-bold'>
                                        Quantity: $row[quan]
                                        <a type='button' class='btn' href='item.php?product=$row[prodname]'><i class='bi bi-pencil-fill text-warning'></i></a>
                                        <a type='button' class='btn' href='../sql/cart.php?delete=$row[prodname]'><i class='bi bi-x-circle-fill text-danger'></i></a>
                                    </div>
                                </div>
                                <hr>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- SUMMARY -->
                <div class="shadow p-4 px-3 col-12 col-md-5 bg-secondary bg-opacity-50 rounded-end mt-4 mt-md-0 d-flex flex-column" style="min-height: 100%; max-height: 600px; overflow-y: auto;">
                    <form action="../sql/cart.php" method="post" enctype="multipart/form-data">
                        <div class="text-end text-light">
                            <h3><b>SUMMARY</b></h3>
                            <hr>
                        </div>
                        <div class="p-2 ps-3">
                            <p class="fw-bold">Payment Method</p>
                            <div class="row bg-white p-3 rounded mx-1 mb-5">
                                <div class="col-xl form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="codRadio" value="COD" checked>
                                    <p>Cash on Delivery</p>
                                </div>
                                <div class="col-xl form-check form-check-inline">
                                    <input class="form-check-input" data-bs-toggle="collapse" href="#method" aria-expanded="false" aria-controls="method" type="radio" name="paymentMethod" id="gcashRadio" value="GCASH">
                                    <p>Online Payment</p>
                                </div>
                                <div class="collapse border rounded p-2 py-3" id="method">
                                    <p style="letter-spacing: 4px;" class="fw-bold fs-4 mb-3">G-CASH</p>
                                    <hr>
                                    <div class="mx-3">
                                        <div>
                                            <div class="fw-bold">Pay Here</div>
                                            <div class="row p-2 mb-3">
                                                <small class="col-sm-6">CDOEcart Gcash No.</small>
                                                <small class="col-sm-6 mb-2">0987 123 7654</small>
                                                <small class="col-sm-6">CDOEcart Gcash Name</small>
                                                <small class="col-sm-6 mb-2">Dela Cruz, Juan</small>
                                            </div>
                                            <div class="fw-bold">or Scan Here</div>
                                            <div class="row p-2 mb-3">
                                                <div class='border' style="width: clamp(10px, 30vw, 150px); height: auto;">
                                                    <img src='../pics/qrcode.png' style='width: 100%; height: auto;'>
                                                </div>
                                            </div>
                                            <p class="fw-bold">Send Proof of Payment</p>
                                            <input type="file" name="proof" id="proof" value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="fw-bold">Delivery Address</p>
                            <div class="mb-4 mx-1">
                                <input type="text" name="address" class="form-control mb-3 border-0 rounded p-2" value="<?php echo $_SESSION["address"] ?>">
                            </div>
                        </div>
                        
                        <div class="mt-auto w-100">
                            <hr>
                            <div class="m-3 text-dark fw-bold d-flex justify-content-between">
                                <small>TOTAL PRICE</small>
                                <input type="hidden" name="total" value="<?PHP echo $total?>">
                                <small>P <?php echo $total; ?></small>
                            </div>
                            <button type="submit" name="checkout" class="btn bg-dark text-light w-100 rounded-0 border-0" style="letter-spacing: 5px;">CHECK OUT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // PHP 
        <?php
        if (isset($_GET["Successful"])) {
            echo "toastr.success('Order Placed successfully');";
        } elseif (isset($_GET["dSuccessful"])) {
            echo "toastr.success('Item deleted successfully');";
        } elseif (isset($_GET["Empty"])) {
            echo "toastr.warning('Shopping Cart is Empty');";
        } elseif (isset($_GET["Error"])) {
            $errorMessage = urldecode($_GET["Error"]);
            echo "toastr.error('An Error occurred: " . $errorMessage . "');";
        }
        ?>
    </script>
    <script>
        const proof = document.getElementById('proof');
        const codRadio = document.getElementById("codRadio");
        const gcashRadio = document.getElementById("gcashRadio");
        
        codRadio.addEventListener("change", function() {
            if (codRadio.checked) {
                proof.required = false;
                proof.value = '';
                bootstrap.Collapse.getInstance(document.getElementById("method")).hide();
            }
        });

        gcashRadio.addEventListener("change", function() {
            if (gcashRadio.checked) {
                proof.required = true;
                bootstrap.Collapse.getInstance(document.getElementById("method")).show();
            }
        });
    </script>
</body>
</html>
