<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Data Kelas</title>

        <?php 
            include __DIR__ . '/../../../components/link.html';
            include_once __DIR__ . '/../../../config/koneksi.php'; 

            $id = $_GET['id'];
            $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM data_kelas WHERE id = $id"));
        ?>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Formulir Edit Data <?= $data['tingkat'] . ' ' . $data['nama_kelas']; ?></h4>
                        <a href="index.php" class="btn btn-primary">Kembali</a>
                    </div>

                    <hr />

                    <div class="container border rounded-3 shadow-sm px-4 my-5 py-2">
                        <!-- formulir edit data -->
                        <form action="../../../actions/admin/update/proses-update-kelas.php" method="post" enctype="multipart/form-data">
                            <!-- input tersembunyi untuk ID & nama file foto lama -->
                            <input type="hidden" name="id" value="<?= $data['id']; ?>" />
                            <input type="hidden" name="foto_lama" value="<?= $data['foto_kelas'] ?? ''; ?>" />

                            <div class="form-field">
                                <div class="row py-3 px-3">
                                    <div class="col-12 md:col-3 pb-3 md:pb-0">
                                        <label class="form-label" for="kode_kelas">Kode Kelas</label>
                                        <input class="form-control" type="text" id="kode_kelas" name="kode_kelas" value="<?= htmlspecialchars($data['kode_kelas']) ?>" maxlength="4" placeholder="Contoh: K001" aria-label="Masukkan Kode Kelas" required />
                                    </div>
                                    <div class="col-12 md:col-9">
                                        <label class="form-label" for="wali_kelas">Wali Kelas</label>
                                        <input class="form-control" type="text" id="wali_kelas" name="wali_kelas" value="<?= htmlspecialchars($data['wali_kelas']) ?>" maxlength="150" placeholder="Masukkan Wali Kelas" aria-label="Masukkan Wali Kelas" required />
                                    </div>
                                </div>
                                <div class="row pb-3 px-3 align-items-center">
                                    <div class="col-12 md:col-5 pb-3 md:pb-0">
                                        <label for="tingkat" class="form-label">Pilih Tingkat</label>
                                        <select class="form-control" id="tingkat" name="tingkat" aria-label="Pilih Tingkat" required>
                                            <option value="" disabled>--Pilih Tingkat--</option>
                                            <option value="X" <?= ($data['tingkat'] == "X") ? 'selected' : ''; ?>>X</option>
                                            <option value="XI" <?= ($data['tingkat'] == "XI") ? 'selected' : ''; ?>>XI</option>
                                            <option value="XII" <?= ($data['tingkat'] == "XII") ? 'selected' : ''; ?>>XII</option>
                                        </select>
                                    </div>
                                    <div class="col-12 md:col-7 pb-3 md:pb-0">
                                        <label class="form-label" for="nama_kelas">Nama Kelas</label>
                                        <input class="form-control" type="text" id="nama_kelas" name="nama_kelas" value="<?= htmlspecialchars($data['nama_kelas']) ?>" maxlength="10" placeholder="Masukkan Nama Kelas" aria-label="Masukkan Nama Kelas" required />
                                    </div>
                                    <div class="col-12 md:col-12">
                                        <label for="foto_kelas" class="form-label">Upload Foto Baru (Opsional)</label>
                                        <input class="form-control" type="file" id="foto_kelas" name="foto_kelas" aria-label="Pilih Foto Kelas" accept="image/png, image/jpeg, image/jpg" />
                                        <div class="form-text" style="font-size: 0.8rem; color: #6c757d">Biarkan kosong jika tidak ingin mengganti foto.</div>

                                        <?php if(!empty($data['foto_kelas'])) : ?>
                                            <div class="mt-2">
                                                <small class="text-muted d-block mb-1">Foto saat ini:</small>
                                                <img src="<?= $base_url; ?>/assets/uploads/kelas/<?= htmlspecialchars($data['foto_kelas']) ?>" alt="Foto <?= (htmlspecialchars($data['tingkat']) . ' ' .htmlspecialchars($data['nama_kelas'])) ?>" class="img-thumbnail" style="max-height: 110px;" />
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-3 py-3">
                                <a href="index.php" type="button" class="btn-solid theme-secondary">Batal</a>
                                <button type="reset" class="btn-outline theme-danger">Reset</button>
                                <button type="submit" class="btn-solid theme-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include __DIR__ . '/../../../components/script.html'; ?>
    </body>
</html>
