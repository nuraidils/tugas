<?php 
    require_once __DIR__ . '/../../../config/koneksi.php';

    if(isset($_POST['tambah_siswa'])) {
        $nisn  = $_POST['nisn'];
        $nis  = $_POST['nis'];
        $nama_siswa  = $_POST['nama_siswa'];
        $kelas  = $_POST['kelas'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $tempat_lahir  = $_POST['tempat_lahir'];
        $tanggal_lahir_raw  = $_POST['tanggal_lahir'];
        $agama  = $_POST['agama'];
        $no_telepon  = $_POST['no_telepon'];
        $alamat  = $_POST['alamat'];
    
        // konversi format tanggal DD/MM/YYYY -> YYYY-MM-DD
        $tanggal_lahir = date('Y-m-d', strtotime(str_replace('/', '-', $tanggal_lahir_raw)));
    
        $foto_siswa = "";
        if (isset($_FILES['foto_siswa']) && $_FILES['foto_siswa']['name'] != "") {
            $nama_file = $_FILES['foto_siswa']['name'];
            $tmp_file = $_FILES['foto_siswa']['tmp_name'];
            $foto_siswa = time() . "_" . $nama_file;
    
            // path menuju ke folder public/assets/uploads/siswa/
            move_uploaded_file($tmp_file, "../../../public/assets/uploads/siswa/" . $foto_siswa);
        }
    
        $query = "INSERT INTO data_siswa (nisn, nis, nama_siswa, kelas, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, no_telepon, alamat, foto_siswa)
                  VALUES ('$nisn', '$nis', '$nama_siswa', '$kelas', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama', '$no_telepon', '$alamat', '$foto_siswa')";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data Berhasil Disimpan!');
            window.location='../../../public/admin/data-siswa/';</script>";
        } else {
            echo "<script>alert('Gagal Menyimpan Data!');
            window.history.back();</script>";
        }
    }
?>