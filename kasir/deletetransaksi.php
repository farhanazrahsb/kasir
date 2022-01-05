<?php
include ('../koneksi/koneksi.php');

$no =$_GET['no'];
$query = "DELETE from transaksi where no='$no'";
mysql_query($query);
header("location: transaksi.php");
?>