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
require("components/c_header.php");
require("components/modal_msg.php");

$prodname = $_GET["product"];
$prodinfo = $conn->query("SELECT * from tblproduct where prodname = '$prodname'");
$row = $prodinfo->fetch_assoc();
?>

<body class="bg-secondary bg-opacity-25">
    <!-- ---------------------------------------ITEM_INFO--------------------------- -->
    <div class="container-fluid rounded p-3">
        <div class="row m-2 rounded p-3 bg-light" style="min-height: 100px;">
            <div class="col-sm-5 p-2 px-4 d-flex justify-content-center align-items-center rounded-start bg-secondary bg-opacity-25">
                <div class="bg-light rounded shadow p-4" style="width: clamp(10px, 30vw, 200px); height: auto;">
                    <?php
                    echo "<img src='../pics/$row[prodimage]' style='width: 100%; height: auto;'>";
                    ?>
                </div>
            </div>
            <div class="col-sm-7 text-light rounded-end shadow bg-success p-3 px-4">
                <form action="../sql/cart.php" method="post">
                    <?PHP
                    echo "
                            <div class='ps-3'>
                                <h1>$row[prodname]</h1>
                                <p>$row[proddesc]</p>
                            </div>
                            <hr>
                            <div class='ps-3'>
                                <table class='text-light w-50' cellpadding=10>
                                    <tr><td><b>Price</b></td><td>₱ $row[prodprice]</td></tr>
                                    <tr><td><b>Current Stock</b></td><td>$row[prodquantity] </td></tr>
                                    <tr><td><b>Quantity</b></td><td>
                                    <input type=hidden name=prodname value='$row[prodname]'>
                                    <input type=hidden name=prodprice value='$row[prodprice]'>
                                    <input type=hidden name=prodimage value='$row[prodimage]'>
                                    <div class='d-flex'>
                                    <input class='w-25 rounded-0 bg-dark bg-opacity-75 border-0 text-light' type='button' value='-' onclick='minusQuan()'>
                                    <input class='border-0 text-center' type='number' id='quan' name=quan style='width: 40px;' required min='1' max='$row[prodquantity]' value='1'><br>
                                    <input class='w-25 rounded-0 bg-dark bg-opacity-75 border-0 text-light' type='button' value='+' onclick='plusQuan()'>
                                    </div>
                                    ";
                    echo "</td></tr>
                                </table>
                            </div>
                            <hr>
                            <div class='ps-3 text-end align-item-end' style='max-height: 100px;'>
                                <input type='submit' name='addToCart' style='max-width: 200px; letter-spacing: 4px; color: white; font-size: clamp(8px,2vw,16px); border: 2px solid white;' value='ADD TO CART' class='bg-success rounded-pill fw-bold w-100'>
                            </div>
                            ";
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../js/functions.js"></script>
<script>
    <?php
    if (isset($_GET["Successful"])) {
        echo "toastr.success('Product successfully Added/Updated to cart.');";
    } elseif (isset($_GET["Error"])) {
        $errorMessage = urldecode($_GET["Error"]);
        echo "toastr.error('An Error occurred: " . $errorMessage . "');";
    }
    ?>
</script>

</html>