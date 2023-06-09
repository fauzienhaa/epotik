<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("location: ../login.php");
    exit;
}

require '../function.php';

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Penjualan</title>

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

            <?php include('sidebar.php') ?>

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
                        <h1 class="h3 mb-2 text-gray-800">Laporan Penjualan</h1>
                        <p class="mb-4">Laporan Penjualan berisi penjualan yang sudah disetujui admin</p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID Pembeli</th>
                                                <th>ID Apoteker</th>
                                                <th>Kode Obat</th>
                                                <th>Nama Obat</th>
                                                <th>Harga</th>
                                                <th>Jumlah Beli</th>
                                                <th>Total</th>
                                                <th>Tanggal Disetujui</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $rows = query("SELECT * FROM tb_riwayat"); ?>
                                            <?php foreach ($rows as $rows) : ?>
                                                <tr>
                                                    <td><?php echo $rows["id_user"]; ?></td>
                                                    <td><?php echo $rows["id_admin"]; ?></td>
                                                    <td><?php echo $rows["kode_obat"]; ?></td>
                                                    <td><?php echo $rows["nama_obat"]; ?></td>
                                                    <td><?php echo format($rows["harga"]); ?></td>
                                                    <td><?php echo $rows["jumlah_beli"]; ?></td>
                                                    <td><?php echo format($rows["total"]); ?></td>
                                                    <td><?php echo $rows["date"]; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

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