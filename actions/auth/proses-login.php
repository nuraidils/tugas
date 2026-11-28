<?php 
    require_once __DIR__ . '/../../config/koneksi.php';
    session_start();

    if(isset($_POST['login'])) {
        // melakukan trim untuk menghilangkan spasi di awal dan akhir
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // // melakukan hash password (bawaan algoritmanya adalah bcrypt)
        // $pw_hash = password_hash($password, PASSWORD_DEFAULT);

        // mempersiapkan query yang mencari berdasarkan username
        $query = "SELECT id, username, password, role FROM users WHERE username = ?";
        $stmt = mysqli_prepare($koneksi, $query); 
        mysqli_stmt_bind_param($stmt, "s", $username); // untuk mengikat nilai php ke placeholder '?'
        mysqli_stmt_execute($stmt); // menjalankan query yang telah dipersiapkan

        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result);

        // memeriksa data ditemukan apa tidak dan ngecek pw
        if ($data && password_verify($password, $data['password'])) {
            // mengganti id session dan menghapus yang lama
            session_regenerate_id(true);

            // menyimpan identitas pengguna
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['is_login'] = true;

            // pengecekan role dan mengarahkan ke halaman yang sesuai
            switch ($data['role']) {
                case 'admin':
                    header('Location: ../../public/admin/index.php');
                    exit;

                case 'guru':
                    header('Location: ../../public/guru/index.php');
                    exit;

                case 'guest':
                    header('Location: ../../public/index.php');
                    exit;

                default:
                    // jika role tidak diketahui 
                    $_SESSION = [];
                    session_destroy();

                    header('Location: ../../public/index.php');
                    exit;
            }
        } else {
            // jika username atau pw salah
            header('Location: ../../public/login.php?error=invalid_credentials');
            exit;
        }

        mysqli_stmt_close($stmt);
    }
?>