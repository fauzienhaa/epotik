<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;

    if (isset($_POST["simpan"])) {
        if (ubahadmin($_POST) > 0) {
            echo "
                <script>
                    alert('data user berhasil diubah');
                    document.location.href = 'profil_admin?id=$rows[id]';
                </script>";
        } else {
            echo "
                <script>
                    alert('data user gagal diubah');
                    document.location.href = 'profil_admin?id=$rows[id]';
                </script>
            ";
        }
    }
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
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

        <!-- Page Wrapper -->
        <div id="wrapper">


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include('topbar.php'); ?>
                    <!-- End of Topbar -->



                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Ubah Profil</h1>
                        <br>
                        <form action="" method="post">
                        <div class="form-grup row">
                            <label for="kode" class="col-sm-2 col-from-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="kode" class="col-sm-2 col-from-label">Username</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['username']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="password" class="col-sm-2 col-from-label">Password Lama</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="passwordnew" class="col-sm-2 col-from-label">Password Baru</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="passwordnew" id="passwordnew" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="passwordnew2" class="col-sm-2 col-from-label">Konfirmasi Password Baru</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="passwordnew2" id="passwordnew2" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- /.end main content -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; E-Potik</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <?php include('logout.php') ?>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </body>

<?php endwhile; ?>

</html>