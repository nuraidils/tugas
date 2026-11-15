<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - Data Guru</title>

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
        <?php 
            $activePage = "dataGuru";

            include_once __DIR__ . '/../../../config/koneksi.php'; 
            include __DIR__ . '/../../../components/admin/navbar.php'; 
        ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="md:d-flex justify-content-between align-items-center">
                        <div class="md:mb-0 mb-5">
                            <h4>Data Guru</h4>
                            <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
                        </div>
                        <div class="md:d-flex md:gap-4">
                            <button type="button" class="btn-outline theme-success md:mb-0 mb-3" data-bs-toggle="dialog" data-bs-target="#dialogTambahGuru" data-bs-backdrop="static">
                                <span><i class="bi bi-plus-lg"></i></span>Tambah Data Guru Dialog
                            </button>

                            <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogTambahGuru">
                                <div class="dialog-header">
                                    <h1 class="dialog-title">Formulir Tambah Data Guru</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                </div>
                                <div class="dialog-body">
                                    <form id="tambahDataGuru" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-field">
                                            <div class="row py-3 px-3">
                                                <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                    <label class="form-label" for="nip">NIP</label>
                                                    <input class="form-control" type="text" id="nip" name="nip" inputmode="numeric" pattern="[0-9]*" maxlength="18" oninput="formatBiasa(this)" placeholder="(18 digit angka) Contoh: 199904062026121001" aria-label="Masukkan Nomor Induk Pegawai" required />
                                                </div>
                                                <div class="col-12 md:col-6">
                                                    <label class="form-label" for="nama_guru">Nama Lengkap</label>
                                                    <input class="form-control" type="text" id="nama_guru" name="nama_guru" placeholder="Masukkan nama guru" aria-label="Masukkan Nama Lengkap Guru" required />
                                                </div>
                                            </div>
                                            <div class="row pb-3 px-3 align-items-center">
                                                <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                    <label class="form-label">Jenis Kelamin</label>
                                                    <div class="d-flex gap-5">
                                                        <div class="form-field">
                                                            <input class="radio" type="radio" value="L" name="jenis_kelamin" id="laki_laki" checked required />
                                                            <label for="laki_laki">Laki-Laki</label>
                                                        </div>
                                                        <div class="form-field">
                                                            <input class="radio" type="radio" value="P" name="jenis_kelamin" id="perempuan" />
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
                                                            <input type="email" class="form-ghost" id="email" name="email" placeholder="veteran@sekolah.com" aria-label="Masukkan email guru" required />
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 md:col-4 md:w-100">
                                                    <div class="form-field">
                                                        <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                                        <label class="form-control form-adorn">
                                                            <span class="form-adorn-text" aria-hidden="true">+62</span>
                                                            <input type="text" class="form-ghost" id="no_telepon" name="no_telepon" inputmode="numeric" pattern="[0-9]*" minlength="10" maxlength="12" oninput="formatBiasa(this)" placeholder="83896427793" aria-label="Masukkan Nomor Telepon Guru" required />
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pb-3 px-3">
                                                <label for="foto_guru" class="form-label">Foto Guru</label>
                                                <input class="form-control" type="file" id="foto_guru" name="foto_guru" accept="image/png, image/jpeg, image/jpg" aria-label="Pilih Foto Guru" required />
                                            </div>
                                            <div class="pb-3 px-3">
                                                <label for="alamat" class="form-label">Alamat Guru</label>
                                                <textarea class="form-control" id="alamat" name="alamat" aria-label="Masukkan Data Alamat Guru" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="dialog-footer">
                                    <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                    <button type="reset" form="tambahDataGuru" class="btn-outline theme-danger">Reset</button>
                                    <button type="submit" form="tambahDataGuru" class="btn-solid theme-primary">Simpan Data</button>
                                </div>
                            </dialog>

                            <a type="button" class="btn-outline theme-primary" href="tambah-data-guru.php">
                                <span><i class="bi bi-plus-lg"></i></span>
                                Tambah Data Guru
                            </a>
                        </div>
                    </div>

                    <hr />

                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIP</th>
                                    <th class="text-start">Nama Guru</th>
                                    <th>L/P</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th class="text-start">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>199904062026121001</td>
                                    <td class="text-start">David Putra Siregar</td>
                                    <td>L</td>
                                    <td class="fst-italic">davidputrasiregar@gmail.com</td>
                                    <td>081234567890</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail Guru 1 -->
                                        <button type="button" class="theme-info btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailGuru1" data-bs-backdrop="static">Detail</button>

                                        <!-- dialog detail Guru 1 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailGuru1">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Guru</h1>
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
                                                                <h4>NIP</h4>
                                                                <p class="bg-secondary p-4">199904062026121001</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Lengkap</h4>
                                                                <p class="bg-secondary p-4">David Putra Siregar</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Jenis Kelamin</h4>
                                                                <p class="bg-secondary p-4">Laki - Laki</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Email</h4>
                                                                <p class="bg-secondary p-4">davidputrasiregar@gmail.com</p>
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

                                        <!-- pemicu dialog edit data Guru 1 -->
                                        <button type="button" class="theme-secondary btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogEditGuru1" data-bs-backdrop="static">Edit</button>

                                        <!-- dialog edit data Guru 1 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditGuru1">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Guru</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataGuru1" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row py-3 px-3">
                                                            <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                                <label class="form-label" for="nip">NIP</label>
                                                                <input class="form-control" type="text" id="nip" name="nip" inputmode="numeric" pattern="[0-9]*" maxlength="18" oninput="formatBiasa(this)" placeholder="(18 digit angka) Contoh: 199904062026121001" aria-label="Masukkan Nomor Induk Pegawai" required />
                                                            </div>
                                                            <div class="col-12 md:col-6">
                                                                <label class="form-label" for="nama_guru">Nama Lengkap</label>
                                                                <input class="form-control" type="text" id="nama_guru" name="nama_guru" placeholder="Masukkan nama guru" aria-label="Masukkan Nama Lengkap Guru" required />
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3 px-3 align-items-center">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label class="form-label">Jenis Kelamin</label>
                                                                <div class="d-flex gap-5">
                                                                    <div class="form-field">
                                                                        <input class="radio" type="radio" value="L" name="jenis_kelamin" id="laki_laki" checked required />
                                                                        <label for="laki_laki">Laki-Laki</label>
                                                                    </div>
                                                                    <div class="form-field">
                                                                        <input class="radio" type="radio" value="P" name="jenis_kelamin" id="perempuan" />
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
                                                                        <input type="email" class="form-ghost" id="email" name="email" placeholder="veteran@sekolah.com" aria-label="Masukkan email guru" required />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 md:col-4 md:w-100">
                                                                <div class="form-field">
                                                                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                                                    <label class="form-control form-adorn">
                                                                        <span class="form-adorn-text" aria-hidden="true">+62</span>
                                                                        <input type="text" class="form-ghost" id="no_telepon" name="no_telepon" inputmode="numeric" pattern="[0-9]*" minlength="10" maxlength="12" oninput="formatBiasa(this)" placeholder="83896427793" aria-label="Masukkan Nomor Telepon Guru" required />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pb-3 px-3">
                                                            <label for="foto_guru" class="form-label">Foto Guru</label>
                                                            <input class="form-control" type="file" id="foto_guru" name="foto_guru" accept="image/png, image/jpeg, image/jpg" aria-label="Pilih Foto Guru" required />
                                                        </div>
                                                        <div class="pb-3 px-3">
                                                            <label for="alamat" class="form-label">Alamat Guru</label>
                                                            <textarea class="form-control" id="alamat" name="alamat" aria-label="Masukkan Data Alamat Guru" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                                <button type="reset" form="editDataGuru1" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataGuru1" class="btn-solid theme-primary">Simpan Data</button>
                                            </div>
                                        </dialog>

                                        <button type="button" class="theme-danger btn-solid btn-styled btn-sm">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>199904062026122002</td>
                                    <td class="text-start">Chelsea Maemunah</td>
                                    <td>P</td>
                                    <td class="fst-italic">chelseamaemunah@gmail.com</td>
                                    <td>081234567822</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail Guru 2 -->
                                        <button type="button" class="theme-info btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailGuru2" data-bs-backdrop="static">
                                            <i class="bi bi-eye"></i>
                                            Detail
                                        </button>

                                        <!-- dialog detail Guru 2 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailGuru2">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Guru</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <div class="row">
                                                    <div class="col-12 sm:col-4">
                                                        <img class="img-fluid sm:pb-0 pb-5" src="/assets/img/windah.jpg" alt="Profile" />
                                                    </div>
                                                    <div class="col-12 sm:col-8">
                                                        <div class="row">
                                                            <div class="sm:col-6 col-12">
                                                                <h4>NIP</h4>
                                                                <p class="bg-secondary p-4">199904062026122002</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Lengkap</h4>
                                                                <p class="bg-secondary p-4">Chelsea Maemunah</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Jenis Kelamin</h4>
                                                                <p class="bg-secondary p-4">Perempuan</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Email</h4>
                                                                <p class="bg-secondary p-4">chelseamaemunah@gmail.com</p>
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

                                        <!-- pemicu dialog edit data Guru 2 -->
                                        <button type="button" class="theme-secondary btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogEditGuru2" data-bs-backdrop="static">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </button>

                                        <!-- dialog edit data Guru 2 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditGuru2">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Guru</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataGuru2" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row py-3 px-3">
                                                            <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                                <label class="form-label" for="nip">NIP</label>
                                                                <input class="form-control" type="text" id="nip" name="nip" inputmode="numeric" pattern="[0-9]*" maxlength="18" oninput="formatBiasa(this)" placeholder="(18 digit angka) Contoh: 199904062026121001" aria-label="Masukkan Nomor Induk Pegawai" required />
                                                            </div>
                                                            <div class="col-12 md:col-6">
                                                                <label class="form-label" for="nama_guru">Nama Lengkap</label>
                                                                <input class="form-control" type="text" id="nama_guru" name="nama_guru" placeholder="Masukkan nama guru" aria-label="Masukkan Nama Lengkap Guru" required />
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3 px-3 align-items-center">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label class="form-label">Jenis Kelamin</label>
                                                                <div class="d-flex gap-5">
                                                                    <div class="form-field">
                                                                        <input class="radio" type="radio" value="L" name="jenis_kelamin" id="laki_laki" checked required />
                                                                        <label for="laki_laki">Laki-Laki</label>
                                                                    </div>
                                                                    <div class="form-field">
                                                                        <input class="radio" type="radio" value="P" name="jenis_kelamin" id="perempuan" />
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
                                                                        <input type="email" class="form-ghost" id="email" name="email" placeholder="veteran@sekolah.com" aria-label="Masukkan email guru" required />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 md:col-4 md:w-100">
                                                                <div class="form-field">
                                                                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                                                    <label class="form-control form-adorn">
                                                                        <span class="form-adorn-text" aria-hidden="true">+62</span>
                                                                        <input type="text" class="form-ghost" id="no_telepon" name="no_telepon" inputmode="numeric" pattern="[0-9]*" minlength="10" maxlength="12" oninput="formatBiasa(this)" placeholder="83896427793" aria-label="Masukkan Nomor Telepon Guru" required />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pb-3 px-3">
                                                            <label for="foto_guru" class="form-label">Foto Guru</label>
                                                            <input class="form-control" type="file" id="foto_guru" name="foto_guru" accept="image/png, image/jpeg, image/jpg" aria-label="Pilih Foto Guru" required />
                                                        </div>
                                                        <div class="pb-3 px-3">
                                                            <label for="alamat" class="form-label">Alamat Guru</label>
                                                            <textarea class="form-control" id="alamat" name="alamat" aria-label="Masukkan Data Alamat Guru" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                                <button type="reset" form="editDataGuru2" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataGuru2" class="btn-solid theme-primary">Simpan Data</button>
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
                                    <td>199904062026121003</td>
                                    <td class="text-start">Paul School</td>
                                    <td>L</td>
                                    <td class="fst-italic">paulschool@gmail.com</td>
                                    <td>081234567891</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail Guru 3 -->
                                        <button type="button" class="theme-info btn-outline btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailGuru3" data-bs-backdrop="static">
                                            <i class="bi bi-eye"></i>
                                            Detail
                                        </button>

                                        <!-- dialog detail Guru 3 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailGuru3">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Guru</h1>
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
                                                                <h4>NIP</h4>
                                                                <p class="bg-secondary p-4">199904062026121003</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Lengkap</h4>
                                                                <p class="bg-secondary p-4">Paul School</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Jenis Kelamin</h4>
                                                                <p class="bg-secondary p-4">Laki - Laki</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Email</h4>
                                                                <p class="bg-secondary p-4">paulschool@gmail.com</p>
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

                                        <!-- pemicu dialog edit Guru 3 -->
                                        <button type="button" class="theme-secondary btn-outline btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogEditGuru3" data-bs-backdrop="static">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </button>

                                        <!-- dialog edit data Guru 3 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditGuru3">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Guru</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataGuru3" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row py-3 px-3">
                                                            <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                                <label class="form-label" for="nip">NIP</label>
                                                                <input class="form-control" type="text" id="nip" name="nip" inputmode="numeric" pattern="[0-9]*" maxlength="18" oninput="formatBiasa(this)" placeholder="(18 digit angka) Contoh: 199904062026121001" aria-label="Masukkan Nomor Induk Pegawai" required />
                                                            </div>
                                                            <div class="col-12 md:col-6">
                                                                <label class="form-label" for="nama_guru">Nama Lengkap</label>
                                                                <input class="form-control" type="text" id="nama_guru" name="nama_guru" placeholder="Masukkan nama guru" aria-label="Masukkan Nama Lengkap Guru" required />
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3 px-3 align-items-center">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label class="form-label">Jenis Kelamin</label>
                                                                <div class="d-flex gap-5">
                                                                    <div class="form-field">
                                                                        <input class="radio" type="radio" value="L" name="jenis_kelamin" id="laki_laki" checked required />
                                                                        <label for="laki_laki">Laki-Laki</label>
                                                                    </div>
                                                                    <div class="form-field">
                                                                        <input class="radio" type="radio" value="P" name="jenis_kelamin" id="perempuan" />
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
                                                                        <input type="email" class="form-ghost" id="email" name="email" placeholder="veteran@sekolah.com" aria-label="Masukkan email guru" required />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 md:col-4 md:w-100">
                                                                <div class="form-field">
                                                                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                                                    <label class="form-control form-adorn">
                                                                        <span class="form-adorn-text" aria-hidden="true">+62</span>
                                                                        <input type="text" class="form-ghost" id="no_telepon" name="no_telepon" inputmode="numeric" pattern="[0-9]*" minlength="10" maxlength="12" oninput="formatBiasa(this)" placeholder="83896427793" aria-label="Masukkan Nomor Telepon Guru" required />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pb-3 px-3">
                                                            <label for="foto_guru" class="form-label">Foto Guru</label>
                                                            <input class="form-control" type="file" id="foto_guru" name="foto_guru" accept="image/png, image/jpeg, image/jpg" aria-label="Pilih Foto Guru" required />
                                                        </div>
                                                        <div class="pb-3 px-3">
                                                            <label for="alamat" class="form-label">Alamat Guru</label>
                                                            <textarea class="form-control" id="alamat" name="alamat" aria-label="Masukkan Data Alamat Guru" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                                <button type="reset" form="editDataGuru3" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataGuru3" class="btn-solid theme-primary">Simpan Data</button>
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
                                    <td>199904062026122004</td>
                                    <td class="text-start">Shaila Duta</td>
                                    <td>P</td>
                                    <td class="fst-italic">shailaduta@gmail.com</td>
                                    <td>081234567892</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail Guru 4 & tooltip -->
                                        <span data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Detail">
                                            <button type="button" class="btn-icon theme-info btn-solid btn-sm" aria-label="Icon only" data-bs-toggle="dialog" data-bs-target="#dialogDetailGuru4" data-bs-backdrop="static">
                                                <i class="bi bi-eye fg-white"></i>
                                            </button>
                                        </span>

                                        <!-- dialog detail Guru 4 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailGuru4">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Guru</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <div class="row">
                                                    <div class="col-12 sm:col-4">
                                                        <img class="img-fluid sm:pb-0 pb-5" src="/assets/img/windah.jpg" alt="Profile" />
                                                    </div>
                                                    <div class="col-12 sm:col-8">
                                                        <div class="row">
                                                            <div class="sm:col-6 col-12">
                                                                <h4>NIP</h4>
                                                                <p class="bg-secondary p-4">199904062026122004</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Lengkap</h4>
                                                                <p class="bg-secondary p-4">Shailda Duta</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Jenis Kelamin</h4>
                                                                <p class="bg-secondary p-4">Perempuan</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Email</h4>
                                                                <p class="bg-secondary p-4">shailaduta@gmail.com</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nomor Telepon</h4>
                                                                <p class="bg-secondary p-4">081234567892</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Alamat</h4>
                                                                <p class="bg-secondary p-4">Jl. Kenangan 2, Blok L3 No. 24</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Keluar</button>
                                            </div>
                                        </dialog>

                                        <!-- pemicu dialog edit Guru 4 & tooltip -->
                                        <span data-bs-toggle="tooltip" data-bs-title="Edit">
                                            <button type="button" class="btn-icon theme-secondary btn-solid btn-sm" aria-label="Icon only" data-bs-toggle="dialog" data-bs-target="#dialogEditGuru4" data-bs-backdrop="static">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </span>

                                        <!-- dialog edit data Guru 4 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditGuru4">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Guru</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataGuru4" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row py-3 px-3">
                                                            <div class="col-12 md:col-6 pb-3 md:pb-0">
                                                                <label class="form-label" for="nip">NIP</label>
                                                                <input class="form-control" type="text" id="nip" name="nip" inputmode="numeric" pattern="[0-9]*" maxlength="18" oninput="formatBiasa(this)" placeholder="(18 digit angka) Contoh: 199904062026121001" aria-label="Masukkan Nomor Induk Pegawai" required />
                                                            </div>
                                                            <div class="col-12 md:col-6">
                                                                <label class="form-label" for="nama_guru">Nama Lengkap</label>
                                                                <input class="form-control" type="text" id="nama_guru" name="nama_guru" placeholder="Masukkan nama guru" aria-label="Masukkan Nama Lengkap Guru" required />
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3 px-3 align-items-center">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label class="form-label">Jenis Kelamin</label>
                                                                <div class="d-flex gap-5">
                                                                    <div class="form-field">
                                                                        <input class="radio" type="radio" value="L" name="jenis_kelamin" id="laki_laki" checked required />
                                                                        <label for="laki_laki">Laki-Laki</label>
                                                                    </div>
                                                                    <div class="form-field">
                                                                        <input class="radio" type="radio" value="P" name="jenis_kelamin" id="perempuan" />
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
                                                                        <input type="email" class="form-ghost" id="email" name="email" placeholder="veteran@sekolah.com" aria-label="Masukkan email guru" required />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 md:col-4 md:w-100">
                                                                <div class="form-field">
                                                                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                                                    <label class="form-control form-adorn">
                                                                        <span class="form-adorn-text" aria-hidden="true">+62</span>
                                                                        <input type="text" class="form-ghost" id="no_telepon" name="no_telepon" inputmode="numeric" pattern="[0-9]*" minlength="10" maxlength="12" oninput="formatBiasa(this)" placeholder="83896427793" aria-label="Masukkan Nomor Telepon Guru" required />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pb-3 px-3">
                                                            <label for="foto_guru" class="form-label">Foto Guru</label>
                                                            <input class="form-control" type="file" id="foto_guru" name="foto_guru" accept="image/png, image/jpeg, image/jpg" aria-label="Pilih Foto Guru" required />
                                                        </div>
                                                        <div class="pb-3 px-3">
                                                            <label for="alamat" class="form-label">Alamat Guru</label>
                                                            <textarea class="form-control" id="alamat" name="alamat" aria-label="Masukkan Data Alamat Guru" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                                <button type="reset" form="editDataGuru4" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataGuru4" class="btn-solid theme-primary">Simpan Data</button>
                                            </div>
                                        </dialog>

                                        <button type="button" class="btn-icon theme-danger btn-solid btn-sm" aria-label="Icon only" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Delete">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>199904062026121005</td>
                                    <td class="text-start">Zlatan Ebel Piton</td>
                                    <td>L</td>
                                    <td class="fst-italic">zlatanebelpiton@gmail.com</td>
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
