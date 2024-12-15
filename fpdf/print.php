<?PHP
session_start();
require('fpdf.php');
require('../conn.php');
ob_end_clean();
ob_start();
$pdf = new FPDF("P", "mm", "letter");
$pdf->AddPage();

$pdf->Image("../pics/logo.png", 10, 10, 30);

$pdf->SetFont('Arial', '',20);
$pdf->Cell(30,10,"",0,0,'L');//filler
$pdf->Cell(30,10,"CDO Foodsphere E-Cart",0,1,'L');
$pdf->SetFont('Arial', '',12);
$pdf->Cell(30,10,"",0,0,'L');//filler
$pdf->Cell(30,10,"Foods That Bring You Home",0,1,'L');
$pdf->Cell(30,10,"",0,1,'L');//filler
$date = date("Y-m-d");
if(isset($_GET["date"]) || isset($_GET["from"])){
    $total = 0;
    if(isset($_GET["date"])){
        $date = $_GET["date"];
        if(strlen($date) == 7) {  // Monthly format (Y-m)
            $start_date = $date . "-01";
            $end_date = date("Y-m-t", strtotime($start_date));
            $query = "SELECT * FROM tblorders WHERE date BETWEEN '$start_date' AND '$end_date'";
        } else {  // Daily format (Y-m-d)
            $query = "SELECT * FROM tblorders WHERE date='$date'";
        } 
        // Check if date matches YYYY-MM format
        if (preg_match('/^\d{4}-\d{2}$/', $date)) {
            $dateObj = new DateTime($date . '-01');
            $date = $dateObj->format('F Y');
        }
    }else{
        $from = $_GET['from'];
        $to = $_GET['to'];
        $date = "$from to $to";
        $query = "SELECT * FROM tblorders WHERE date BETWEEN '$from' AND '$to'";
    }

    $pdf->Cell(30,7,"Sales Report",0,1,'L');
    $pdf->Cell(30,7,"Date: $date",0,1,'L');
    $pdf->SetFont('Arial', 'B',10);
    $pdf->Cell(30,5,"",0,1,'L');//filler
    $pdf->Cell(75,10,"Product Name",1,0,'C');
    $pdf->Cell(40,10,"Floor Price",1,0,'C');
    $pdf->Cell(40,10,"Quantity",1,0,'C');
    $pdf->Cell(40,10,"Total Sales",1,1,'C');
    $pdf->SetFont('Arial', '',10);

    $prod = $conn->query($query);
    if($prod->num_rows == 0){
        $pdf->Cell(195,10,"Currently no report.",1,1,'C');
    } else {
        $prodList = array();
        while ($col = $prod->fetch_assoc()) {
            $result = $conn->query("SELECT * FROM tblcart WHERE orderid = '$col[orderid]'");
            while ($row = $result->fetch_assoc()) {
                $prodname = $row['prodname'];
                if (array_key_exists($prodname, $prodList)) {
                    $prodList[$prodname][1] += $row['quan'];
                } else {
                    $prodList[$prodname] = array($row['price'], $row['quan']);
                }
            }
        }
        foreach($prodList as $key => $value){
            $totalPrice = $value[0] * $value[1];
            $pdf->Cell(75,10,"$key",1,0,'C');
            $pdf->Cell(40,10,"P $value[0]",1,0,'C');
            $pdf->Cell(40,10,"$value[1]",1,0,'C');
            $pdf->Cell(40,10,"P $totalPrice",1,1,'C');
            $total +=$totalPrice;
        }
    }

    $pdf->Cell(30,5,"",0,1,'L');//filler
    $pdf->Cell(195,10,"Total: P $total",0,1,'R');
}elseif(isset($_GET["Product"])){
    $pdf->Cell(30,7,"Product Report",0,1,'L');
    $pdf->Cell(30,7,"Date: $date",0,1,'L');
    $pdf->SetFont('Arial', 'B',12);
    $pdf->Cell(30,5,"",0,1,'L');//filler
    $pdf->Cell(40,10,"Image",1,0,'C');
    $pdf->Cell(75,10,"Product Name",1,0,'C');
    $pdf->Cell(40,10,"Floor Price",1,0,'C');
    $pdf->Cell(40,10,"Stock",1,1,'C');
    $pdf->SetFont('Arial', '',12);
    $prodlist = $conn->query("SELECT * FROM tblproduct");
    if ($prodlist->num_rows == 0) {
        $pdf->Cell(195,10,"Currently no report.",1,1,'C');
    } else {
        while ($row = $prodlist->fetch_assoc()) {

            $cellWidth = 40;  // Width of the cell
            $cellHeight = 30; // Height of the cell
            $pdf->Cell($cellWidth, $cellHeight, '', 1, 0); // Draw the cell border
            
            // Add an image inside the cell
            $imageX = $pdf->GetX() - $cellWidth; // X position of the image
            $imageY = $pdf->GetY();             // Y position of the image
            $pdf->Image("../pics/$row[prodimage]", $imageX+5, $imageY+2, $cellWidth-10, $cellHeight-4);
            $pdf->Cell(75,$cellHeight,"$row[prodname]",1,0,'C');
            $pdf->Cell(40,$cellHeight,"P $row[prodprice]",1,0,'C');
            $pdf->Cell(40,$cellHeight,"$row[prodquantity]",1,1,'C');
        }
    }
}elseif(isset($_GET["Delivery"])){
    $pdf->Cell(30,7,"Product Report",0,1,'L');
    $pdf->Cell(30,7,"Date: $date",0,1,'L');
    $pdf->SetFont('Arial', 'B',12);
    $pdf->Cell(30,5,"",0,1,'L');//filler
    $pdf->Cell(40,10,"Date",1,0,'C');
    $pdf->Cell(75,10,"Product Name",1,0,'C');
    $pdf->Cell(40,10,"Quantity",1,0,'C');
    $pdf->Cell(40,10,"Description",1,1,'C');
    $pdf->SetFont('Arial', '',12);
    $prodInvDel  = $conn->query("SELECT * FROM tblinventory where fldstatus='delivery'");
    if ($prodInvDel->num_rows == 0) {
        $pdf->Cell(195,10,"Currently no report.",1,1,'C');
    } else {
        while ($row = $prodInvDel->fetch_assoc()) {
            $pdf->Cell(40,10,"$row[flddate]",1,0,'C');
            $pdf->Cell(75,10,"$row[fldname]",1,0,'C');
            $pdf->Cell(40,10,"$row[fldquan]",1,0,'C');
            $pdf->Cell(40,10,"$row[flddesc]",1,1,'C');
        }
    }
}elseif(isset($_GET["Wastages"])){
    $pdf->Cell(30,7,"Product Report",0,1,'L');
    $pdf->SetFont('Arial', 'B',12);
    $pdf->Cell(30,5,"",0,1,'L');//filler
    $pdf->Cell(40,10,"Date",1,0,'C');
    $pdf->Cell(75,10,"Product Name",1,0,'C');
    $pdf->Cell(40,10,"Quantity",1,0,'C');
    $pdf->Cell(40,10,"Description",1,1,'C');
    $pdf->SetFont('Arial', '',12);
    $prodInvWaste  = $conn->query("SELECT * FROM tblinventory where fldstatus='wastages'");
    if ($prodInvWaste->num_rows == 0) {
        $pdf->Cell(195,10,"Currently no report.",1,1,'C');
    } else {
        while ($row = $prodInvWaste->fetch_assoc()) {
            $pdf->Cell(40,10,"$row[flddate]",1,0,'C');
            $pdf->Cell(75,10,"$row[fldname]",1,0,'C');
            $pdf->Cell(40,10,"$row[fldquan]",1,0,'C');
            $pdf->Cell(40,10,"$row[flddesc]",1,1,'C');
        }
    }
}
$pdf->Output();
ob_end_flush();
?>