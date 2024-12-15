<?php
require('fpdf.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Create Preview-Only PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'This is a preview of the PDF.');
    $pdf->Ln(10); // Line break
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, 'Preview content is limited to this page only. Full PDF available upon download.');
    
    // Output Preview PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="preview.pdf"');
    $pdf->Output();
    exit;
}
?>
