<?php if ($login['role_id'] == 'ADMIN') : ?>
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
        <li class="nav-item">
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
        <li class="nav-item active">
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
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800 text-center font-weight-bold"><?= $title; ?></h1>



                <?php echo $this->session->flashdata('message') ?>
                <?php echo validation_errors(); ?>
                <div class="container-sm mt-5">

                    <?php foreach ($getDataUserById as $row) : ?>
                    <form id="formUser" action="<?= base_url() . 'home/dataUserEditAction' ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="container-md">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="plant" class="form-label">Plant ID</label>
                                        <input <?= $row->role_id == 'ADMIN' ? 'disabled' : '' ?> type="text"
                                            class="form-control" name="plant" id="plant" readonly
                                            value="<?= $row->plant ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input <?= $row->role_id == 'ADMIN' ? 'disabled' : '' ?> type="number"
                                            class="form-control" name="nik" id="nik" value="<?= $row->nik ?>">
                                        <input type="hidden" class="form-control" name="nik_lama" id="nik_lama"
                                            value="<?= $row->nik ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input <?= $row->role_id == 'ADMIN' ? 'disabled' : '' ?> type="text"
                                            class="form-control" name="nama" id="nama" value="<?= $row->nama ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input <?= $row->role_id == 'ADMIN' ? 'disabled' : '' ?> type="text"
                                            class="form-control" name="username" id="username"
                                            value="<?= $row->username ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input <?= $row->role_id == 'ADMIN' ? 'disabled' : '' ?> type="password"
                                                class="form-control" name="password" id="password"
                                                value="<?= $row->password ?>">
                                            <button class="btn btn-dark btn-outline-secondary"
                                                onclick="password_show_hide();" type="button"><i
                                                    class="fas fa-eye text-white" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i></button>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="departemen" class="form-label">Departemen</label>
                                        <input <?= $row->role_id == 'ADMIN' ? 'disabled' : '' ?> type="text"
                                            class="form-control" name="departemen" id="departemen"
                                            value="<?= $row->departemen ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="line" class="form-label">Line</label>
                                        <input <?= $row->role_id == 'ADMIN' ? 'disabled' : '' ?> type="text"
                                            class="form-control" name="line" id="line" value="<?= $row->line ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="posisi" class="form-label">Posisi</label>
                                        <input <?= $row->role_id == 'ADMIN' ? 'disabled' : '' ?> type="text"
                                            class="form-control" name="posisi" id="posisi" value="<?= $row->posisi ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="is_active" class="form-label">Status</label>
                                        <?php if ($row->role_id == 'ADMIN') : ?>
                                        <input <?= $row->role_id == 'ADMIN' ? 'disabled' : '' ?> type="text"
                                            class="form-control" name="nik" id="nik"
                                            value="<?= $row->is_active == '1' ? 'Aktif' : 'Nonaktif' ?>">

                                        <?php else : ?>
                                        <select class="form-control" name="is_active" id="is_active">
                                            <option <?= $row->is_active == '1' ? 'selected' : '' ?> value="1">Aktif
                                            </option>
                                            <option <?= $row->is_active == '0' ? 'selected' : '' ?> value="0">Nonaktif
                                            </option>

                                        </select>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="float-right py-2">
                                <?php if ($row->role_id == 'ADMIN') : ?>

                                <a class="float-right btn btn-danger font-weight-bold"
                                    href="<?= base_url() . 'home/dataUser' ?>"><i class="fas fa-times"></i> Kembali</a>
                                <?php else : ?>
                                <button type="submit" class="float-right btn btn-success font-weight-bold"
                                    onclick="submitResultUser(event);">
                                    <i class='fas fa-plus-circle'></i> Ubah Data</button>
                                <a class="float-right btn btn-danger font-weight-bold mx-2"
                                    href="<?= base_url() . 'home/dataUser' ?>"><i class="fas fa-times"></i> Batal</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>

                    <?php endforeach ?>

                </div>
                <script>
                function password_show_hide() {
                    var x = document.getElementById("password");
                    var show_eye = document.getElementById("show_eye");
                    var hide_eye = document.getElementById("hide_eye");
                    hide_eye.classList.remove("d-none");
                    if (x.type === "password") {
                        x.type = "text";
                        show_eye.style.display = "none";
                        hide_eye.style.display = "block";
                    } else {
                        x.type = "password";
                        show_eye.style.display = "block";
                        hide_eye.style.display = "none";
                    }
                }
                </script>

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
<?php else : ?>
<?php
    $this->session->set_flashdata('message', "<script>Swal.fire(
			'Anda Tidak Punya Otoritas!',
			'',
			'info'
			)</script>");
    header('Location: ' . base_url() . 'home');
    ?>
<?php endif; ?>