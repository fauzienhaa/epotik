<?php

require '../function.php';

// $kode = $_GET['kode'];
// $obat = query("SELECT * FROM tb_obat WHERE kode = $kode")[0];

$id = $_GET['id_admin'];
$query = "SELECT * from tb_admin where id_admin = '$id'";
$query_exec = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_exec)) :

if (isset($_POST["simpan"])) {
    if (ubah ($_POST) > 0) {
        echo "
            <script>
                alert('data obat berhasil diubah');
                document.location.href = 'obat_admin.php?id_admin=$row[id_admin]';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data obat gagal diubah');
                document.location.href = 'obat_admin.php?id_admin=$row[id_admin]';
            </script>
        ";
    }
}

$kode = $_GET['kode'];
$obat = "SELECT * from tb_obat where kode = '$kode'";
$query_exec = mysqli_query($conn, $obat);
while ($data = mysqli_fetch_array($query_exec)) :
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Obat</title>

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
                        <h1 class="h3 mb-2 text-gray-800">Ubah Data Obat</h1>
                        <form action="" method="post">
                        <div class="form-grup row">
                            <label for="kode" class="col-sm-2 col-from-label">Kode</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control" name="kode" id="kode" value="<?php echo $data['kode']; ?>">
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="nama" class="col-sm-2 col-from-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['nama']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="kategori" class="col-sm-2 col-from-label">Kategori</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="kategori" id="kategori" value="<?php echo $data['kategori']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="satuan" class="col-sm-2 col-from-label">Satuan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="satuan" id="satuan" value="<?php echo $data['satuan']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="stok" class="col-sm-2 col-from-label">Stok</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="stok" id="stok" value="<?php echo $data['stok']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="hargabeli" class="col-sm-2 col-from-label">Harga Beli</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="hargabeli" id="hargabeli" value="<?php echo $data['hargabeli']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <label for="hargajual" class="col-sm-2 col-from-label">Harga Jual</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="hargajual" id="hargajual" value="<?php echo $data['hargajual']; ?>" required>
                            </div>
                        </div>
                        <div class="form-grup row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
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