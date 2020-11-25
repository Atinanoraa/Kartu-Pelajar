<?php
require 'koneksi.php';
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username' AND password = '$password'");

    if(mysqli_num_rows($result) == 1){
        header("Location:index.php");
    }
    
    else{
        echo "<script>
                alert('Masukkan Username Dan Password Yang benar');
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website Kartu Pelajar SMK Telkom Purwokerto">
    <meta name="author" content="Atina Nora Haya">

    <title>Login Website Kartu Pelajar</title>
    <!-- gambar title -->
    <link rel="icon" type="image/png" href="assets/img/logoTs.png">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .img-logo{
            max-height: 160px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="assets/img/logoTs.png" alt="Logo TS" class="img-logo">
                                        <h1 class="h4 text-gray-900">Selamat Datang</h1>
                                        <h1 class="h4 text-gray-900 mb-4"><b>SMK TELKOM PURWOKERTO</b></h1>
                                    </div>
                                    <form method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="email" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Password">
                                        </div>
                                            <button class="btn btn-success btn-user btn-block" name="login">
                                                LOGIN
                                            </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>