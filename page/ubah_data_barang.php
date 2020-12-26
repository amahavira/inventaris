<?php
include('../config/_koneksi.php');
include('header.php');
?>
<?php
$id = @$_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM tb_barang WHERE kd_barang = '$id'");
$data = mysqli_fetch_array($sql);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Detail data barang</h2>
                </div>
                <div class="col-lg-6">
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label id="mn_pegawai">Kode Barang</label>
                            <input class="form-control" type="text" value="<?php echo $id; ?>" name="kd_barang" id="kd_barang" readonly required>
                        </div>
                        <div class="form-group">
                            <label id="mn_user">Nama barang</label>
                            <input class="form-control" type="text" value="<?php echo $data['nm_barang'] ?>" name="nm_barang" id="nm_barang" required>
                        </div>
                        <div class="form-group">
                            <label id="user">Satuan</label>
                            <input class="form-control" type="text" value="<?php echo $data['satuan'] ?>" name="satuan" id="merk" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input class="form-control" type="text" value="<?php echo $data['keterangan'] ?>" name="keterangan" id="keterangan" required>
                        </div>
                        <div class="form_group">
                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                            <button type="reset" name="reset" class="btn btn-default" value="Reset">Reset</button>
                        </div>
                        <div class="form_group">
                        </div>
                    </form>
                    <?php
                    $kd_barang = trim(mysqli_real_escape_string($conn, @$_POST['kd_barang']));
                    $nm_barang = trim(mysqli_real_escape_string($conn, @$_POST['nm_barang']));
                    $satuan = trim(mysqli_real_escape_string($conn, @$_POST['satuan']));
                    $keterangan = trim(mysqli_real_escape_string($conn, @$_POST['keterangan']));
                    $simpan = @$_POST['simpan'];
                    $reset = @$_POST['reset'];

                    if (isset($simpan)) {
                        $sqlsimpan = mysqli_query($conn, "UPDATE tb_barang SET kd_barang = '$kd_barang', nm_barang = '$nm_barang', satuan = '$satuan', keterangan ='$keterangan' where kd_barang = '$id' ");
                    ?>
                        <script type="text/javascript">
                            window.location.href = "tampil_data_barang.php";
                        </script>
                        <?php
                        if ($sqltambah === false) {
                            echo "gagal simpan data!";
                        }
                    }
                    if (isset($reset)) {
                        ?>
                        <script type="text/javascript">
                            window.location.href = "ubah_data_barang.php?id=<?php echo $id; ?>";
                        </script>
                    <?php
                    }

                    ?>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
            </div>
        </div>

    </main>
    <?php
    include "footer.php";
    ?>