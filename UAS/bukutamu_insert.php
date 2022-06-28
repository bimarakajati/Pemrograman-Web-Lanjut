<?php
include "koneksi.php";
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$sql = "insert into tamu (nama,email,pesan) values ('$nama','$email','$pesan');";
$hasil = mysqli_query($conn, $sql);

if ($hasil)
    header("location:bukutamu.php");
else
    echo "Tambah data gagal...";