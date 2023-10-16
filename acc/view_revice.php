<?php
require_once('connect.php');

if (isset($_REQUEST['update_id'])) {
    try {
        $id = $_REQUEST['update_id'];
        $select_stmt = $db->prepare('SELECT * FROM revice_acc WHERE id = :id');
        $select_stmt->bindParam(":id", $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<?php

require_once('fpdf/fpdf.php');
require_once('fpdi2/src/autoload.php');

// initiate FPDI
$pdf = new \setasign\Fpdi\Fpdi();
// add a page
$pdf->AddPage();
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddFont('THSarabunNew', 'B', 'THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew', 'B', 16);
// set the source file
$pdf->setSourceFile('PdfDocument.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 10, 10, 100);

$pdf->SetTextColor(255, 0, 0);
$pdf->SetXY(30, 30);

// แสดงหัวข้อ
$pdf->Cell(0, 20, iconv('UTF-8', 'TIS-620', $title), 0, 1, "C");

// แสดงรายละเอียด
$pdf->MultiCell(0, 20, iconv('UTF-8', 'TIS-620', $detail), 0, "C");

// แสดงรูปภาพ
$pdf->Image('revice/' . $img, 160, 260, 50, 0);

$pdf->Output('I', 'generated.pdf');

?>