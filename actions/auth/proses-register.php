<?php 
    require_once __DIR__ . '/../../config/koneksi.php';

    if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // $hash_pw = hash("sha256", $password);
        $role = $_POST['role'];

        $query = "INSERT INTO users (username, password, role)
                  VALUES ('$username', '$password', '$role')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Akun Berhasil Dibuat! Silahkan Login');
            window.location='../../public/login.php';</script>";
        } else {
            echo "<script>alert('Gagal Membuat Akun!');
            window.history.back();</script>";
        }
    }
?>