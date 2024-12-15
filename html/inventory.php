        
<!DOCTYPE html>
<html lang="en">

<?PHP
require("components/head.php");
session_start();
$id = $_SESSION["id"];
$name = $_SESSION["name"];
$position = $_SESSION['position'];
$email = $_SESSION["email"];
require("../conn.php");
include("../security.php");
require("components/modal_add_prod.php");
require("components/modal_del_prod.php");
require("components/modal_was_prod.php");
require("components/a_header.php");
?>
<body class="bg-secondary bg-opacity-25">
    <!-- ---------------------------------------ORDER_AREA----------------------------- -->
        <div class="container-fluid rounded">
            <div class="row d-flex" style="min-height: 350px;">
                <!-------------------CONTENT CONTAINER--------------->
                <div class="">
                    <div class="content bg-white rounded p-3 pb-5">
                        <h2 class="p-3">Inventory</h2>
                        <hr>
                        <div class="px-md-5 px-2">
                            <nav>
                                <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                                    <button class="nav-link navorder text-secondary col-md active" id="nav-delivery-tab" data-bs-toggle="tab" data-bs-target="#nav-delivery" type="button" role="tab" aria-controls="nav-delivery" aria-selected="false">DELIVERY</button>
                                    <button class="nav-link navorder text-secondary col-md" id="nav-wastages-tab" data-bs-toggle="tab" data-bs-target="#nav-wastages" type="button" role="tab" aria-controls="nav-wastages" aria-selected="false">WASTAGES</button>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content px-md-4 px-2" id="nav-tabContent">
                            <div class="tab-pane fade show active p-3" id="nav-delivery" role="tabpanel" aria-labelledby="nav-delivery-tab">
                                <div class="d-flex my-2">
                                    <a class="btn ms-auto text-light bg-secondary" type="button" href="../fpdf/print.php?Delivery">Print Reports</a>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableUsers" class="table table-striped text-center align-middle border">
                                        <thead>
                                            <tr>
                                                <td colspan="2"><button class="btn bg-white shadow-sm w-75 text-decoration-none text-dark fw-bold" type='button' data-bs-toggle='modal' data-bs-target='#modalAddNew'>ADD NEW PRODUCT</button></td>
                                                <td colspan="2"><button class="btn bg-white shadow-sm w-75 text-decoration-none text-dark fw-bold" type='button' data-bs-toggle='modal' data-bs-target='#modalAddExist'>ADD PRODUCT DELIVERY</button></td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;">Date</th>
                                                <th style="width: 35%;">Product Name</th>
                                                <th style="width: 10%;">Quantity</th>
                                                <th style="width: 35%;">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                            $prodInvDel  = $conn->query("SELECT * FROM tblinventory where fldstatus='delivery'");
                                            while ($row = $prodInvDel->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>$row[flddate]</td>
                                                        <td>$row[fldname]</td>
                                                        <td>$row[fldquan]</td>
                                                        <td>$row[flddesc]</td>
                                                        </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade p-3" id="nav-wastages" role="tabpanel" aria-labelledby="nav-wastages-tab">
                                <div class="d-flex my-2">
                                    <a class="btn ms-auto text-light bg-secondary" type="button" href="../fpdf/print.php?Wastages">Print Reports</a>
                                </div>
                                <div class="table-responsive">
                                    <table id="tableUsers" class="table table-striped text-center align-middle border"">
                                        <thead>
                                            <tr>
                                                <td colspan="4"><button class="btn bg-white shadow-sm w-50 text-decoration-none text-dark fw-bold" type='button' data-bs-toggle='modal' data-bs-target='#modalAddWaste'>ADD WASTAGES</button></td>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%;">Date</th>
                                                <th style="width: 35%;">Product Name</th>
                                                <th style="width: 10%;">Quantity</th>
                                                <th style="width: 35%;">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                            $prodInvWaste  = $conn->query("SELECT * FROM tblinventory where fldstatus='wastages'");
                                            while ($row = $prodInvWaste->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>$row[flddate]</td>
                                                        <td>$row[fldname]</td>
                                                        <td>$row[fldquan]</td>
                                                        <td>$row[flddesc]</td>
                                                        </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    // Select all anchor tags with href containing "print.php"
    document.querySelectorAll('a[href*="print.php"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default link navigation

            // Get the full URL of the print.php with parameters
            const printUrl = this.getAttribute('href');

            // Create iframe container if it doesn't exist
            let container = document.getElementById('pdf-preview-container');
            if (!container) {
                container = document.createElement('div');
                container.id = 'pdf-preview-container';
                container.style.position = 'fixed';
                container.style.top = '0';
                container.style.left = '0';
                container.style.width = '0%';
                container.style.height = '0%';
                container.style.background = 'rgba(0, 0, 0, 0.5)';
                container.style.zIndex = '1000';
                document.body.appendChild(container);
            }

            // Clear previous content
            container.innerHTML = '';

            // Create iframe
            const pdfFrame = document.createElement('iframe');
            pdfFrame.src = printUrl;
            pdfFrame.style.width = '90%';
            pdfFrame.style.height = '90%';
            pdfFrame.style.margin = '5% auto';
            pdfFrame.style.display = 'block';
            pdfFrame.style.background = '#fff';
            pdfFrame.style.border = 'none';
            
            // Add load event listener to trigger print preview
            pdfFrame.onload = function() {
                try {
                    // Modern browsers: Attempt to trigger print preview
                    pdfFrame.contentWindow.print();
                } catch (err) {
                    console.error('Could not open print preview:', err);
                }
            };

            // Append iframe to container
            container.appendChild(pdfFrame);

            // Optional: Add close button to container
            const closeButton = document.createElement('button');
            closeButton.textContent = 'Close';
            closeButton.style.position = 'absolute';
            closeButton.style.top = '10px';
            closeButton.style.right = '10px';
            closeButton.style.padding = '10px 15px';
            closeButton.style.fontSize = '16px';
            closeButton.style.color = '#fff';
            closeButton.style.background = 'red';
            closeButton.style.border = 'none';
            closeButton.style.borderRadius = '5px';
            closeButton.style.cursor = 'pointer';
            closeButton.addEventListener('click', function() {
                container.style.display = 'none';
            });
            container.appendChild(closeButton);

            // Show the container
            container.style.display = 'block';
        });
    });
    // PHP 
    <?php
    if (isset($_GET["Existing"])) {
        echo "toastr.warning('Product Already Exist. Use the Add Product Delivery button Instead.');";
    } elseif (isset($_GET["Successful"])) {
        echo "toastr.success('Product Added/Delivered successfully');";
    } elseif (isset($_GET["Invalid_Quantity"])) {
        echo "toastr.error('Wastages quantity exceeds the current stock');";
    } elseif (isset($_GET["Wastages"])) {
        echo "toastr.success('Wastages Disposed');";
    } elseif (isset($_GET["Error"])) {
        $errorMessage = urldecode($_GET["Error"]);
        echo "toastr.error('An Error occurred: " . $errorMessage . "');";
    }
    ?>
</script>

</html>