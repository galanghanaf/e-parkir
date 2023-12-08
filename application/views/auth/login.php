<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <script src="<?= base_url() . 'assets/js/jquery-3.5.1.js' ?>"></script>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url() . 'assets/sbadmin2/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet"
        type="text/css">
    <link
        href="<?= base_url() . 'assets/fonts/nunito.css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' ?>"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url() . 'assets/sbadmin2/css/sb-admin-2.min.css' ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url() . 'assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/css/style.css' ?>" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() . 'assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() . 'assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js' ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() . 'assets/sbadmin2/js/sb-admin-2.min.js' ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() . 'assets/sbadmin2/vendor/datatables/jquery.dataTables.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js' ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() . 'assets/sbadmin2/js/demo/datatables-demo.js' ?>"></script>


    <!-- Start sweetalert -->
    <script src="<?= base_url() . 'assets/sweetalert2-11.7.0/sweetalert2.all.min.js' ?>"></script>
    <!-- End sweetalert -->

    <script src="<?= base_url() . 'assets/js/script.js' ?>"></script>
</head>

<body class="text-center">
    <br>

    <!-- Begin Page Content -->
    <div class="container-sm py-5 w-100 d-flex align-items-center justify-content-center">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="container-sm">


                    <?php echo $this->session->flashdata('message') ?>
                    <?php echo validation_errors(); ?>

                    <main class="form-signin px-5">
                        <br>
                        <form class="user" method="post" action="<?= base_url('auth'); ?>">
                            <img class="mb-4" src="<?= base_url() . 'assets/img/logo.png' ?>"
                                class="rounded img-fluid img-thumbnail" alt="" width="150" height="150">

                            <div class="form-floating">
                                <input type="text" class="input form-control" id="floatingInput" name="username"
                                    placeholder="Username" autofocus>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input type="password" class="input form-control" id="floatingPassword" name="password"
                                    placeholder="Password">
                            </div>


                            <br>
                            <button type="submit" class="w-100 btn btn-primary mt-2 font-weight-bold" type="submit"><i
                                    class="fa fa-sign-in-alt"></i> Login</button>
                            <p class="mt-5 mb-2 text-muted">&copy; <?= date('Y') ?></p>
                            <br>
                            <p class="mb-3 text-muted">
                                Admin (Username: admin, Password: admin)
                                <br>
                                User (Username: user, Password: user)
                            </p>
                        </form>
                    </main>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    

</body>

</html>
