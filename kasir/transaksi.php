<?php
include "sessionkasir.php";
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
                                <a href="transaksi.php" class="active"><i class="fa fa-table fa-fw"></i> Transaksi</a>
                            </li>
                            <li>
                                <a href="input_data_pelanggan.php"><i class="fa fa-edit fa-fw"></i> Input Data Pelanggan</a>
                            </li>
                            <li>
                                <a href="data_pelanggan.php"><i class="fa fa-archive fa-fw"></i> Data Pelanggan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Transaksi <a href="tambah_transaksi.php"><button type="submit" class="btn btn-success btn-lg" style="float: right;">Tambah Transaksi</button></a></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Data Transaksi 
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                	<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Plat Nomor</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Kendaraan</th>
                                                <th>Bayar</th>
                                                <th>Biaya</th>
                                                <th>Kembali</th>
                                                <th>Karyawan</th>
                                                <th>Cetak</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                          include ('../koneksi/koneksi.php');

                                          $query = mysql_query ("SELECT * FROM transaksi order by tgl desc");
                                          $no=1;
                                          while ($var=mysql_fetch_array($query)) {
                                          	$kembali= $var['bayar'] - $var['harga'];
                                          	$kendaraan=mysql_fetch_array(mysql_query("SELECT jenis_kend FROM biaya WHERE id_kend='$var[id_kend]'"));
                                          	$pegawai=mysql_fetch_array(mysql_query("SELECT nama FROM pegawai WHERE kd_pegawai='$var[kd_pegawai]'"));
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $var ['tgl']; ?></td>
                                                <td><?php echo $var ['plat']; ?></td>
                                                <td><?php echo $var ['nama']; ?></td>
                                                <td><?php echo $kendaraan ['jenis_kend']; ?></td>
                                                <td><?php echo $var ['bayar']; ?></td>
                                                <td><?php echo $var ['harga']; ?></td>
                                                <td><b><?php echo $kembali; ?></b></td>
                                                <td><?php echo $pegawai ['nama']; ?></td>
                                                <td><a href="../admin/cetak/nota.php?&no=<?php echo $var['no']; ?>" target="blank" type="button" class="btn btn-info btn-md" title="Cetak"><i class="fa fa-print"></i></a></td>
                                                <td align="center"><?php echo "<a class='glyphicon glyphicon-trash' title='Hapus' href='deletetransaksi.php?no=$var[no]'></a>"; ?></td>
                                            </tr>
                                        <?php
                                          $no++;
                                          }
                                        ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
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
