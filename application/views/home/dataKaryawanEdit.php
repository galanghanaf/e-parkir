<!-- Start sweetalert -->
<script src="<?= base_url('/assets/sweetalert2-11.7.0/sweetalert2.all.min.js') ?>"></script>
<!-- End sweetalert -->

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
            Master Data
        </div>

        <!-- Nav Item - Pages Collapse Menu -->


        <li class="nav-item <?= $title == 'Data Karyawan' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url() . 'home/datakaryawan'; ?>">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Data Karyawan</span></a>
        </li>
        <li class="nav-item <?= $title == 'Data Kendaraan' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url() . 'home/datakendaraan'; ?>">
                <i class="fas fa-fw fa-car"></i>
                <span>Data Kendaraan</span></a>
        </li>
        <?php if ($login['role_id'] == 'ADMIN') : ?>
            <li class="nav-item <?= $title == 'Data User' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url() . 'admin/datauser'; ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data User</span></a>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . 'admin/datauser'; ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Profil</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="logout('<?= base_url() . 'auth/logout'; ?>');">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
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
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang, </span>
                            <span class="mr-2 d-none d-lg-inline text-primary small"><?= $login['nama'] ?></span>
                            <img class="img-profile rounded-circle" src="<?= base_url() . 'assets/imgusers/' . $login['photo']; ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url() . 'home/profil/' . $login['username']; ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="logout('<?= base_url() . 'auth/logout'; ?>');">
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
            <div class="container">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold float-left"><a class="btn btn-danger font-weight-bold" href="<?= base_url() . 'home/datakaryawan'; ?>"><i class="fa fa-fw fa-arrow-circle-left"></i>
                                Kembali</a>
                        </h6>
                        <h6 class="m-0 font-weight-bold float-right">
                            <button class="btn btn-primary font-weight-bold tombolTambahData" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-fw fa-edit"></i>
                                Edit</button>
                            <?php foreach ($queryKaryawan as $row) : ?>
                                <?php if ($login['role_id'] == 'ADMIN') : ?>

                                    <a class="btn btn-danger font-weight-bold" onclick="deleteResult('<?= base_url() . 'admin/deletedatakaryawan/' . $row->nik ?>');"><i class="fa fa-fw fa-trash"></i>
                                        Delete</a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </h6>
                    </div>

                    <div class="card-body">
                        <div class="container-sm">
                            <br>
                            <span class="h3 mt-2 font-weight-bold text-gray-800">Detail Karyawan | <span class="h5 font-weight-bold"><?= date("d-m-Y, h:i:s") ?></span></span>
                            <br>
                            <br>
                            <?php echo $this->session->flashdata('message') ?>
                            <?php echo validation_errors(); ?>

                            <?php foreach ($queryKaryawan as $row) : ?>

                                <div class="mb-3">
                                    <label for="nik" class="form-label control-label">NIK</label>
                                    <input type="number" readonly class="form-control" value="<?= $row->nik; ?>" required>

                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label control-label">Nama</label>
                                    <input type="text" readonly class="form-control" value="<?= $row->nama; ?>" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="mb-3">
                                    <label for="departemen" class="form-label control-label">Departemen</label>
                                    <input type="text" readonly class="form-control" value="<?= $row->departemen; ?>" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="mb-3">
                                    <label for="plant" class="form-label control-label">Plant</label>
                                    <input type="text" readonly class="form-control" readonly value="<?= $row->plant; ?>" required>
                                </div>


                                </form>

                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

            </div>


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

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class=" modal-content">
            <div class="modal-header">
                <span class="h4 mt-2 font-weight-bold text-gray-800">Edit Karyawan | <span class="h6 font-weight-bold"><?= date("d-m-Y, h:i:s") ?></span></span>
            </div>
            <div class="modal-body">
                <form id="formUser" action="<?= base_url() . 'home/datakaryawaneditaction'; ?>" method="POST" enctype="multipart/form-data">
                    <?php foreach ($queryKaryawan as $row) : ?>

                        <div class="row">
                            <!-- Start Left Form -->
                            <div class="col-md">

                                <div class="row">
                                    <div class="col">

                                        <div class="mb-3">
                                            <label for="nik" class="form-label control-label">NIK</label>
                                            <input type="number" name="nik" class="form-control" id="nik" value="<?= $row->nik; ?>" required>
                                            <input type="hidden" name="nik_lama" class="form-control" id="nik_lama" value="<?= $row->nik; ?>">
                                            <input type="hidden" name="create_by" class="form-control" id="create_by" value="<?= $login['nama'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="form-label control-label">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $row->nama; ?>" required oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                        <div class="mb-3">
                                            <label for="departemen" class="form-label control-label">Departemen</label>
                                            <input type="text" name="departemen" class="form-control" id="departemen" value="<?= $row->departemen; ?>" required oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                        <div class="mb-3">
                                            <label for="plant" class="form-label control-label">Plant</label>
                                            <input type="text" name="plant" class="form-control" id="plant" readonly value="<?= $row->plant; ?>" required>
                                        </div>


                                        <a class="btn btn-danger font-weight-bold float-right" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</a>

                                        <button type="submit" class="btn btn-success mx-2 font-weight-bold float-right" onclick="submitKaryawan(event);"><i class='fas fa-plus-circle'></i>
                                            Ubah Data</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->