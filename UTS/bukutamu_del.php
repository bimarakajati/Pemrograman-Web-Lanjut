<?php
include "koneksi.php";
$idtamu = $_GET['idtamu'];

$sql = "delete from tamu where idtamu='$idtamu'";
$hasil = mysqli_query($conn, $sql);

if ($hasil)
    header("location:bukutamu.php");
else
    echo "Hapus data gagal...";