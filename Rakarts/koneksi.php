<?php
// session_start();
// $host = "sql212.epizy.com";
// $user = "epiz_20700601";
// $pass = "Yi6FOEwIMh";
// $db = "epiz_20700601_dbtamu";
$host = "localhost";
$user = "root";
$pass = "";
$db = "rakarts";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal...");
}
//echo "Koneksi ke database berhasil...";

// Query function
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row= mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }
    return $rows;
}

// Rupiah format function
function rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}