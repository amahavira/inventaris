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
    <title>Aplikasi gudang - login</title>
    <link href="dist/assets/logo/uii1.png" rel="shortcut icon">
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
                  <h4 class="text-dark mb-4">Aplikasi Gudang - Login</h4>
                </div>
                <form method="post" action="">
                  <div class="form-group">
                    <input class="form-control" type="text" placeholder="Username" name="username" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" placeholder="Password" name="password" required>
                  </div>
                  <button class="btn btn-primary btn-block text-white btn-user" type="submit" name="login">Login</button>
                  <hr>
                </form>
                <?php
                $queriaktif = "SELECT aktif FROM tb_user";
                $aktif = mysqli_query($conn, $queriaktif) or die(mysqli_error($conn));
                $user = trim(mysqli_real_escape_string($conn, @$_POST['username']));
                $pass = trim(md5(mysqli_real_escape_string($conn, @$_POST['password'])));
                $login = @$_POST['login'];

                if (isset($login)) {
                  if ($aktif == "0" || $user == "" || $pass == "") {
                ?> <script type="text/javascript">
                      alert("Username atau Password tidak boleh kosong / Akun Anda belum diaktivasi");
                    </script><?php
                            } else {
                              $queri = "SELECT * FROM tb_user where username = '$user' and password = '$pass' and aktif ='1'";
                              $sql = mysqli_query($conn, $queri) or die(mysqli_error($conn));
                              $data = mysqli_fetch_array($sql);
                              $cek = mysqli_num_rows($sql);
                              if ($cek >= 1) {
                                if ($data['hak_akses'] == "admin") {
                                  @$_SESSION['admin'] = $data['id_user'];
                                  header("location: index.php");
                                } else if ($data['hak_akses'] == "user") {
                                  @$_SESSION['user'] = $data['id_user'];
                                  header("location: index.php");
                                }
                              } else {
                                echo "<script>alert ('Login Gagal / Akun Anda belum Aktif!') </script>";
                              }
                            }
                          }
                              ?>
                <div class="text-center">
                  <span class="small">Belum mempunyai akun?</span>
                </div>
                <div class="text-center">
                  <a class="small" href="register.php">Buat Akun</a>
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