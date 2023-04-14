<?php
$conn = mysqli_connect("localhost", "root", "", "epotik");
$result = mysqli_query($conn, "SELECT * FROM tb_admin");
$result2 = mysqli_query($conn, "SELECT * FROM tb_user");
$result3 = mysqli_query($conn, "SELECT * FROM tb_transaksi");
$result4 = mysqli_query($conn, "SELECT * FROM tb_obat");

if (!$result) {
    echo mysqli_error($conn);
}

if (!$result2) {
    echo mysqli_error($conn);
}

if (!$result3) {
    echo mysqli_error($conn);
}

if (!$result4) {
    echo mysqli_error($conn);
}

function tambah($data)
{
    global $conn;
    $kode = $data["kode"];
    $nama = $data["nama"];
    $kategori = $data["kategori"];
    $satuan = $data["satuan"];
    $stok = $data["stok"];
    $hargabeli = $data["hargabeli"];
    $hargajual = $data["hargajual"];

    $kode2 = mysqli_query($conn, "SELECT kode FROM tb_obat WHERE kode = '$kode'");
    $nama2 = mysqli_query($conn, "SELECT nama FROM tb_obat WHERE nama = '$nama'");

    if (mysqli_fetch_assoc($kode2)) {
        echo "
            <script>
                alert('Kode Obat sudah ada');
            </script>
        ";
        return false;
    } else {
        if (mysqli_fetch_assoc($nama2)) {
            echo "
                <script>
                    alert('Nama Obat sudah ada');
                </script>
            ";
            return false;
        } else {
            $query = "INSERT INTO tb_obat VALUES ('$kode', '$nama', '$kategori', '$satuan', '$stok', '$hargabeli', '$hargajual')";
            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);
        }
    }
}

function hapus($kode)
{
    global $conn;
    $query = "DELETE FROM `tb_obat` WHERE `tb_obat`.`kode`='$kode'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $kode = $data["kode"];
    $nama = $data["nama"];
    $kategori = $data["kategori"];
    $satuan = $data["satuan"];
    $stok = $data["stok"];
    $hargabeli = $data["hargabeli"];
    $hargajual = $data["hargajual"];
    $query = "UPDATE `tb_obat` SET 
        `nama` = '$nama',
        `kategori` = '$kategori',
        `satuan` = '$satuan',
        `stok` = '$stok',
        `hargabeli` = '$hargabeli',
        `hargajual` = '$hargajual'
        WHERE `tb_obat`.`kode` = '$kode'
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahuser($data)
{
    global $conn;
    $id = $data["id"];
    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];
    $query = "UPDATE tb_user SET 
        nama = '$nama',
        username = '$username',
        password = '$password'
        WHERE id=$id
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahnamaadmin($data)
{
    global $conn;
    $id = $data["id_admin"];
    $nama = $data["nama"];

    $update = "UPDATE `tb_admin` SET
            `nama` = '$nama',
            WHERE `tb_admin`.`id_admin` = '$id'
            ";

    mysqli_query($conn, $update);
    return mysqli_affected_rows($conn);
}

function ubahpassadmin($data)
{
    global $conn;
    $id = $data["id_admin"];
    $password = $data["password"];
    $passwordnew = $data["passwordnew"];
    $passwordnew2 = $data["passwordnew2"];

    $konfpass = mysqli_query($conn, "SELECT password FROM tb_admin WHERE id_admin = '$id'");

    if ($password != $konfpass) {
        echo "
            <script>
                alert('password lama tidak sama')
            </script>
        ";
        return false;
    } else {
        if ($passwordnew != $passwordnew2) {
            echo "
                <script>
                    alert('konfirmasi password baru tidak sama')
                </script>
            ";
            return false;
        } else {
            $query = "UPDATE `tb_admin` SET
            `password` = '$passwordnew',
            WHERE `tb_admin`.`_admin` = '$id'";

            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);
        }
    }
}

function tgl()
{
    $ket = date("d-m-Y H:i:s");
    $tgl = $ket;

    return $tgl;
}

