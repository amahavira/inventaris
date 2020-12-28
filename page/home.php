<?php
include_once('../config/_koneksi.php');
include_once('header.php');
?>
<div class="container-fluid">
  <h4 class="mt-4">Halaman Utama Aplikasi Gudang</h4>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Selamat datang di halaman utama aplikasi gudang.</li>
  </ol>
  <div class="row">
    <?php
    if (@$_SESSION['admin']) {
    ?>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-users"></i>
            </div>
            <div class="mr-5">
              <?php
              $sql = "SELECT * FROM tb_user";
              $query = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($query);
              echo $count . " User";
              ?>
            </div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="tampil_data_user.php">
            <span class="float-left">Tampilkan detail</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    <?php
    } else if (@$_SESSION['user']) {
    }
    ?>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-cubes"></i>
          </div>
          <div class="mr-5">
            <?php
            $sql = "SELECT * FROM tb_barang";
            $query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);
            echo $count . " Jenis barang";
            ?>
          </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="tampil_data_barang.php">
          <span class="float-left">Tampilkan detail</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-cubes"></i>
          </div>
          <div class="mr-5">
            <?php
            $tgl = date('d m Y');
            $sql = "SELECT * FROM tb_transaksi where keterangan = 'masuk' and tgl_transaksi = '$tgl'";
            $query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);
            echo $count . " Pemasukkan hari ini";
            ?>
          </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="tampil_data_pemasukkan.php">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-cubes"></i>
          </div>
          <div class="mr-5">
            <?php
            $tgl = date('d m Y');
            $sql = "SELECT * FROM tb_transaksi where keterangan = 'keluar' and tgl_transaksi = '$tgl'";
            $query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);
            echo $count . " Pengeluaran hari ini";
            ?>
          </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="tampil_data_pengeluaran.php">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
</div>