<nav class="navbar sm:navbar-expand bg-1 fg-2 shadow-sm">
    <div class="container">
        <a class="navbar-brand fs-lg" href="#">SchoolApp</a>
        <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" aria-hidden="true"></span>
        </button>
        <dialog class="drawer drawer-end" tabindex="-1" id="navbarNav" aria-labelledby="navbarNavLabel">
            <div class="drawer-header">
                <h5 class="drawer-title" id="navbarNavLabel">SchoolApp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
            </div>
            <div class="drawer-body d-flex justify-content-between">
                <div class="nav-overflow" data-bs-toggle="nav-overflow">
                    <ul class="nav nav-underline">
                        <li class="nav-item">
                            <a class="nav-link <?= $activePage === "dashboard" ? 'active' : '' ?>" aria-current="page" href="<?= $activePage === "dashboard" ? '#' : '/dashboard-project-2/public/admin/index.php' ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link  <?= $activePage === "dataGuru" || $activePage === "dataKelas" || $activePage === "dataSiswa" ? 'active' : '' ?>" type="button" data-bs-toggle="menu" aria-expanded="false">Manajemen Data</button>
                            <div class="menu menu-translucent">
                                <a class="menu-item <?= $activePage === "dataGuru" || $activePage === "tambahDataGuru" ? 'active' : '' ?>" href="<?= $activePage === "dataGuru" ? '#' : '/dashboard-project-2/public/admin/data-guru/' ?>">Data Guru</a>
                                <a class="menu-item <?= $activePage === "dataKelas" || $activePage === "tambahDataKelas" ? 'active' : '' ?>" href="<?= $activePage === "dataKelas" ? '#' : '/dashboard-project-2/public/admin/data-kelas/' ?>">Data Kelas</a>
                                <a class="menu-item <?= $activePage === "dataSiswa" || $activePage === "tambahDataSiswa" ? 'active' : '' ?>" href="<?= $activePage === "dataSiswa" ? '#' : '/dashboard-project-2/public/admin/data-siswa/' ?>">Data Siswa</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="">
                    <button class="btn-outline" type="button" data-bs-toggle="menu" data-bs-placement="bottom-end" aria-expanded="false">
                        nuraidils etmin
                        <span class="avatar avatar-xs">
                            <img class="avatar-img" src="/dashboard-project-2/public/assets/img/meme.png" alt="mdo" />
                        </span>
                    </button>
                    <div class="menu menu-translucent">
                        <!-- <a class="menu-item" href="#">Profile</a>
                        <a class="menu-item" href="#">Settings</a> -->
                        <!-- <hr class="menu-divider" /> -->
                        <a class="menu-item theme-danger" href="/dashboard-project-2/public/index.php">Logout</a>
                    </div>
                </div>
            </div>
        </dialog>
    </div>
</nav>
