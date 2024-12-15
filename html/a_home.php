<!DOCTYPE html>
<html lang="en">
<?php
require("components/head.php");
session_start();
require("../conn.php");
require("components/a_header.php");

// Fetch total items
$prodlist = $conn->query("SELECT * FROM tblproduct");
$totalItem = $prodlist ? $prodlist->num_rows : 0;

// Fetch total sales and items sold
$totalSales = 0;
$itemSold = 0;

$wstatusOrder = $conn->query("SELECT * FROM tblorders WHERE status != ''");
if ($wstatusOrder) {
    while ($row = $wstatusOrder->fetch_assoc()) {
        $result = $conn->query("SELECT * FROM tblcart WHERE orderid='{$row['orderid']}'");
        if ($result) {
            while ($row1 = $result->fetch_assoc()) {
                $totalSales += ($row1['price'] * $row1["quan"]);
                $itemSold += $row1["quan"];
            }
        }
    }
}

// Fetch new customers
$cuslist = $conn->query("SELECT * FROM tblaccount WHERE fldposition = 'customer'");
$newCus = $cuslist ? $cuslist->num_rows : 0;

// Chart Data Initialization
$chartLabels = json_encode(range(1, 31)); // Default to daily
$chartData = json_encode(array_fill(0, 31, 0)); // Initialize with zeros
$chartType = 'line'; // Default chart type
$chartTitle = "Daily Sales Report";

