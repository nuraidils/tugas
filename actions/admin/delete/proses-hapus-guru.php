<?php 
    require_once __DIR__ . '/../../../config/koneksi.php';

    $id = $_GET['id'];

    // ambil nama foto dari db terlebih dahulu
    $query_get_foto = "SELECT foto_guru FROM data_guru WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query_get_foto);
    // mengubahnya menjadi associative array
    // contoh outputnya
    // $data_foto = [
    //     'foto_guru' => 'guru123.jpg'
    // ];
    $data = mysqli_fetch_assoc($result);
    $foto = $data['foto_guru'];

    // menghapus file foto dari server jika ada
    if ($foto != "") {
        $path = "../../../public/assets/uploads/guru/" . $foto;
        if (file_exists($path)) {
            unlink($path);
        }
    }

    // hapus data dari db
    $query = "DELETE FROM data_guru WHERE id = $id";

    if(mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data Berhasil Dihapus!');
        window.location='../../../public/admin/data-guru/';</script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data!');
        window.history.back();</script>";
    }
?>