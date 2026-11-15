<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - Data Kelas</title>

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
            $activePage = "dataKelas";

            include_once __DIR__ . '/../../../config/koneksi.php'; 
            include __DIR__ . '/../../../components/admin/navbar.php'; 
        ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="md:d-flex justify-content-between align-items-center">
                        <div class="md:mb-0 mb-5">
                            <h4>Data Kelas</h4>
                            <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
                        </div>
                        <div class="md:d-flex md:gap-4">
                            <button type="button" class="btn-outline theme-success md:mb-0 mb-3" data-bs-toggle="dialog" data-bs-target="#dialogTambahKelas" data-bs-backdrop="static">
                                <span><i class="bi bi-plus-lg"></i></span>Tambah Data Kelas Dialog
                            </button>

                            <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogTambahKelas">
                                <div class="dialog-header">
                                    <h1 class="dialog-title">Formulir Tambah Data Kelas</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                </div>
                                <div class="dialog-body">
                                    <form id="tambahDataKelas" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-field">
                                            <div class="row py-3 px-3">
                                                <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                    <label class="form-label" for="kode_kelas">Kode Kelas</label>
                                                    <input class="form-control" type="text" id="kode_kelas" name="kode_kelas" maxlength="4" placeholder="Contoh: K001" aria-label="Masukkan Kode Kelas" required />
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <label class="form-label" for="wali_kelas">Wali Kelas</label>
                                                    <input class="form-control" type="text" id="wali_kelas" name="wali_kelas" placeholder="Masukkan Wali Kelas" aria-label="Masukkan Wali Kelas" required />
                                                </div>
                                            </div>
                                            <div class="row pb-3 px-3 align-items-center">
                                                <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                    <label for="tingkat" class="form-label">Pilih Tingkat</label>
                                                    <select class="form-control" id="tingkat" name="tingkat" aria-label="Pilih Tingkat" required>
                                                        <option value="" selected disabled>--Pilih Tingkat--</option>
                                                        <option value="x">X</option>
                                                        <option value="xi">XI</option>
                                                        <option value="xii">XII</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 md:col-4 pb-3 md:pb-0">
                                                    <label class="form-label" for="nama_kelas">Nama Kelas</label>
                                                    <input class="form-control" type="text" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" aria-label="Masukkan Nama Kelas" required />
                                                </div>
                                                <div class="col-12 md:col-5">
                                                    <label for="foto_kelas" class="form-label">Foto Kelas</label>
                                                    <input class="form-control" type="file" id="foto_kelas" name="foto_kelas" aria-label="Pilih Foto Kelas" accept="image/png, image/jpeg, image/jpg" required />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="dialog-footer">
                                    <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                    <button type="reset" form="tambahDataKelas" class="btn-outline theme-danger">Reset</button>
                                    <button type="submit" form="tambahDataKelas" class="btn-solid theme-primary">Simpan Data</button>
                                </div>
                            </dialog>

                            <a type="button" class="btn-outline theme-primary" href="tambah-data-kelas.php">
                                <span><i class="bi bi-plus-lg"></i></span>
                                Tambah Data Kelas
                            </a>
                        </div>
                    </div>

                    <hr />

                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Kelas</th>
                                    <th class="text-start">Wali Kelas</th>
                                    <th>Tingkat</th>
                                    <th>Nama Kelas</th>
                                    <th class="text-start">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>K001</td>
                                    <td class="text-start">Jiraiya</td>
                                    <td>XI</td>
                                    <td>RPL 1</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail Kelas 1 -->
                                        <button type="button" class="theme-info btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailKelas1" data-bs-backdrop="static">Detail</button>

                                        <!-- dialog detail Kelas 1 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailKelas1">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <div class="row">
                                                    <div class="col-12 sm:col-4">
                                                        <img class="img-fluid sm:pb-0 pb-5" src="/assets/img/naruto.jpg" alt="Profile" />
                                                    </div>
                                                    <div class="col-12 sm:col-8">
                                                        <div class="row">
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Kode Kelas</h4>
                                                                <p class="bg-secondary p-4">K001</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Wali Kelas</h4>
                                                                <p class="bg-secondary p-4">Jiraiya</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tingkat</h4>
                                                                <p class="bg-secondary p-4">XI</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Kelas</h4>
                                                                <p class="bg-secondary p-4">RPL 1</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Keluar</button>
                                            </div>
                                        </dialog>

                                        <!-- pemicu dialog edit data Kelas 1 -->
                                        <button type="button" class="theme-secondary btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogEditKelas1" data-bs-backdrop="static">Edit</button>

                                        <!-- dialog edit data Kelas 1 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditKelas1">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataKelas1" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row py-3 px-3">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label class="form-label" for="kode_kelas">Kode Kelas</label>
                                                                <input class="form-control" type="text" id="kode_kelas" name="kode_kelas" maxlength="4" placeholder="Contoh: K001" aria-label="Masukkan Kode Kelas" required />
                                                            </div>
                                                            <div class="col-12 md:col-9">
                                                                <label class="form-label" for="wali_kelas">Wali Kelas</label>
                                                                <input class="form-control" type="text" id="wali_kelas" name="wali_kelas" placeholder="Masukkan Wali Kelas" aria-label="Masukkan Wali Kelas" required />
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3 px-3 align-items-center">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label for="tingkat" class="form-label">Pilih Tingkat</label>
                                                                <select class="form-control" id="tingkat" name="tingkat" aria-label="Pilih Tingkat" required>
                                                                    <option value="" selected disabled>--Pilih Tingkat--</option>
                                                                    <option value="x">X</option>
                                                                    <option value="xi">XI</option>
                                                                    <option value="xii">XII</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 md:col-4 pb-3 md:pb-0">
                                                                <label class="form-label" for="nama_kelas">Nama Kelas</label>
                                                                <input class="form-control" type="text" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" aria-label="Masukkan Nama Kelas" required />
                                                            </div>
                                                            <div class="col-12 md:col-5">
                                                                <label for="foto_kelas" class="form-label">Foto Kelas</label>
                                                                <input class="form-control" type="file" id="foto_kelas" name="foto_kelas" aria-label="Pilih Foto Kelas" accept="image/png, image/jpeg, image/jpg" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                                <button type="reset" form="editDataKelas1" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataKelas1" class="btn-solid theme-primary">Simpan Data</button>
                                            </div>
                                        </dialog>

                                        <button type="button" class="theme-danger btn-solid btn-styled btn-sm">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>K002</td>
                                    <td class="text-start">Kakashi</td>
                                    <td>X</td>
                                    <td>RPL 1</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail Kelas 2 -->
                                        <button type="button" class="theme-info btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailKelas2" data-bs-backdrop="static">
                                            <i class="bi bi-eye"></i>
                                            Detail
                                        </button>

                                        <!-- dialog detail Kelas 2 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailKelas2">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <div class="row">
                                                    <div class="col-12 sm:col-4">
                                                        <img class="img-fluid sm:pb-0 pb-5" src="/assets/img/naruto.jpg" alt="Profile" />
                                                    </div>
                                                    <div class="col-12 sm:col-8">
                                                        <div class="row">
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Kode Kelas</h4>
                                                                <p class="bg-secondary p-4">K002</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Wali Kelas</h4>
                                                                <p class="bg-secondary p-4">Kakashi</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tingkat</h4>
                                                                <p class="bg-secondary p-4">X</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Kelas</h4>
                                                                <p class="bg-secondary p-4">RPL 1</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Keluar</button>
                                            </div>
                                        </dialog>

                                        <!-- pemicu dialog edit data Kelas 2 -->
                                        <button type="button" class="theme-secondary btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogEditKelas2" data-bs-backdrop="static">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </button>

                                        <!-- dialog edit data Kelas 2 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditKelas2">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataKelas2" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row py-3 px-3">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label class="form-label" for="kode_kelas">Kode Kelas</label>
                                                                <input class="form-control" type="text" id="kode_kelas" name="kode_kelas" maxlength="4" placeholder="Contoh: K001" aria-label="Masukkan Kode Kelas" required />
                                                            </div>
                                                            <div class="col-12 md:col-9">
                                                                <label class="form-label" for="wali_kelas">Wali Kelas</label>
                                                                <input class="form-control" type="text" id="wali_kelas" name="wali_kelas" placeholder="Masukkan Wali Kelas" aria-label="Masukkan Wali Kelas" required />
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3 px-3 align-items-center">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label for="tingkat" class="form-label">Pilih Tingkat</label>
                                                                <select class="form-control" id="tingkat" name="tingkat" aria-label="Pilih Tingkat" required>
                                                                    <option value="" selected disabled>--Pilih Tingkat--</option>
                                                                    <option value="x">X</option>
                                                                    <option value="xi">XI</option>
                                                                    <option value="xii">XII</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 md:col-4 pb-3 md:pb-0">
                                                                <label class="form-label" for="nama_kelas">Nama Kelas</label>
                                                                <input class="form-control" type="text" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" aria-label="Masukkan Nama Kelas" required />
                                                            </div>
                                                            <div class="col-12 md:col-5">
                                                                <label for="foto_kelas" class="form-label">Foto Kelas</label>
                                                                <input class="form-control" type="file" id="foto_kelas" name="foto_kelas" aria-label="Pilih Foto Kelas" accept="image/png, image/jpeg, image/jpg" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                                <button type="reset" form="editDataKelas2" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataKelas2" class="btn-solid theme-primary">Simpan Data</button>
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
                                    <td>K003</td>
                                    <td class="text-start">Konohamaru</td>
                                    <td>XI</td>
                                    <td>RPL 2</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail Kelas 3 -->
                                        <button type="button" class="theme-info btn-outline btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailKelas3" data-bs-backdrop="static">
                                            <i class="bi bi-eye"></i>
                                            Detail
                                        </button>

                                        <!-- dialog detail Kelas 3 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailKelas3">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <div class="row">
                                                    <div class="col-12 sm:col-4">
                                                        <img class="img-fluid sm:pb-0 pb-5" src="/assets/img/naruto.jpg" alt="Profile" />
                                                    </div>
                                                    <div class="col-12 sm:col-8">
                                                        <div class="row">
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Kode Kelas</h4>
                                                                <p class="bg-secondary p-4">K003</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Wali Kelas</h4>
                                                                <p class="bg-secondary p-4">Konohamaru</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tingkat</h4>
                                                                <p class="bg-secondary p-4">XI</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Kelas</h4>
                                                                <p class="bg-secondary p-4">RPL 2</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Keluar</button>
                                            </div>
                                        </dialog>

                                        <!-- pemicu dialog edit Kelas 3 -->
                                        <button type="button" class="theme-secondary btn-outline btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogEditKelas3" data-bs-backdrop="static">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </button>

                                        <!-- dialog edit Kelas 3 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditKelas3">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataKelas3" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row py-3 px-3">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label class="form-label" for="kode_kelas">Kode Kelas</label>
                                                                <input class="form-control" type="text" id="kode_kelas" name="kode_kelas" maxlength="4" placeholder="Contoh: K001" aria-label="Masukkan Kode Kelas" required />
                                                            </div>
                                                            <div class="col-12 md:col-9">
                                                                <label class="form-label" for="wali_kelas">Wali Kelas</label>
                                                                <input class="form-control" type="text" id="wali_kelas" name="wali_kelas" placeholder="Masukkan Wali Kelas" aria-label="Masukkan Wali Kelas" required />
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3 px-3 align-items-center">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label for="tingkat" class="form-label">Pilih Tingkat</label>
                                                                <select class="form-control" id="tingkat" name="tingkat" aria-label="Pilih Tingkat" required>
                                                                    <option value="" selected disabled>--Pilih Tingkat--</option>
                                                                    <option value="x">X</option>
                                                                    <option value="xi">XI</option>
                                                                    <option value="xii">XII</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 md:col-4 pb-3 md:pb-0">
                                                                <label class="form-label" for="nama_kelas">Nama Kelas</label>
                                                                <input class="form-control" type="text" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" aria-label="Masukkan Nama Kelas" required />
                                                            </div>
                                                            <div class="col-12 md:col-5">
                                                                <label for="foto_kelas" class="form-label">Foto Kelas</label>
                                                                <input class="form-control" type="file" id="foto_kelas" name="foto_kelas" aria-label="Pilih Foto Kelas" accept="image/png, image/jpeg, image/jpg" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                                <button type="reset" form="editDataKelas3" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataKelas3" class="btn-solid theme-primary">Simpan Data</button>
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
                                    <td>K004</td>
                                    <td class="text-start">Hiruzen</td>
                                    <td>X</td>
                                    <td>RPL 2</td>
                                    <td class="text-start">
                                        <!-- pemicu dialog detail Kelas 4 & tooltip -->
                                        <span data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Detail">
                                            <button type="button" class="btn-icon theme-info btn-solid btn-sm" aria-label="Icon only" data-bs-toggle="dialog" data-bs-target="#dialogDetailKelas4" data-bs-backdrop="static">
                                                <i class="bi bi-eye fg-white"></i>
                                            </button>
                                        </span>

                                        <!-- dialog detail Kelas 4 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailKelas4">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Detail Data Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <div class="row">
                                                    <div class="col-12 sm:col-4">
                                                        <img class="img-fluid sm:pb-0 pb-5" src="/assets/img/naruto.jpg" alt="Profile" />
                                                    </div>
                                                    <div class="col-12 sm:col-8">
                                                        <div class="row">
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Kode Kelas</h4>
                                                                <p class="bg-secondary p-4">K004</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Wali Kelas</h4>
                                                                <p class="bg-secondary p-4">Hiruzen</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Tingkat</h4>
                                                                <p class="bg-secondary p-4">X</p>
                                                            </div>
                                                            <div class="sm:col-6 col-12">
                                                                <h4>Nama Kelas</h4>
                                                                <p class="bg-secondary p-4">RPL 2</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Keluar</button>
                                            </div>
                                        </dialog>

                                        <!-- pemicu dialog detail Kelas 4 & tooltip -->
                                        <span data-bs-toggle="tooltip" data-bs-title="Edit">
                                            <button type="button" class="btn-icon theme-secondary btn-solid btn-sm" aria-label="Icon only" data-bs-toggle="dialog" data-bs-target="#dialogEditKelas3" data-bs-backdrop="static">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </span>

                                        <!-- dialog edit Kelas 4 -->
                                        <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogEditKelas4">
                                            <div class="dialog-header">
                                                <h1 class="dialog-title">Formulir Edit Data Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                            </div>
                                            <div class="dialog-body">
                                                <form id="editDataKelas4" action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-field">
                                                        <div class="row py-3 px-3">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label class="form-label" for="kode_kelas">Kode Kelas</label>
                                                                <input class="form-control" type="text" id="kode_kelas" name="kode_kelas" maxlength="4" placeholder="Contoh: K001" aria-label="Masukkan Kode Kelas" required />
                                                            </div>
                                                            <div class="col-12 md:col-9">
                                                                <label class="form-label" for="wali_kelas">Wali Kelas</label>
                                                                <input class="form-control" type="text" id="wali_kelas" name="wali_kelas" placeholder="Masukkan Wali Kelas" aria-label="Masukkan Wali Kelas" required />
                                                            </div>
                                                        </div>
                                                        <div class="row pb-3 px-3 align-items-center">
                                                            <div class="col-12 md:col-3 pb-3 md:pb-0">
                                                                <label for="tingkat" class="form-label">Pilih Tingkat</label>
                                                                <select class="form-control" id="tingkat" name="tingkat" aria-label="Pilih Tingkat" required>
                                                                    <option value="" selected disabled>--Pilih Tingkat--</option>
                                                                    <option value="x">X</option>
                                                                    <option value="xi">XI</option>
                                                                    <option value="xii">XII</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 md:col-4 pb-3 md:pb-0">
                                                                <label class="form-label" for="nama_kelas">Nama Kelas</label>
                                                                <input class="form-control" type="text" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" aria-label="Masukkan Nama Kelas" required />
                                                            </div>
                                                            <div class="col-12 md:col-5">
                                                                <label for="foto_kelas" class="form-label">Foto Kelas</label>
                                                                <input class="form-control" type="file" id="foto_kelas" name="foto_kelas" aria-label="Pilih Foto Kelas" accept="image/png, image/jpeg, image/jpg" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="dialog-footer">
                                                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                                                <button type="reset" form="editDataKelas4" class="btn-outline theme-danger">Reset</button>
                                                <button type="submit" form="editDataKelas4" class="btn-solid theme-primary">Simpan Data</button>
                                            </div>
                                        </dialog>

                                        <button type="button" class="btn-icon theme-danger btn-solid btn-sm" aria-label="Icon only" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Delete">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>K005</td>
                                    <td class="text-start">Orochimaru</td>
                                    <td>XII</td>
                                    <td>RPL 1</td>
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
