<?php

require '../function.php';

session_start();

if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}

$id = $_GET['id_admin'];
$query = "SELECT * from tb_admin where id_admin = '$id'";
$query_exec = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_exec)) :

    if (isset($_POST["simpan"])) {
        if (ubahpassadmin($_POST) > 0) {
            echo "
                <script>
                    alert('data admin berhasil diubah');
                    document.location.href = 'profil_admin.php?id_admin=$row[id_admin]';
                </script>";
        } else {
            echo "
                <script>
                    alert('data admin gagal diubah');
                    document.location.href = 'profil_admin.php?id_admin=$row[id_admin]';
                </script>
            ";
        }
    }

endwhile;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ubah Profil Admin</title>

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>

<?php
$id = $_GET['id_admin'];
$query = "SELECT * from tb_admin where id_admin = '$id'";
$query_exec = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_exec)) :
?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php include('sidebar.php'); ?>

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
                        <h1 class="h3 mb-2 text-gray-800">Ubah Password</h1>
                        <br>
                        <form action="" method="post">
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
                                <div class="col-sm-10 offset-sm-2">
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