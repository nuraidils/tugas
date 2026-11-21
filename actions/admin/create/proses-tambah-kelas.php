<?php 
    require_once __DIR__ . '/../../../config/koneksi.php';

    $kode_kelas = $_POST['kode_kelas'];
    $wali_kelas = $_POST['wali_kelas'];
    $tingkat = $_POST['tingkat'];
    $nama_kelas = $_POST['nama_kelas'];

    $foto_kelas = "";
    if (isset($_FILES['foto_kelas']) && $_FILES['foto_kelas']['name'] != "") {
        $nama_file = $_FILES['foto_kelas']['name'];
        $tmp_file = $_FILES['foto_kelas']['tmp_name'];
        $foto_kelas = time() . "_" . $nama_file;

        // path menuju ke folder public/assets/uploads/kelas/
        move_uploaded_file($tmp_file, "../../../public/assets/uploads/kelas/" . $foto_kelas);
    }

    $query = "INSERT INTO data_kelas (kode_kelas, wali_kelas, tingkat, nama_kelas, foto_kelas)
              VALUES ('$kode_kelas', '$wali_kelas', '$tingkat', '$nama_kelas', '$foto_kelas')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data Berhasil Disimpan!');
        window.location='../../../public/admin/data-kelas/';</script>";
    } else {
        echo "<script>alert('Gagal Menyimpan Data!');
        window.history.back();</script>";
    }
?>