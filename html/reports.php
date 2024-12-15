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
require("components/a_header.php");
require("components/modal_upd_prod.php");
include("../security.php");
?>

<body class="bg-secondary bg-opacity-25">
    <!-- ---------------------------------------ORDER_AREA----------------------------- -->
    <div class="container-fluid p-3 rounded">
        <div class="row d-flex" style="min-height: 350px;">
            <!-------------------CONTENT CONTAINER--------------->
            <div class="">
                <div class="content bg-white rounded p-3 pb-5">
                    <h2 class="p-3">Reports</h2>
                    <hr>
                    <div class="px-md-5 px-2">
                        <nav>
                            <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                                <button class="nav-link navorder text-secondary <?php echo (!isset($_POST['search'])) ? 'active' : ''; ?> col-md" id="nav-product-tab" data-bs-toggle="tab" data-bs-target="#nav-product" type="button" role="tab" aria-controls="nav-product" aria-selected="<?php echo (isset($_POST['search'])) ? 'false' : 'true'; ?>">PRODUCT</button>
                                <button class="nav-link navorder text-secondary col-md <?php echo (isset($_POST['search'])) ? 'active' : ''; ?>" id="nav-saleReport-tab" data-bs-toggle="tab" data-bs-target="#nav-saleReport" type="button" role="tab" aria-controls="nav-saleReport" aria-selected="<?php echo (isset($_POST['search'])) ? 'true' : 'false'; ?>">SALES REPORT</button>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content px-md-4 px-2" id="nav-tabContent">
                        <!--PRODUCT REPORT-->
                        <div class="tab-pane fade <?php echo (!isset($_POST['search'])) ? 'show active' : ''; ?>" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">
                            <div class="d-flex my-2">
                                <a class="btn ms-auto text-light bg-secondary" type="button" href="../fpdf/print.php?Product">Print Reports</a>
                            </div>
                            <div class="table-responsive">
                                <table id="tableUsers" class="table table-striped text-center align-middle border">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;">Image</th>
                                            <th style="width: 40%;">Name</th>
                                            <th style="width: 15%;">Price</th>
                                            <th style="width: 15%;">Stock</th>
                                            <th style="width: 10%;">Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $prodlist = $conn->query("SELECT * FROM tblproduct");
                                        if ($prodlist->num_rows == 0) {
                                            echo "<tr>
                                                    <td colspan=5>Currently No Product Listed</td>
                                                </tr>";
                                        } else {
                                            while ($row = $prodlist->fetch_assoc()) {
                                                echo "<tr>
                                                            <td class='d-flex justify-content-center'>
                                                                <div id='prodImg' style='background-image: url(../pics/$row[prodimage]);'></div>
                                                            </td>
                                                            <td>$row[prodname]</td>
                                                            <td>P $row[prodprice]</td>
                                                            <td>$row[prodquantity]</td>
                                                            <td><i class='bi bi-pencil-fill text-warning' type='button' data-bs-toggle='modal' data-bs-target='#$row[prodid]'></i></td>
                                                        </tr>
                                                        ";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--SALES REPORT-->
                        <div class="tab-pane fade p-3 <?php echo (isset($_POST['search'])) ? 'show active' : ''; ?>" id="nav-saleReport" role="tabpanel" aria-labelledby="nav-saleReport-tab">
                            <div class="container py-3">
                                <div class="accordion row" id="dateFilterAccordion">
                                    <!-- Daily Filter -->
                                    <div class="accordion-item col-md-4 border-0">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#daily" aria-expanded="false" aria-controls="daily">
                                                DAILY
                                            </button>
                                        </h2>
                                        <div id="daily" class="accordion-collapse collapse" data-bs-parent="#dateFilterAccordion">
                                            <div class="accordion-body">
                                                <form action="reports.php" method="POST" class="d-flex gap-2 flex-wrap align-items-center">
                                                    <input type="date" class="form-control" name="date" style="max-width: 200px;">
                                                    <button type="submit" name="search" class="btn btn-secondary">Search</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Monthly Filter -->
                                    <div class="accordion-item col-md-4 border-0">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#monthly" aria-expanded="false" aria-controls="monthly">
                                                MONTHLY
                                            </button>
                                        </h2>
                                        <div id="monthly" class="accordion-collapse collapse" data-bs-parent="#dateFilterAccordion">
                                            <div class="accordion-body">
                                                <form action="reports.php" method="POST" class="d-flex gap-2 flex-wrap align-items-center">
                                                    <input type="month" class="form-control" name="date" style="max-width: 200px;">
                                                    <button type="submit" name="search" class="btn btn-secondary">Search</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Date Range Filter -->
                                    <div class="accordion-item col-md-4 border-0">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#range" aria-expanded="false" aria-controls="range">
                                                DATE RANGE
                                            </button>
                                        </h2>
                                        <div id="range" class="accordion-collapse collapse" data-bs-parent="#dateFilterAccordion">
                                            <div class="accordion-body">
                                                <form action="reports.php" method="POST" class="d-flex gap-2 flex-wrap align-items-center">
                                                    <input type="date" class="form-control" name="from" style="max-width: 200px;" placeholder="From">
                                                    <span class="fw-bold">To</span>
                                                    <input type="date" class="form-control" name="to" style="max-width: 200px;" placeholder="To">
                                                    <button type="submit" name="search" class="btn btn-secondary">Search</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['date'])) {
                                if (empty($_POST['date'])) {
                                    $date = date("Y-m-d");
                                } else {
                                    $date = $_POST['date'];
                                }

                                // Check if date matches YYYY-MM format
                                if (preg_match('/^\d{4}-\d{2}$/', $date)) {
                                    $dateObj = new DateTime($date . '-01');
                                    $date = $dateObj->format('F Y');
                                }
                            } elseif (isset($_POST['from'])) {
                                $from = $_POST["from"];
                                $to = $_POST["to"];
                                $date = "$from to $to";
                            } else {
                                $date = date('Y-m-d');
                            }
                            ?>
                            <!-- Add this near your print button -->
                            <h5 class="mt-4 d-flex clamp-text">
                                <p class="align-self-center ">Date: <?PHP echo $date ?></p><a class="btn ms-auto text-light bg-secondary" type="button" href="../fpdf/print.php?<?PHP echo isset($_POST["from"]) ? "from=$from&to=$to" : "date=$date" ?>">Print Reports</a>
                            </h5>

                            <div class="table-responsive">
                                <table id="tableUsers" class="table table-striped text-center align-middle border">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%;">Product Name</th>
                                            <th style="width: 20%;">Floor Price</th>
                                            <th style="width: 20%;">Quantity Sold</th>
                                            <th style="width: 20%;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('components/sales_report.php');
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
    // Add this script to your reports.php, either in a <script> tag or in a separate JS file
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
    if (isset($_GET["Successful"])) {
        echo "toastr.success('Product Updated successfully');";
    } elseif (isset($_POST["from"])) {
        if (empty($_POST["from"]) or empty($_POST["to"])) {
            echo "toastr.error('No Given Date');";
        }
    } elseif (isset($_POST["date"])) {
        if (empty($_POST['date'])) {
            echo "toastr.error('No Given Date');";
        }
    } elseif (isset($_GET["Error"])) {
        $errorMessage = urldecode($_GET["Error"]);
        echo "toastr.error('An Error occurred: " . $errorMessage . "');";
    }
    ?>
</script>

</html>