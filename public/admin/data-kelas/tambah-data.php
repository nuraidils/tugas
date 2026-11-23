<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tambah Data Kelas</title>

        <?php 
            $activePage = "tambahDataKelas";

            include_once __DIR__ . '/../../../config/koneksi.php'; 
            include __DIR__ . '/../../../components/link.html'
        ?>
    </head>
    <body>
        <?php 
            include __DIR__ . '/../../../components/admin/navbar.php'; 
        ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Formulir Tambah Data Kelas</h4>
                        <a href="index.php" class="btn btn-primary">Kembali</a>
                    </div>

                    <hr />

                    <div class="container border rounded-3 shadow-sm px-4 my-5 py-2">
                        <!-- formulir tambah data -->
                        <form action="../../../actions/admin/create/proses-tambah-kelas.php" method="post" enctype="multipart/form-data">
                            <div class="form-field">
                                <div class="row py-3 px-3">
                                    <div class="col-12 md:col-3 pb-3 md:pb-0">
                                        <label class="form-label" for="kode_kelas">Kode Kelas</label>
                                        <input class="form-control" type="text" id="kode_kelas" name="kode_kelas" maxlength="4" placeholder="Contoh: K001" aria-label="Masukkan Kode Kelas" required />
                                    </div>
                                    <div class="col-12 md:col-9">
                                        <label for="wali_kelas" class="form-label">Wali Kelas</label>
                                        <select class="form-control" id="wali_kelas" name="wali_kelas" aria-label="Pilih Wali Kelas" required>
                                            <option value="" selected disabled>--Pilih Wali Kelas--</option>
                                            <?php
                                                $query = "SELECT nama_guru FROM data_guru ORDER BY nama_guru ASC";
                                                $statement = mysqli_query($koneksi, $query);

                                                if ($statement) :
                                                    while ($option = mysqli_fetch_assoc($statement)) :
                                            ?>
                                                <option value="<?= htmlspecialchars($option['nama_guru']) ?>">
                                                    <?= htmlspecialchars($option['nama_guru']) ?>
                                                </option>
                                            <?php
                                                    endwhile;
                                                endif;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row pb-3 px-3 align-items-center">
                                    <div class="col-12 md:col-3 pb-3 md:pb-0">
                                        <label for="tingkat" class="form-label">Pilih Tingkat</label>
                                        <select class="form-control" id="tingkat" name="tingkat" aria-label="Pilih Tingkat" required>
                                            <option value="" selected disabled>--Pilih Tingkat--</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                    </div>
                                    <div class="col-12 md:col-4 pb-3 md:pb-0">
                                        <label class="form-label" for="nama_kelas">Nama Kelas</label>
                                        <input class="form-control" type="text" id="nama_kelas" name="nama_kelas" maxlength="10" placeholder="Masukkan Nama Kelas" aria-label="Masukkan Nama Kelas" required />
                                    </div>
                                    <div class="col-12 md:col-5">
                                        <label for="foto_kelas" class="form-label">Foto Kelas</label>
                                        <input class="form-control" type="file" id="foto_kelas" name="foto_kelas" aria-label="Pilih Foto Kelas" accept="image/png, image/jpeg, image/jpg" />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-3 py-3">
                                <a href="index.php" type="button" class="btn-solid theme-secondary">Batal</a>
                                <button type="reset" class="btn-outline theme-danger">Reset</button>
                                <button type="submit" name="tambah_kelas" class="btn-solid theme-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include __DIR__ . '/../../../components/script.html'; ?>
    </body>
</html>
