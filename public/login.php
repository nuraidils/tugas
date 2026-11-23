<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login - Landing Page</title>

        <?php 
            include __DIR__ . '/../components/link.html'
        ?>
    </head>
    <body>
        <?php include __DIR__ . '/../components/user/navbar.html' ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h1>Login</h1>
                        <div class="container w-50 p-0">
                            <hr/>
                        </div>
                        
                        <div class="container w-50 text-start border rounded-5 shadow-sm px-4 my-5 py-2">
                            <form action="../actions/auth/proses-login.php" method="post" enctype="multipart/form-data">
                                <div class="form-field mb-5">
                                    <div class="row p-3">
                                        <div class="col-12 pb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input class="form-control" type="text" id="username" name="username" minlength="3" placeholder="Masukkan username Anda" aria-label="Masukkan username Anda" required />
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" minlength="8" placeholder="Masukkan password Anda" aria-label="Masukkan password Anda" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 text-center">
                                    <button type="submit" name="login" class="btn-solid theme-primary w-100">Login</button>
                                    <p class="mb-0 pt-1"><small>Belum punya akun? <span><a href="register.php" class="text-decoration-none">Register</a></span></small></p>
                                </div>
                            </form>
                        </div>
                        <a href="admin/index.php" class="btn btn-primary">Login Admin</a>
                        <a href="register.php" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include __DIR__ . '/../components/script.html' ?>
    </body>
</html>
