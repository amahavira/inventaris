<?php
include('../config/_koneksi.php');
include('header.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h4 class="mt-4">Tambah data user</h4>
                </div>
                <div class="col-lg-12">
                    <?php
                    $carikode = mysqli_query($conn, "select max(id_user) from tb_user") or die(mysqli_error());
                    $datakode = mysqli_fetch_array($carikode);
                    if ($datakode) {
                        $nilaikode = substr($datakode[0], 1);
                        $kode = (int) $nilaikode;
                        $kode = $kode + 1;
                        $hasilkode = "U" . str_pad($kode, 3, "0", STR_PAD_LEFT);
                    } else {
                        $hasilkode = "U001";
                    }
                    ?>
                    <form role="form" method="post" action="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label id="mn_pegawai">ID User</label>
                                            <input class="form-control" type="text" name="id_user" id="id_user" value="<?php echo $hasilkode; ?>" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label id="mn_pegawai">Nama user</label>
                                            <input class="form-control" type="text" name="nm_user" id="nm_user" required>
                                        </div>
                                        <div class="form-group">
                                            <label id="user">Username</label>
                                            <input class="form-control" type="text" name="user" id="user" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="text" name="pass" id="pass" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3" name="alamat" id="alamat" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>No.telp</label>
                                            <input class="form-control" type="number" name="no_telp" id="no_telp" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="email" id="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Hak Akses</label>
                                            <select class="form-control" name="hak_akses" id="hak_akses" required>
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Aktivasi</label>
                                            <select class="form-control" name="aktif" id="aktif" required>
                                                <option value="1">Aktif</option>
                                                <option value="0">Nonaktif</option>
                                            </select>
                                        </div>
                                        <div class="form_group">
                                            <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
                                            <button type="reset" name="reset" class="btn btn-default" value="Reset">Reset</button>
                                        </div>
                                        <div class="form_group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                $id_user = trim(mysqli_real_escape_string($conn, @$_POST['id_user']));
                $nm_user = trim(mysqli_real_escape_string($conn, @$_POST['nm_user']));
                $user = trim(mysqli_real_escape_string($conn, @$_POST['user']));
                $pass = trim(mysqli_real_escape_string($conn, @$_POST['pass']));
                $alamat = trim(mysqli_real_escape_string($conn, @$_POST['alamat']));
                $no_telp = trim(mysqli_real_escape_string($conn, @$_POST['no_telp']));
                $email = trim(mysqli_real_escape_string($conn, @$_POST['email']));
                $hak_akses = trim(mysqli_real_escape_string($conn, @$_POST['hak_akses']));
                $aktif = trim(mysqli_real_escape_string($conn, @$_POST['aktif']));
                $tambah = @$_POST['tambah'];

                if (isset($tambah)) {
                    $sqltambah = mysqli_query($conn, "INSERT INTO tb_user VALUES ('$id_user','$nm_user','$user',md5('$pass'),'$pass','$alamat','$no_telp','$email','$hak_akses','$aktif')");
                ?>
                    <script type="text/javascript">
                        window.location.href = "tampil_data_user.php";
                    </script>
                <?php
                    if ($sqltambah === false) {
                        echo '<script language="javascript">';
                        echo 'alert("Gagal Simpan Data!")';
                        echo '</script>';
                        ?>
                        <script type="text/javascript">
                            window.location.href = "tambah_data_user.php";
                        </script>
                    <?php
                    }
                    ?>
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