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
    <link href="<?= base_url('/assets/fonts/nunito.css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'); ?>" rel="stylesheet">

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
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() . 'home/datainspeksi'; ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Inspeksi</span></a>
            </li>
            <li class="nav-item active">
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
                <br>
                <br>
                <div class="container-fluid mb-5">

                    <!-- Page Heading -->
                    <h1 class="h3 text-gray-800 text-center font-weight-bold"><?= $title; ?></h1>

                    <br>

                    <?php echo $this->session->flashdata('message') ?>
                    <?php echo validation_errors(); ?>
                    <div class="container-sm">

                        <?php foreach ($queryKendaraan as $row) : ?>
                            <form id="formUser" action="<?= base_url() . 'home/dataInspeksiEditAction' ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="result" class="form-control" id="inspeksiResult" value="<?= $row->result; ?>">

                                <div class="mb-3">
                                    <label for="plant" class="form-label control-label">Plant</label>
                                    <input readonly type="text" name="plant" class="form-control" id="plant" value="<?= $row->plant; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="nik" class="form-label control-label">NIK</label>
                                    <input readonly type="number" name="nik" class="form-control" id="nik" value="<?= $row->nik; ?>">
                                    <input type="hidden" name="create_by" class="form-control" id="create_by" value="<?= $login['nama']; ?>">

                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label control-label">Nama</label>
                                    <input readonly type="text" name="nama" class="form-control" id="nama" value="<?= $row->nama; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="no_kendaraan" class="form-label control-label">Nomor
                                        Kendaraan</label>
                                    <input readonly type="text" name="" class="form-control" id="" value="<?= $row->no_kendaraan; ?>">
                                    <input type="hidden" name="no_kendaraan" class="form-control" id="no_kendaraan" value="<?= $row->no_kendaraan; ?>" oninput="this.value = this.value.toUpperCase()">
                                </div>

                                <div class="mb-3">
                                    <label for="no_sim" class="form-label control-label">Nomor SIM</label>
                                    <input readonly type="text" name="no_sim" class="form-control" id="no_sim" value="<?= $row->no_sim; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                    <input readonly type="text" name="jenis_kendaraan" class="form-control" id="jenis_kendaraan" value=" <?= $row->jenis_kendaraan ?>">


                                </div>
                                <hr>

                                <div class="mb-3">
                                    <label for="stnk" class="form-label control-label">STNK :</label>
                                    <select class="form-control" name="stnk">
                                        <option <?= $row->stnk == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->stnk == 20 ? 'selected' : '' ?> value="20">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sim" class="form-label control-label">SIM :</label>
                                    <select class="form-control" name="sim">
                                        <option <?= $row->sim == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->sim == 20 ? 'selected' : '' ?> value="20">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="helm" class="form-label control-label">HELM :</label>
                                    <select class="form-control" name="helm">
                                        <option <?= $row->helm == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->helm == 0 ? 'selected' : '' ?> value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ban" class="form-label control-label">BAN :</label>
                                    <select class="form-control" name="ban">
                                        <option <?= $row->ban == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->ban == 0 ? 'selected' : '' ?> value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="rem" class="form-label control-label">REM :</label>
                                    <select class="form-control" name="rem">
                                        <option <?= $row->rem == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->rem == 0 ? 'selected' : '' ?> value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="lampu_depan" class="form-label control-label">LAMPU DEPAN :</label>
                                    <select class="form-control" name="lampu_depan">
                                        <option <?= $row->lampu_depan == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->lampu_depan == 0 ? 'selected' : '' ?> value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="lampu_belakang" class="form-label control-label">LAMPU BELAKANG :</label>
                                    <select class="form-control" name="lampu_belakang">
                                        <option <?= $row->lampu_belakang == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->lampu_belakang == 0 ? 'selected' : '' ?> value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sen_kanan" class="form-label control-label">SEN KANAN :</label>
                                    <select class="form-control" name="sen_kanan">
                                        <option <?= $row->sen_kanan == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->sen_kanan == 0 ? 'selected' : '' ?> value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sen_kiri" class="form-label control-label">SEN KIRI :</label>
                                    <select class="form-control" name="sen_kiri">
                                        <option <?= $row->sen_kiri == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->sen_kiri == 0 ? 'selected' : '' ?> value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="klakson" class="form-label control-label">KLAKSON :</label>
                                    <select class="form-control" name="klakson">
                                        <option <?= $row->klakson == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->klakson == 0 ? 'selected' : '' ?> value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="lampu_rem" class="form-label control-label">LAMPU REM :</label>
                                    <select class="form-control" name="lampu_rem">
                                        <option <?= $row->lampu_rem == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->lampu_rem == 0 ? 'selected' : '' ?> value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="spion" class="form-label control-label">SPION :</label>
                                    <select class="form-control" name="spion">
                                        <option <?= $row->spion == 1 ? 'selected' : '' ?> value="1">Ya</option>
                                        <option <?= $row->spion == 0 ? 'selected' : '' ?> value="0">Tidak</option>
                                    </select>
                                </div>


                                <div class="py-2 mb-5">
                                    <?php if ($row->result == 12) : ?>
                                        <a class="float-left btn font-weight-bold btn-success" id="inpeksiMessage">Hasil Inpeksi
                                            Passed</a>
                                    <?php elseif ($row->result < 12) : ?>
                                        <a class="float-left btn font-weight-bold btn-warning" id="inpeksiMessage">Hasil Inpeksi
                                            Warning</a>
                                    <?php elseif ($row->result > 12) : ?>
                                        <a class="float-left btn font-weight-bold btn-danger" id="inpeksiMessage">Hasil Inpeksi
                                            Failed</a>

                                    <?php endif; ?>
                                    <button type="submit" class="float-right btn btn-success font-weight-bold mb-5" onclick="submitResultUser(event);">
                                        <i class='fas fa-plus-circle'></i> Ubah Data</button>
                                    <a class="float-right btn btn-danger font-weight-bold mx-2" href="<?= base_url() . 'home/datainspeksi' ?>"><i class="fas fa-times"></i>
                                        Batal</a>
                                </div>
                    </div>
                </div>




                </form>

            <?php endforeach ?>

            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <!-- End of Content Wrapper -->

    <!-- End of Page Wrapper -->

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

        $(function() {
            $('#stnk, #sim').on('keyup', function() {
                if (parseFloat($('#stnk').val()) == 20) {
                    $('#inpeksiMessage').html('*Sesuai Dengan Stock').css('color', 'green');
                } else
                    $('#inpeksiMessage').html('*Melebihi Stock').css('color', 'red');
            });
        });

        $('select').change(function() {
            var sum = 0;
            $('select :selected').each(function() {
                sum += Number($(this).val());
            });
            if (sum == 12) {
                $('#inpeksiMessage').empty().removeClass('btn-success').removeClass('btn-warning').removeClass(
                    'btn-danger');
                $('#inpeksiMessage').html('Hasil Inpeksi Passed').addClass('btn-success');
                $('#inspeksiResult').val('');
                $('#inspeksiResult').val(sum);
            } else if (sum < 12) {
                $('#inpeksiMessage').empty().removeClass('btn-success').removeClass('btn-warning').removeClass(
                    'btn-danger');
                $('#inpeksiMessage').html('Hasil Inpeksi Warning').addClass('btn-warning');
                $('#inspeksiResult').val('');
                $('#inspeksiResult').val(sum);
            } else if (sum > 12) {
                $('#inpeksiMessage').empty().removeClass('btn-success').removeClass('btn-warning').removeClass(
                    'btn-danger');
                $('#inpeksiMessage').html('Hasil Inpeksi Failed').addClass('btn-danger');
                $('#inspeksiResult').val('');
                $('#inspeksiResult').val(sum);

            }

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