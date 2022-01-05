<?php
include "sessionadmin.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Aplikasi Cuci Kendaraan</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php
            include ('../koneksi/koneksi.php');
            $query = mysql_query ("SELECT * FROM nama_usaha");
            while ($var=mysql_fetch_array($query)) {
            ?>
                <div class="navbar-header">
                    <a class="navbar-brand" href="transaksi.php"><?php echo $var ['nama']; ?></a>
                </div>
            <?php
            }
            ?>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['username'] ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="transaksi.php" class="active"><i class="fa fa-table fa-fw"></i> Transaksi</a>
                            </li>
                            <li>
                                <a href="laporan.php"><i class="fa fa-book fa-fw"></i> Laporan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-edit fa-fw"></i> Input Data Master<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="input_data_pelanggan.php">Input Data Pelanggan</a>
                                    </li>
                                    <li>
                                        <a href="input_data_biaya.php">Input Data Biaya</a>
                                    </li>
                                    <li>
                                        <a href="input_data_kasir.php">Input Data Kasir</a>
                                    </li>
                                    <li>
                                        <a href="input_data_pegawai.php">Input Data Pegawai</a>
                                    </li>
                                    <li>
                                        <a href="input_data_admin.php">Input Data Admin</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-archive fa-fw"></i> Data Master<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="data_pelanggan.php">Data Pelanggan</a>
                                    </li>
                                    <li>
                                        <a href="data_biaya.php">Data Biaya</a>
                                    </li>
                                    <li>
                                        <a href="data_kasir.php">Data Kasir</a>
                                    </li>
                                    <li>
                                        <a href="data_pegawai.php">Data Pegawai</a>
                                    </li>
                                    <li>
                                        <a href="data_admin.php">Data Admin</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="nama_usaha.php"><i class="fa fa-home fa-fw"></i> Nama Usaha</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Transaksi</h1>
                        <form action="cari_pelanggan.php" method="get">
                        <div class="input-group custom-search-form">
                        <input type="text" name="cari" class="form-control" placeholder="Cari Plat....">
                        <span class="input-group-btn"><button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button></span>
                        </div><br>
                        </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tambah Transaksi Baru
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="text" class="form-control" name="tgl" value="<?php date_default_timezone_set("Asia/Jakarta");echo date("Y-m-d");?>" readonly>
                                            </div>                                            
                                            <div class="form-group">
                                            <label>Plat Nomor</label>
                                                <input type="text" class="form-control" name="plat" placeholder="Plat Nomor">
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama" placeholder="Nama">
                                            </div>
                                            <div class="form-group">
                                                <label>Handphone</label>
                                                <input type="text" class="form-control" name="no_hp" placeholder="Handphone">
                                            </div>
                                                <label>Kendaraan</label>
                                                <select name="id_kend" id="id_kend" class="selectpicker form-control" data-live-search="true" onchange="changeValue(this.value)">
                                                <option value="" selected>-- Kendaraan --</option>
                                                    <?php 
                                                    include "../koneksi/koneksi.php";
                                                     
                                                    $result = mysql_query("select * from biaya");    
                                                    $jsArray = "var dtMhs = new Array();\n";        
                                                    while ($row = mysql_fetch_array($result)) {    
                                                    echo '<option value="' . $row['id_kend'] . '">' . $row['jenis_kend'] . '</option>';    
                                                    $jsArray .= "dtMhs['" . $row['id_kend'] . "'] = {jenis_kend:'" . addslashes($row['harga']) . "'};\n";    
                                                    }      
                                                    ?>    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="text" name="harga" id="harga" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Bayar</label>
                                                <input type="text" class="form-control" name="bayar" placeholder="Bayar">
                                            </div>
                                            <div class="form-group">
                                                <label>Pegawai</label>
                                                <select name="kd_pegawai" class="form-control">
                                                <option value="" selected>-- Nama Pegawai --</option>
                                                <?php 
                                                    include "../koneksi/koneksi.php";
                                                    
                                                    $query=mysql_query("select * from pegawai order by nama asc");
                                                    
                                                    while($row=mysql_fetch_array($query)){
                                                    ?>
                                                    <option value="<?php  echo $row['kd_pegawai']; ?>"><?php  echo $row['nama']; ?></option>
                                                    <?php 
                                                    }
                                                    ?>                    
                                                </select>
                                            </div>
                                            <button type="submit" name="save" class="btn btn-success">Save</button>
                                            <button type="reset" class="btn btn-warning">Reset</button>
                                        </form>
                                        <?php
                                        include '../koneksi/koneksi.php';

                                        if (isset($_POST['save']))
                                        {

                                        $query = mysql_query("INSERT INTO transaksi (tgl, plat, nama, no_hp, id_kend, harga, bayar, kd_pegawai) VALUES ('$_POST[tgl]', '$_POST[plat]', '$_POST[nama]', '$_POST[no_hp]', '$_POST[id_kend]', '$_POST[harga]', '$_POST[bayar]', '$_POST[kd_pegawai]')");
                                        $query2 = mysql_query("INSERT INTO laporan (tgl, kd_pegawai, id_kend) VALUES ('$_POST[tgl]', '$_POST[kd_pegawai]', '$_POST[id_kend]')");

                                        if ($query){
                                        echo "<script>alert('Berhasil Menginput')</script>";
                                        echo "<meta http-equiv='refresh' content='1 url=transaksi.php'>";
                                        }else{
                                        echo "<script>alert('Gagal Menginput')</script>";
                                        echo "<meta http-equiv='refresh' content='1 url=tambah_transaksi.php'>";
                                        }
                                        }
                                        ?>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>


        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>
        <script type="text/javascript">    
        <?php echo $jsArray; ?>  
        function changeValue(id_kend){  
        document.getElementById('harga').value = dtMhs[id_kend].jenis_kend;  
        };  
        </script>

    </body>
</html>
