<?php

require '../function.php';

// $kode = $_GET['kode'];
// $obat = query("SELECT * FROM tb_obat WHERE kode = $kode")[0];

$id = $_GET['id_admin'];
$query = "SELECT * from tb_admin where id_admin = '$id'";
$query_exec = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_exec)) :

if (isset($_POST["setujui"])) {
    if (persetujuan ($_POST) > 0) {
        echo "
            <script>
                alert('Pembelian berhasil disetujui');
                document.location.href = 'laporan_admin.php?id_admin=$row[id_admin]';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Pembelian gagal disetujui');
                document.location.href = 'laporan_admin.php?id_admin=$row[id_admin]';
            </script>
        ";
    }
}

$idp = $_GET['id_penjualan'];
$riwayat = "SELECT * from tb_penjualan where id_penjualan = '$idp'";
$queryexec = mysqli_query($conn, $riwayat);
while ($data = mysqli_fetch_array($queryexec)) :
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Pembelian</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

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
                        <h1 class="h3 mb-2 text-gray-800">Persetujuan Pembelian</h1>
                        <br>
                        <form action="" method="post">
                        <div class="form-grup row">
                            <label for="id_penjualan" hidden class="col-sm-2 col-from-label">ID Penjualan</label>
                            <div class="col-sm-5">
                                <input type="text" hidden class="form-control" name="id_penjualan" id="id_penjualan" value="<?php echo $data['id_penjualan']; ?>">
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="id_user" class="col-sm-2 col-from-label">ID User</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" name="id_user" id="id_user" value="<?php echo $data['id_user']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="id_admin" hidden class="col-sm-2 col-from-label">ID Admin</label>
                            <div class="col-sm-5">
                                <input type="text" hidden class="form-control" name="id_admin" id="id_admin" value="<?php echo $row['id_admin']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="kode_obat" class="col-sm-2 col-from-label">Kode Obat</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" name="kode_obat" id="kode_obat" value="<?php echo $data['kode_obat']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="nama_obat" class="col-sm-2 col-from-label">Nama Obat</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" name="nama_obat" id="nama_obat" value="<?php echo $data['nama_obat']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="harga" class="col-sm-2 col-from-label">Harga</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" name="harga" id="harga" value="<?php echo $data['harga']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="jumlah_beli" class="col-sm-2 col-from-label">Jumlah Beli</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" name="jumlah_beli" id="jumlah_beli" value="<?php echo $data['jumlah_beli']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="total" class="col-sm-2 col-from-label">Total</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" name="total" id="total" value="<?php echo format($data['total']); ?>" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-grup row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="setujui">Setujui</button>
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

<?php
    endwhile;
    endwhile;
?>

</html>