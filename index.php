<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        Aplikasi Cuci Kendaraan
    </title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>

<?php
require('koneksi/koneksi.php');
session_start();
if (isset($_POST['username'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysql_real_escape_string($username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysql_real_escape_string($password);
 
    $query = "SELECT * FROM kasir WHERE username='$username' and password='$password'";
    $result = mysql_query($query) or die(mysql_error());
    $rows = mysql_num_rows($result);
    if($rows==1){
  $_SESSION['username'] = $username;
echo "<script>alert('Selamat Datang $username')</script>";
echo "<script>window.location = 'kasir/transaksi.php';</script>";
}
else {
echo "<script>alert('Login Gagal, Silahkan Coba Lagi')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}
}
?>
<form action="" method="post">
  <h1>Log in</h1>
  <div class="inset">
  <p>
    <label for="email">USERNAME</label>
    <input type="text" name="username" id="email" autofocus="autofocus">
  </p>
  <p>
    <label for="password">PASSWORD</label>
    <input type="password" name="password" id="password">
  </p>
  </div>
  <p class="p-container">
    <input type="submit" name="go" id="go" value="Log in">
  </p>
</form>

</body>
</html>
