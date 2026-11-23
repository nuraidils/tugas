<?php 
    require_once __DIR__ . '/../../../config/koneksi.php';

    if(isset($_POST['edit_guru'])) {
        $id = $_POST['id'];
        $nip  = $_POST['nip'];
        $nama_guru  = $_POST['nama_guru'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $email  = $_POST['email'];
        $no_telepon  = $_POST['no_telepon'];
        $alamat  = $_POST['alamat'];
    
        // proses untuk mengambil data foto
        $query_foto = mysqli_query($koneksi, "SELECT foto_guru FROM data_guru WHERE id = '$id'");
        // mengambil satu baris hasil query diatas lalu mengubahnya menjadi associative array
        // contoh outputnya
        // $data_foto = [
        //     'foto_guru' => 'guru123.jpg'
        // ];
        $data_foto = mysqli_fetch_assoc($query_foto);
    
        $foto_guru = $data_foto['foto_guru'];
        if (isset($_FILES['foto_guru']) && $_FILES['foto_guru']['name'] != "") {
            $nama_file = $_FILES['foto_guru']['name'];
            $tmp_file = $_FILES['foto_guru']['tmp_name'];
            $foto_guru = time() . "_" . $nama_file;
    
            // upload foto baru menuju ke folder public/assets/uploads/guru/
            move_uploaded_file($tmp_file, "../../../public/assets/uploads/guru/" . $foto_guru);
    
            // untuk menghpus foto lama
            if ($data_foto['foto_guru'] != "" && file_exists("../../../public/assets/uploads/guru/" . $data_foto['foto_guru'])) {
                unlink("../../../public/assets/uploads/guru/" . $data_foto['foto_guru']);
            }
        }
    
        $query = "UPDATE data_guru SET 
                    nip = '$nip', 
                    nama_guru = '$nama_guru', 
                    jenis_kelamin = '$jenis_kelamin',
                    email = '$email', 
                    no_telepon = '$no_telepon', 
                    alamat = '$alamat', 
                    foto_guru = '$foto_guru'
                  WHERE id = '$id'";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data Berhasil Diperbarui!');
            window.location='../../../public/admin/data-guru/';</script>";
        } else {
            echo "<script>alert('Gagal Menyimpan Data!');
            window.history.back();</script>";
        }
    }
?>