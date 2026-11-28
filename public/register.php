<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Register - Landing Page</title>

        <?php 
            // melakukan pengecekan url parameter
            if (isset($_GET['error'])) {
                if ($_GET['error'] === "regist_failed") {
                    echo '<script>alert("Gagal mendaftarkan akun! Silahkan coba lagi")</script>';
                } else if ($_GET['error'] === "username_taken") {
                    echo '<script>alert("Username sudah digunakan! Silahkan gunakan username lain")</script>';
                }
            }
            include __DIR__ . '/../components/link.html'
        ?>
    </head>
    <body>
        <?php include __DIR__ . '/../components/user/navbar.html' ?>
        <div class="container mt-5">
            <div class="row">
                <div class="text-center">
                    <h1>Register</h1>
                        <div class="container w-50 p-0">
                            <hr/>
                        </div>
                        
                        <div class="container w-50 text-start border rounded-5 shadow-sm px-4 my-5 py-2">
                            <form action="../actions/auth/proses-register.php" method="post" enctype="multipart/form-data">
                                <div class="form-field mb-5">
                                    <div class="row p-3">
                                        <div class="col-12 pb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input class="form-control" type="text" id="username" name="username" minlength="3" placeholder="Masukkan username Anda" aria-label="Masukkan username Anda" required />
                                        </div>
                                        <div class="col-12 pb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" minlength="8" placeholder="Masukkan password Anda" aria-label="Masukkan password Anda" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="role" class="form-label">Pilih Role</label>
                                            <select class="form-control" id="role" name="role" aria-label="Pilih role" required>
                                                <option value="" selected disabled>--Pilih Role--</option>
                                                <option value="admin">Admin</option>
                                                <option value="guru">Guru</option>
                                                <option value="siswa">Siswa</option>
                                                <option value="guest">Guest</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 text-center">
                                    <button type="submit" name="register" class="btn-solid theme-primary w-100">Register</button>
                                    <p class="mb-0 pt-3"><small>Sudah punya akun? <span><a href="login.php" class="text-decoration-none">Login</a></span></small></p>
                                </div>
                            </form>
                        </div>
                    <!-- <a href="login.php" class="btn btn-primary">Login</a> -->
                </div>
            </div>
        </div>
        <?php include __DIR__ . '/../components/script.html' ?>
    </body>
</html>
