<?= $this->extend("auth/template/indexs") ?>

<?= $this->section("content") ?>
<div class="container">
    <div class="row mt-1">
        <div class="col mt-5">
            <div class="p-signin mt-5">
                <div class="p-signin__form">
                    <h2 class="p-signin__form-heading">Register</h2>
                    <div class="p-signin__form-content">
                        <div class="panel-body">
                            <?php if (!isset($validation)) : ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->listErrors() ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form class="" action="<?= base_url('register') ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="p-signin-work-email">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="username" autofocus>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="p-signin-work-email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="your_email@gmail.com">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="p-signin-set-password">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="p-signin-set-password">Konfirmasi</label>
                                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="role">Level</label>
                                        <select name="role" class="form-select form-control form-control-md" aria-label="Default select example">
                                            <option selected>---pilih level---</option>
                                            <option value="admin">Admin</option>
                                            <option value="instansi">Perusahaan</option>
                                            <option value="pencaker">Pencari Kerja</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm">
                                    <button type="submit" class="btn btn-info btn-block btn-lg p-signin__form-submit">Daftar</button>
                                </div>
                            </form>
                            <hr>
                            <div class="p-signin__form-links mt-0 mb-0">
                                <a href="#">Buat akun</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>