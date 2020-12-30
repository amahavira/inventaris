<?php
include('../config/_koneksi.php');
include('header.php');
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h4 class="mt-4">Laporan Harian</h4>
        </div>
        <div class="col-12">
          <hr>
          <div class="col-4">
            <form action="" method="post">
              <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="text" readonly value="<?php echo date('d m Y'); ?>" name="tanggal" class="tanggal" />
              </div>
              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="btn" value="tampilkan">
              </div>
            </form>
          </div>
          <hr>
          <div class="card-header">
            <i class="fa fa-table"></i> Laporan Harian
          </div>
          <div class="card-body" id="div1">
            <div class="table-responsive">
              <?php
              $tgl = @$_POST['tanggal'];
              $tgls = date('d m Y');
              ?>
              <h4 align="center">Laporan Harian</h4></br>
              <h5 align="center">Tanggal <?php echo $tgl; ?></h5>
              <hr>
              <table width="100%" border="1" style="border-collapse: 1;" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Kode transaksi</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Kode barang</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jenis Kebutuhan</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Sisa Stok</th>
                    <th class="text-center">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;

                  $btn = @$_POST['btn'];

                  if (isset($btn)) {
                    $sql = mysqli_query($conn, "SELECT * FROM tb_barang,tb_user,tb_transaksi WHERE tb_barang.kd_barang = tb_transaksi.kd_barang and tb_user.id_user = tb_transaksi.id_user and tb_transaksi.tgl_transaksi = '$tgl'");
                  } else {
                    $sql = mysqli_query($conn, "SELECT * FROM tb_barang,tb_user,tb_transaksi WHERE tb_barang.kd_barang = tb_transaksi.kd_barang and tb_user.id_user = tb_transaksi.id_user and tb_transaksi.tgl_transaksi = '$tgls'");
                  }


                  while ($data = mysqli_fetch_array($sql)) {
                  ?>
                    <tr>
                      <td align="center"><?php echo $no++ ?></td>
                      <td align="center"><?php echo $data['kd_transaksi'] ?></td>
                      <td align="center"><?php echo $data['tgl_transaksi'] ?></td>
                      <td align="center"><?php echo $data['kd_barang'] ?></td>
                      <td align="center"><?php echo $data['nm_barang'] ?></td>
                      <td align="center"><?php echo $data['nama'] ?></td>
                      <td align="center"><?php echo $data['kepentingan'] ?></td>
                      <td align="center">
                        <?php if ($data['keterangan'] == "masuk") : ?>
                          <span class="text-success">+<?php echo $data['jumlah'] ?></span>
                        <?php endif; ?>
                        <?php if ($data['keterangan'] == "keluar") : ?>
                          <span class="text-danger">-<?php echo $data['jumlah'] ?></span>
                        <?php endif; ?>
                      </td>
                      <td align="center"><?php echo $data['stok'] ?></td>
                      <td align="center">
                        <?php if ($data['keterangan'] == "masuk") : ?>
                          <span class="text-success"><?php echo $data['keterangan'] ?></span>
                        <?php endif; ?>
                        <?php if ($data['keterangan'] == "keluar") : ?>
                          <span class="text-danger"><?php echo $data['keterangan'] ?></span>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <hr>
            <div class="table-responsive">
              <br>
              <h4 align="center">Sisa Stok Barang</h4>
              <hr>
              <table width="100%" border="1" style="border-collapse: 1;" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Kode barang</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Stok</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $stok = mysqli_query($conn, "SELECT * FROM tb_barang");
                  while ($datas = mysqli_fetch_array($stok)) {
                  ?>
                    <tr>
                      <td align="center"><?php echo $no++ ?></td>
                      <td align="center"><?php echo $datas['kd_barang'] ?></td>
                      <td align="center"><?php echo $datas['nm_barang'] ?></td>
                      <td align="center"><?php echo $datas['stokb'] ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <hr>
          </div>
          <br>
          <div class="form-group">
            <button onclick="printContent('div1')" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include "footer.php";
  ?>