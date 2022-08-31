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
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="widget widget-alpha widget-alpha--color-amaranth">
                    <div>
                        <div class="widget-alpha__amount"><?= $jmlLoker ?></div>
                        <div class="widget-alpha__description">Data Lowongan Kerja</div>
                    </div>
                    <span class="widget-alpha__icon ua-icon-document-solid"></span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="widget widget-alpha widget-alpha--color-java widget-alpha--help">
                    <div>
                        <div class="widget-alpha__amount"><?= $jmlLamaran ?></div>
                        <div class="widget-alpha__description">Data Pelamar</div>
                    </div>
                    <span class="widget-alpha__icon ua-icon-widget-user-group"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>