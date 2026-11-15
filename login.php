<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login - Landing Page</title>

        <!-- CDN CSS BOOTSTRAP & BOOTSTRAP ICON -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css" />

        <!-- GOOGLE FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />

        <!-- CSS SENDIRI -->
        <link rel="stylesheet" href="public/assets/css/style.css" />
    </head>
    <body>
        <?php include 'components/user/navbar.html' ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h1>Login Page</h1>
                        <a href="/dashboard-project-2/public/admin/index.php" class="btn btn-primary">Login Admin</a>
                        <a href="register.php" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'components/script.html' ?>
    </body>
</html>
