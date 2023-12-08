<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <br>
    <br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-left"><a class="btn btn-danger font-weight-bold"
                    href="<?= base_url() . 'admin/datauser'; ?>"><i class="fa fa-fw fa-arrow-circle-left"></i>
                    Kembali</a>
            </h6>
            <h6 class="m-0 font-weight-bold float-right">
                <button class="btn btn-primary font-weight-bold tombolTambahData" data-toggle="modal"
                    data-target="#staticBackdrop"><i class="fa fa-fw fa-edit"></i>
                    Edit</button>
                <?php foreach ($users as $user) : ?>
                <a class="btn btn-danger font-weight-bold"
                    onclick="deleteResult('<?= base_url() . 'admin/delete_user/' . $user->username . '/' . $user->photo ?>');"><i
                        class="fa fa-fw fa-trash"></i>
                    Delete</a>
                <?php endforeach; ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="container-sm">
                <br>
                <span class="h3 mt-2 font-weight-bold text-gray-800">Edit User | <span
                        class="h5 font-weight-bold"><?= date("d-m-Y, h:i:s") ?></span></span>
                <br>
                <br>
                <?php echo $this->session->flashdata('message') ?>
                <?php echo validation_errors(); ?>

                <?php foreach ($users as $user) : ?>

                <div class="row">
                    <!-- Start Left Form -->
                    <div class="col-md">

                        <div class="row">

                            <div class="col">

                                <div class="mb-3">
                                    <label for="nik" class="form-label control-label">NIK</label>
                                    <input readonly type="number" class="form-control" value="<?= $user->nik; ?>">


                                </div>
                                <div class="mb-3">
                                    <label class="form-label control-label">Nama</label>
                                    <input type="text" class="form-control" readonly value="<?= $user->nama; ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label control-label">Departemen</label>
                                    <input type="text" class="form-control" readonly value="<?= $user->departemen; ?>">
                                </div>

                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label control-label">Username</label>
                                    <input readonly type="text" class="form-control" i value="<?= $user->username; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label text-gray-800">Password</label>
                                    <div class="input-group">
                                        <input readonly type="password" class="form-control" name="password"
                                            id="password2" value="<?= $user->password; ?>">
                                        <a class="btn btn-dark btn-outline-secondary fas fa-eye text-white"
                                            id="togglePassword2"></a>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label control-label text-gray-800">Photo</label>
                                    <input readonly type="text" class="form-control" required="true"
                                        value="<?= $user->photo; ?>">
                                </div>

                            </div>

                        </div>
                        <br>
                        <center>
                            <div class="mb-4">
                                <img class="img-holder rounded-circle"
                                    src="<?= $user->photo == NULL ?  base_url() . 'assets/imgusers/icon.png' : base_url() . 'assets/imgusers/' . $user->photo ?>" />
                            </div>
                        </center>




                    </div>
                </div>
                <?php endforeach; ?>
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
            <span>Copyright &copy; Galang Hanafi
                <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class=" modal-content">
            <div class="modal-header">
                <span class="h4 mt-2 font-weight-bold text-gray-800">Edit User | <span
                        class="h6 font-weight-bold"><?= date("d-m-Y, h:i:s") ?></span></span>
            </div>
            <div class="modal-body">
                <form id="formUser" action="<?= base_url() . 'admin/edit_user_action'; ?>" method="POST"
                    enctype="multipart/form-data">

                    <?php foreach ($users as $user) : ?>

                    <div class="row">
                        <!-- Start Left Form -->
                        <div class="col-md">

                            <div class="row">

                                <div class="col">

                                    <div class="mb-3">
                                        <label for="nik" class="form-label control-label">NIK</label>
                                        <input readonly type="number" name="nik" class="form-control" id="nik"
                                            value="<?= $user->nik; ?>">
                                        <input type="hidden" name="create_by" class="form-control" id="create_by"
                                            value="<?= $login['nama']; ?>">
                                        <input type="hidden" name="photo_lama" class="form-control" id="photo_lama"
                                            value="<?= $user->photo; ?>">
                                        <input type="hidden" name="plant" class="form-control" id="plant"
                                            value="<?= $user->plant; ?>">
                                        <input type="hidden" name="username_lama" class="form-control"
                                            id="username_lama" value="<?= $user->username; ?>">

                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label control-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" readonly
                                            value="<?= $user->nama; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="departemen" class="form-label control-label">Departemen</label>
                                        <input type="text" name="departemen" class="form-control" readonly
                                            id="departemen" value="<?= $user->departemen; ?>">
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="username" class="form-label control-label">Username</label>
                                        <input type="text" name="username" class="form-control" id="username"
                                            value="<?= $user->username; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label text-gray-800">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="password"
                                                value="<?= $user->password; ?>">
                                            <a class="btn btn-dark btn-outline-secondary fas fa-eye text-white"
                                                id="togglePassword"></a>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="photo" class="form-label control-label text-gray-800">Photo</label>
                                        <input type="file" name="photo" class="form-control" id="photo"
                                            name="photograph" required="true">
                                    </div>

                                </div>

                            </div>
                            <br>
                            <center>
                                <div class="holder mb-4">
                                    <img id="imgPreview" class="img-holder rounded-circle"
                                        src="<?= $user->photo == NULL ? base_url() . 'assets/imgusers/icon2.png' : base_url() . 'assets/imgusers/' . $user->photo ?>" />
                                </div>
                            </center>



                            <div class="float-right mt-3">
                                <a class="btn btn-danger font-weight-bold mx-2" data-dismiss="modal"><i
                                        class="fas fa-times"></i> Tutup</a>

                                <button type="submit" class="btn btn-success font-weight-bold"
                                    onclick="tambahDataUser(event);"><i class='fas fa-plus-circle'></i> Ubah
                                    Data</button>
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