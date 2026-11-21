<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Data Guru</title>

        <?php 
            include __DIR__ . '/../../../components/link.html';
            include_once __DIR__ . '/../../../config/koneksi.php'; 

            $id = $_GET['id'];
            $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM data_guru WHERE id = $id"));
        ?>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Formulir Edit Data <?= $data['nama_guru'] ?></h4>
                        <a href="index.php" class="btn btn-primary">Kembali</a>
                    </div>

                    <hr />

                    <div class="container border rounded-3 shadow-sm px-4 my-5 py-2">
                        <!-- formulir edit data -->
                        <form action="../../../actions/admin/update/proses-update-guru.php" method="post" enctype="multipart/form-data">
                            <!-- input tersembunyi untuk ID & nama file foto lama -->
                            <input type="hidden" name="id" value="<?= $data['id']; ?>" />
                            <input type="hidden" name="foto_lama" value="<?= $data['foto_guru'] ?? ''; ?>" />

                            <div class="form-field">
                                <div class="row py-3 px-3">
                                    <div class="col-12 md:col-6 pb-3 md:pb-0">
                                        <label class="form-label" for="nip">NIP</label>
                                        <input class="form-control" type="text" id="nip" name="nip" value="<?= htmlspecialchars($data['nip']); ?>" inputmode="numeric" pattern="[0-9]*" maxlength="18" oninput="formatBiasa(this)" placeholder="(18 digit angka) Contoh: 199904062026121001" aria-label="Masukkan Nomor Induk Pegawai" required />
                                    </div>
                                    <div class="col-12 md:col-6">
                                        <label class="form-label" for="nama_guru">Nama Lengkap</label>
                                        <input class="form-control" type="text" id="nama_guru" name="nama_guru" value="<?= htmlspecialchars($data['nama_guru']); ?>" placeholder="Masukkan nama guru" aria-label="Masukkan Nama Lengkap Guru" required />
                                    </div>
                                </div>
                                <div class="row pb-3 px-3 align-items-center">
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
                                    <div class="col-12 md:col-5 pb-3 md:pb-0">
                                        <div class="form-field">
                                            <label for="email" class="form-label">Email</label>
                                            <label class="form-control form-adorn form-adorn-end">
                                                <div class="form-adorn-icon" aria-hidden="true">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                                <input type="email" class="form-ghost" id="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" placeholder="veteran@sekolah.com" aria-label="Masukkan email guru" required />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-4 md:w-100">
                                        <div class="form-field">
                                            <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                            <label class="form-control form-adorn">
                                                <span class="form-adorn-text" aria-hidden="true">+62</span>
                                                <input type="text" class="form-ghost" id="no_telepon" name="no_telepon" value="<?= htmlspecialchars($data['no_telepon']); ?>" inputmode="numeric" pattern="[0-9]*" minlength="10" maxlength="12" oninput="formatBiasa(this)" placeholder="83896427793" aria-label="Masukkan Nomor Telepon Guru" required />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-3 px-3">
                                    <label for="foto_guru" class="form-label">Upload Foto Baru (Opsional)</label>
                                    <input class="form-control" type="file" id="foto_guru" name="foto_guru" aria-label="Pilih Foto Guru" accept="image/png, image/jpeg, image/jpg" />
                                    <div class="form-text" style="font-size: 0.8rem; color: #6c757d">Biarkan kosong jika tidak ingin mengganti foto.</div>

                                    <?php if(!empty($data['foto_guru'])) : ?>
                                        <div class="mt-2">
                                            <small class="text-muted d-block mb-1">Foto saat ini:</small>
                                            <img src="<?= $base_url; ?>/assets/uploads/guru/<?= htmlspecialchars($data['foto_guru']) ?>" alt="Foto <?= htmlspecialchars($data['nama_guru']) ?>" class="img-thumbnail" style="max-height: 110px;" />
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="pb-3 px-3">
                                    <label for="alamat" class="form-label">Alamat Guru</label>
                                    <textarea class="form-control" id="alamat" name="alamat" aria-label="Masukkan Data Alamat Guru" rows="3" required><?= htmlspecialchars($data['alamat']); ?></textarea>
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