function beli($data)
{
    global $conn;
    $date = tgl();
    $id = $data["id"];
    $kode = $data["kode"];
    $nama = $data["nama"];
    $kategori = $data["kategori"];
    $satuan = $data["satuan"];
    $stok = $data["stok"];
    $hargabeli = $data["hargabeli"];
    $harga = $data["hargajual"];
    $jmlbeli = $data["jumlah"];
    $total = $harga * $jmlbeli;
    $stoknew = $stok - $jmlbeli;
    $status = 'Belum Dibayar';
    if ($stok > 0) {

        if ($jmlbeli <= $stok) {

            $query = "INSERT INTO `tb_penjualan`
            VALUES ('', '$id', '$kode', '$nama', '$harga', '$jmlbeli', '$total', '$date', '$status');
            ";

            $update = "UPDATE `tb_obat` SET 
            `nama` = '$nama',
            `kategori` = '$kategori',
            `satuan` = '$satuan',
            `stok` = '$stoknew',
            `hargabeli` = '$hargabeli',
            `hargajual` = '$harga'
            WHERE `tb_obat`.`kode` = '$kode'
            ";

            mysqli_query($conn, $update);
            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);
        } else {
            echo "
                <script>
                    alert('Pembelian Melebihi stok')
                </script>
            ";
            return false;
        }
    }
}

function persetujuan($data)
{
    global $conn;
    $idp = $data["id_penjualan"];
    $idu = $data["id_user"];
    $ida = $data["id_admin"];
    $kodeobat = $data["kode_obat"];
    $namaobat = $data["nama_obat"];
    $harga = $data["harga"];
    $jumlahbeli = $data["jumlah_beli"];
    $total = $harga * $jumlahbeli;
    $date = tgl();
    $status = 'Sudah Dibayar';

    $insert = "INSERT INTO `tb_riwayat`
    VALUES ('','$idp' , '$idu', '$ida', '$kodeobat', '$namaobat', '$harga', '$jumlahbeli', '$total', '$date');
    ";

    $update = "UPDATE `tb_penjualan` SET 
    `status` = '$status'
    WHERE `tb_penjualan`.`id_penjualan` = '$idp'
    ";

    mysqli_query($conn, $insert);
    mysqli_query($conn, $update);
    return mysqli_affected_rows($conn);
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query);
    $result3 = mysqli_query($conn, $query);
    $result4 = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
    while ($row = mysqli_fetch_assoc($result2)) {
        $rows[] = $row;
    }
    return $rows;
    while ($row = mysqli_fetch_assoc($result3)) {
        $rows[] = $row;
    }
    return $rows;
    while ($row = mysqli_fetch_assoc($result4)) {
        $rows[] = $row;
    }
    return $rows;
}

function output($output)
{
    global $conn;
    $result3 = mysqli_query($conn, $output);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result3)) {
        $rows[] = $row;
    }

    return $rows;
}

function registrasi($data)
{
    global $conn;
    $nama = $data["nama"];
    $username = strtolower($data["username"]);
    $password = mysqli_escape_string($conn, $data["password"]);
    $password2 = mysqli_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM tb_admin WHERE username = '$username'");
    $result2 = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username sudah terdaftar')
            </script>
        ";
        return false;
    } else {
        if (mysqli_fetch_assoc($result2)) {
            echo "
                <script>
                    alert('username sudah terdaftar')
                </script>
            ";
            return false;
        }
    }


    if ($password != $password2) {
        echo "
            <script>
                alert('konfirmasi password tidak sama')
            </script>
        ";
        return false;
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result2 = mysqli_query($conn, "INSERT INTO tb_user Values ('', '$nama', '$username', '$password')");

        return mysqli_affected_rows($conn);
    }
}
function regis_admin($data)
{
    global $conn;
    $nama = $data["nama"];
    $username = strtolower($data["username"]);
    $password = mysqli_escape_string($conn, $data["password"]);
    $password2 = mysqli_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM tb_admin WHERE username = '$username'");
    $result2 = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username sudah terdaftar')
            </script>
        ";
        return false;
    } else {
        if (mysqli_fetch_assoc($result2)) {
            echo "
                <script>
                    alert('username sudah terdaftar')
                </script>
            ";
            return false;
        }
    }


    if ($password != $password2) {
        echo "
            <script>
                alert('konfirmasi password tidak sama')
            </script>
        ";
        return false;
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($conn, "INSERT INTO tb_admin Values ('', '$nama', '$username', '$password')");

        return mysqli_affected_rows($conn);
    }
}

function format($uang)
{
    $konv = "Rp. " . number_format($uang, 0, ",", ".");
    return $konv;
}
