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
                        <h1 class="page-header">Menu Laporan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Menu Laporan
                            </div>
                            <div class="panel-body">
                            <a href="detail_laporan.php"><button class="btn btn-info col-lg-12">Detail Laporan</button></a><br><br>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-book fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div><h4>Laporan Mobil</h4></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="laporan_mobil.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="panel panel-red">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-book fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div><h4>Laporan Sepeda Motor</h4></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="laporan_motor.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="panel panel-yellow">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-book fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div><h4>Laporan Pendapatan</h4></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="laporan_pendapatan.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

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

    </body>
</html>
