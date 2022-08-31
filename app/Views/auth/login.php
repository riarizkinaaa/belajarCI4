<?= $this->extend("auth/template/indexs") ?>

<?= $this->section("content") ?>
<div class="container">
    <div class="row mt-1">
        <div class="col mt-5">
            <div class="p-signin mt-5">
                <div class="p-signin__form">
                    <h2 class="p-signin__form-heading">Login</h2>
                    <div class="p-signin__form-content">
                        <div class="panel-body">
                            <?php if (isset($validation)) : ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->listErrors() ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form class="" action="<?= route_to('login') ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="email@gmail.com" autofocus>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="password">
                                    </div>
                                    <div class="form-group col-sm">
                                        <button type="submit" class="btn btn-info btn-block btn-lg p-signin__form-submit">Login</button>
                                    </div>
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