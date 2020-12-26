<?php
include('../config/_koneksi.php');
include('header.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h2 class="mt-4">Tambah data barang</h2>
            <div class="row">
                <div class="col-lg-6" style="padding-left: 30px; padding-right: 30px;">
                    <?php
                    $carikode = mysqli_query($conn, "select max(kd_barang) from tb_barang") or die(mysqli_error());
                    $datakode = mysqli_fetch_array($carikode);
                    if ($datakode) {
                        $nilaikode = substr($datakode[0], 1);
                        $kode = (int) $nilaikode;
                        $kode = $kode + 1;
                        $hasilkode = "B" . str_pad($kode, 4, "0", STR_PAD_LEFT);
                    } else {
                        $hasilkode = "B0001";
                    }
                    ?>
                    <form role="form" method="post" action="">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label id="mn_pegawai">Kode barang</label>
                                    <input class="form-control" type="text" name="kd_barang" id="kd_barang" value="<?php echo $hasilkode; ?>" readonly required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label id="mn_pegawai">Nama barang</label>
                                    <input class="form-control" type="text" name="nm_barang" id="nm_barang" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label id="user">Satuan</label>
                                    <input class="form-control" type="text" name="satuan" id="satuan" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input class="form-control" type="text" name="keterangan" id="keterangan" required>
                                </div>
                            </div>
                        </div>
                        <div class="form_group">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
                            <button type="reset" name="reset" class="btn btn-default" value="Reset">Reset</button>
                        </div>
                        <div class="form_group">
                        </div>
                    </form>
                </div>
                <?php
                $kd_barang = trim(mysqli_real_escape_string($conn, @$_POST['kd_barang']));
                $nm_barang = trim(mysqli_real_escape_string($conn, @$_POST['nm_barang']));
                $satuan = trim(mysqli_real_escape_string($conn, @$_POST['satuan']));
                $keterangan = trim(mysqli_real_escape_string($conn, @$_POST['keterangan']));
                $tambah = @$_POST['tambah'];

                if (isset($tambah)) {
                    $sqltambah = mysqli_query($conn, "INSERT INTO tb_barang VALUES ('$kd_barang','$nm_barang','$satuan','$keterangan','0')");
                ?>
                    <script type="text/javascript">
                        window.location.href = "tampil_data_barang.php";
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
            </div>
        </div>
    </main>
    <?php
    include "footer.php";
    ?>