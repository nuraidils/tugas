<?php 
    require_once __DIR__ . '/../../config/koneksi.php';
    session_start();

    if(isset($_POST['register'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $role = $_POST['role'];

        // melakukan hash password (bawaan algoritmanya adalah bcrypt)
        $pw_hash = password_hash($password, PASSWORD_DEFAULT);

        // mempersiapkan query yang memasukkan data
        $query = "INSERT INTO users (username, password, role)
                  VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'sss', $username, $pw_hash, $role);

        // menjalakan query lewat blok try catch
        try {
            mysqli_stmt_execute($stmt); // jalankan query
            mysqli_stmt_close($stmt);

            // arahkan ke login 
            header('Location: ../../public/login.php?success=registered');
            exit;
        } catch (mysqli_sql_exception $e) {
            mysqli_stmt_close($stmt);

            // jika mendapat error code 1062, artinya username sudah digunakan
            if ($e->getCode() === 1062) {
                header('Location: ../../public/register.php?error=username_taken');
                exit;
            }

            header('Location: ../../public/register.php?error=regist_failed');
            exit;
        }
    }
?>