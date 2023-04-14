<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}

require '../function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>E-Potik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/css/all.css">


</head>

<?php
$id = $_GET['id'];
$query = "SELECT * from tb_user where id = '$id'";
$query_exec = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_exec)) :
?>

<body id="page-top">

    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include('topbar.php'); ?>

                <div class="container-fluid col-lg-11 col-md-11 col-sm-11">

                    <br>
                    <h1 class="h3 mb-2 text-gray-800">Profil</h1>
                    <br>
                    <form action="" method="post">
                        <div class="form-grup row">
                            <label for="nama" class="col-sm-2 col-from-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" name="nama" id="nama"
                                    value="<?php echo $row['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="username" class="col-sm-2 col-from-label">Username</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" name="username" id="username"
                                    value="<?php echo $row['username']; ?>">
                            </div>
                        </div>
                        <!-- <div class="form-grup row">
                            <div class="col-sm-10">
                                <a href="ubah_user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" name="ubah">Ubah</a>
                            </div>
                        </div> -->

                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <br>
                        <span class="text-center">Copyright &copy; E-Potik</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <?php include('logout.php') ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

<?php endwhile; ?>

</html>