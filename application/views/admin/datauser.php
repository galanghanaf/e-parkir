<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <h1 class="mb-2 text-gray-800 text-center font-weight-bold"><?= $title; ?></h1>
    <div class="text-center mb-3">
        <br>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <center>
                <span class="badge badge-pill badge-secondary mb-2 text-center">
                    Silahkan Tambahkan Data Karyawan Terlebih Dahulu, Dengan Departemen Security, Karena Sebagai Syarat
                    Untuk Membuat Data User.</span>
            </center>
        </div>
        <?php echo $this->session->flashdata('message') ?>
        <?php echo validation_errors(); ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Departemen</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Pasword</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td class="text-center align-middle"><?= $no++; ?></td>
                                <td class="text-center align-middle"><span class="badge <?= $user->is_active == '1' ? 'badge-success' : 'badge-dark' ?>"><?= $user->is_active == '1' ? 'Aktif' : 'Nonaktif' ?></span>
                                </td>
                                <td class="text-center align-middle"><?= $user->departemen; ?></td>
                                <td class="text-center align-middle"><?= $user->nik; ?></td>
                                <td class="text-center align-middle"><?= $user->nama; ?></td>
                                <td class="text-center align-middle">
                                    <?= $user->username; ?>
                                    <?php if ($user->username == NULL) : ?>
                                        <span class="badge badge-dark">Empty</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center align-middle">

                                    <?php if ($user->password == NULL) : ?>
                                        <span class="badge badge-dark">Empty</span>

                                    <?php else : ?>
                                        <button class="btn btn-secondary" onclick="setClipboard('<?= $user->password; ?>')"><i class="fa fa-clone"></i></button>
                                    <?php endif; ?>
                                </td>

                                <td class="text-center align-middle"><img class="rounded-circle" src="<?= $user->photo == NULL ?  base_url() . 'assets/imgusers/icon.png' : base_url() . 'assets/imgusers/' . $user->photo ?>" alt="" width="60" height="60"></td>
                                <td class="text-center align-middle">
                                    <?php if ($user->is_active == 1) : ?>
                                        <a class="btn btn-primary font-weight-bold" href="<?= base_url() . 'admin/datauseredit/' . $user->nik; ?>"><i class="fas fa-eye"></i> Detail</a>
                                    <?php else : ?>
                                        <a class="btn btn-success font-weight-bold" href="<?= base_url() . 'admin/datausertambah/' . $user->nik; ?>"><i class="fas fa-plus"></i> Tambah</a>
                                    <?php endif; ?>

                                </td>
                            </tr>
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

<!-- Start Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class=" modal-content">
            <div class="modal-header">
                <span class="h4 mt-2 font-weight-bold text-gray-800">Tambah User | <span class="h6 font-weight-bold"><?= date("d-m-Y, h:i:s") ?></span></span>

            </div>
            <div class="modal-body">
                <form id="formUser" action="<?= base_url() . 'admin/data_user'; ?>" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <!-- Start Left Form -->
                        <div class="col-md mx-5">

                            <div class="row">
                                <div class="col">

                                    <div class="mb-3">
                                        <label for="nama" class="form-label control-label text-gray-800">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label control-label text-gray-800">Username</label>
                                        <input type="text" name="username" class="form-control" id="username">
                                        <input type="hidden" name="created_by" class="form-control" id="created_by" value="<?= $login['nama']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label text-gray-800">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="password">
                                            <button class="btn btn-dark btn-outline-secondary" onclick="password_show_hide();" type="button"><i class="fas fa-eye text-white" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i></button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="photo" class="form-label control-label text-gray-800">Photo</label>
                                        <input type="file" name="photo" class="form-control" id="photo" name="photograph" required="true">
                                    </div>
                                    <center>
                                        <div class="holder mb-4">
                                            <img id="imgPreview" class="img-holder rounded-circle" src="<?= base_url() . 'assets/imgusers/icon.png'; ?>" />
                                        </div>
                                    </center>
                                    <a class="btn btn-danger font-weight-bold float-right" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</a>
                                    <button type="submit" class="btn btn-success mx-2 font-weight-bold float-right" onclick="submitResultUser(event);"><i class='fas fa-plus-circle'></i>
                                        Tambah
                                        Data</button>
                                </div>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->