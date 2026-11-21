<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Data Siswa</title>

        <?php 
            include __DIR__ . '/../../../components/link.html';
            include_once __DIR__ . '/../../../config/koneksi.php'; 

            $id = $_GET['id'];
            $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM data_siswa WHERE id = $id"));
            $tanggal_lahir = $data['tanggal_lahir'];
            
            $tanggal_lahir_formatted = date('d/m/Y', strtotime($tanggal_lahir));
        ?>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Formulir Edit Data <?= $data['nama_siswa'] ?></h4>
                        <a href="index.php" class="btn btn-primary">Kembali</a>
                    </div>

                    <hr />

                    <div class="container border rounded-3 shadow-sm px-4 my-5 py-2">
                        <!-- formulir edit data -->
                        <form action="../../../actions/admin/update/proses-update-siswa.php" method="post" enctype="multipart/form-data">
                            <!-- input tersembunyi untuk ID & nama file foto lama -->
                            <input type="hidden" name="id" value="<?= $data['id']; ?>" />
                            <input type="hidden" name="foto_lama" value="<?= $data['foto_siswa'] ?? ''; ?>" />

                            <div class="form-field">
                                <div class="row p-3">
                                    <div class="col-12 md:col-6 pb-3 md:pb-0">
                                        <label class="form-label" for="nisn">NISN</label>
                                        <input class="form-control" type="text" id="nisn" name="nisn" value="<?= htmlspecialchars($data['nisn']); ?>" inputmode="numeric" pattern="[0-9]*" oninput="formatBiasa(this)" maxlength="10" minlength="10" placeholder="(10 digit angka) Contoh: 01234567890" aria-label="Masukkan Nomor Induk Siswa Nasional (NISN)" required />
                                    </div>
                                    <div class="col-12 md:col-6">
                                        <label class="form-label" for="nis">NIS</label>
                                        <input class="form-control" type="text" id="nis" name="nis" value="<?= htmlspecialchars($data['nis']); ?>" inputmode="numeric" pattern="^[0-9]\.[0-9]{2}\.[0-9]{5}$" oninput="formatNIS(this)" placeholder="Contoh: 1.22.33333" aria-label="Masukkan Nomor Induk Sekolah (NIS)" required />
                                    </div>
                                </div>
                                <div class="row pb-3 px-3 align-items-center">
                                    <div class="col-12 md:col-6 pb-3 md:pb-0">
                                        <label class="form-label" for="nama_siswa">Nama Lengkap</label>
                                        <input class="form-control" type="text" id="nama_siswa" name="nama_siswa" value="<?= htmlspecialchars($data['nama_siswa']); ?>" placeholder="Masukkan nama lengkap" aria-label="Masukkan Nama Lengkap Siswa" required />
                                    </div>
                                    <div class="col-12 md:col-3 pb-3 md:pb-0">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <div class="d-flex gap-5">
                                            <div class="form-field">
                                                <input class="radio" type="radio" value="L" name="jenis_kelamin" id="laki_laki" <?= ($data['jenis_kelamin'] == 'L') ? 'checked' : ''; ?> required />
                                                <label for="laki-laki">Laki-Laki</label>
                                            </div>
                                            <div class="form-field">
                                                <input class="radio" type="radio" value="P" name="jenis_kelamin" id="perempuan" <?= ($data['jenis_kelamin'] == 'P') ? 'checked' : ''; ?> required />
                                                <label for="perempuan">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-3">
                                        <label class="form-label" for="agama">Agama</label>
                                        <select class="form-control" id="agama" name="agama" aria-label="Pilih Agama Siswa" required>
                                            <option value="" disabled>--Pilih Agama--</option>
                                            <option value="Islam" <?= ($data['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                                            <option value="Kristen Protestan" <?= ($data['agama'] == 'Kristen Protestan') ? 'selected' : ''; ?>>Kristen Protestan</option>
                                            <option value="Kristen Katolik" <?= ($data['agama'] == 'Kristen Katolik') ? 'selected' : ''; ?>>Kristen Katolik</option>
                                            <option value="Hindu" <?= ($data['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                                            <option value="Buddha" <?= ($data['agama'] == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
                                            <option value="Konghucu" <?= ($data['agama'] == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row pb-3 px-3">
                                    <div class="col-12 md:col-5 pb-3 md:pb-0">
                                        <label for="kelas" class="form-label">Pilih Kelas</label>
                                        <select class="form-control" id="kelas" name="kelas" aria-label="Pilih Kelas" required>
                                            <option value="" disabled>Pilih Kelas...</option>
                                            <option value="X RPL 1" <?= ($data['kelas'] == 'X RPL 1') ? 'selected' : ''; ?>>X RPL 1</option>
                                            <option value="X RPL 2" <?= ($data['kelas'] == 'X RPL 2') ? 'selected' : ''; ?>>X RPL 2</option>
                                            <option value="X RPL 3" <?= ($data['kelas'] == 'X RPL 3') ? 'selected' : ''; ?>>X RPL 3</option>
                                            <option value="XI RPL 1" <?= ($data['kelas'] == 'XI RPL 1') ? 'selected' : ''; ?>>XI RPL 1</option>
                                            <option value="XI RPL 2" <?= ($data['kelas'] == 'XI RPL 2') ? 'selected' : ''; ?>>XI RPL 2</option>
                                            <option value="XII RPL 1" <?= ($data['kelas'] == 'XII RPL 1') ? 'selected' : ''; ?>>XII RPL 1</option>
                                            <option value="XII RPL 2" <?= ($data['kelas'] == 'XII RPL 2') ? 'selected' : ''; ?>>XII RPL 2</option>
                                        </select>
                                    </div>
                                    <div class="col-12 md:col-7 pb-3 md:pb-0">
                                        <label class="form-label" for="no_telepon">Nomor Telepon</label>
                                        <input class="form-control" type="text" id="no_telepon" name="no_telepon" value="<?= htmlspecialchars($data['no_telepon']); ?>" inputmode="numeric" pattern="[0-9]*" minlength="11" maxlength="13" oninput="formatBiasa(this)" placeholder="Contoh: 081122334455" aria-label="Masukkan Nomor Telepon Siswa" required />
                                        <!-- ai generated -->
                                        <!-- <input class="form-control" type="text" id="no_telepon" name="no_telepon" inputmode="numeric" pattern="[0-9]*" minlength="12" maxlength="13" oninput="formatBiasa(this); validasiPanjangTelepon(this)" placeholder="Contoh: 081122334455" aria-label="Masukkan Nomor Telepon Siswa" aria-describedby="no_telepon_feedback" required />
                                        <div id="no_telepon_feedback" class="form-text" aria-live="polite"></div> -->
                                    </div>
                                    <div class="col-12 md:col-12 pb-3 md:pb-0">
                                        <label for="foto_siswa" class="form-label">Upload Foto Baru (Opsional)</label>
                                        <input class="form-control" type="file" id="foto_siswa" name="foto_siswa" aria-label="Pilih Foto Siswa" accept="image/png, image/jpeg, image/jpg" />
                                        <div class="form-text" style="font-size: 0.8rem; color: #6c757d">Biarkan kosong jika tidak ingin mengganti foto.</div>

                                        <?php if(!empty($data['foto_siswa'])) : ?>
                                            <div class="mt-2">
                                                <small class="text-muted d-block mb-1">Foto saat ini:</small>
                                                <img src="<?= $base_url; ?>/assets/uploads/siswa/<?= htmlspecialchars($data['foto_siswa']) ?>" alt="Foto <?= htmlspecialchars($data['nama_siswa']) ?>" class="img-thumbnail" style="max-height: 110px;" />
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row pb-3 px-3">
                                    <div class="col-12 md:col-6 pb-3 md:pb-0">
                                        <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                        <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" value="<?= htmlspecialchars($data['tempat_lahir']); ?>" placeholder="Masukkan tempat lahir" aria-label="Masukkan Tempat Lahir Siswa" required />
                                    </div>
                                    <div class="col-12 md:col-6">
                                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                        <div class="form-control form-adorn">
                                            <div class="form-adorn-icon">
                                                <i class="bi bi-calendar-week"></i>
                                            </div>
                                            <input class="form-ghost" data-bs-toggle="datepicker" autocomplete="off" type="text" id="tanggal_lahir" name="tanggal_lahir" value="<?= $tanggal_lahir_formatted; ?>" placeholder="Pilih tanggal lahir Siswa" aria-label="Masukkan Tanggal Lahir Siswa" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-3 px-3">
                                    <label for="alamat" class="form-label">Alamat Siswa</label>
                                    <textarea class="form-control" id="alamat" name="alamat" aria-label="Masukkan Data Alamat Siswa" placeholder="Masukkan alamat lengkap Siswa" rows="3" required><?= htmlspecialchars($data['alamat']); ?></textarea>
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
