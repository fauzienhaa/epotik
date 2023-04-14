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

        <div class="container-fluid col-lg-11 col-md-11 col-sm-11">

            <br>
            <h1 class="h3 mb-2 text-gray-800">Menu Obat</h1>
            <p class="mb-4">Obat yang tersedia di sini hanyalah fiktif belaka</p>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Obat</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $rows = query("SELECT * FROM tb_obat"); ?>
                                <?php foreach ($rows as $rows) : ?>
                                <tr>
                                    <td><?php echo $rows["kode"]; ?></td>
                                    <td><?php echo $rows["nama"]; ?></td>
                                    <td><?php echo $rows["kategori"]; ?></td>
                                    <td><?php echo $rows["satuan"]; ?></td>
                                    <td><?php echo $rows["stok"]; ?></td>
                                    <td><?php echo format($rows["hargajual"]); ?></td>
                                    <td>
                                        <a href="beli_obat.php?kode=<?php echo $rows["kode"]; ?>&id=<?php echo $row["id"]; ?>"
                                            class="btn btn-primary">Beli</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

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

    <?php include('logout.php') ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>
</body>

<?php endwhile; ?>

</html>