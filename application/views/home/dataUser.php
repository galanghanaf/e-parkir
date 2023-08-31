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
                <h1 class="mb-2 text-gray-800 text-center font-weight-bold"><?= $title; ?></h1>
                <div class="text-center mb-3">
                    <button type="button" class="btn btn-success tombolTambahData text-center font-weight-bold"
                        data-toggle="modal" data-target="#staticBackdrop">
                        <i class='fas fa-plus-circle'></i> Tambah Data
                    </button>
                </div>


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="mt-1 font-weight-bold text-primary float-left"><?= $title; ?></h6>

                        <a href="<?= base_url() . 'home/datauser' ?>"
                            class="btn btn-sm btn-primary font-weight-bold float-right"><i class="fa fa-retweet"></i>
                            Refresh</a>
                    </div>
                    <?php echo $this->session->flashdata('message') ?>
                    <?php echo validation_errors(); ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Departemen</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                        <tr>
                                        <th>NIK</th>
                                            <th>Nama</th>
                                            <th>departemen</th>
                                            <th>No. Kendaraan</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Jam Masuk</th>
                                        </tr>
                                        </tr>
                                    </tfoot> -->
                                <tbody>
                                    <?php $no = 1;
                                        foreach ($users as $user) : ?>
                                    <?php if ($user->plant == $login['plant']) : ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <span
                                                class=" <?= $user->role_id == 'ADMIN' ? 'badge badge-dark' : 'badge badge-primary' ?>">
                                                <?= $user->role_id == 'ADMIN' ? 'Admin' : 'User' ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class=" <?= $user->is_active == '1' ? 'badge badge-success' : 'badge badge-danger' ?>">
                                                <?= $user->is_active == '1' ? 'Aktif' : 'Nonaktif' ?>
                                            </span>
                                        </td>
                                        <td><?= $user->nik; ?></td>
                                        <td><?= $user->nama; ?></td>
                                        <td><?= $user->username; ?></td>
                                        <td><?= $user->departemen; ?></td>

                                        <td class="text-center">
                                            <?php if ($user->role_id == 'ADMIN') : ?>
                                            <a href="<?= base_url('/home/dataUserEdit/') ?><?= $user->nik ?>"
                                                class="btn btn-sm btn-dark"><i class="fas fa-eye"></i></a>
                                            <?php else : ?>
                                            <a href="<?= base_url('/home/dataUserEdit/') ?><?= $user->nik ?>"
                                                class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <a onclick="deleteResult('<?= base_url('/home/deleteDataUser/') ?><?= $user->nik ?>');"
                                                class="btn btn-sm btn-danger font-weight-bold"><i
                                                    class="fa fa-trash"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <!-- Start Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class=" modal-content">
                    <div class="modal-header">
                        <span class="h4 mt-2">Tambah User | <span class="h6"><?= date("d-m-Y,h:i:s") ?></span></span>

                    </div>
                    <div class="modal-body">
                        <form id="formUser" action="<?= base_url('/home/dataUser') ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="is_active" id="is_active" value="1">
                            <input type="hidden" name="plant" id="plant" value="<?= $login['plant'] ?>">
                            <div class="row">
                                <!-- Start Left Form -->
                                <div class="col-md mx-5">

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="role_id" class="form-label control-label">ROLE
                                                </label>
                                                <select class="form-control" name="role_id">
                                                    <option value="">Pilih Role</option>
                                                    <option value="ADMIN">ADMIN</option>
                                                    <option value="USER">USER</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nik" class="form-label control-label">NIK</label>
                                                <input type="number" name="nik" class="form-control" id="nik">

                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label control-label">Nama</label>
                                                <input type="text" name="nama" class="form-control" id="nama">
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label control-label">Username</label>
                                                <input type="text" name="username" class="form-control" id="username">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password"
                                                        id="password">
                                                    <button class="btn btn-dark btn-outline-secondary"
                                                        onclick="password_show_hide();" type="button"><i
                                                            class="fas fa-eye text-white" id="show_eye"></i>
                                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i></button>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="departemen"
                                                    class="form-label control-label">Departemen</label>
                                                <input type="text" name="departemen" class="form-control"
                                                    id="departemen">
                                            </div>
                                            <div class="mb-3">
                                                <label for="line" class="form-label control-label">Line</label>
                                                <input type="text" name="line" class="form-control" id="line">
                                            </div>
                                            <div class="mb-3">
                                                <label for="posisi" class="form-label control-label">Posisi</label>
                                                <input type="text" name="posisi" class="form-control" id="posisi">
                                            </div>
                                        </div>

                                    </div>



                                    <div class="float-right mt-3">
                                        <a class="btn btn-danger font-weight-bold mx-2" data-dismiss="modal"><i
                                                class="fas fa-times"></i> Tutup</a>
                                        <button type="submit" class="btn btn-success font-weight-bold"
                                            onclick="submitResultUser(event);"><i class='fas fa-plus-circle'></i> Tambah
                                            Data</button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

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