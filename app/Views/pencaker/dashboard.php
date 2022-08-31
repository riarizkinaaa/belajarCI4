<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

// content ISI
<div class="page-content">
    <div class="container-fluid">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Dashboard</h2>
                <div class="page-content__header-description">Selamat datang kembali, <?= session()->get('username') ?></div>
            </div>
        </div>
        <p>Temukan pekerjaan yang tepat sesuai dengan bidang anda</p>
    </div>
</div>
<?= $this->endSection(); ?>