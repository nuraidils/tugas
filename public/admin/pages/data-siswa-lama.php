<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - Data Siswa</title>

        <!-- CDN CSS BOOTSTRAP & BOOTSTRAP ICON -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css" />

        <!-- GOOGLE FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />

        <!-- CSS SENDIRI -->
        <link rel="stylesheet" href="../../assets/css/style.css" />
    </head>
    <body>
        <?php include __DIR__ . '/../../../components/admin/navbar.php'; include_once __DIR__ . '/../../../config/koneksi.php'; ?>

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
                                    <form id="tambahDataSiswa" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-field">
                                            <div class="row p-3">
                                                <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                    <label class="form-label" for="nisn">NISN</label>
                                                    <input class="form-control" type="text" id="nisn" name="nisn" inputmode="numeric" pattern="[0-9]*" oninput="formatBiasa(this)" maxlength="10" minlength="10" placeholder="(10 digit angka) Contoh: 01234567890" aria-label="Masukkan Nomor Induk Siswa Nasional (NISN)" required />
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
                                                    <input class="form-control" type="file" id="foto_siswa" name="foto_siswa" aria-label="Pilih Foto Siswa" accept="image/png, image/jpeg, image/jpg" required />
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
                                    <button type="submit" form="tambahDataSiswa" class="btn-solid theme-primary">Simpan Data</button>
                                </div>
                            </dialog>

                            <a type="button" class="btn-outline theme-primary" href="tambah-data-siswa.php">
                                <span><i class="bi bi-plus-lg"></i></span>
                                Tambah Data Siswa
                            </a>
                        </div>
                    </div>

                    <hr />

                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NISN</th>
                                    <th class="text-start">Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>L/P</th>
                                    <th>Nomor Telepon</th>
                                    <th class="text-start">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>0012345601</td>
                                    <td class="text-start">Robert Saepuding</td>
                                    <td>XI RPL 1</td>
                                    <td>L</td>
                                    <td>081234567890</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail siswa 1 -->
                                        <button type="button" class="theme-info btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailSiswa1" data-bs-backdrop="static">Detail</button>

                                        <!-- dialog detail siswa 1 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailSiswa1">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Siswa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <div class="row">
                                                    <div class="col-12 sm:col-4">
                                                        <img class="img-fluid sm:pb-0 pb-5" src="/assets/img/meme.png" alt="Profile" />
                                                    </div>
                                                    <div class="col-12 sm:col-8">
                                                        <div class="row">
                                                            <div class="sm:col-6 col-12">
                                                                <h4>NIS</h4>
                                                                <p class="bg-secondary p-4">1.22.33333</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>NISN</h4>
                                                                <p class="bg-secondary p-4">0012345601</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Lengkap</h4>
                                                                <p class="bg-secondary p-4">Robert Saepuding</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Kelas</h4>
                                                                <p class="bg-secondary p-4">XI RPL 1</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Jenis Kelamin</h4>
                                                                <p class="bg-secondary p-4">Laki - Laki</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Agama</h4>
                                                                <p class="bg-secondary p-4">Islam</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tempat Lahir</h4>
                                                                <p class="bg-secondary p-4">Dumpit</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tanggal Lahir</h4>
                                                                <p class="bg-secondary p-4">6 April 2010</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nomor Telepon</h4>
                                                                <p class="bg-secondary p-4">081234567890</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Alamat</h4>
                                                                <p class="bg-secondary p-4">Jl. Diponegoro 2, Blok L3 No. 24</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Keluar</button>
                                            </div>
                                        </dialog>

                                        <!-- pemicu dialog edit data siswa 1 -->
                                        <button type="button" class="theme-secondary btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogEditSiswa1" data-bs-backdrop="static">Edit</button>

                                        <!-- dialog edit data siswa 1 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditSiswa1">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Siswa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataSiswa1" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row p-3">
                                                            <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                                <label class="form-label" for="nisn">NISN</label>
                                                                <input class="form-control" type="text" id="nisn" name="nisn" inputmode="numeric" pattern="[0-9]*" oninput="formatBiasa(this)" maxlength="10" minlength="10" placeholder="(10 digit angka) Contoh: 01234567890" aria-label="Masukkan Nomor Induk Siswa Nasional (NISN)" required />
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
                                                                <input class="form-control" type="file" id="foto_siswa" name="foto_siswa" aria-label="Pilih Foto Siswa" accept="image/png, image/jpeg, image/jpg" required />
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
                                                <button type="reset" form="editDataSiswa1" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataSiswa1" class="btn-solid theme-primary">Simpan Data</button>
                                            </div>
                                        </dialog>

                                        <button type="button" class="theme-danger btn-solid btn-styled btn-sm">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>0012345622</td>
                                    <td class="text-start">Roben Saepuding</td>
                                    <td>XI RPL 1</td>
                                    <td>L</td>
                                    <td>081234567822</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail siswa 2 -->
                                        <button type="button" class="theme-info btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailSiswa2" data-bs-backdrop="static">
                                            <i class="bi bi-eye"></i>
                                            Detail
                                        </button>

                                        <!-- dialog detail siswa 2 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailSiswa2">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Siswa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <div class="row">
                                                    <div class="col-12 sm:col-4">
                                                        <img class="img-fluid sm:pb-0 pb-5" src="/assets/img/meme.png" alt="Profile" />
                                                    </div>
                                                    <div class="col-12 sm:col-8">
                                                        <div class="row">
                                                            <div class="sm:col-6 col-12">
                                                                <h4>NIS</h4>
                                                                <p class="bg-secondary p-4">1.22.11111</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>NISN</h4>
                                                                <p class="bg-secondary p-4">0012345622</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Lengkap</h4>
                                                                <p class="bg-secondary p-4">Roben Saepuding</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Kelas</h4>
                                                                <p class="bg-secondary p-4">XI RPL 1</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Jenis Kelamin</h4>
                                                                <p class="bg-secondary p-4">Laki - Laki</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Agama</h4>
                                                                <p class="bg-secondary p-4">Kristen Katolik</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tempat Lahir</h4>
                                                                <p class="bg-secondary p-4">Purati</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tanggal Lahir</h4>
                                                                <p class="bg-secondary p-4">21 Maret 2010</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nomor Telepon</h4>
                                                                <p class="bg-secondary p-4">081234567822</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Alamat</h4>
                                                                <p class="bg-secondary p-4">Jl. Diponegoro 2, Blok L3 No. 42</p>
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
                                        <button type="button" class="theme-secondary btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogEditSiswa2" data-bs-backdrop="static">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </button>

                                        <!-- dialog edit data siswa 2 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditSiswa2">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Siswa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataSiswa2" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row p-3">
                                                            <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                                <label class="form-label" for="nisn">NISN</label>
                                                                <input class="form-control" type="text" id="nisn" name="nisn" inputmode="numeric" pattern="[0-9]*" oninput="formatBiasa(this)" maxlength="10" minlength="10" placeholder="(10 digit angka) Contoh: 01234567890" aria-label="Masukkan Nomor Induk Siswa Nasional (NISN)" required />
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
                                                                <input class="form-control" type="file" id="foto_siswa" name="foto_siswa" aria-label="Pilih Foto Siswa" accept="image/png, image/jpeg, image/jpg" required />
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
                                                <button type="reset" form="editDataSiswa2" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataSiswa2" class="btn-solid theme-primary">Simpan Data</button>
                                            </div>
                                        </dialog>

                                        <button type="button" class="theme-danger btn-solid btn-styled btn-sm">
                                            <i class="bi bi-trash3"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>0012345602</td>
                                    <td class="text-start">P. Amayang</td>
                                    <td>XI RPL 1</td>
                                    <td>L</td>
                                    <td>081234567891</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail siswa 3 -->
                                        <button type="button" class="theme-info btn-outline btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailSiswa3" data-bs-backdrop="static">
                                            <i class="bi bi-eye"></i>
                                            Detail
                                        </button>

                                        <!-- dialog detail siswa 3 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailSiswa3">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Siswa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <div class="row">
                                                    <div class="col-12 sm:col-4">
                                                        <img class="img-fluid sm:pb-0 pb-5" src="/assets/img/meme.png" alt="Profile" />
                                                    </div>
                                                    <div class="col-12 sm:col-8">
                                                        <div class="row">
                                                            <div class="sm:col-6 col-12">
                                                                <h4>NIS</h4>
                                                                <p class="bg-secondary p-4">1.22.22222</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>NISN</h4>
                                                                <p class="bg-secondary p-4">0012345602</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Lengkap</h4>
                                                                <p class="bg-secondary p-4">P. Amayang</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Kelas</h4>
                                                                <p class="bg-secondary p-4">XI RPL 1</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Jenis Kelamin</h4>
                                                                <p class="bg-secondary p-4">Laki - Laki</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Agama</h4>
                                                                <p class="bg-secondary p-4">Kristen Protestan</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tempat Lahir</h4>
                                                                <p class="bg-secondary p-4">Kp. Doyong</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tanggal Lahir</h4>
                                                                <p class="bg-secondary p-4">21 Juli 2010</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nomor Telepon</h4>
                                                                <p class="bg-secondary p-4">081234567891</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Alamat</h4>
                                                                <p class="bg-secondary p-4">Jl. Diponegoro 2, Blok L3 No. 20</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Keluar</button>
                                            </div>
                                        </dialog>

                                        <!-- pemicu dialog edit siswa 3 -->
                                        <button type="button" class="theme-secondary btn-outline btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogEditSiswa3" data-bs-backdrop="static">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </button>

                                        <!-- dialog edit siswa 3 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditSiswa3">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Siswa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataSiswa3" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row p-3">
                                                            <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                                <label class="form-label" for="nisn">NISN</label>
                                                                <input class="form-control" type="text" id="nisn" name="nisn" inputmode="numeric" pattern="[0-9]*" oninput="formatBiasa(this)" maxlength="10" minlength="10" placeholder="(10 digit angka) Contoh: 01234567890" aria-label="Masukkan Nomor Induk Siswa Nasional (NISN)" required />
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
                                                                <input class="form-control" type="file" id="foto_siswa" name="foto_siswa" aria-label="Pilih Foto Siswa" accept="image/png, image/jpeg, image/jpg" required />
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
                                                <button type="reset" form="editDataSiswa3" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataSiswa3" class="btn-solid theme-primary">Simpan Data</button>
                                            </div>
                                        </dialog>

                                        <button type="button" class="theme-danger btn-outline btn-sm">
                                            <i class="bi bi-trash3"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>0012345603</td>
                                    <td class="text-start">Muhammad Ronaldo</td>
                                    <td>XI RPL 1</td>
                                    <td>L</td>
                                    <td>081234567892</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail siswa 4 & tooltip -->
                                        <span data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Detail">
                                            <button type="button" class="btn-icon theme-info btn-solid btn-sm" aria-label="Icon only" data-bs-toggle="dialog" data-bs-target="#dialogDetailSiswa4" data-bs-backdrop="static">
                                                <i class="bi bi-eye fg-white"></i>
                                            </button>
                                        </span>

                                        <!-- dialog detail siswa 4 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailSiswa4">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Siswa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <div class="row">
                                                    <div class="col-12 sm:col-4">
                                                        <img class="img-fluid sm:pb-0 pb-5" src="/assets/img/meme.png" alt="Profile" />
                                                    </div>
                                                    <div class="col-12 sm:col-8">
                                                        <div class="row">
                                                            <div class="sm:col-6 col-12">
                                                                <h4>NIS</h4>
                                                                <p class="bg-secondary p-4">1.22.44444</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>NISN</h4>
                                                                <p class="bg-secondary p-4">0012345603</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Lengkap</h4>
                                                                <p class="bg-secondary p-4">Muhammad Ronaldo</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Kelas</h4>
                                                                <p class="bg-secondary p-4">XI RPL 1</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Jenis Kelamin</h4>
                                                                <p class="bg-secondary p-4">Laki - Laki</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Agama</h4>
                                                                <p class="bg-secondary p-4">Hindu</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tempat Lahir</h4>
                                                                <p class="bg-secondary p-4">Kp. Keroncong</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tanggal Lahir</h4>
                                                                <p class="bg-secondary p-4">30 Februari 2010</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nomor Telepon</h4>
                                                                <p class="bg-secondary p-4">081234567892</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Alamat</h4>
                                                                <p class="bg-secondary p-4">Jl. Kenangan 2, Blok L3 No. 20</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Keluar</button>
                                            </div>
                                        </dialog>

                                        <!-- pemicu dialog detail siswa 4 & tooltip -->
                                        <span data-bs-toggle="tooltip" data-bs-title="Edit">
                                            <button type="button" class="btn-icon theme-secondary btn-solid btn-sm" aria-label="Icon only" data-bs-toggle="dialog" data-bs-target="#dialogEditSiswa3" data-bs-backdrop="static">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </span>

                                        <!-- dialog edit siswa 4 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditSiswa4">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Siswa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataSiswa4" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row p-3">
                                                            <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                                <label class="form-label" for="nisn">NISN</label>
                                                                <input class="form-control" type="text" id="nisn" name="nisn" inputmode="numeric" pattern="[0-9]*" oninput="formatBiasa(this)" maxlength="10" minlength="10" placeholder="(10 digit angka) Contoh: 01234567890" aria-label="Masukkan Nomor Induk Siswa Nasional (NISN)" required />
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
                                                                <input class="form-control" type="file" id="foto_siswa" name="foto_siswa" aria-label="Pilih Foto Siswa" accept="image/png, image/jpeg, image/jpg" required />
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
                                                <button type="reset" form="editDataSiswa4" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataSiswa4" class="btn-solid theme-primary">Simpan Data</button>
                                            </div>
                                        </dialog>

                                        <button type="button" class="btn-icon theme-danger btn-solid btn-sm" aria-label="Icon only" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Delete">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>0012345604</td>
                                    <td class="text-start">Lionel Milhan</td>
                                    <td>XI RPL 1</td>
                                    <td>L</td>
                                    <td>081234567893</td>
                                    <td class="text-start">
                                        <button class="btn-solid theme-secondary btn-sm" type="button" data-bs-toggle="menu" aria-expanded="false">
                                            Opsi<span><i class="bi bi-caret-down-fill"></i></span>
                                        </button>
                                        <div class="menu">
                                            <a class="menu-item theme-info" href="#"
                                                ><span><i class="bi bi-eye"></i></span>Detail</a
                                            >
                                            <a class="menu-item" href="#"
                                                ><span><i class="bi bi-pencil-square"></i></span>Edit</a
                                            >
                                            <a class="menu-item theme-danger" href="#"
                                                ><span><i class="bi bi-trash3"></i></span>Delete</a
                                            >
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include __DIR__ . '/../../../components/script.html'; ?>

        <!-- JS BOOTSTRAP -->
        
    </body>
</html>
