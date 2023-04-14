<?php

require '../function.php';

$id = $_GET['id'];
$query = "SELECT * from tb_user where id = '$id'";
$query_exec = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_exec)) :

    if (isset($_POST["beli"])) {
        if (beli($_POST) > 0) {
            echo "
            <script>
                alert('Obat berhasil dibeli');
                document.location.href = 'obat_user.php?id=$row[id]';
            </script>
        ";
        } else {
            echo "
            <script>
                alert('Obat gagal dibeli');
                document.location.href = 'obat_user.php?id=$row[id]';
            </script>
        ";
        }
    }

    $kode = $_GET['kode'];
    $obat = "SELECT * from tb_obat where kode = '$kode'";
    $query_exec = mysqli_query($conn, $obat);
    while ($data = mysqli_fetch_array($query_exec)) :
?>

<head>
    <title>E-Potik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/css/all.css">
</head>

<body>
    <?php include('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid col-lg-11 col-md-11 col-sm-11">

        <!-- Page Heading -->
        <br>
        <h1 class="h3 mb-2 text-gray-800">Beli Obat</h1>
        <br>
        <form action="" method="post">
            <div class="form-grup row">
                <label for="id" hidden class="col-sm-2 col-from-label">ID Pembeli</label>
                <div class="col-sm-5">
                    <input type="text" hidden class="form-control" name="id" id="id" value="<?php echo $row['id']; ?>"
                        required>
                </div>
            </div>
            <div class="form-grup row">
                <label for="kode" class="col-sm-2 col-from-label">Kode</label>
                <div class="col-sm-5">
                    <input type="text" readonly class="form-control" name="kode" id="kode"
                        value="<?php echo $data['kode']; ?>">
                </div>
            </div>
            <div class="form-grup row">
                <label for="nama" class="col-sm-2 col-from-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" readonly class="form-control" name="nama" id="nama"
                        value="<?php echo $data['nama']; ?>" required>
                </div>
            </div>
            <div class="form-grup row">
                <label for="kategori" hidden class="col-sm-2 col-from-label">Kategori</label>
                <div class="col-sm-5">
                    <input type="text" hidden class="form-control" name="kategori" id="kategori"
                        value="<?php echo $data['kategori']; ?>" required>
                </div>
            </div>
            <div class="form-grup row">
                <label for="satuan" hidden class="col-sm-2 col-from-label">Satuan</label>
                <div class="col-sm-5">
                    <input type="text" hidden class="form-control" name="satuan" id="satuan"
                        value="<?php echo $data['satuan']; ?>" required>
                </div>
            </div>
            <div class="form-grup row">
                <label for="stok" hidden class="col-sm-2 col-from-label">Stok</label>
                <div class="col-sm-5">
                    <input type="text" hidden class="form-control" name="stok" id="stok"
                        value="<?php echo $data['stok']; ?>" required>
                </div>
            </div>
            <div class="form-grup row">
                <label for="hargabeli" hidden class="col-sm-2 col-from-label">Harga</label>
                <div class="col-sm-5">
                    <input type="text" hidden class="form-control" name="hargabeli" id="hargabeli"
                        value="<?php echo $data['hargabeli']; ?>" required>
                </div>
            </div>
            <div class="form-grup row">
                <label for="hargajual" hidden class="col-sm-2 col-from-label">Harga</label>
                <div class="col-sm-5">
                    <input type="text" hidden class="form-control" name="hargajual" id="hargajual"
                        value="<?php echo $data['hargajual']; ?>" required>
                </div>
            </div>
            <div class="form-grup row">
                <label for="jumlah" class="col-sm-2 col-from-label">Jumlah beli</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="jumlah" id="jumlah" required>
                </div>
            </div>
            <div class="form-grup row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="beli">Beli</button>
                </div>
            </div>

    </div>
    <!-- /.container-fluid -->
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

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

<?php
    endwhile;
endwhile;
?>

</html>