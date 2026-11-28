<?php
    if (isset($_POST['logout'])) {
        session_start(); // memulai session
        $_SESSION = []; // menghapus seluruh data session
        
        // menghapus cookie session dari browser
        if (ini_get('session.use_cookies')) { // mengecek apakah konfigurasi PHP menggunakan cookie untuk mengelola session
            $params = session_get_cookie_params(); // mengambil konfigurasi cookie yg sedang digunakan dan memasukkannya ke variable params

            setcookie(
                session_name(), // mendapatkan nama session
                '',
                time() - 42000, // memberikan waktu di masa lalu agar cookie terhapus
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        session_destroy(); // menghapus session
        header('Location: ../../public/index.php');
        exit;
    }
?>
