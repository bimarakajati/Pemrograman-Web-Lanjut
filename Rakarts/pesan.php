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
                            <a class="nav-link active" href="produk.php">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transaksi.php">Daftar Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tentang.php">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bukutamu.php">Buku Tamu</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav mx-auto">
                        <!-- <a href="index.php">
                            <img src="img/logo/logo.png" alt="Logo" height="35px" />
                        </a> -->
                    </ul>
                    
                    <?php
                        session_start();
                        require 'koneksi.php';
                        if(!empty($_SESSION["id"])){
                            $id = $_SESSION["id"];
                            $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = $id");
                            $row = mysqli_fetch_assoc($result);
                            echo "
                            <ul class='navbar-nav'>
                                <li class='nav-item'>
                                    <button class='btn btn-outline-warning mb-1' type='submit' data-bs-toggle='modal' data-bs-target='#modalSearch' style='margin-right: 8px;'><span class='fa fa-search me-1'></span>Search</button>
                                </li>
                                <li class='nav-item'>
                                    <button class='btn btn-outline-warning mb-1' type='button' data-bs-toggle='modal' data-bs-target='#modalLogout'><span class='fa fa-user me-1'></span>Halo, ".$row["name"]."</button>
                                </li>
                            </ul>
                            ";
                        }
                        else{
                            echo "
                            <ul class='navbar-nav'>
                                <li class='nav-item'>
                                    <button class='btn btn-outline-warning mb-1' type='submit' data-bs-toggle='modal' data-bs-target='#modalSearch' style='margin-right: 8px;'><span class='fa fa-search me-1'></span>Search</button>
                                </li>
                                <li class='nav-item'>
                                    <button class='btn btn-outline-warning mb-1' type='button' data-bs-toggle='modal' data-bs-target='#modalLogin' style='margin-right: 8px'><span class='fa fa-sign-in me-1'></span>Masuk</button>
                                </li>
                                <li class='nav-item'>
                                    <button class='btn btn-outline-warning mb-1' type='button' data-bs-toggle='modal' data-bs-target='#modalSignUp'><span class='fa fa-user-plus me-1'></span>Daftar</button>
                                </li>
                            </ul>
                            ";
                        }
                    ?>
                </div>
            </div>
        </nav>

        <?php
        // LOGIN
        if(isset($_POST["submit_login"])){
            $usernameemail = $_POST["usernameemail"];
            $password = $_POST["password"];
            $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$usernameemail' OR email = '$usernameemail'");
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) > 0){
                if($password == $row['password']){
                    $_SESSION["login"] = true;
                    $_SESSION["id"] = $row["id"];
                    header("Location: index.php");
                    }
                else{
                    echo
                    "<script> alert('Password Salah'); </script>";
                }
            }
            else{
                echo
                "<script> alert('Pengguna tidak ditemukan'); </script>";
            }
        }
        // LOGOUT
        if(isset($_POST["submit_logout"])){
            $_SESSION = [];
            session_unset();
            session_destroy();
            header("Location: index.php");
        }
        // REGISTER
        if(isset($_POST["submit_register"])){
            $name = $_POST["name"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];
            $duplicate = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username' OR email = '$email'");
            if(mysqli_num_rows($duplicate) > 0){
                echo
                "<script> alert('Username atau Email sudah terpakai'); </script>";
            }
            else{
                if($password == $confirmpassword){
                    $query = "INSERT INTO pengguna VALUES('','$name','$username','$email','$password')";
                    mysqli_query($conn, $query);
                    echo
                    "<script> alert('Registrasi Sukses'); </script>";
                }
                else{
                    echo
                    "<script> alert('Password tidak sama'); </script>";
                }
            }
        }
        // nampilin pesan diterima
        if(isset($_SESSION['success'])){
            echo "
                <div class='report'>
                    Pesanan telah diterima. Terima kasih telah membeli di toko kami.<br>
                    Lihat pesanan di <a href='transaksi.php'>Daftar Transaksi</a>.
                </div>
            ";
            unset($_SESSION['success']);
        }
        // INPUT DATA
        if(isset($_GET['submit'])){
            // nama barang
            $brg = "select stok from barang where id_barang=".$_GET['id_barang']."";
            $hasil_brg = mysqli_query($conn, $brg);
            $hasil_nama = mysqli_fetch_assoc($hasil_brg);
            $total = $hasil_nama["stok"] - $_GET['jumlah'];
            // update stok
            $sql = "update barang set stok = ".$total." where barang.id_barang = ".$_GET['id_barang']."";
            $conn->query($sql);
            // insert data
            $sql = "INSERT INTO pesanan (id_barang, nama, email, hp, ukuran, jumlah, alamat)
            VALUES ('".$_GET['id_barang']."', '".$_GET['nama']."', '".$_GET['email']."', '".$_GET['hp']."', '".$_GET['ukuran']."', '".$_GET['jumlah']."', '".$_GET['alamat']."')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['success'] = 1;
                header('Location: pesan.php?id_barang='.$_GET["id_barang"].'');
            } 
            else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>
        <!-- Seach -->
        <div class="modal fade" tabindex="-1" id="modalSearch">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cari</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="usernameemail" class="form-label">Apa yang ingin anda cari?</label>
                                <input type="text" name="usernameemail" class="form-control" id="usernameemail" aria-describedby="emailHelp" placeholder="Masukkan kata yang ingin dicari" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" name="submit_cari" class="btn btn-warning">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Login -->
        <div class="modal fade" tabindex="-1" id="modalLogin">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Masuk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="usernameemail" class="form-label">Username atau Alamat Email</label>
                                <input type="text" name="usernameemail" class="form-control" id="usernameemail" aria-describedby="emailHelp" placeholder="Masukkan username atau alamat email" />
                                <div id="emailHelp" class="form-text">Kami tidak akan pernah membagikan email anda kepada orang lain.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan kata sandi" />
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                <label class="form-check-label" for="exampleCheck1">Selalu Masuk</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" name="submit_login" class="btn btn-warning">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Logout -->
        <div class="modal fade" tabindex="-1" id="modalLogout">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Keluar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="usernameemail" class="form-label">Apakah anda yakin ingin keluar?</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" name="submit_logout" class="btn btn-warning">Keluar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register -->
        <div class="modal fade" tabindex="-1" id="modalSignUp">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Daftar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan username" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email" />
                                <div id="emailHelp" class="form-text">Kami tidak akan pernah membagikan email anda kepada orang lain.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan kata sandi" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Konfirmasi Kata Sandi</label>
                                <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1" placeholder="Masukkan ulang kata sandi" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="sumbit" name="submit_register" class="btn btn-warning">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="container my-5" id="animate">
            <h1 class="text-dark fw-bold mb-4"><span class="fa fa-shopping-cart me-1"></span>Form Pembelian</h1>
            <hr>
            <div class="row">
            <?php
                $id_barang = "";
                // ngambil id barang
                if(isset($_GET['id_barang'])){
                    $id_barang = $_GET['id_barang'];
                    $barang = query("SELECT * FROM barang WHERE id_barang=".$_GET['id_barang']."");
                }
                foreach ($barang as $br) : 
            ?>
                <div class="col-md-6 d-flex justify-content-center mx-auto">
                    <div class="cart_logo">
                        <div id="gambar">
                            <img class="cart_img" src="img/kaos/<?= $br["ft_barang"]; ?>" alt="<?= $br["nm_barang"]; ?>" class="cart_img">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                <div id="nama">
                    <h1 class="display-5 fw-bold"><?= $br["nm_barang"]; ?></h1>
                </div>
                <hr>
                <div id="harga">
                    <h2 class="my-4"><?= rupiah($br["harga"]); ?> | Stok: <?= $br["stok"]; ?></h2>
                </div>
                <div id="deskripsi">
                    <p class="lead"><?= $br["deskripsi"]; ?></p>
                </div>
            <?php endforeach; ?>

            <!-- Form -->
            <form action="pesan.php" method="get">
                <?php
                    if(!empty($_SESSION["id"])){
                        $id = $_SESSION["id"];
                        $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = $id");
                        $row = mysqli_fetch_assoc($result);
                        echo "
                        <div class='form-group mb-3 row'>
                            <label class='col-sm-2 col-form-label'>Nama</label>
                            <div class='col-sm-10'>
                                <input type='text' id='form_nama' name='nama' class='form-control border-dark' value='".$row["name"]."' readonly>
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <label class='col-sm-2 col-form-label'>Email</label>
                            <div class='col-sm-10'>
                                <input type='text' id='form_email' name='email' class='form-control border-dark' value='".$row["email"]."' readonly>
                            </div>
                        </div>
                        ";
                    }
                    else{
                        echo "
                        <div class='form-group mb-3 row'>
                            <label class='col-sm-2 col-form-label'>Nama</label>
                            <div class='col-sm-10'>
                                <input type='text' id='form_nama' name='nama' class='form-control border-dark' placeholder='Masukkan nama..'>
                            </div>
                        </div>
                        <div class='form-group mb-3 row'>
                            <label class='col-sm-2 col-form-label'>Email</label>
                            <div class='col-sm-10'>
                                <input type='text' id='form_email' name='email' class='form-control border-dark' placeholder='Masukkan email..'>
                            </div>
                        </div>
                        ";
                    }
                ?>
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
                    <label class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                        <select class="form-control border-dark" id="form_ukuran" name="ukuran">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
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
                <input type="hidden" id="id_barang" name="id_barang" class="form-control border-dark" value="<?php echo $id_barang ?>">
                <button type="submit" name="submit" value="Submit" class="btn btn-outline-dark" onclick="beliSekarang(); return false">Beli Sekarang</button>
            </form>
            </div>
            </div>
        </div>

        <!-- Script -->
        <script>
            function beliSekarang() {
                if (document.getElementById("form_nama").value == "") {
                    alert("Nama kosong!");
                } else if (document.getElementById("form_email").value == "") {
                    alert("Email kosong!");
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
