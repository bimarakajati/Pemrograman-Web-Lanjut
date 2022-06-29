<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <title>Rakarts Store</title>
        <link rel="icon" href="img/logo/favicon.ico" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid py-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk.php">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="transaksi.php">Daftar Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tentang.html">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bukutamu.php">Buku Tamu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="container mb-5 bukutamu" id="animate">
            <div class="row my-4">
                <div class="text-center">
                    <h1 class="text-dark fw-bold mb-4"><span class="fa fa-book me-1"></span>Daftar Transaksi</h1>
                    <hr>
                </div>
            </div>
        </div>

        <!-- Daftar Transaksi -->
        <div class="container my-5" id="animate">
        <!-- <hr> -->
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    $pesanan = query("SELECT * FROM pesanan");
                    $urut = 1;
                    foreach ($pesanan as $ps) : 
                    // nama barang
                    $nama_brg = mysqli_fetch_assoc(mysqli_query($conn, "select nm_barang from barang where id_barang=".$ps['id_barang'].""));
                    // harga barang
                    $harga_brg = mysqli_fetch_assoc(mysqli_query($conn, "select harga from barang where id_barang=".$ps['id_barang'].""));
                ?>
                    <tr>
                        <th scope='row' style='text-align:center'><?= $urut++; ?></th>
                        <td style='text-align:center'><?= $ps['id_barang']; ?></td>
                        <td><?= $nama_brg["nm_barang"]; ?></td>
                        <td><?= $ps['nama']; ?></td>
                        <td><?= $ps['email']; ?></td>
                        <td><?= $ps['hp']; ?></td>
                        <td><?= $ps['alamat']; ?></td>
                        <td><?= $ps['ukuran']; ?></td>
                        <td style='text-align:center'><?= $ps['jumlah']; ?></td>
                        <td><?= rupiah($ps['jumlah'] * $harga_brg["harga"]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        </div>
        <!-- Container -->

        <!-- Footer -->
        <div id="footer-placeholder"></div>
        <script>
            $(function () {
                $("#footer-placeholder").load("components/footer.html");
            });
        </script>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
