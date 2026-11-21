<?php 
    require_once __DIR__ . '/../../../config/koneksi.php';

    $nip = $_POST['nip'];
    $nama_guru = $_POST['nama_guru'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $no_telepon = '0' . $_POST['no_telepon'];
    $alamat = $_POST['alamat'];

    $foto_guru = "";
    if (isset($_FILES['foto_guru']) && $_FILES['foto_guru']['name'] != "") {
        $nama_file = $_FILES['foto_guru']['name'];
        $tmp_file = $_FILES['foto_guru']['tmp_name'];
        $foto_guru = time() . "_" . $nama_file;

        // path menuju ke folder public/assets/uploads/guru/
        move_uploaded_file($tmp_file, "../../../public/assets/uploads/guru/" . $foto_guru);
    }

    $query = "INSERT INTO data_guru (nip, nama_guru, jenis_kelamin, email, no_telepon, alamat, foto_guru)
              VALUES ('$nip', '$nama_guru', '$jenis_kelamin', '$email', '$no_telepon', '$alamat', '$foto_guru')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data Berhasil Disimpan!');
        window.location='../../../public/admin/data-guru/';</script>";
    } else {
        echo "<script>alert('Gagal Menyimpan Data!');
        window.history.back();</script>";
    }
?>