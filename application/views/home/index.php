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
        <li class="nav-item active">
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
            <div class="container-fluid">
                <div class="row" style="display: flex; justify-content: center;">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 font-weight-bold text-primary mb-1">
                                            Mobil</div>
                                        <?php $mobil = 0;
                                        foreach ($queryActivity as $activity) : ?>
                                        <?php if ($activity->plant == $login['plant'] && $activity->jenis_kendaraan == 'Mobil') : ?>
                                        <?php $mobil++; ?>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $mobil; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-car fa-4x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-5">

                        <h4 class="mb-2 text-gray-800 text-center font-weight-bold"><?= $title; ?></h4>

                        <form id="formUser" action="<?= base_url() . '/home/inputdataactivity' ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="text-center mt-3">
                                <input type="text" name="no_kendaraan" class="form-control" id="no_kendaraan" autofocus>
                                <input type="hidden" name="plant" value="<?= $login['plant']; ?>">
                                <input type="hidden" name="create_by" value="<?= $login['nama']; ?>">
                                <input type="hidden" name="lokasi_input" value="dashboard">
                                <button type="submit" class="btn btn-success font-weight-bold mt-3"><i
                                        class='fas fa-plus-circle'></i> Tambah
                                    Data</button>
                            </div>
                            <br>
                        </form>
                    </div>
                    <!-- Earnings (Annual) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 font-weight-bold text-success mb-1">
                                            Motor</div>
                                        <?php $motor = 0;
                                        foreach ($queryActivity as $activity) : ?>
                                        <?php if ($activity->plant == $login['plant'] && $activity->jenis_kendaraan == 'Motor') : ?>
                                        <?php $motor++; ?>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $motor ?></div>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-motorcycle fa-4x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="mt-1 font-weight-bold text-primary float-left"><?= $title; ?></h6>

                        <a href="<?= base_url() . 'home' ?>"
                            class="btn btn-sm btn-primary font-weight-bold float-right"><i class="fa fa-retweet"></i>
                            Refresh</a>
                    </div>
                    <?php echo $this->session->flashdata('message') ?>
                    <?php echo validation_errors(); ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        <th>No. Kendaraan</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Jam Masuk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                        <tr>
                                        <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Departemen</th>
                                            <th>No. Kendaraan</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Jam Masuk</th>
                                        </tr>
                                        </tr>
                                    </tfoot> -->
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($queryActivity as $activity) : ?>
                                    <?php if ($activity->plant == $login['plant']) : ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $activity->nik; ?></td>
                                        <td><?= $activity->nama; ?></td>
                                        <td><?= $activity->departemen; ?></td>
                                        <td><?= $activity->no_kendaraan; ?></td>
                                        <td><?= $activity->jenis_kendaraan; ?></td>
                                        <td><?= $activity->activity_datetime; ?></td>
                                        <td>
                                            <?php if ($activity->activity_datetime_out == NULL) : ?>
                                            <div class="text-center">
                                                <a onclick="activityCheckOut('<?= base_url() . 'home/dataActivityCheckOut/' . $activity->no_kendaraan ?>')"
                                                    class="btn btn-danger font-weight-bold"><i
                                                        class="fas fa-sign-out-alt"></i> Check Out</a>
                                            </div>
                                            <?php else : ?>
                                            <?= $activity->activity_datetime_out ?>
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