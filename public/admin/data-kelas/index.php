<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - Data Kelas</title>

        <?php 
            $activePage = "dataKelas";

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
                                    <form id="tambahDataKelas" action="../../../actions/admin/create/proses-tambah-kelas.php" method="post" enctype="multipart/form-data">
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
                                    <button type="submit" name="tambah_kelas" form="tambahDataKelas" class="btn-solid theme-primary">Simpan Data</button>
                                </div>
                            </dialog>

                            <a type="button" class="btn-outline theme-primary" href="tambah-data.php">
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
                                <?php 
                                    $no = 1;
                                    $query = 'SELECT * FROM data_kelas ORDER BY kode_kelas ASC';
                                    $statement = mysqli_query($koneksi, $query);
                                    foreach($statement as $row):
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $row['kode_kelas']; ?></td>
                                        <td class="text-start"><?= $row['wali_kelas']; ?></td>
                                        <td><?= $row['tingkat']; ?></td>
                                        <td><?= $row['nama_kelas']; ?></td>
                                        <td class="text-start">
                                            <!-- pemicu dialog detail Kelas 2 -->
                                            <button type="button" class="theme-info btn-solid btn-styled btn-sm" data-bs-toggle="dialog" data-bs-target="#dialogDetailKelas<?= $row['id']; ?>" data-bs-backdrop="static">
                                                <i class="bi bi-eye"></i>
                                                Detail
                                            </button>

                                            <!-- dialog detail Kelas 2 -->
                                            <dialog class="dialog dialog-xl dialog-slide-up dialog-scrollable" id="dialogDetailKelas<?= $row['id']; ?>">
                                                <div class="dialog-header">
                                                    <h1 class="dialog-title">Detail Data <?= $row['tingkat'] . ' ' . $row['nama_kelas']; ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                                                </div>
                                                <div class="dialog-body">
                                                    <div class="row">
                                                        <div class="col-12 sm:col-4">
                                                            <img class="img-fluid sm:pb-0 pb-5 rounded-2" src="<?= !$row['foto_kelas'] ? '/dashboard-project-2/public/assets/img/profil-default.png' : '/dashboard-project-2/public/assets/uploads/kelas/' . $row['foto_kelas']; ?>" alt="Foto Kelas <?= $row['nama_kelas'] ?>" />
                                                        </div>
                                                        <div class="col-12 sm:col-8">
                                                            <div class="row">
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>Kode Kelas</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['kode_kelas']; ?></p>
                                                                </div>
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>Wali Kelas</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['wali_kelas']; ?></p>
                                                                </div>
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>Tingkat</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['tingkat']; ?></p>
                                                                </div>
                                                                <div class="sm:col-6 col-12">
                                                                    <h4>Nama Kelas</h4>
                                                                    <p class="bg-secondary p-4 rounded-2"><?= $row['nama_kelas']; ?></p>
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
                                            <a href="edit-data.php?id=<?= $row['id']; ?>" class="theme-secondary btn-solid btn-styled btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </a>

                                            <a href="../../../actions/admin/delete/proses-hapus-kelas.php?id=<?= $row['id']; ?>" class="theme-danger btn-solid btn-styled btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">
                                                <i class="bi bi-trash3"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include __DIR__ . '/../../../components/script.html'; ?>
    </body>
</html>
