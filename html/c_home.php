<!DOCTYPE html>
<html lang="en">

<?PHP
require("components/head.php");
session_start();
include("../security.php");
require("../conn.php");
require("components/c_header.php");
require("components/modal_msg.php");
?>

<body class="bg-secondary bg-opacity-25">
    <!-- ---------------------------------------PRODUCT LIST--------------------------- -->
    <div class="container-fluid">
        <div class="my-3 p-3 rounded text-center bg-dark bg-opacity-75">
            <h1 class="display-4 fw-bold" style="color: #FF4500; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">OUR PRODUCTS</h1>
            <p class="lead text-light" style="font-size: clamp(12px,2vw,16px); text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">Our delicious home-style food creations allow people to indulge and taste the comfort of home anytime, anywhere.</p>
        </div>
        <div class="container-fluid bg-light p-5 rounded text-center">
            <h2 class="mb-4">Featured Products</h2>
            <div class="row">
                <?PHP
                $result = $conn->query("SELECT * FROM tblproduct");
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <div class='col-md-3 mb-3'>
                        <a class='text-decoration-none' href='item.php?product=$row[prodname]'>
                            <div class='card shadow'><!--item-->
                                <div class='card-body' style='height: 300px;'>
                                    <div id='imgCon' class='rounded bg-light' style='height: 70%;'>
                                        <img src='../pics/$row[prodimage]' style='width: auto; height: 70%;' class='card-img-top'>                                
                                    </div>
                                    <div class='row mt-2' style='height: 15%;'>
                                        <h6 class='card-title text-start'>$row[prodname]</h6>
                                        <small class='col-6 text-start'>P $row[prodprice]</small>
                                        <small class='col-6 text-end'>Stock: $row[prodquantity]</small>
                                    </div>
                                    <div class='text-start py-2' style='height: 15%;'>
                                        <form method='post' action='../sql/cart.php'>
                                            <input type=hidden name=prodname value='$row[prodname]'>
                                            <input type=hidden name=prodprice value='$row[prodprice]'>
                                            <input type=hidden name=prodimage value='$row[prodimage]'>
                                            <input class='border-0 text-center' type='hidden' name=quan value='1'>
                                            <input type='hidden' name='from' value='home'>
                                            <button type='submit' name='addToCart' value='ADD TO CART' class='bg-success rounded fw-bold w-100 border-0'><i class='bi bi-cart-plus text-light'></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        ";
                }
                ?>
            </div>
        </div>
    </div>
</body>

<script>
    <?php
    if (isset($_GET["Successful"])) {
        echo "toastr.success('Product successfully Added/Updated to cart.');";
    }
    ?>
</script>

</html>