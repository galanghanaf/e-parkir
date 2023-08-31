<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url('/assets/sbadmin2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('/assets/sbadmin2/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link rel="icon" href="<?= base_url() . "assets/icon.png" ?>" type="image/gif">
    <!-- Custom styles for this page -->
    <link href="<?= base_url('/assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">


    <script src="<?= base_url('/assets/datatables/js/jquery-3.5.1.js') ?>"></script>

    <!-- JqueryUI -->
    <link rel="stylesheet" href="<?= base_url('/assets/jqueryui/jquery-ui.css') ?>">
    <script src="<?= base_url('/assets/jqueryui/jquery-ui.js') ?>"></script>
    <!-- JqueryUI -->

    <!-- Start sweetalert -->
    <script src="<?= base_url('/assets/sweetalert2-11.7.0/sweetalert2.all.min.js') ?>"></script>
    <!-- End sweetalert -->

    <style>
        .ui-autocomplete {
            z-index: 2147483647;
        }
    </style>
</head>

<body id="page-top">

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
            <li class="nav-item active">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang, </span>
                                <span class="mr-2 d-none d-lg-inline text-primary small"><?= $login['nama'] ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('/assets/img/user.png') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                    <h1 class="mb-4 text-gray-800 text-center font-weight-bold"><?= $title; ?></h1>



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <?php echo $this->session->flashdata('message') ?>
                        <?php echo validation_errors(); ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No. Kendaraan</th>
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
                                        foreach ($tbm_kendaraan as $row) : ?>
                                            <?php if ($row->plant == $login['plant']) : ?>

                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row->nama; ?></td>
                                                    <td><?= $row->no_kendaraan; ?></td>
                                                    <td class="text-center">
                                                        <?php if ($row->result > 0) : ?>
                                                            <a href="<?= base_url('/home/datainspeksiedit/') ?><?= $row->no_kendaraan ?>" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                                        <?php else : ?>
                                                            <a href="<?= base_url('/home/datainspeksiinput/') ?><?= $row->no_kendaraan ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Untuk Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" apabila anda yakin untuk keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url() . 'auth/logout' ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#nik').autocomplete({
                source: "<?= base_url() . 'home/dataKaryawanAutoFill/' . $login['plant'] . '/?' ?>",
                select: function(event, ui) {
                    $('[name="nik"]').val(ui.item.label);
                    $('[name="nama"]').val(ui.item.nama);
                    $('[name="plant"]').val(ui.item.plant);
                }
            });
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('/assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('/assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('/assets/sbadmin2/js/sb-admin-2.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('/assets/sbadmin2/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('/assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('/assets/sbadmin2/js/demo/datatables-demo.js') ?>"></script>

    <!-- Start sweetalert -->
    <script src="<?= base_url('/assets/sweetalert2-11.7.0/sweetalert2.all.min.js') ?>"></script>
    <!-- End sweetalert -->

    <script src="<?= base_url('/assets/js/script.js') ?>"></script>
</body>

</html>