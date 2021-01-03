<?php
include('../config/_koneksi.php');
include('header.php');
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h4 class="mt-4">Data Barang</h4>
      <div class="row">
        <div class="col-12">
          <div class="card-header">
            <i class="fa fa-table"></i> Data barang</div>
          <div class="card-body">
            <p>
              <a href="tambah_data_barang.php" class="btn btn-success"><i class="fa fa-plus fa-fw"></i> Tambah Data barang</a>
            </p>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Kode barang</th>
                    <th class="text-center">Nama barang</th>
                    <th class="text-center">Satuan</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center">Tambah/Kurangi Stok</th>
                    <th class="text-center">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $sql = mysqli_query($conn, "SELECT * FROM tb_barang");
                  while ($data = mysqli_fetch_array($sql)) {
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $no++ ?></td>
                      <td class="text-center"><?php echo $data['kd_barang'] ?></td>
                      <td class="text-center"><?php echo $data['nm_barang'] ?></td>
                      <td class="text-center"><?php echo $data['satuan'] ?></td>
                      <td class="text-center"><?php echo $data['keterangan'] ?></td>
                      <td class="text-center"><?php echo $data['stokb'] ?></td>
                      <td class="text-center" style="vertical-align: middle;">
                        <a href="tambah_data_pemasukkan.php?id=<?php echo $data['kd_barang']; ?>" class="btn btn-sm btn-success"><i class="fa fa-plus fa-fw"></i></a>
                        <a href="tambah_data_pengeluaran.php?id=<?php echo $data['kd_barang']; ?>" class="btn btn-sm btn-warning text-light"><i class="fa fa-minus fa-fw"></i></a>
                      </td>
                      <td class="text-center" style="vertical-align: middle;">
                        <a href="ubah_data_barang.php?id=<?php echo $data['kd_barang']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit fa-fw"></i> Edit </a>
                        <a onclick="return confirm('Anda yakin ingin Menghapus data ini ?')" href="hapus_data_barang.php?id=<?php echo $data['kd_barang'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Hapus</a>
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