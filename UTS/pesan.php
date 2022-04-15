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
        <div class="container my-5">
            <h1 class="text-danger fw-bold mb-4"><span class="fa fa-shopping-cart me-1"></span>Keranjang Belanja</h1>
            <hr>
            <div class="row">
            <?php
            include "koneksi.php";
            $id_barang = "";

            if(isset($_GET['id_barang'])){
                $id_barang = $_GET['id_barang'];
                $sql = "SELECT * FROM barang WHERE id_barang=".$_GET['id_barang'];
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="col-md-6 d-flex justify-content-center mx-auto">
                            <div class="cart_logo">
                            <div id="gambar">
                            <img class="cart_img" src="img/'.$row['ft_barang'].'" alt="Gambar Produk" style="border-radius: 10%; height: 512px; width: 512px">
                            </div>
                            </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-center">
                            <div id="nama">
                            <h1 class="display-5 fw-bold">'.$row['nm_barang'].'</h1>
                            </div>
                            <hr>
                            <div id="harga">
                            <h2 class="my-4">$ '.$row['harga_spesial'].'</h2>
                            </div>
                            <div id="deskripsi">
                            <p class="lead">'.$row['deskripsi'].'</p>
                            </div>
                        ';
                    }
                } 
                else {
                    echo "0 results";
                }
            }

            if(isset($_GET['submit'])){
                $sql = "INSERT INTO pesanan (id_barang, nama, hp, jumlah, alamat)
                VALUES ('".$_GET['id_barang']."', '".$_GET['nama']."', '".$_GET['hp']."', '".$_GET['jumlah']."', '".$_GET['alamat']."')";

                if ($conn->query($sql) === TRUE) {
                echo '
                <div class="report">
                    Order has been accepted. Thank you for buying in our shop.
                </div>';
                } 
                else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            } 
            ?>
            <!-- Form -->
            <form action="pesan.php">
                <div class="form-group mb-3 row">
                    <label class="col-sm-2 col-form-label">Product ID</label>
                    <div class="col-sm-10">
                        <input type="text" id="id_barang" name="id_barang" class="form-control border-dark" value="<?php echo $id_barang ?>">
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" id="form_nama" name="nama" class="form-control border-dark" placeholder="Masukkan nama..">
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10">
                        <input type="text" id="form_hp" name="hp" class="form-control border-dark" placeholder="Masukkan nomor hp..">
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" id="form_alamat" name="alamat" class="form-control border-dark" placeholder="Masukkan alamat..">
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-sm-2 col-form-label">Total</label>
                    <div class="col-sm-10">
                        <select class="form-control border-dark" id="form_jumlah" name="jumlah">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" value="" id="form_cek">
                    <label class="form-check-label" for="form_cek" style="cursor: pointer;">
                        Setuju dengan syarat dan ketentuan
                    </label>
                </div>
                <button type="submit" name="submit" value="Submit" class="btn btn-outline-danger" onclick="beliSekarang(); return false">Beli Sekarang</button>
            </form>
            </div>
            </div>
        </div>

        <!-- Script -->
        <script>
            function beliSekarang() {
                if (document.getElementById("form_nama").value == "") {
                    alert("Nama kosong!");
                } else if (document.getElementById("form_hp").value == "") {
                    alert("Nomor HP kosong!");
                } else if (document.getElementById("form_alamat").value == "") {
                    alert("Alamat kosong!");
                } else if (document.getElementById("form_cek").checked == false) {
                    alert("Anda tidak setuju dengan syarat dan ketentuan");
                } else {
                    form.submit();
                }
            }
        </script>

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
