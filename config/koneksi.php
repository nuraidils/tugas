<?php 
    $base_url = '/dashboard-project-2/public';
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_sekolah";

    $koneksi = mysqli_connect($host, $user, $pass, $db);
    if (!$koneksi) {
        echo "database gagal konek";
        die("koneksi gagal: " . mysqli_connect_error());
    }
?>