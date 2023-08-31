<!-- Start sweetalert -->
<script src="<?= base_url('/assets/sweetalert2-11.7.0/sweetalert2.all.min.js') ?>"></script>
<!-- End sweetalert -->
<link rel="icon" href="<?= base_url() . "assets/icon.png" ?>" type="image/gif">
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() . 'home'; ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-fw fa-road"></i>
            </div>
            <div class="sidebar-brand-text mx-3">E-Parkir <sup></sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . 'home'; ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . 'home/dataactivity'; ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Activity</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . 'home/datainspeksi'; ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Inspeksi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . 'home/datakendaraan'; ?>">
                <i class="fas fa-fw fa-road"></i>
                <span>Data Kendaraan</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url() . 'home/datakaryawan'; ?>">
                <i class="fas fa-fw fa-suitcase"></i>
                <span>Data Karyawan</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Settings
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . 'home/datauser'; ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Data User</span></a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang, </span>
                            <span class="mr-2 d-none d-lg-inline text-primary small"><?= $login['nama'] ?></span>
                            <img class="img-profile rounded-circle" src="<?= base_url('/assets/img/user.png') ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <br>
            <br>
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 text-gray-800 text-center font-weight-bold"><?= $title; ?></h1>



                <?php echo $this->session->flashdata('message') ?>
                <?php echo validation_errors(); ?>
                <div class="container-sm">

                    <?php foreach ($queryKaryawan as $row) : ?>
                    <form id="formUser" action="<?= base_url() . 'home/dataKaryawanEditAction' ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="nik" class="form-label control-label">NIK</label>
                            <input type="number" name="nik" class="form-control" id="nik" value="<?= $row->nik; ?>"
                                required>
                            <input type="hidden" name="nik_lama" class="form-control" id="nik_lama"
                                value="<?= $row->nik; ?>">
                            <input type="hidden" name="create_by" class="form-control" id="create_by"
                                value="<?= $login['nama'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label control-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $row->nama; ?>"
                                required oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label for="departemen" class="form-label control-label">Departemen</label>
                            <input type="text" name="departemen" class="form-control" id="departemen"
                                value="<?= $row->departemen; ?>" required
                                oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label for="plant" class="form-label control-label">Plant</label>
                            <input type="text" name="plant" class="form-control" id="plant" readonly
                                value="<?= $row->plant; ?>" required>
                        </div>

                        <div class="float-right py-2">
                            <button type="submit" class="float-right btn btn-success font-weight-bold"
                                onclick="submitResultUser(event);">
                                <i class='fas fa-plus-circle'></i> Ubah Data</button>
                            <a class="float-right btn btn-danger font-weight-bold mx-2"
                                href="<?= base_url() . 'home/datakaryawan' ?>"><i class="fas fa-times"></i> Batal</a>
                        </div>
                    </form>

                    <?php endforeach ?>

                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; E-Parkir <?= date('Y'); ?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->