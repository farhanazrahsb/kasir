<?php

require('fpdf181/fpdf.php');

require "../../koneksi/koneksi.php";

$pdf= new FPDF('p','mm','a4');
$pdf->AddPage();

$pdf->Image('images/back1.png',65,50,80);


//header
$no = $_GET['no'];
$query = mysql_query ("SELECT * FROM transaksi WHERE no='$no'");
while ($var=mysql_fetch_array($query)) {
	$kembali= $var['bayar'] - $var['harga'];
    $kendaraan=mysql_fetch_array(mysql_query("SELECT jenis_kend FROM biaya WHERE id_kend='$var[id_kend]'"));
    $pegawai=mysql_fetch_array(mysql_query("SELECT nama FROM pegawai WHERE kd_pegawai='$var[kd_pegawai]'"));

$pdf->Image('images/back.png',10,10,20);
$pdf->Image('images/garis.png',3,7,205);
$pdf->SetFont('Arial','B','14');
$pdf->Cell(20,5,'',0,0);
$pdf->Cell(110,5,'Cuci Kendaraan',0,1);
$pdf->SetFont('Arial','','11');
$pdf->Cell(20,5,'',0,0);
$pdf->Cell(110,5,'Jl. Jend. Sudirman, No.19 B',0,0);
$pdf->Cell(59,5,'',0,1);
$pdf->Cell(20,5,'',0,0);
$pdf->Cell(90,5,'Jakarta Pusat, 12332',0,0);
$pdf->Cell(20,5,'',0,0);
$pdf->Cell(34,5,'',0,1);


$pdf->Cell(20,5,'',0,0);
$pdf->Cell(110,5,'Telepon : (0281) 628123',0,0);
$pdf->Cell(25,5,'',0,0);
$pdf->Cell(34,5,'No. Nota :',0,0);
$pdf->Cell(-2,5,$var['no'],0,0,'R');
$pdf->Cell(189,10,'',0,1);

$pdf->SetFont('Arial','U','18');
$pdf->Cell(20,20,'',0,0);
$pdf->Cell(100,20,'INVOICE NOTA PEMBAYARAN CUCI KENDARAAN',0,1);


$pdf->SetFont('Arial','','10');
$pdf->Cell(60,10,'Tanggal',0,0,'L');
$pdf->Cell(5,10,':',0,0,'L');
$pdf->Cell(100,10,$var['tgl'],0,1,'L');
$pdf->Cell(60,10,'Plat',0,0,'L');
$pdf->Cell(5,10,':',0,0,'L');
$pdf->Cell(100,10,$var['plat'],0,1,'L');
$pdf->Cell(60,10,'Nama',0,0,'L');
$pdf->Cell(5,10,':',0,0,'L');
$pdf->Cell(100,10,$var['nama'],0,1);
$pdf->Cell(60,10,'Handphone',0,0,'L');
$pdf->Cell(5,10,':',0,0,'L');
$pdf->Cell(100,10,$var['no_hp'],0,1);
$pdf->Cell(60,10,'Jenis Kendaraan',0,0,'L');
$pdf->Cell(5,10,':',0,0,'L');
$pdf->Cell(100,10,$kendaraan['jenis_kend'],0,1);
$pdf->Cell(60,10,'Nama Pegawai',0,0,'L');
$pdf->Cell(5,10,':',0,0,'L');
$pdf->Cell(100,10,$pegawai['nama'],0,1);
$pdf->Cell(60,5,'Bayar',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(100,5,$var['bayar'],0,1,'L');
$pdf->Cell(60,5,'Harga',0,0,'L');
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(100,5,$var['harga'],0,1,'L');
$pdf->Cell(60,-4,'__________________________________________ -',0,1,'L');
$pdf->Cell(60,15,'Kembali',0,0,'L');
$pdf->Cell(5,15,':',0,0,'L');
$pdf->Cell(100,15,$kembali,0,1,'L');
}
$pdf->Output();

?>