<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard Admin</title>

        <?php 
            session_start();

            if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
                header('Location: ../login.php');
                exit;
            }

            if ($_SESSION['role'] !== 'guru') {
                header('Location: ../index.php');
                exit;
            }

            $activePage = 'dashboard';

            include_once __DIR__ . '/../../config/koneksi.php'; 
            include __DIR__ . '/../../components/link.html';
        ?>
    </head>
    <body>
        <?php
            include __DIR__ . '/../../components/admin/navbar.php'; 
        ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h4>Dashboard Guru</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae, tempore dignissimos? Numquam autem, quae sapiente debitis, minima exercitationem repellendus nulla nihil provident eligendi harum asperiores. Perspiciatis earum saepe sint esse non natus. Quia pariatur quidem modi ut adipisci quasi optio.</p>
                </div>
            </div>
        </div>

        <?php include __DIR__ . '/../../components/script.html'; ?>
    </body>
</html>
