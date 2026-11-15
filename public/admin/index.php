<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard Admin</title>

        <!-- CDN CSS BOOTSTRAP & BOOTSTRAP ICON -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous" />
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css" /> -->

        <!-- GOOGLE FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />

        <!-- CSS SENDIRI -->
        <link rel="stylesheet" href="../assets/css/style.css" />
    </head>
    <body>
        <?php
            $activePage = 'dashboard';

            include __DIR__ . '/../../components/admin/navbar.php'; 
            include_once __DIR__ . '/../../config/koneksi.php'; 
        ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h4>Dashboard Admin</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae, tempore dignissimos? Numquam autem, quae sapiente debitis, minima exercitationem repellendus nulla nihil provident eligendi harum asperiores. Perspiciatis earum saepe sint esse non natus. Quia pariatur quidem modi ut adipisci quasi optio.</p>
                </div>
            </div>
        </div>

        <?php include __DIR__ . '/../../components/script.html'; ?>

        
    </body>
</html>
