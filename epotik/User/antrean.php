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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
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

    <body>
        <div class="bg">
            <?php include('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid col-lg-11 col-md-11 col-sm-11">

                    <!-- Page Heading -->
                    <br>
                    <h1 class="h3 mb-2 text-gray-800">Antrean</h1>
                    <p class="mb-4">Antrean berisi pembelian yang dilakukan belum dibayar</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Antrean Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Jumlah Beli</th>
                                            <th>Total</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $rows = query("SELECT * FROM tb_penjualan WHERE id_user = '$id' AND status = 'Belum Dibayar'"); ?>
                                        <?php foreach ($rows as $rows) : ?>
                                            <tr>
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
            <p class="text-center">Copyright - E-Potik (2021)</p>
        </div>

        <!-- Logout Modal-->
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