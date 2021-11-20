<?php

session_start();
require 'function.php';

if ( isset($_SESSION["login"])) {
  header("Location: logout.php");
  exit;
}


if ( isset($_POST["register"]) ) {
  if ( registrasi($_POST) > 0 ) {
    echo "
      <script>
        alert('User Baru Berhasil Ditambahkan!');
            document.location.href = 'login.php';
      </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

//CEK COOKIE
if ( isset($_COOKIE['id_user']) && isset($_COOKIE['key']) )  {
  $id_user = $_COOKIE['id_user'];
  $key = $_COOKIE['key'];

  $result = mysqli_query($conn, "SELECT email FROM data_user WHERE id_user = $id_user");
  $row = mysql_fetch_assoc($result);

  //CEK COOKIRE DAN EMAIL
  if ( $key ===  hash('sha256', $row['username']) ) {
      $_SESSION['login'] = true;
  }
}


if ( isset($_POST["login"]) ) {
  
      $username = $_POST["username"];
      $password = $_POST["password"];

      $result = mysqli_query($conn, "SELECT * FROM data_user WHERE username = '$username'");

      //CEK EMAIL 
      if ( mysqli_num_rows($result) === 1 ) {
          
          //CEK SESSION
          $_SESSION["login"] = true;

          //CEK REMEMBER ME
          if ( isset($_POST['remember']) ) {
              //BUAT COOKIE
              setcookie('id_user', $row['id_user'], time() + 60);
              setcookie('key', hash('sha256', $row['username']), time() + 60);
          }

          //CEK PASSWORD
          $row = mysqli_fetch_assoc($result);
          if (password_verify($password, $row["password"]) ) {

              //CEK LEVEL LOGIN
              
              if ($row['posisi'] == "dosen") {
                  if ( isset($_SESSION["login"]) ) {
                      $_SESSION['username'] = $username;
                      $_SESSION['posisi'] = "dosen";
                      header("location: index.php");
                  }

              }  else if ($row['posisi'] == "mahasiswa") {

                  if ( isset($_SESSION["login"]) ) {
                      $_SESSION['username'] = $username;
                      $_SESSION['posisi'] = "mahasiswa";
                      echo no_Telp;
                      header("location: mahasiswa/index.php");
                  }
  
              } else if ($row['posisi'] == "admin") {
                  
                  if ( isset($_SESSION["login"]) ) {
                      $_SESSION["username"] = $username;
                      $_SESSION["posisi"] = "admin";
                      echo "<script>
                              alert('Anda Telah Login Sebagai Admin!');
                              document.location.href = 'admin/admin.php';
                              </script>";
                  }

              }


              exit;
          }   
      }

      $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign in | SIMAQRCODE </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn=default" name="login" Type="submit">Login</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> SIMAQ</h1>
                  <p>©2021 Develope By Mario Cahyo Wibowo</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Name" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="" />
              </div>
              <div> 
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm Password" required="" />
              </div>  
              <div>
                <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" required="" />
              </div>
              <div>
                <select class="form-control" placeholder="Pilih Hak Akses" name="posisi" id="posisi">
                  <option disabled="disabled">Pilih Hak Akses</option>
                  <option>Dosen</option>
                  <option>Mahasiswa</option>
                </select>
              </div>
              <div>
                <button type="submit" name="register" class="btn btn-default">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> SIMAQ</h1>
                  <p>©2021 Develope By Mario Cahyo Wibowo</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
