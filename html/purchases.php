<!DOCTYPE html>
<html lang="en">
<?PHP
require("components/head.php");
session_start();
$id = $_SESSION["id"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$position = $_SESSION['position'];
require("../conn.php");
include("../security.php");
require("components/modal_view_prod.php");
require("components/modal_msg.php");
require("components/modal_comp.php");
require("components/c_header.php");
?>

<body class="bg-secondary bg-opacity-25">
    <!-- ---------------------------------------PROFILE_AREA--------------------------- -->
    <div class="container-fluid p-3 rounded">
        <div class="row d-flex" style="min-height: 500px;">
            <!-------------------CONTENT CONTAINER--------------->
            <div class="">
                <div class="content bg-white rounded p-3 pb-5 h-100">
                    <h2 class="p-3">My Purchases</h2>
                    <hr>
                    <div class="px-md-5 px-2">
                        <nav>
                            <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                                <button class="nav-link navorder text-secondary active col-md" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="true">PENDING</button>
                                <button class="nav-link navorder text-secondary col-md" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed" aria-selected="false">COMPLETED</button>
                            </div>
                        </nav>
                    </div>
                    <?PHP include("components/pur_table.php") ?>
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