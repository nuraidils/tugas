<?php 
    require_once __DIR__ . '/../../../config/koneksi.php';

    if(isset($_POST['edit_kelas'])) {
        $id = $_POST['id'];
        $kode_kelas  = $_POST['kode_kelas'];
        $wali_kelas  = $_POST['wali_kelas'];
        $tingkat  = $_POST['tingkat'];
        $nama_kelas  = $_POST['nama_kelas'];
    
        // proses untuk mengambil data foto
        $query_foto = mysqli_query($koneksi, "SELECT foto_kelas FROM data_kelas WHERE id = '$id'");
        // mengambil satu baris hasil query diatas lalu mengubahnya menjadi associative array
        // contoh outputnya
        // $data_foto = [
        //     'foto_kelas' => 'kelas.jpg'
        // ];
        $data_foto = mysqli_fetch_assoc($query_foto);
    
        $foto_kelas = $data_foto['foto_kelas'];
        if (isset($_FILES['foto_kelas']) && $_FILES['foto_kelas']['name'] != "") {
            $nama_file = $_FILES['foto_kelas']['name'];
            $tmp_file = $_FILES['foto_kelas']['tmp_name'];
            $foto_kelas = time() . "_" . $nama_file;
    
            // upload foto baru menuju ke folder public/assets/uploads/kelas/
            move_uploaded_file($tmp_file, "../../../public/assets/uploads/kelas/" . $foto_kelas);
    
            // untuk menghpus foto lama
            if ($data_foto['foto_kelas'] != "" && file_exists("../../../public/assets/uploads/kelas/" . $data_foto['foto_kelas'])) {
                unlink("../../../public/assets/uploads/kelas/" . $data_foto['foto_kelas']);
            }
        }
    
        $query = "UPDATE data_kelas SET 
                    kode_kelas = '$kode_kelas', 
                    wali_kelas = '$wali_kelas', 
                    tingkat = '$tingkat',
                    nama_kelas = '$nama_kelas', 
                    foto_kelas = '$foto_kelas'
                  WHERE id = '$id'";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data Berhasil Diperbarui!');
            window.location='../../../public/admin/data-kelas/';</script>";
        } else {
            echo "<script>alert('Gagal Menyimpan Data!');
            window.history.back();</script>";
        }
    }
?>