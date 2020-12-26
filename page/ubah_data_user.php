<?php
include('../config/_koneksi.php');
include('header.php');
$id = @$_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = '$id'");
$data = mysqli_fetch_array($sql);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Detail data user</h2>
                </div>
                <div class="col-lg-6">
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label id="mn_pegawai">Id user</label>
                            <input class="form-control" type="text" value="<?php echo $id; ?>" name="id_user" id="id_user" readonly required>
                        </div>
                        <div class="form-group">
                            <label id="mn_user">Nama user</label>
                            <input class="form-control" type="text" value="<?php echo $data['nm_user'] ?>" name="nm_user" id="nm_user" required>
                        </div>
                        <div class="form-group">
                            <label id="user">Username</label>
                            <input class="form-control" type="text" value="<?php echo $data['username'] ?>" name="user" id="user" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="text" value="<?php echo $data['pass'] ?>" name="pass" id="pass" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" name="alamat" id="alamat" required><?php echo $data['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>No.telp</label>
                            <input class="form-control" type="number" value="<?php echo $data['no_telp'] ?>" name="no_telp" id="no_telp" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" value="<?php echo $data['email'] ?>" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label>Hak Akses</label>
                            <select class="form-control" name="hak_akses" id="hak_akses" required>
                                <?php
                                if ($data['hak_akses'] == 'admin') {
                                ?>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                <?php
                                } else if ($data['hak_akses'] == 'user') {
                                ?>
                                    <option value="admin">User</option>
                                    <option value="user">Admin</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status Aktivasi</label>
                            <select class="form-control" name="aktif" id="aktif" required>
                                <?php
                                if ($data['aktif'] == '0') {
                                ?>
                                    <option value="0">Nonaktif</option>
                                    <option value="1">Aktif</option>
                                <?php
                                } else if ($data['aktif'] == '1') {
                                ?>
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form_group">
                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                            <button type="reset" name="reset" class="btn btn-default" value="Reset">Reset</button>
                        </div>
                        <div class="form_group">
                        </div>
                    </form>
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
                    $simpan = @$_POST['simpan'];
                    $reset = @$_POST['reset'];

                    if (isset($simpan)) {
                        $sqlsimpan = mysqli_query($conn, "UPDATE tb_user SET id_user = '$id_user', nm_user = '$nm_user', username = '$user', password = md5('$pass'), pass ='$pass' , alamat = '$alamat', no_telp = '$no_telp', email = '$email', hak_akses = '$hak_akses', aktif = '$aktif' where id_user = '$id' ");
                    ?>
                        <script type="text/javascript">
                            window.location.href = "ubah_data_user.php?id=<?php echo $id; ?>";
                        </script>
                        <?php
                        if ($sqltambah === false) {
                            echo "gagal simpan data!";
                        }
                    }
                    if (isset($reset)) {
                        ?>
                        <script type="text/javascript">
                            window.location.href = "detail_data_user.php?id=<?php echo $id; ?>";
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