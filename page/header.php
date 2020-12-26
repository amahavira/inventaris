<?php
@session_start();
include "../config/_koneksi.php";
include "../config/tanggal.php";

if (@$_SESSION['admin'] || @$_SESSION['user']) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Inventaris</title>
        <link href="../dist/assets/logo/uii1.png" rel="shortcut icon">
        <link href="../dist/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../dist/css/bootstrap-datetimepicker.css">
        <link href="../dist/css/datepicker.css" rel="stylesheet">
        <link href="../dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function printContent(el) {
                var restorepage = document.body.innerHTML;
                var printcontent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
            }
        </script>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #06337b;">
            <a class="navbar-brand" href="index.php">
                <img src="../dist/assets/logo/uii.png" style="width: 150px; height: auto;">
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                        <?php
                        if (@$_SESSION['admin']) {
                            $user_terlogin = @$_SESSION['admin'];
                        } else if (@$_SESSION['user']) {
                            $user_terlogin = @$_SESSION['user'];
                        }
                        $sql_user = mysqli_query($conn, "SELECT * FROM tb_user where id_user = '$user_terlogin'") or die(mysqli_error($conn));
                        $data_user = mysqli_fetch_array($sql_user);
                        echo $data_user['nm_user'];
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="../config/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Halaman Utama
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Master Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php
                                    if (@$_SESSION['admin']) {
                                    ?>
                                        <li>
                                            <a class="nav-link" href="tampil_data_user.php"> Data user</a>
                                        </li>
                                    <?php
                                    } else if (@$_SESSION['user']) {
                                    }
                                    ?>
                                    <a class="nav-link" href="tampil_data_barang.php"> Data barang</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="tampil_data_pemasukkan.php">Pemasukan</a>
                                    <a class="nav-link" href="tampil_data_pengeluaran.php">Pengeluaran</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Laporan</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayout" aria-expanded="false" aria-controls="collapseLayout">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Laporan Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayout" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="tampil_laporan_harian.php">Harian</a>
                                    <a class="nav-link" href="tampil_laporan_bulanan.php">Bulanan</a>
                                    <a class="nav-link" href="tampil_laporan_tahunan.php">Tahunan</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

        <?php
    } else {
        header("location: ../login.php");
    }
        ?>