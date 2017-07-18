<?php
require('includes/fpdf/fpdf.php');

class PDF extends FPDF{
	
	function PDF($orientation='L', $unit='mm', $size='A4'){
	    $this->FPDF($orientation,$unit,$size);
	}
	
	function Header(){
	    $this->SetFont('Times','B',14);
	    $this->Cell(130);
	    $this->Cell(30,10,'LAPORAN SISTEM PENDUKUNG KEPUTUSAN PENENTUAN JENIS TANAMAN',0,0,'C');
            $this->Ln();
            $this->Cell(130);
	    $this->Cell(30,10,'MENGGUNAKAN METODE SIMPLE ADDITIVE WEIGHTING (SAW)',0,0,'C');
	    $this->Ln(20);
	}
	
	function Footer(){
	    $this->SetY(-15);
	    $this->SetFont('Times','',8);
	    $this->Cell(0,10,$this->PageNo(),0,0,'R');
	}
	
}

include "includes/config.php";
session_start();
if(!isset($_SESSION['nama_lengkap'])){
	echo "<script>location.href='index.php'</script>";
}
$config = new Config();
$db = $config->getConnection();

include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt1x = $pro1->readAll();
$stmt1y = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
$stmt2x = $pro2->readAll();
$stmt2y = $pro2->readAll();
$stmt2yx = $pro2->readAll();
include_once 'includes/rangking.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus();
$stmtx = $pro->readKhusus();
$stmty = $pro->readKhusus();

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',14);
$pdf->Cell(40,10,'Nilai Alternatif Kriteria',0,0,'L');
$pdf->ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,'Kriteria/Alternatif',1,0,'L');

while ($row2x = $stmt2x->fetch(PDO::FETCH_ASSOC)){
	$pdf->Cell(39,7,$row2x['nama_kriteria'],1,0,'C');
}

$pdf->ln();
$pdf->SetFont('Times','',12);

while ($row1x = $stmt1x->fetch(PDO::FETCH_ASSOC)){
	$pdf->Cell(40,7,$row1x['nama_alternatif'],1,0,'L');
	$stmtrx = $pro->readR($row1x['id_alternatif']);
	while ($rowrx = $stmtrx->fetch(PDO::FETCH_ASSOC)){
		$pdf->Cell(39,7,$rowrx['nilai_rangking'],1,0,'C');
	}
	$pdf->ln();
}
$pdf->ln(10);

$pdf->SetFont('Times','B',14);
$pdf->Cell(40,10,'Normalisasi R',0,0,'L');
$pdf->ln();

$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,'Kriteria/Alternatif',1,0,'L');
while ($row2y = $stmt2y->fetch(PDO::FETCH_ASSOC)){
	$pdf->Cell(39,7,$row2y['nama_kriteria'],1,0,'C');
}

$pdf->ln();
$pdf->SetFont('Times','',12);

while ($row1y = $stmt1y->fetch(PDO::FETCH_ASSOC)){
	$pdf->Cell(40,7,$row1y['nama_alternatif'],1,0,'L');
	$stmtry = $pro->readR($row1y['id_alternatif']);
	while ($rowry = $stmtry->fetch(PDO::FETCH_ASSOC)){
		$pdf->Cell(39,7,number_format($rowry['nilai_normalisasi'], 3, '.', ','),1,0,'C');
	}
	$pdf->ln();
}
$pdf->SetFont('Times','B',12);
$pdf->Cell(40,7,'Bobot',1,0,'L');
while ($row2yx = $stmt2yx->fetch(PDO::FETCH_ASSOC)){
        $pdf->SetFont('Times','B',12);
	$pdf->Cell(39,7,$row2yx['bobot_kriteria'],1,0,'C');
}
$pdf->ln(50);

$pdf->SetFont('Times','B',14);
$pdf->Cell(40,10,'Hasil Akhir',0,0,'L');
$pdf->ln();

$pdf->SetFont('Times','B',12);
$pdf->Cell(25,7,'K/A',1,0,'L');
while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
	$pdf->Cell(34.8,7,$row2['nama_kriteria'],1,0,'C');
}
$pdf->Cell(40,7,'Hasil',1,0,'C');
$pdf->ln();
$pdf->SetFont('Times','',12);

while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
	$pdf->Cell(25,7,$row1['nama_alternatif'],1,0,'L');
	$stmtr = $pro->readR($row1['id_alternatif']);
	while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
		$pdf->Cell(34.8,7,number_format($rowr['bobot_normalisasi'], 3, '.', ','),1,0,'C');
	}
	$pdf->Cell(40,7,$row1['hasil_alternatif'],1,0,'C');
	$pdf->ln();
}

$pdf->Output();
?>