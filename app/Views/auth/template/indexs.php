<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Index</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/img/favicon.png">


    <link rel="stylesheet" href="<?= base_url() ?>/fonts/open-sans/style.min.css"> <!-- common font  styles  -->
    <link rel="stylesheet" href="<?= base_url() ?>/fonts/universe-admin/style.css"> <!-- universeadmin icon font styles -->
    <link rel="stylesheet" href="<?= base_url() ?>/fonts/mdi/css/materialdesignicons.min.css"> <!-- meterialdesignicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/fonts/iconfont/style.css"> <!-- DEPRECATED iconmonstr -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/flatpickr/flatpickr.min.css"> <!-- original flatpickr plugin (datepicker) styles -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/simplebar/simplebar.css"> <!-- original simplebar plugin (scrollbar) styles  -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/tagify/tagify.css"> <!-- styles for tags -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/tippyjs/tippy.css"> <!-- original tippy plugin (tooltip) styles -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/select2/css/select2.min.css"> <!-- original select2 plugin styles -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/bootstrap/css/bootstrap.min.css"> <!-- original bootstrap styles -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/style.min.css" id="stylesheet"> <!-- universeadmin styles -->



    <script src="<?= base_url() ?>/js/ie.assign.fix.min.js"></script>
</head>

<body class="js-loading ">
    <!-- Loading System -->
    <div class="page-preloader js-page-preloader">
        <div>
            <h1 class="page-preloader__logo">SISFO LOKER</h1>
        </div>
        <div class="page-preloader__desc">Disnakertrans</div>
        <div class="page-preloader__loader">
            <div class="page-preloader__loader-heading">System Loading</div>
            <div class="progress progress-rounded page-preloader__loader-progress">
                <div id="page-loader-progress-bar" class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-light navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="ua-icon-navbar-open navbar-toggler__open"></span>
            <span class="ua-icon-alert-close navbar-toggler__close"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <span class="navbar-brand">
                <a href="#">SISFO LOKER</a>
            </span>
            <!-- navbar menu -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <div class="navbar__menu d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item navbar__menu-item">
                            <a class="nav-link" href="<?= route_to('/') ?>"><b>Home</b></a>
                        </li>
                        <li class="nav-item navbar__menu-item">
                            <a class="nav-link" href="<?= route_to('login') ?>"><b>Login</b></a>
                        </li>
                        <li class="nav-item navbar__menu-item">
                            <a class="nav-link" href="<?= route_to('register') ?>"><b>Register</b></a>
                        </li>
                        <li class="nav-item navbar__menu-item">
                            <a class="nav-link" href="<?= route_to('tentang') ?>"><b>Tentang</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?= $this->renderSection('content') ?>

    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/popper/popper.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/vendor/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>/vendor/simplebar/simplebar.js"></script>
    <script src="<?= base_url() ?>/vendor/text-avatar/jquery.textavatar.js"></script>
    <script src="<?= base_url() ?>/vendor/tippyjs/tippy.all.min.js"></script>
    <script src="<?= base_url() ?>/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="<?= base_url() ?>/vendor/wnumb/wNumb.js"></script>
    <script src="<?= base_url() ?>/js/main.js"></script>



    <div class="sidebar-mobile-overlay"></div>
    <script src="<?= base_url() ?>/js/preview/settings-panel.min.js"></script>
    <script src="<?= base_url() ?>/js/preview/slide-nav.min.js"></script>



</body>

</html>