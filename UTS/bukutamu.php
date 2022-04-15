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
    <body class="is-loading" oncontextmenu="return false">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                            <a class="nav-link" href="produk.php">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tentang.html">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="bukutamu.php">Buku Tamu</a>
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

        <!-- Content -->
        <div class="container mb-5 bukutamu">
            <div class="row p-4">
                <div class="text-center">
                    <h1 class="text-danger fw-bold mb-4"><span class="fa fa-book me-1"></span>Buku Tamu</h1>
                    <hr />
                </div>
            </div>
            <div class="row">
                <div class="col-md 5 d-flex justify-content-center">
                    <div class="logo">
                        <img src="img/oreo.png" class="oreo" alt="Contact Us"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="bukutamu_insert.php" method="post">
                        <div class="mb-3">
                            <label for="exampleForm" class="form-label">
                                Nama Panjang
                            </label>
                            <input type="text" name="nama" class="form-control" id="exampleForm" placeholder="Bima Rakajati" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">
                                Alamat Email
                            </label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">
                                Pesan
                            </label>
                            <textarea class="form-control" name="pesan" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                        <button type="submit" value="Simpan" class="btn btn-outline-danger">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Buku Tamu -->
        <div class="container my-5">
        <hr>
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pesan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $sql = "select * from tamu";
                $hasil = mysqli_query($conn, $sql);
                $urut   = 1;
                while ($r = mysqli_fetch_assoc($hasil)) {
                    echo "                
                    <tr>
                        <th scope='row'>" . $urut++ . "</th>
                        <td>" . $r['nama'] . "</td>
                        <td>" . $r['email'] . "</td>
                        <td>" . $r['pesan'] . "</td>
                        <td>
                        <a href='bukutamu_edit.php?idtamu=" . $r['idtamu'] . "' class='btn btn-warning mb-1 tombol'>Edit</a>
                        <a href='bukutamu_del.php?idtamu=" . $r['idtamu'] . "' class='btn btn-danger mb-1 tombol' onclick=\"return confirm('Are you sure you want to delete this data?')\">Del</a>
                        </td>
                    </tr>";
                }
                ?>
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

        <!-- 3D Animation -->
        <script type="text/javascript" src="js/vanilla-tilt.min.js"></script>
        <script type="text/javascript">
            VanillaTilt.init(document.querySelectorAll(".oreo"), {
                max: 10,
                speed: 400,
                glare: true,
            });
        </script>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
