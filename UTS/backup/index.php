<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <title>Supreme Store</title>
        <link rel="icon" href="img/favicon.ico" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body class="is-loading" oncontextmenu="return false" onkeydown="return false" onmousedown="return false">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="header">
            <div class="container-fluid py-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk.php">Produk</a>
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
                            <img src="img/logo.png" alt="Logo" height="35px" />
                        </a>
                    </ul>
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        </li> -->
                        <li class="nav-item">
                            <button class="btn btn-outline-danger mb-1" type="submit" style="margin-right: 8px;"><span class="fa fa-search me-1"></span>Search</button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-danger mb-1" type="button" data-bs-toggle="modal" data-bs-target="#modalLogin" style="margin-right: 8px"><span class="fa fa-sign-in me-1"></span>Masuk</button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-danger mb-1" type="button" data-bs-toggle="modal" data-bs-target="#modalSignUp"><span class="fa fa-user-plus me-1"></span>Daftar</button>
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

        <!-- Carousel -->
        <div id="carousel-placeholder"></div>
        <script>
            $(function () {
                $("#carousel-placeholder").load("components/carousel.html");
            });
        </script>

        <!-- Content -->
        <div class="container">
            <div class="row p-4">
                <div class="text-center">
                    <h1 class="text-danger fw-bold mb-4">Produk Kami</h1>
                    <hr>
                </div>
            </div>
            <div class="row p-4 text-dark d-flex justify-content-between" id="clothing">
                <?php
                include "koneksi.php";

                $sql = "SELECT * FROM barang";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '
                        <div class="card my-5 py-4" style="width: 18rem; border: 2px solid #2d3436; border-radius: 10px;">
                            <img src="img/'.$row['ft_barang'].'" class="card-img-top" alt="'.$row['nm_barang'].'">
                            <div class="card-body">
                            <h5 class="card-title">'.$row['nm_barang'].'</h5>
                            <!-- <div class="desc">'.$row['deskripsi'].'</div> -->
                            <p class="card-text">$ '.$row['harga'].'</p>
                            <!-- <div class="price">Special Price: Rp. '.$row['harga_spesial'].'</div> -->
                            <a href="pesan.php?id_barang='.$row['id_barang'].'" class="btn btn-outline-danger">Beli</a>
                            </div>
                        </div>
                        ';
                    }
                } 
                else {
                    echo "0 results";
                }
                $conn->close();        
                ?>
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