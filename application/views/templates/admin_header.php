<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <script src="<?= base_url() . 'assets/js/jquery-3.5.1.js' ?>"></script>

    <!-- Start sweetalert -->
    <script src="<?= base_url('/assets/sweetalert2-11.7.0/sweetalert2.all.min.js') ?>"></script>
    <!-- End sweetalert -->

    <!-- Custom fonts for this template -->
    <link href="<?= base_url() . 'assets/sbadmin2/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url() . 'assets/fonts/nunito.css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url() . 'assets/sbadmin2/css/sb-admin-2.min.css' ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url() . 'assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css' ?>" rel="stylesheet">

    <script src="<?= base_url() . 'assets/parsley2.9.2/parsley.js' ?>"></script>

    <link href="<?= base_url() . 'assets/css/style.css' ?>" rel="stylesheet">


</head>

<body id="page-top">

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
            <li class="nav-item <?= $title == 'Profil Saya' ? 'active' : ''; ?>">
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