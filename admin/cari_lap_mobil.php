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

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

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
                                <a href="transaksi.php"><i class="fa fa-table fa-fw"></i> Transaksi</a>
                            </li>
                            <li>
                                <a href="laporan.php" class="active"><i class="fa fa-book fa-fw"></i> Laporan</a>
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
                        <h1 class="page-header">Laporan Mobil</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="btn btn-info" onclick="self.history.back()"> <span class="fa fa-arrow-left" title="Kembali"></span></a> Laporan Mobil
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama</th>
                                                <th>Kendaraan</th>
                                                <th>Upah/(Kendaraan)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        //proses jika sudah klik tombol pencarian data
                                        if(isset($_POST['cari'])){
                                        //menangkap nilai form
                                        $awal=$_POST['awal'];
                                        $akhir=$_POST['akhir'];
                                        $kd_pegawai=$_POST['kd_pegawai'];
                                        $id_kend=$_POST['id_kend'];
                                        if(empty($awal) || empty($akhir) || empty($kd_pegawai) || empty($id_kend)){
                                        //jika data tanggal kosong
                                        ?>

                                        <script language="JavaScript">
                                            alert('Tanggal Awal, Tanggal Akhir, Nama Pegawai dan Jenis Kendaraan Harap di Isi!');
                                            document.location='laporan_mobil.php';
                                        </script>

                                        <?php 
                                        }else{
                                        ?>

                                        <i><b>Informasi : </b> Hasil pencarian data berdasarkan periode tanggal <b><?php echo $_POST['awal']?></b> sampai tanggal <b><?php echo $_POST['akhir']?></b></i>
                                        
                                        <?php
                                        $query=mysql_query("select * from laporan where kd_pegawai like '%$kd_pegawai%' and id_kend like '%$id_kend%' and tgl between '$awal' and '$akhir'");
                                        }
                                        ?>
                                        <?php
                                        //menampilkan pencarian data
                                        $no=1;
                                        while($row=mysql_fetch_array($query)){
                                        $upah='10000';

                                        $namapegawai=mysql_fetch_array(mysql_query("SELECT nama FROM pegawai WHERE kd_pegawai='$row[kd_pegawai]'"));
                                        $kendaraan=mysql_fetch_array(mysql_query("SELECT jenis_kend FROM biaya WHERE id_kend='$row[id_kend]'"));
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row ['tgl']; ?></td>
                                                <td><?php echo $namapegawai ['nama']; ?></td>
                                                <td><?php echo $kendaraan ['jenis_kend']; ?></td>
                                                <td><?php echo $upah; ?></td>
                                            </tr>
                                            
                                        <?php
                                        $no++;
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" rowspan="2"></th>
                                                <th>Total Upah</th>
                                            </tr>
                                            <tr>
                                                <td><?php
                                                $jumlahkan = "SELECT SUM(10000) AS jumlah_total FROM laporan where kd_pegawai like '%$kd_pegawai%' and id_kend like '%$id_kend%' and tgl between '$awal' and '$akhir'"; //perintah untuk menjumlahkan

                                                $hasil =@mysql_query($jumlahkan) or die (mysql_error());//melakukan query dengan varibel $jumlahkan
                                                
                                                $t = mysql_fetch_array($hasil); //menyimpan hasil query ke variabel $t
                                                echo "<b>" . number_format($t['jumlah_total']) . " </b>";//menampilkaan hasil penjumlahan
                                                ?></td>
                                            </tr>
                                        </tfoot>
                                        <?php
                                        }else{
                                        unset($_POST['cari']);
                                        }
                                        ?>  
                                    </table>
                                    
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

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>
