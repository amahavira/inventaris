<?php
include('../config/_koneksi.php');
include('header.php');
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h2 class="mt-4">Data Transaksi Pemasukan</h2>
      <div class="row">
        <div class="col-12">
          <div class="card-header">
            <i class="fa fa-table"></i> Data Transaksi Pemasukan</div>
          <div class="card-body">
            <p>
              <!-- <a href="?page=tambah_data_pemasukkan" class="btn btn-success"><i class="fa fa-plus fa-fw"></i> Tambah Data transaksi</a></p> -->
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Kode transaksi</th>
                      <th class="text-center">Tanggal</th>
                      <th class="text-center">Nama barang</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Jumlah</th>
                      <th class="text-center">Sisa Stok</th>
                      <th class="text-center">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($conn, "SELECT * FROM tb_barang,tb_user,tb_transaksi WHERE tb_barang.kd_barang = tb_transaksi.kd_barang and tb_user.id_user = tb_transaksi.id_user and tb_transaksi.keterangan = 'masuk' order by tb_transaksi.kd_transaksi ASC");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-center"><?php echo $data['kd_transaksi'] ?></td>
                        <td class="text-center"><?php echo $data['tgl_transaksi'] ?></td>
                        <td class="text-center"><?php echo $data['nm_barang'] ?></td>
                        <td class="text-center"><?php echo $data['nama'] ?></td>
                        <td class="text-center"><span class="text-success">+<?php echo $data['jumlah'] ?></td>
                        <td class="text-center"><?php echo $data['stok'] ?></td>
                        <td class="text-center" style="vertical-align: middle;">
                          <a onclick="return confirm('Anda yakin ingin Menghapus data ini ?')" href="hapus_data_pemasukkan.php?id=<?php echo $data['kd_transaksi'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Hapus</a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include "footer.php";
  ?>