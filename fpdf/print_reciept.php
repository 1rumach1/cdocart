<?php
require('fpdf.php');
require('../conn.php');

$width =139.7;  // 5.5 inches in mm
$height = 190; // 8.5 inches in mm
$totalItem = 0;

$res = $conn->query("SELECT * FROM tblcart WHERE orderid = '$_GET[reciept_id]'");
while($row = $res->fetch_assoc()){
    $height += 7;
    $totalItem += 1;
}

// Convert inches to millimeters

$pdf = new FPDF("P", "mm", array($width, $height)); // Set custom page size
$pdf->SetMargins(5, 5, 5);
$pdf->AddPage();

$pdf->SetFont('Courier', 'B', 12);
$pdf->Image("../pics/logo.png", 8, 12, 20);

$result = $conn->query("SELECT * FROM tblorders WHERE orderid='$_GET[reciept_id]'");
while($row = $result->fetch_assoc()){
    $id = $row["orderid"];
    $orderedDate = $row["date"];
    $deliveryDate = date("Y-m-d");
    $pdf->Cell(40, 30, 'E-Cart', 1, 0, "R");
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(90, 7.5, "Order Id: $id\nOrder Date: $orderedDate\nDelivery Date: $deliveryDate\n ", 1, "L");
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(130, 10, "BUYER'S INFORMATION", 1, 1, "C");
    $pdf->SetFont('Arial', '', 12);
    $cusInfo = "$row[cusname]\n$row[address]\n\nTotal amount: P$row[total]\nTotal item/s: $totalItem";
    $pdf->MultiCell(130, 7, "$cusInfo", 1, "L");
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(130, 10, "SELLER'S INFORMATION", 1, 1, "C");
    $pdf->SetFont('Arial', '', 12);
    $selInfo = "CDO Foodshere Ecart\n1, Barangay Uno, Lipa City, Batangas\n\ncdofoodsphereecart@gmail.com\n+64 9616669901";
    $pdf->MultiCell(130, 7, "$selInfo", 1, "L");
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(130, 10, "ORDER INFORMATION", 1, 1, "C");
    $pdf->Cell(90, 10, "Product Name", 0,0, "L");
    $pdf->Cell(20, 10, "Quantity", 0,0, "C");
    $pdf->Cell(20, 10, "Price", 0,1, "R");
    $pdf->SetFont('Arial', '', 12);
    $res = $conn->query("SELECT * FROM tblcart WHERE orderid = '$_GET[reciept_id]'");
    $total = 0;
    $quan = 0;
    while($row2 = $res->fetch_assoc()){
        $total += $row2["price"] * $row2["quan"];
        $quan +=  $row2["quan"];
        $pdf->Cell(90, 7, "$row2[prodname]", 0,0, "L");
        $pdf->Cell(20, 7, "$row2[quan]", 0,0, "C");
        $pdf->Cell(20, 7, "P $row2[price]", 0,1, "R");
    }
    $method = $row['method'] == 'COD'? "Cash on delivery" : "Online Payment";
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(130, 10, "TOTAL", 1, 1, "C");
    $pdf->Cell(90, 7, "$method Amount", 1,0, "C");
    $pdf->Cell(20, 7, "$quan", 1,0, "C");
    $pdf->Cell(20, 7, "P $total", 1,1, "R");
}

$pdf->Output();
?>
