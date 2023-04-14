<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require '../function.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>E-Potik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/css/all.css">
</head>

<?php
$id = $_GET['id'];
$query = "SELECT * from tb_user where id = '$id'";
$query_exec = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_exec)) :
?>

<body>
    <div class="bg">
        <nav class="navbar navbar-expand-md pd-container">
            <a class="navbar-brand" href="index.php?id=<?php echo $row['id']; ?>">
                <img class="img-fluid" src="image/epotik.png">
            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#topbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=<?php echo $row['id']; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="obat_user.php?id=<?php echo $row['id']; ?>">Daftar Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="antrean.php?id=<?php echo $row['id']; ?>">Antrean</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riwayat.php?id=<?php echo $row['id']; ?>">Riwayat</a>
                    </li>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $row['nama'] ?></span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="box-navbar dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="profil_user.php?id=<?php echo $row['id'] ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../logout.php" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <header id="header-home" class="header container-fluid">
            <div class="overlay"></div>
            <div class="header-txt"><br />
                <h1>Selamat datang,&nbsp <?php echo $row['nama'] ?></h1>
                <p>E-Potik menyediakan segala kebutuhan anda <br />kapanpun dan dimanapun.</p>
                <br />
            </div>
        </header>
    </div>
    <footer class="menu2 pd-container">
        <div class="container-fluid about">
            <div class="row">
                <div class="box-footer col-lg-4 col-md-4 col-sm-12">
                    <h4>Alamat</h4>
                    <p><u>57722, Tasikmadu, Karanganyar, Jawa Tengah, Indonesia</u>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-bottom warna2">
        <p class="text-white text-center">Copyright - E-Potik (2021)</p>
    </div>

    <!-- Logout Modal-->
    <?php include('logout.php') ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

<?php endwhile;?>

</html>