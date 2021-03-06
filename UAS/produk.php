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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="header">
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
                            <a class="nav-link active" href="produk.php">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transaksi.php">Daftar Transaksi</a>
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
        <div class="container">
            <div class="row p-4">
                <div class="text-center">
                    <h1 class="text-dark fw-bold mb-4">Produk Kami</h1>
                    <hr>
                </div>
            </div>
            <div class="row p-4 text-dark d-flex justify-content-between" id="animate">
                <?php
                require "koneksi.php";
                $barang = query("SELECT * FROM barang");
                foreach ($barang as $br) :
                ?>
                <div class="card my-5 py-4">
                    <img src="img/kaos/<?= $br["ft_barang"]; ?>" class="card-img-top" alt="<?= $br["nm_barang"]; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $br["nm_barang"]; ?></h5>
                        <p class="card-text"><?= rupiah($br["harga"]); ?> | Stok: <?= $br["stok"]; ?></p>
                        <a href="pesan.php?id_barang=<?= $br["id_barang"]; ?>" class="btn btn-outline-dark">Beli</a>
                    </div>
                </div>
                <?php endforeach; ?>
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

        <!-- SCROLL UP BUTTON -->
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-caret-up"></i></button>
        <script type="text/javascript" src="js/scroll-up.js"></script>
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
