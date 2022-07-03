<?php
session_start();
include "koneksi.php";
$idtamu = $_GET['idtamu'];
if($_SESSION!=NULL){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    
    if(!empty($_SESSION["id"]) && $row["username"] == "superadmin"){
        $sql = "delete from tamu where idtamu='$idtamu'";
        $hasil = mysqli_query($conn, $sql);
        if ($hasil)
            header("location:bukutamu.php");
        else
            echo "Hapus data gagal...";
    } else {
        echo "
        <script> alert('Anda harus masuk sebagai admin terlebih dahulu untuk mengakses halaman ini'); </script>
        <script> location.href='bukutamu.php'; </script>
        ";
    }
} else {
    echo "
    <script> alert('Anda harus masuk sebagai admin terlebih dahulu untuk mengakses halaman ini'); </script>
    <script> location.href='bukutamu.php'; </script>
    ";
}