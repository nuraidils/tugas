<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - Data Siswa</title>

        <?php 
            $activePage = "dataSiswa";

            include_once __DIR__ . '/../../../config/koneksi.php';
            include __DIR__ . '/../../../components/link.html';
        ?>
    </head>
    <body>
        <?php
            include __DIR__ . '/../../../components/admin/navbar.php'; 
        ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="md:d-flex justify-content-between align-items-center">
                        <div class="md:mb-0 mb-5">
                            <h4>Data Siswa</h4>
                            <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
                        </div>
                        <div class="md:d-flex md:gap-4">
                            <button type="button" class="btn-outline theme-success md:mb-0 mb-3" data-bs-toggle="dialog" data-bs-target="#dialogTambahSiswa" data-bs-backdrop="static">
                                <span><i class="bi bi-plus-lg"></i></span>Tambah Data Siswa Dialog
                            </button>

                            <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogTambahSiswa">
                                <div class="dialog-header">
                                    <h1 class="dialog-title">Formulir Tambah Data Siswa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                </div>
                                <div class="dialog-body">
                                    <form id="tambahDataSiswa" action="../../../actions/admin/create/proses-tambah-siswa.php" method="post" enctype="multipart/form-data">
                                        <div class="form-field">
                                            <div class="row p-3">
                                                <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                    <label class="form-label" for="nisn">NISN</label>
                                                    <input class="form-control" type="text" id="nisn" name="nisn" inputmode="numeric" pattern="[0-9]{10}" oninput="formatBiasa(this)" maxlength="10" minlength="10" placeholder="(10 digit angka) Contoh: 0123456789" aria-label="Masukkan Nomor Induk Siswa Nasional (NISN)" required />
                                                </div>
                                                <div class="col-12 md:col-6">
                                                    <label class="form-label" for="nis">NIS</label>
                                                    <input class="form-control" type="text" id="nis" name="nis" inputmode="numeric" pattern="^[0-9]\.[0-9]{2}\.[0-9]{5}$" oninput="formatNIS(this)" placeholder="Contoh: 1.22.33333" aria-label="Masukkan Nomor Induk Sekolah (NIS)" required />
                                                </div>
                                            </div>
                                            <div class="row pb-3 px-3 align-items-center">
                                                <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                    <label class="form-label" for="nama_siswa">Nama Lengkap</label>
                                                    <input class="form-control" type="text" id="nama_siswa" name="nama_siswa" placeholder="Masukkan nama lengkap" aria-label="Masukkan Nama Lengkap Siswa" required />
                                                </div>
                                                <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                    <label class="form-label">Jenis Kelamin</label>
                                                    <div class="d-flex gap-5">
                                                        <div class="form-field">
                                                            <input class="radio" type="radio" value="L" name="jenis_kelamin" id="laki_laki" checked required />
                                                            <label for="laki-laki">Laki-Laki</label>
                                                        </div>
                                                        <div class="form-field">
                                                            <input class="radio" type="radio" value="P" name="jenis_kelamin" id="perempuan" />
                                                            <label for="perempuan">Perempuan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-3">
                                                    <label class="form-label" for="agama">Agama</label>
                                                    <select class="form-control" id="agama" name="agama" aria-label="Pilih Agama Siswa" required>
                                                        <option value="" selected disabled>--Pilih Agama--</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                                        <option value="Kristen Katolik">Kristen Katolik</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row pb-3 px-3">
                                                <div class="col-12 md:col-2 pb-3 md:pb-0">
                                                    <label for="kelas" class="form-label">Pilih Kelas</label>
                                                    <select class="form-control" id="kelas" name="kelas" aria-label="Pilih Kelas" required>
                                                        <option value="" selected disabled>--Pilih Kelas--</option>
                                                        <option value="XI RPL 1">XI RPL 1</option>
                                                        <option value="XI RPL 2">XI RPL 2</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 md:col-4 pb-3 md:pb-0">
                                                    <label class="form-label" for="no_telepon">Nomor Telepon</label>
                                                    <input class="form-control" type="text" id="no_telepon" name="no_telepon" inputmode="numeric" pattern="[0-9]*" minlength="11" maxlength="13" oninput="formatBiasa(this)" placeholder="Contoh: 081122334455" aria-label="Masukkan Nomor Telepon Siswa" required />
                                                </div>
                                                <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                    <label for="foto_siswa" class="form-label">Foto Siswa</label>
                                                    <input class="form-control" type="file" id="foto_siswa" name="foto_siswa" aria-label="Pilih Foto Siswa" accept="image/png, image/jpeg, image/jpg" />
                                                </div>
                                            </div>
                                            <div class="row pb-3 px-3">
                                                <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                    <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                                    <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir" aria-label="Masukkan Tempat Lahir Siswa" required />
                                                </div>
                                                <div class="col-12 md:col-6">
                                                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                                    <div class="form-control form-adorn">
                                                        <div class="form-adorn-icon">
                                                            <i class="bi bi-calendar-week"></i>
                                                        </div>
                                                        <input class="form-ghost" data-bs-toggle="datepicker" autocomplete="off" type="text" id="tanggal_lahir" name="tanggal_lahir" placeholder="Pilih tanggal lahir Siswa" aria-label="Masukkan Tanggal Lahir Siswa" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pb-3 px-3">
                                                <label for="alamat" class="form-label">Alamat Siswa</label>
                                                <textarea class="form-control" id="alamat" name="alamat" aria-label="Masukkan Data Alamat Siswa" placeholder="Masukkan alamat lengkap Siswa" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="dialog-footer">
                                    <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                    <button type="reset" form="tambahDataSiswa" class="btn-outline theme-danger">Reset</button>
                                    <button type="submit" name="tambah_siswa" form="tambahDataSiswa" class="btn-solid theme-primary">Simpan Data</button>
                                </div>
                            </dialog>

                            <a type="button" class="btn-outline theme-primary" href="tambah-data.php">
                                <span><i class="bi bi-plus-lg"></i></span>
                                Tambah Data Siswa
                            </a>
                        </div>
                    </div>

                    <hr />

                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <!-- <th>Foto</th> -->
                                    <th>NISN</th>
                                    <th class="text-start">Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>L/P</th>
                                    <th>Nomor Telepon</th>
                                    <th class="text-start">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $query = "SELECT * FROM data_siswa ORDER BY id ASC";
                                    $statement = mysqli_query($koneksi, $query);
                                    foreach ($statement as $row) :
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <!-- <td class="w-25"><img class="img-fluid" src="<?= !$row['foto_siswa'] ? '<p>foto tidak ada</p>' : '/dashboard-project-1-v6/assets/upload' . $row['foto_siswa']; ?>" alt=""></td> -->
                                        <td><?= $row['nisn'] ?></td>
                                        <td class="text-start"><?= $row['nama_siswa'] ?></td>
                                        <td><?= $row['kelas'] ?></td>
                                        <td><?= $row['jenis_kelamin'] ?></td>
                                        <td><?= $row['no_telepon'] ?></td>
                                        <td class="text-start">
                                            <!-- pemicu dialog detail siswa 2 -->
                                            <button type="button" class="theme-info btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailSiswa<?= $row['id']; ?>" data-bs-backdrop="static">
                                                <i class="bi bi-eye"></i>
                                                Detail
                                            </button>

                                            <!-- dialog detail siswa 2 -->
                                            <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailSiswa<?= $row['id']; ?>">
                                                <div class="dialog-header">
                                                    <h1 class="dialog-title">Detail Data <?= $row['nama_siswa']; ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                                </div>
                                                <div class="dialog-body">
                                                    <div class="row">
                                                        <div class="col-12 sm:col-4">
                                                            <img class="img-fluid rounded-2 sm:pb-0 pb-5" src="<?= !$row['foto_siswa'] ? '/dashboard-project-2/public/assets/img/profil-default.png' : '/dashboard-project-2/public/assets/uploads/siswa/' . $row['foto_siswa']; ?>" alt="Foto <?= $row['nama_siswa']; ?>" />
                                                        </div>
                                                        <div class="col-12 sm:col-8">
                                                            <div class="row">
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>NIS</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['nis']; ?></p>
                                                                </div>
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>NISN</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['nisn']; ?></p>
                                                                </div>
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>Nama Lengkap</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['nama_siswa'] ?></p>
                                                                </div>
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>Kelas</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['kelas']; ?></p>
                                                                </div>
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>Jenis Kelamin</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= ($row['jenis_kelamin'] == "L" ? 'Laki-Laki' : 'Perempuan') ?></p>
                                                                </div>
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>Agama</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['agama']; ?></p>
                                                                </div>
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>Tempat dan Tanggal Lahir</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['tempat_lahir'] . ', ' . ($tanggal_lahir_formatted = date('d/m/Y', strtotime($row['tanggal_lahir']))) ?></p>
                                                                </div>
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>Nomor Telepon</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['no_telepon']; ?></p>
                                                                </div>
                                                                <div class="col-12">
                                                                    <h4>Alamat</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['alamat']; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dialog-footer">
                                                    <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Keluar</button>
                                                </div>
                                            </dialog>

                                            <!-- pemicu dialog edit data siswa 2 -->
                                            <a href="edit-data.php?id=<?= $row['id']; ?>" class="theme-secondary btn-solid btn-styled btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </a>

                                            <a href="../../../actions/admin/delete/proses-hapus-siswa.php?id=<?= $row['id']; ?>" class="theme-danger btn-solid btn-styled btn-sm" onclick="return confirm('Yakin ingin menghapus data <?= $row['nama_siswa']; ?>?')">
                                                <i class="bi bi-trash3"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include __DIR__ . '/../../../components/script.html'; ?>
    </body>
</html>

<!-- TODO:BIKIN DIALOG JALAN SEMUANYA, HABIS ITU FOKUS KE GUEST -->
