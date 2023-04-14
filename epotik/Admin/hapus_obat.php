<?php
require '../function.php';

$id = $_GET['id_admin'];
$query = "SELECT * from tb_admin where id_admin = '$id'";
$query_exec = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_exec)) :

$kode = $_GET['kode'];

if (hapus($kode) > 0){
    echo "
        <script>
            alert('Obat BERHASIL dihapus');
            document.location.href = 'obat_admin.php?id_admin=$row[id_admin]';
        </script>
    ";
   }
   else{
    echo "
        <script>
            alert('obat GAGAL dihapus');
            document.location.href = 'obat_admin.php?id_admin=$row[id_admin]';
        </script>
    ";
   }

endwhile;
?>