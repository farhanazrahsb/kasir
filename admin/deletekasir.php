<?php
include ('../koneksi/koneksi.php');

$no =$_GET['no'];
$query = "DELETE from kasir where no='$no'";
mysql_query($query);
header("location: data_kasir.php");
?>