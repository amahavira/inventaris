<?php
include('../config/_koneksi.php');
include('header.php');
?>
<div id="layoutSidenav_content">
  <main>
    <?php
    if (@$_SESSION['admin']) {
    ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h4 class="mt-4">Data User</h4>
          </div>
          <div class="col-12">
            <div class="card-header">
              <i class="fa fa-table"></i> Data User</div>
            <div class="card-body">
              <p>
                <a href="tambah_data_user.php" class="btn btn-success"><i class="fa fa-plus fa-fw"></i> Tambah Data User</a></p>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>ID User</th>
                      <th>Nama</th>
                      <th>Hak Akses</th>
                      <th>Status Aktivasi</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($conn, "SELECT * FROM tb_user");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['id_user'] ?></td>
                        <td><?php echo $data['nm_user'] ?></td>
                        <td><?php echo $data['hak_akses'] ?></td>
                        <td>
                          <?php
                          if ($data['aktif'] == '0') {
                          ?>
                            <?php echo "Nonaktif" ?>
                          <?php
                          } else if ($data['aktif'] == '1') {
                          ?>
                            <?php echo "Aktif" ?>
                          <?php
                          }
                          ?>
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                          <a href="ubah_data_user.php?id=<?php echo $data['id_user']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye fa-fw"></i> Ubah </a>
                          <a onclick="return confirm('Anda yakin ingin Menghapus data ini ?')" href="hapus_data_user.php?id=<?php echo $data['id_user'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Hapus</a>
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
    <?php
    } else {
      echo "
          <div class='container-fluid'>
            <div class='row'>
              <div class='col-12'>
                <h2>Halaman tidak tersedia!</h2>
              </div>
            </div>
          </div>
          <?
          ";
    }
    ?>
  </main>
  <?php
  include "footer.php";
  ?>