<?php
include "koneksi.php";
$idtamu = $_POST['idtamu'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$sql = "update tamu set nama='$nama',email='$email',pesan='$pesan'  where idtamu='$idtamu';";
$hasil = mysqli_query($conn, $sql);

if ($hasil)
    header("location:bukutamu.php");
else
    echo "Update data gagal...";