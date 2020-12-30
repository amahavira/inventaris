<?php
include('../config/_koneksi.php');
include('header.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">Tambah Data Pemasukan</h4>
                </div>
                <div class="col-lg-12">
                    <hr>
                    <?php

                    $idusr = @$_SESSION['user'];
                    $sqlu = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = '$idusr'");
                    $datau = mysqli_fetch_array($sqlu);

                    // $idbrg = @$_GET['idbrg'];
                    // $sqlb = mysqli_query($conn, "SELECT * FROM tb_barang WHERE kd_barang = '$idbrg' ORDER BY kd_barang DESC");
                    // $datab = mysqli_fetch_array($sqlb);

                    $idbrg = @$_GET['id'];
                    $sqlb = mysqli_query($conn, "SELECT * FROM tb_barang WHERE kd_barang = '$idbrg' ORDER BY kd_barang DESC");
                    $datab = mysqli_fetch_array($sqlb);

                    $carikode = mysqli_query($conn, "select max(kd_transaksi) from tb_transaksi") or die(mysqli_error());
                    $datakode = mysqli_fetch_array($carikode);
                    if ($datakode) {
                        $nilaikode = substr($datakode[0], 1);
                        $kode = (int) $nilaikode;
                        $kode = $kode + 1;
                        $hasilkode = "T" . str_pad($kode, 8, "0", STR_PAD_LEFT);
                    } else {
                        $hasilkode = "T00000001";
                    }
                    ?>
                    <form role="form" method="post" action="">
                        <div class="form-row">
                            <div class="col" style="padding-left: 30px; padding-right: 30px;">
                                <div class="form-group">
                                    <h4>Data Transaksi</h4>
                                </div>
                                <!-- <hr>
                        <div class="form_group">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"> Pilih barang</button>
                        </div> -->
                                <hr>
                                <div class="form-group">
                                    <label id="mn_pegawai">Kode transaksi</label>
                                    <input class="form-control" type="text" name="kd_transaksi" id="kd_transaksi" value="<?php echo $hasilkode; ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label id="mn_pegawai">Tanggal</label>
                                    <input class="form-control" type="text" name="tanggal" id="tanggal" value="<?php echo date('d m Y'); ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label id="mn_pegawai">Nama</label>
                                    <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $datau['nm_user']; ?>" readonly required>
                                </div>
                            </div>
                            <hr>
                            <div class="col" style="padding-left: 30px; padding-right: 30px;">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <h4>Data Barang</h4>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label id="user">Kode barang</label>
                                                    <input class="form-control" type="text" name="kd_barang" id="kd_barang" value="<?php echo $datab['kd_barang']; ?>" readonly required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Nama barang</label>
                                                    <input class="form-control" type="text" name="nm_barang" id="nm_barang" value="<?php echo $datab['nm_barang']; ?>" readonly required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label id="user">Stok</label>
                                            <input class="form-control" tep="any" min="0" type="number" name="stok" id="txt_stok" value="<?php echo $datab['stokb']; ?>" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah yang di tambahkan</label>
                                            <input class="form-control" onkeyup="sum();" onkeypress="return hanyaAngka(event)" tep="any" min="0" type="number" name="jumlah" id="txt_jumlah" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Sisa</label>
                                            <input class="form-control" tep="any" min="0" type="text" name="sisa" id="txt_sisa" readonly required>
                                        </div>
                                        <hr>
                                        <div class="form_group">
                                            <input type="submit" name="tambah" class="btn btn-primary" value="Proses">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                $kd_transaksi = trim(mysqli_real_escape_string($conn, @$_POST['kd_transaksi']));
                $tgl_transaksi = trim(mysqli_real_escape_string($conn, @$_POST['tanggal']));
                $keterangan = 'masuk';
                $jumlah = trim(mysqli_real_escape_string($conn, @$_POST['jumlah']));
                $nama = trim(mysqli_real_escape_string($conn, @$_POST['nama']));
                $stok = trim(mysqli_real_escape_string($conn, @$_POST['sisa']));
                $id_user = $datau['id_user'];;
                $kd_barang = trim(mysqli_real_escape_string($conn, @$_POST['kd_barang']));
                $tambah = @$_POST['tambah'];

                if (isset($tambah)) {
                    $sqltambah = mysqli_query($conn, "INSERT INTO tb_transaksi VALUES ('$kd_transaksi','$tgl_transaksi','$keterangan','$jumlah','$nama','$stok','$id_user','$kd_barang','Penambahan Stok')");
                    $sqltambahstok = mysqli_query($conn, "UPDATE tb_barang set stokb = '$stok' where kd_barang = '$idbrg'");
                ?>
                    <script type="text/javascript">
                        window.location.href = "tampil_data_pemasukkan.php";
                    </script>
                <?php
                    if ($sqltambah === false) {
                        echo "gagal tambah data!";
                    }
                }
                ?>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div id="tambah" class="modal fade" role="dialog" class="col-lg-12">
                    <div class="modal-dialog" class="col-lg-12">
                        <div class="modal-content" class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="card-header">
                                            <i class="fa fa-table"></i> Laporan harian
                                        </div>
                                        <br>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="dataTable_wrapper">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Kode barang</th>
                                                            <th>Nama barang</th>
                                                            <th>Satuan</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $sql = mysqli_query($conn, "SELECT * FROM tb_barang");
                                                        while ($data = mysqli_fetch_array($sql)) {
                                                        ?>
                                                            <tr>
                                                                <td align="center"><?php echo $no++ ?></td>
                                                                <td><?php echo $data['kd_barang'] ?></td>
                                                                <td><?php echo $data['nm_barang'] ?></td>
                                                                <td><?php echo $data['satuan'] ?></td>
                                                                <td align="center">
                                                                    <p>
                                                                        <a href="tambah_data_pemasukkan.php?idbrg=<?php echo $data['kd_barang'] ?>" class="btn btn-primary">Pilih</a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <hr>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include "footer.php";
    ?>