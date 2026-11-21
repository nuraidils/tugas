<?php 
    require_once __DIR__ . '/../../../config/koneksi.php';

    $id = $_POST['id'];
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


    // proses untuk mengambil data foto
    $query_foto = mysqli_query($koneksi, "SELECT foto_siswa FROM data_siswa WHERE id = '$id'");
    // mengambil satu baris hasil query diatas lalu mengubahnya menjadi associative array
    // contoh outputnya
    // $data_foto = [
    //     'foto_siswa' => 'siswa123.jpg'
    // ];
    $data_foto = mysqli_fetch_assoc($query_foto);

    $foto_siswa = $data_foto['foto_siswa'];
    if (isset($_FILES['foto_siswa']) && $_FILES['foto_siswa']['name'] != "") {
        $nama_file = $_FILES['foto_siswa']['name'];
        $tmp_file = $_FILES['foto_siswa']['tmp_name'];
        $foto_siswa = time() . "_" . $nama_file;

        // upload foto baru menuju ke folder public/assets/uploads/siswa/
        move_uploaded_file($tmp_file, "../../../public/assets/uploads/siswa/" . $foto_siswa);

        // untuk menghpus foto lama
        if ($data_foto['foto_siswa'] != "" && file_exists("../../../public/assets/uploads/siswa/" . $data_foto['foto_siswa'])) {
            unlink("../../../public/assets/uploads/siswa/" . $data_foto['foto_siswa']);
        }
    }

    $query = "UPDATE data_siswa SET 
                nisn = '$nisn', 
                nis = '$nis', 
                nama_siswa = '$nama_siswa', 
                kelas = '$kelas', 
                jenis_kelamin = '$jenis_kelamin', 
                tempat_lahir = '$tempat_lahir', 
                tanggal_lahir = '$tanggal_lahir', 
                agama = '$agama', 
                no_telepon = '$no_telepon', 
                alamat = '$alamat', 
                foto_siswa = '$foto_siswa'
              WHERE id = '$id'";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data Berhasil Diperbarui!');
        window.location='../../../public/admin/data-siswa/';</script>";
    } else {
        echo "<script>alert('Gagal Menyimpan Data!');
        window.history.back();</script>";
    }
?>