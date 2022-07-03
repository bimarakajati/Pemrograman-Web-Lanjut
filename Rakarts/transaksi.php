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
                            <a class="nav-link" href="tentang.php">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bukutamu.php">Buku Tamu</a>
                        </li>
                    </ul><ul class="nav navbar-nav mx-auto">
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
                    header("Location: transaksi.php");
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
            header("Location: transaksi.php");
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
                    $query = "INSERT INTO pengguna VALUES('','$name','$username','$email','$password',CURRENT_TIMESTAMP)";
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
                        <form action="" method="get">
                            <div class="mb-3">
                                <label for="cari" class="form-label">Siapa nama pembeli yang ingin anda cari?</label>
                                <input type="text" name="cari" class="form-control" id="cari" placeholder="Masukkan nama pembeli yang ingin dicari" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-warning">Cari</button>
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
        <div class="container bukutamu" id="animate">
            <div class="row">
                <div class="text-center">
                    <h1 class="text-dark fw-bold mt-4"><span class="fa fa-book me-1"></span>Daftar Transaksi</h1>
                    <hr>
                </div>
            </div>
        </div>

        <!-- Daftar Transaksi -->
        <div class="container mb-4" id="animate">
        <div class="table-responsive">
        <?php
            if(!empty($_SESSION["id"]) AND $row["username"] == "admin" || $row["username"] == "superadmin"){
                echo "
                <table class='table table-bordered table-hover table-striped'>
                    <thead>
                        <tr>
                            <th scope='col'>No</th>
                            <th scope='col'>Id Barang</th>
                            <th scope='col'>Nama Barang</th>
                            <th scope='col'>Nama</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>No HP</th>
                            <th scope='col'>Alamat</th>
                            <th scope='col'>Ukuran</th>
                            <th scope='col'>Jumlah</th>
                            <th scope='col'>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                $pesanan = query('SELECT * FROM pesanan');
                if(isset($_GET['cari'])){
                    $pesanan = query("SELECT * FROM pesanan WHERE nama LIKE '%". $_GET['cari'] ."%'");
                }
                $urut = 1;
                foreach ($pesanan as $ps):
                // nama barang
                $nama_brg = mysqli_fetch_assoc(mysqli_query($conn, "select nm_barang from barang where id_barang=".$ps['id_barang'].""));
                // harga barang
                $harga_brg = mysqli_fetch_assoc(mysqli_query($conn, "select harga from barang where id_barang=".$ps['id_barang'].""));
                echo "
                    <tr>
                        <th scope='row' style='text-align:center'>".$urut++."</th>
                        <td style='text-align:center'>".$ps['id_barang']."</td>
                        <td>".$nama_brg["nm_barang"]."</td>
                        <td>".$ps['nama']."</td>
                        <td>".$ps['email']."</td>
                        <td>".$ps['hp']."</td>
                        <td>".$ps['alamat']."</td>
                        <td>".$ps['ukuran']."</td>
                        <td style='text-align:center'>".$ps['jumlah']."</td>
                        <td>".rupiah($ps['jumlah'] * $harga_brg["harga"])."</td>
                    </tr>
                ";
                endforeach;
                echo "
                    </tbody>
                </table>
                ";
            } else {
                echo "
                <center>
                    Anda harus masuk sebagai admin terlebih dahulu untuk mengakses halaman ini<br>
                    Username: admin, Password: admin
                </center>
                ";
            }
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

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>