// Handle POST request for chart updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reportType = $_POST['report'] ?? 'Daily';
    $chartType = $_POST['chartType'] ?? 'line';

    if ($reportType === 'Daily') {
        $chartLabels = json_encode(range(1, 31));
        $chartDataArray = array_fill(0, 31, 0);

        if ($wstatusOrder) {
            $wstatusOrder->data_seek(0); // Reset pointer for reuse
            while ($row = $wstatusOrder->fetch_assoc()) {
                $day = intval(substr($row['date'], -2));
                if ($day >= 1 && $day <= 31) {
                    $result = $conn->query("SELECT * FROM tblcart WHERE orderid='{$row['orderid']}'");
                    if ($result) {
                        while ($cart = $result->fetch_assoc()) {
                            $chartDataArray[$day - 1] += $cart['quan'];
                        }
                    }
                }
            }
        }
        $chartData = json_encode($chartDataArray);
        $chartTitle = "Daily Sales Report (This Month)";
    } elseif ($reportType === 'Monthly') {
        $chartLabels = json_encode([
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ]);
        $chartDataArray = array_fill(0, 12, 0);

        if ($wstatusOrder) {
            $wstatusOrder->data_seek(0); // Reset pointer for reuse
            while ($row = $wstatusOrder->fetch_assoc()) {
                $month = intval(date('n', strtotime($row['date']))) - 1;
                $result = $conn->query("SELECT * FROM tblcart WHERE orderid='{$row['orderid']}'");
                if ($result) {
                    while ($cart = $result->fetch_assoc()) {
                        $chartDataArray[$month] += $cart['quan'];
                    }
                }
            }
        }
        $chartData = json_encode($chartDataArray);
        $chartTitle = "Monthly Sales Report (This Year)";
    }
}
?>
<?PHP
$product_sold_item = [];
$compProd = $conn->query("SELECT * FROM tblcart WHERE prodstatus='done'");
while ($row = $compProd->fetch_assoc()) {
    if (!isset($product_sold_item[$row['prodname']])) {
        $product_sold_item[$row['prodname']] = 0;
    }
    $product_sold_item[$row['prodname']] += $row["quan"];
}
arsort($product_sold_item);
?>
<body class="bg-secondary bg-opacity-25">
<div class="container-fluid" style="font-size: clamp(75%,2vw,100%);">
    <h5>DASHBOARD</h5>
    <hr>
    <div class="row">
        <!-- Dashboard Cards -->
        <div class="col-md-3 mb-3">
            <div class="shadow bg-light p-2 border-bottom border-5 border-danger rounded">
                <div class="text-secondary p-2 bg-secondary bg-opacity-25 rounded fs-sm border-bottom">TOTAL ITEMS</div>
                <div class="fs-3 p-2 ps-3"><i class="bi bi-plus fs-4 me-2 text-success"></i><b><?php echo $totalItem; ?></b><small class="opacity-50 fs-6 ms-2"> items</small></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="shadow bg-light p-2 border-bottom border-5 border-success rounded">
                <div class="text-secondary p-2 bg-secondary bg-opacity-25 rounded fs-sm border-bottom">TOTAL SALES</div>
                <div class="fs-3 p-2 ps-3"><a class="bi fs-5 me-2 text-secondary text-decoration-none">₱</a><b><?php echo $totalSales; ?></b></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="shadow bg-light p-2 border-bottom border-5 border-warning rounded">
                <div class="text-secondary p-2 bg-secondary bg-opacity-25 rounded fs-sm border-bottom">ITEM SOLD</div>
                <div class="fs-3 p-2 ps-3"><i class="bi bi-chevron-double-up fs-5 me-2 text-success"></i><b><?php echo $itemSold; ?></b><small class="opacity-50 fs-6 ms-2"> items</small></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="shadow bg-light p-2 border-bottom border-5 border-primary rounded">
                <div class="text-secondary p-2 bg-secondary bg-opacity-25 rounded fs-sm border-bottom">NEW USERS</div>
                <div class="fs-3 p-2 ps-3"><i class="bi bi-person-plus fs-5 me-2 text-success"></i><b><?php echo $newCus; ?></b><small class="opacity-50 fs-6 ms-2"> customers</small></div>
            </div>
        </div>
    </div>

    <!-- Sales Report Chart -->
    <div class="">
        <div class="mb-2 p-2 row shadow bg-light m-1 rounded">
            <div class="col-md-6 px-3 m-2 rounded shadow bg-light">
                <h5 class="pt-3 text-secondary" style="letter-spacing: 4px;">SALES REPORT CHART</h5>
                <div class="container-fluid">
                    <form action="a_home.php?#Graph" method="post">
                        <div class="row align-items-center g-2">
                            <div class="col-sm-2">
                                <select name="report" class="form-select">
                                    <option value="Daily" <?php echo ($_POST['report'] ?? 'Daily') === 'Daily' ? 'selected' : ''; ?>>Daily</option>
                                    <option value="Monthly" <?php echo ($_POST['report'] ?? '') === 'Monthly' ? 'selected' : ''; ?>>Monthly</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select name="chartType" class="form-select">
                                    <option value="line" <?php echo $chartType === 'line' ? 'selected' : ''; ?>>Line</option>
                                    <option value="bar" <?php echo $chartType === 'bar' ? 'selected' : ''; ?>>Bar</option>
                                    <option value="pie" <?php echo $chartType === 'pie' ? 'selected' : ''; ?>>Pie</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-primary w-100" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="container-fluid" id="Graph">
                    <canvas id="chartCon" style="height: 300px; width: 100%;"></canvas>
                </div>
            </div>
            <div class="col px-3 m-2 rounded shadow bg-light">
                <h5 class="pt-3 text-secondary" style="letter-spacing: 4px;">ITEM SOLD PIE</h5>
                <hr>
                <div class="container-fluid" id="Graph">
                    <canvas id="pieChart" style="height: 300px; width: 100%;"></canvas> <!-- Changed the id here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pie Chart Gradient
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    const pieGradient = ctxPie.createLinearGradient(0, 0, 0, 400);
    pieGradient.addColorStop(0, 'rgba(255, 99, 132, 0.6)');
    pieGradient.addColorStop(1, 'rgba(255, 99, 132, 0.9)');
    new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode(array_keys($product_sold_item)); ?>,
            datasets: [{
                label: 'Item Sold',
                data: <?php echo json_encode(array_values($product_sold_item)); ?>,
                backgroundColor: [
                    pieGradient,
                    'rgba(54, 162, 235, 0.9)', 
                    'rgba(255, 205, 86, 0.9)', 
                    'rgba(75, 192, 192, 0.9)', 
                    'rgba(153, 102, 255, 0.9)', 
                    'rgba(255, 159, 64, 0.9)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });

    // Line/Bar Chart Gradient
    const ctx = document.getElementById('chartCon').getContext('2d');
    const gradientLine = ctx.createLinearGradient(0, 0, 0, 400);
    gradientLine.addColorStop(0, 'rgba(75, 192, 192, 0.6)');
    gradientLine.addColorStop(1, 'rgba(75, 192, 192, 0.9)');

    new Chart(ctx, {
        type: '<?php echo $chartType; ?>',
        data: {
            labels: <?php echo $chartLabels; ?>,
            datasets: [{
                label: '<?php echo $chartTitle; ?>',
                data: <?php echo $chartData; ?>,
                backgroundColor: gradientLine,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
