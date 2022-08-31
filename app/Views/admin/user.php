<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- datatable -->
<div class="page-content">
    <div class="container-fluid">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Data User</h2>
            </div>

            <!-- modal-hapus -->
            <?php foreach ($user as $row => $val) : ?>
                <div id="modalHapus<?= $val->user_id ?>" class="modal fade custom-modal custom-modal-verify-account">
                    <div class="modal-dialog" role="document">
                        <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="ua-icon-modal-close"></span>
                        </button>
                        <div class="modal-content">
                            <div class="mt-2">
                                <div class="container">
                                    <div class="col-sm-50">
                                        <div class="form-group">
                                            <p class="text-center mt-2">Anda Yakin ingin Menghapus Data Ini?</p>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center">
                                                <div class="justify-content-end mr-5">
                                                    <button type="button" class="btn btn-warning">Tidak</button>
                                                </div>
                                                <div class="justify-content-start ml-5">
                                                    <a href="<?= base_url('admin/user/hapus/' . $val->user_id) ?>" class="btn btn-info">Ya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- end-modal-hapus -->
        </div>
        <div class="table-responsive">
            <div class="m-datatable">
                <table id="datatable" class="table table-striped">
                    <thead class="text-center">
                        <tr>
                            <th><b>No</b></th>
                            <th><b>Email</b></th>
                            <th><b>Username</b></th>
                            <th><b>Role</b></th>
                            <th><b>Foto</b></th>
                            <th><b>Aksi</b></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php $i = 1; ?>
                        <?php foreach ($user as $user => $val) : ?>
                            <tr>
                                <td><b><?= $i++; ?></b></td>
                                <td><?= $val->email ?></td>
                                <td><?= $val->username ?></td>
                                <td><?= $val->role ?></td>
                                <td><img src="<?= base_url() ?>/img/users/<?= $val->user_image ?>" alt=""></td>
                                <td class="d-flex justify-content-center ">

                                    <!-- modal-edit data-->
                                    <!-- <div class="row">
                                        <div class="col-sm mr-1">
                                            <button type="button" class="btn btn-info btn-sm-2" data-toggle="modal" data-target="#modalEdit">
                                                <i class="ua-icon-activity-edit"></i>
                                            </button>
                                        </div>
                                    </div> -->
                                    <!-- end-modal edit data -->

                                    <!-- modal-hapus data-->
                                    <div class="row">
                                        <div class="col-sm ml-1">
                                            <button type="button" class="btn btn-danger btn-sm-2" data-toggle="modal" data-target="#modalHapus<?= $val->user_id ?>">
                                                <i class="ua-icon-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end-modal hapus data -->

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- end-datatable -->

<?= $this->endSection() ?>