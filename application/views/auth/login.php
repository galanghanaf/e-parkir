<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Start Jquery -->
    <script src="<?=base_url('/assets/datatables/js/jquery-3.5.1.js')?>"></script>
    <link rel="icon" href="<?= base_url() . "assets/icon.png" ?>" type="image/gif">

    <!-- Start sweetalert -->
    <script src="<?=base_url('/assets/sweetalert2-11.7.0/sweetalert2.all.min.js')?>"></script>
    <!-- End sweetalert -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=base_url('/assets/bootstrap-5.2.3/css/bootstrap.min.css')?>">
    <script src="<?=base_url('/assets/bootstrap-5.2.3/js/bootstrap.bundle.min.js')?>"></script>
    <!-- Bootstrap -->

    <!-- Start FontAwesome -->
    <link rel="stylesheet" href="<?=base_url('/assets/fontawesome-v4/css/all.min.css')?>">
    <!-- End FontAwesome -->

    <!-- CSS Login -->
    <link rel="stylesheet" href="<?=base_url('/assets/css/login.css')?>">
    <!-- CSS Login-->
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form class="user" method="post" action="<?=base_url('auth');?>">
            <?php echo $this->session->flashdata('message') ?>
            <?php echo validation_errors(); ?>
            <img class="mb-4" src="<?=base_url('/assets/img/')?>logo.png" class="rounded img-fluid img-thumbnail" alt=""
                width="150" height="150">

            <div class="form-floating">
                <input type="text" class="input form-control" id="floatingInput" name="username"
                    placeholder="Username">
                <label for="floatingInput"><i class="fa fa-user-alt"></i> Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="input form-control" id="floatingPassword" name="password"
                    placeholder="Password">
                <label for="floatingPassword"><i class="fa fa-unlock-alt"></i> Password</label>

            </div>



            <button type="submit" class="w-100 btn btn-lg btn-primary mt-2 fw-bold" type="submit"><i
                    class="fa fa-sign-in-alt"></i> Masuk</button>
            <p class="mt-5 mb-3 text-muted">&copy; <?=date('Y')?></p>
        </form>
    </main>

</body>

</html>