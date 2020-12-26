<?php
@session_start();
include "config/_koneksi.php";

if (@$_SESSION['admin'] || @$_SESSION['user']) {
    header("location:page/index.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Aplikasi Gudang - Registrasi</title>
        <link href="assets/logo/uii1.png" rel="shortcut icon">
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
    </head>

    <body style="background-color: #06337b;">
        <div class="container">

            <div class="row justify-content-center">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Aplikasi Gudang - Registrasi</h4>
                                </div>
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
                                <form method="post" action="">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="id_user" id="id_user" value="<?php echo $hasilkode; ?>" hidden required>
                                        <input class="form-control" type="text" placeholder="Nama" name="nm_user" id="nm_user" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Username" name="username" id="username" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" placeholder="Password" name="password" id="password" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Alamat" name="alamat" id="alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Nomor Telepon" name="no_telp" id="no_telp" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" placeholder="Email" name="email" id="email" required>
                                        <input class="form-control" type="text" name="hak_akses" value="user" id="hak_akses" hidden required>
                                        <!-- <input class="form-control" type="text" name="aktif" value="0" id="aktif" hidden required> -->
                                    </div>
                                    <button class="btn btn-primary btn-block text-white btn-user" type="submit" name="register">Register</button>
                                    <hr>
                                </form>
                                <?php
                                $id_user = trim(mysqli_real_escape_string($conn, @$_POST['id_user']));
                                $nm_user = trim(mysqli_real_escape_string($conn, @$_POST['nm_user']));
                                $user = trim(mysqli_real_escape_string($conn, @$_POST['username']));
                                $pass = trim(mysqli_real_escape_string($conn, @$_POST['password']));
                                $alamat = trim(mysqli_real_escape_string($conn, @$_POST['alamat']));
                                $no_telp = trim(mysqli_real_escape_string($conn, @$_POST['no_telp']));
                                $email = trim(mysqli_real_escape_string($conn, @$_POST['email']));
                                $hak_akses = trim(mysqli_real_escape_string($conn, @$_POST['hak_akses']));
                                // $aktif = trim(mysqli_real_escape_string($conn, @$_POST['aktif']));
                                $register = @$_POST['register'];

                                if (isset($register)) {
                                    $sqlregister = mysqli_query($conn, "INSERT INTO tb_user VALUES ('$id_user', '$nm_user', '$user', md5('$pass'), '$pass', '$alamat', '$no_telp', '$email', '$hak_akses', '0')");
                                    echo "<script>
                                        alert('Akun Berhasil Dibuat, Silahkan Menunggu Admin Untuk Mengaktivasi Akun Anda!');
                                    </script>";
                                ?>
                                    <script type="text/javascript">
                                        window.location.href = "login.php";
                                    </script>
                                <?php
                                    if ($sqlregister === false) {
                                        echo "Gagal Membuat Akun!";
                                    }
                                }

                                ?>

                                <div class="text-center">
                                    <span class="small">Sudah mempunyai akun?</span>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="login.php">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>

    </html>
<?php
}
?>