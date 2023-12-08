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
    <link href="<?= base_url('/assets/sbadmin2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet"
        type="text/css">
    <link
        href="<?= base_url('/assets/fonts/nunito.css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'); ?>"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('/assets/sbadmin2/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('/assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

    <!-- Start DataTables -->
    <link href="<?= base_url('/assets/datatables/css/jquery.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/datatables/css/dataTables.dateTime.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/datatables/css/buttons.dataTables.min.css'); ?>" rel="stylesheet">


    <script src="<?= base_url('/assets/datatables/js/jquery-3.5.1.js') ?>"></script>
    <script src="<?= base_url('/assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('/assets/datatables/js/moment.min.js') ?>"></script>
    <script src="<?= base_url('/assets/datatables/js/dataTables.dateTime.min.js') ?>"></script>

    <script src="<?= base_url('/assets/datatables/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('/assets/datatables/js/jszip.min.js') ?>"></script>
    <script src="<?= base_url('/assets/datatables/js/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('/assets/datatables/js/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('/assets/datatables/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('/assets/datatables/js/buttons.print.min.js') ?>"></script>
    <!-- End DataTables -->

    <!-- Start sweetalert -->
    <script src="<?= base_url('/assets/sweetalert2-11.7.0/sweetalert2.all.min.js') ?>"></script>
    <!-- End sweetalert -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('/assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <style>
    input[id="min"] {
        cursor: pointer;
    }

    input[id="max"] {
        cursor: pointer;
    }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?= base_url() . 'home'; ?>">
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
                <a class="nav-link" href="<?= base_url() . 'home/profil/' . $login['username']; ?>">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang, </span>
                                <span class="mr-2 d-none d-lg-inline text-primary small"><?= $login['nama'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url() . 'assets/imgusers/' . $login['photo']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item"
                                    href="<?= base_url() . 'home/profil/' . $login['username']; ?>">
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="mb-3 text-gray-800 text-center font-weight-bold"><?= 'Data Activity Kendaraan'; ?></h1>

                    <div class="text-center mb-5">
                        <a href="<?= base_url() . 'home' ?>" class="btn btn-danger font-weight-bold mx-2"><i
                                class="fa fa-arrow-circle-left"></i>
                            Kembali</a>
                        <a href="<?= base_url() . 'home/dataactivity' ?>" class="btn btn-primary font-weight-bold"><i
                                class="fa fa-retweet"></i>
                            Refresh</a>

                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-5">
                        <div class="card-header py-3 text-center">
                            <div class="d-flex justify-content-center mb-1">
                                <table border="0" cellspacing="5" cellpadding="5">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" id="btnGroupAddon"><i
                                                                class="fa fa-calendar"></i></div>
                                                    </div>

                                                    <input id="min" name="min" value="dd/mm/yyyy" readonly type="text"
                                                        class="form-control" placeholder="Input group example"
                                                        aria-label="Input group example"
                                                        aria-describedby="btnGroupAddon">

                                                </div>
                                            </th>

                                            <th class="text-center">-</th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" id="btnGroupAddon"><i
                                                                class="fa fa-calendar"></i></div>
                                                    </div>
                                                    <input id="max" name="max" value="dd/mm/yyyy" readonly type="text"
                                                        class="form-control" placeholder="Input group example"
                                                        aria-label="Input group example"
                                                        aria-describedby="btnGroupAddon">
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-success font-weight-bold dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-file-download"></i> Export
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item btn btn-group-lg" id="ExportReporttoCSV"><i
                                                class="fa fa-file-csv"></i> Export to CSV</a>
                                        <a class="dropdown-item btn" id="ExportReporttoExcel"><i
                                                class="fa fa-file-excel"></i> Export to Excel</a>
                                    </div>
                                </div>
                            </div>
                            <!-- <button id="ExportReporttoExcel" class="btn btn-success font-weight-bold"><i class="fa fa-file-download"></i> Export</button> -->
                        </div>


                        <?php echo $this->session->flashdata('message') ?>
                        <?php echo validation_errors(); ?>
                        <div class="card-body">
                            <div class="table-responsive">


                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Departemen</th>
                                            <th>No. Kendaraan</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                            <th>Create Date</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                        <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Bagian</th>
                                            <th>No. Kendaraan</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Jam Masuk</th>
                                        </tr>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($queryActivity as $activitykendaraan) : ?>
                                        <?php if ($activitykendaraan->plant == $login['plant']) : ?>
                                        <?php if ($activitykendaraan->jenis_kendaraan == 'Motor' || $activitykendaraan->jenis_kendaraan == 'Mobil') : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $activitykendaraan->nik; ?></td>
                                            <td><?= $activitykendaraan->nama; ?></td>
                                            <td><?= $activitykendaraan->departemen; ?></td>
                                            <td><?= $activitykendaraan->no_kendaraan; ?></td>
                                            <td><?= $activitykendaraan->jenis_kendaraan; ?></td>
                                            <td><?= $activitykendaraan->activity_datetime; ?></td>
                                            <td> <?= $activitykendaraan->activity_datetime_out; ?></td>
                                            <td> <?= strtok($activitykendaraan->create_date, " "); ?></td>

                                        </tr>
                                        <?php endif; ?>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[8]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'DD/MM/YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'DD/MM/YYYY'
        });

        // DataTables initialisation
        var table = $('#example').DataTable({
            buttons: [{
                    extend: 'excel'
                },
                {
                    extend: 'csv'
                },
            ]
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ]
        });

        $("#ExportReporttoExcel").on("click", function() {
            table.button('.buttons-excel').trigger();
        });
        $("#ExportReporttoCSV").on("click", function() {
            table.button('.buttons-csv').trigger();
        });

        // Refilter the table
        $('#min, #max').on('change', function() {
            table.draw();
        });
    });
    </script>

</body>

</html>