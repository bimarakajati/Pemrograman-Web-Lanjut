<?php
require "koneksi.php";
$barang = query("SELECT * FROM barang");
?>

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
    <body class="is-loading" oncontextmenu="return false">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="header">
            <div class="container-fluid py-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="produk.php">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tentang.html">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bukutamu.php">Buku Tamu</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav mx-auto">
                        <a href="index.php">
                            <img src="img/logo/logo.png" alt="Logo" height="35px" />
                        </a>
                    </ul>
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        </li> -->
                        <li class="nav-item">
                            <button class="btn btn-outline-warning mb-1" type="submit" style="margin-right: 8px;"><span class="fa fa-search me-1"></span>Search</button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-warning mb-1" type="button" data-bs-toggle="modal" data-bs-target="#modalLogin" style="margin-right: 8px"><span class="fa fa-sign-in me-1"></span>Masuk</button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-warning mb-1" type="button" data-bs-toggle="modal" data-bs-target="#modalSignUp"><span class="fa fa-user-plus me-1"></span>Daftar</button>
                        </li>
                </div>
            </div>
        </nav>

        <!-- Modal -->
        <div id="modal-placeholder"></div>
        <script>
            $(function () {
                $("#modal-placeholder").load("components/modal.html");
            });
        </script>

        <!-- Content -->
        <div class="container">
            <div class="row p-4">
                <div class="text-center">
                    <h1 class="text-dark fw-bold mb-4">Produk Kami</h1>
                    <hr>
                </div>
            </div>
            <div class="row p-4 text-dark d-flex justify-content-between" id="animate">
                <?php foreach ($barang as $br) : ?>
                <div class="card my-5 py-4">
                    <img src="img/kaos/<?= $br["ft_barang"]; ?>" class="card-img-top" alt="<?= $br["nm_barang"]; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $br["nm_barang"]; ?></h5>
                        <p class="card-text"><?= rupiah($br["harga"]); ?></p>
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
