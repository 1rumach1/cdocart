<!DOCTYPE html>
<html lang="en">

<?PHP
require("components/head.php");
session_start();
$id = $_SESSION["id"];
$position = $_SESSION['position'];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
require("../conn.php");
include("../security.php");
require("components/a_header.php");
require("components/modal_view_prod.php");
require("components/modal_toship.php");
require("components/modal_conf.php");
require("components/modal_comp.php");
?>

<body class="bg-secondary bg-opacity-25">
    <!-- ---------------------------------------ORDER_AREA----------------------------- -->
    <div class="container-fluid p-3 rounded">
        <div class="row d-flex" style="min-height: 500px;">
            <!-------------------CONTENT CONTAINER--------------->
            <div class="">
                <div class="content bg-white rounded p-3 pb-5 h-100">
                    <h2 class="p-3">Customer's Orders</h2>
                    <hr>
                    <div class="px-md-5 px-2">
                        <nav>
                            <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                                <button class="nav-link navorder text-secondary active col-md" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="true">LIST</button>
                                <button class="nav-link navorder text-secondary col-md" id="nav-toShip-tab" data-bs-toggle="tab" data-bs-target="#nav-toShip" type="button" role="tab" aria-controls="nav-toShip" aria-selected="false">TO SHIP</button>
                                <button class="nav-link navorder text-secondary col-md" id="nav-complete-tab" data-bs-toggle="tab" data-bs-target="#nav-complete" type="button" role="tab" aria-controls="nav-complete" aria-selected="false">COMPLETED</button>
                            </div>
                        </nav>
                    </div>
                    <?PHP require("components/orders_table.php") ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<script>
    // PHP 
    <?php
    if (isset($_GET["Successful"])) {
        echo "toastr.success('Order status updated successfully');";
    } elseif (isset($_GET["Error"])) {
        $errorMessage = urldecode($_GET["Error"]);
        echo "toastr.error('An Error occurred: " . $errorMessage . "');";
    }
    ?>
</script>

</html>