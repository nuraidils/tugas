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
                        <h1>Login Page</h1>
                        <a href="admin/index.php" class="btn btn-primary">Login Admin</a>
                        <a href="register.php" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include __DIR__ . '/../components/script.html' ?>
    </body>
</html>
