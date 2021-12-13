<?php
// memanggil sesi
session_start();
if (isset($_SESSION['user'])) {
  ?>
  <script>
   window.location=history.go(-1);
 </script>
 <?php } ?>
 <!DOCTYPE html>
 <html>
 <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  </head>
  <body class="hold-transition login-page">
    <!-- left column -->
    <div class="col-lg-4">
      <div class="login-box" style="margin: 15px;">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Login</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input required="required" type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input required="required" autocomplete type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" name="login-proses" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>

  </body>
  </html>

  <?php
  // memanggil koneksi
  include 'include/koneksi.php'; 

  // jika tombol login di klik
  if (isset($_POST['login-proses'])) {
    // mengambil data dari form
    $user = mysqli_escape_string($conn,$_POST['user']);
    $pass = md5(mysqli_escape_string($conn,$_POST['pass']));

    // mencocokkan data dari database
    $sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass' ";
    $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    // jika data cocok
    $row = mysqli_num_rows($query);
    if ($row > 0) {

      // mengambila array di database
      $data = mysqli_fetch_assoc($query);

      // jika user login sebagai admin
      if ($data['level'] == 'Admin') {

        // membuat sesi
        $_SESSION['user'] = $user;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];

        // user akan dialihkan ke halaman admin
        header("location:view/admin/index.php");

      // jika user login sebagai petugas
      }elseif ($data['level'] == 'Petugas') {

        // membuat sesi
        $_SESSION['user'] = $user;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];

        // user akan dialihkan ke halaman petugas
        header("location:view/petugas/index.php");
      }elseif ($data['level'] == 'Siswa') {

        // membuat sesi
        $_SESSION['user'] = $user;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];

        // user akan dialihkan ke halaman petugas
        header("location:view/siswa/index.php");
      }else{
        ?>
        <script type="text/javascript">
          const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000
          });


          Toast.fire({
            icon: 'error',
            title: 'Login gagal! level anda salah'
          });
        </script>
        <?php
      }
    }else{
      ?>
      <script type="text/javascript">
        const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000
        });


        Toast.fire({
          icon: 'error',
          title: 'Login gagal! username atau password anda salah'
        });
      </script>
      <?php
    }
  }
  ?>