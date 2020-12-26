<?php
include('../config/_koneksi.php');
include('header.php');
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h2 class="mt-4">Data Transaksi Pengeluaran</h2>
      <div class="row">
        <div class="col-12">
          <div class="card-header">
            <i class="fa fa-table"></i> Data Transaksi Pengeluaran</div>
          <div class="card-body">
            <p>
              <!-- <a href="?page=tambah_data_pengeluaran" class="btn btn-success"><i class="fa fa-plus fa-fw"></i> Tambah Data transaksi</a></p> -->
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kode transaksi</th>
                      <th>Tanggal</th>
                      <th>Nama barang</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Stok</th>
                      <th>Jenis Kebutuhan</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($conn, "SELECT * FROM tb_barang,tb_user,tb_transaksi WHERE tb_barang.kd_barang = tb_transaksi.kd_barang and tb_user.id_user = tb_transaksi.id_user and tb_transaksi.keterangan = 'keluar' order by tb_transaksi.kd_transaksi ASC");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['kd_transaksi'] ?></td>
                        <td><?php echo $data['tgl_transaksi'] ?></td>
                        <td><?php echo $data['nm_barang'] ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['jumlah'] ?></td>
                        <td><?php echo $data['stok'] ?></td>
                        <td><?php echo $data['kepentingan'] ?></td>
                        <td class="text-center" style="vertical-align: middle;">
                          <a onclick="return confirm('Anda yakin ingin Menghapus data ini ?')" href="hapus_data_pengeluaran.php?id=<?php echo $data['kd_transaksi'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Hapus</a>
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