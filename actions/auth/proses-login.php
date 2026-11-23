<?php 
    require_once __DIR__ . '/../../config/koneksi.php';
    session_start();

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $_SESSION['role'] = $data['role'];
            $_SESSION['is_login'] = true;
            if($_SESSION['role'] == 'admin') {
                header('location: ../../public/admin/index.php');
                echo "<script>alert('Berhasil Login Sebagai Admin!')</script>";
            } else {
                echo "<script>alert('Berhasil Login Sebagai Guest!')</script>";
                header('location: ../../public/index.php');
            }
        } else {
            echo "<script>alert('Tidak Bisa Menemukan Akun!');
            window.location='../../public/login.php';</script>";
        }
    }
?>