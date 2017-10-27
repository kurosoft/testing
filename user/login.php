<?php
    session_start();
    include "../../includes/include.php"; 
    if($_POST){
        @$username = $_POST['username'];
        @$password = $_POST['password'];
        $error = false;
        if(!$username){
            $pesan = "<span class='btn btn-danger'>Username tidak boleh kosong</span>";
            $error = true;
        }
        if(!$password){
            $pesan = "<span class='btn btn-danger'>Password tidak boleh kosong</span>";
            $error = true;
        }
 
        if(!$error){
            $query = $koneksi->query("SELECT * FROM login WHERE username = '$username'");
            if($query->fetchColumn() > 0){
                $query = $koneksi->query("SELECT * FROM login WHERE username = '$username'")->fetch(PDO::FETCH_ASSOC);
                if($username == $query['username']){
                    if($password == $query['password']){
                        $_SESSION['username'] = $username;
                        $_SESSION['login'] = true;
                        header("location:../../index.php");
                    }else{
                        $pesan = "<span class='btn btn-danger'>Passord salah</span>";
                    }
                }else{
                    $pesan = "<span class='btn btn-danger'>Username tidak ditemukan</span>";
                }            
            }
        }  
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
 
 
    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
       
    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
    <title>Login</title>
 
 
    <link rel="stylesheet" type="text/css" href="../../assets/css/css.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
</head>
<body>
    <div id="login-page">
        <div class="container">
              <form class="form-login" method="POST" action="" style="margin-top:200px;">
                <div class="login-wrap">
                    <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="Password"><br>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit" name="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                    <br>
                </div>
       
                  </div>
                  <!-- modal -->
       
              </form>      
       
        </div>
      </div>
 
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
 
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="../../assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("../../assets/img/login-bg.png", {speed: 500});
    </script>
 
 
  </body>
</html>