<?php
include ('../koneksi/koneksi.php');

$no =$_GET['no'];
$query = "DELETE from laporan where no='$no'";
mysql_query($query);
header("location: detail_laporan.php");
?>