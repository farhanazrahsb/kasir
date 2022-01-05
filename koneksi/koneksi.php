<?php
	$host='localhost';
	$user='root';
	$password='';
	$db='cuci';
	$koneksi=mysql_connect($host,$user,$password);
	$database=mysql_select_db($db, $koneksi);

?>
