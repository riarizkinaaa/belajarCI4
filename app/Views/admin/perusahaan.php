<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <div class="mt-3 ml-3 mr-3 mb-0">
        <!-- session gagal simpan -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php endif; ?>

        <!-- session berhasil simpan -->
        <?php if (session()->getFlashdata('pesan2')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan2') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="container-fluid">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Data Perusahaan</h2>
            </div>

            <!-- modal-tambah data-->
            <div class="row">
                <div class="col-sm">
                    <!-- <button type="button" class="btn btn-success py-2 btn-block mt-3" data-toggle="modal" data-target="#exampleModal">
                        <i class="ua-icon-plus-alt mr-3"></i>
                        Tambah
                    </button> -->
                    <div id="exampleModal" class="modal fade custom-modal custom-modal-verify-account">
                        <div class="modal-dialog" role="document">
                            <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="ua-icon-modal-close"></span>
                            </button>
                            <form action="<?= base_url('/admin/perusahaan/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="modal-content">
                                    <div class="mt-2">
                                        <div class="container">
                                            <div class="col-sm-50">
                                                <div>
                                                    <h2 class="page-content__header-heading text-center">Tambah Data Perusahaan</h2>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nm_prshn">Nama Perusahaan</label>
                                                    <input type="text" name="nm_prshn" placeholder="nama perusahaan" value="<?= old('nm_prshn'); ?>" class="form-control form-control-md <?= ($validation->hasError('nm_prshn')) ? 'is-invalid' : ''; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('nm_prshn'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" name="alamat" placeholder="alamat" value="<?= old('alamat'); ?>" class="form-control form-control-md <?= ($validation->hasError('nm_prshn')) ? 'is-invalid' : ''; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('alamat'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">E-mail</label><br>
                                                    <input type="email" name="email" placeholder="email@gmail.com" value="<?= old('email'); ?>" class="form-control form-control-md <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('alamat'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tlp">Telepon</label>
                                                    <input type="text" name="tlp" placeholder="nomor telepon" value="<?= old('tlp'); ?>" class="form-control form-control-md <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tlp'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="logo">Logo</label>
                                                    <input type="file" name="logo" id="logo" class="form-control form-control-md <?= ($validation->hasError('logo')) ? 'is-invalid' : ''; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('logo'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="srt_izin">Surat Izin</label>
                                                    <input type="file" name="srt_izin" id="srt_izin" class="form-control form-control-md <?= ($validation->hasError('srt_izin')) ? 'is-invalid' : ''; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('srt_izin'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="strk_organis">Struktur Organisasi</label>
                                                    <input type="file" name="strk_organis" placeholder="struktur orgsnisasi" class="form-control form-control-md <?= ($validation->hasError('strk_organis')) ? 'is-invalid' : ''; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('strk_organis'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="justify-content-end mr-5">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                        <div class="justify-content-start ml-5">
                                                            <button type="submit" class="btn btn-info">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end-modal tambah data -->

            <!-- modal-info -->
            <?php foreach ($info as $k => $value) : ?>
                <div id="modalInfo<?= $value['id_prshn'] ?>" class="modal fade custom-modal custom-modal-verify-account">
                    <div class="modal-dialog" role="document">
                        <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="ua-icon-modal-close"></span>
                        </button>
                        <div class="modal-content">
                            <div class="mt-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <h2 class="page-content__header-heading text-center">Detail Perusahaan</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mt-2 d-flex justify-content-center">
                                                <img width="400px" height="200px" src="<?= base_url() ?>/img2/<?= $value['logo']; ?>" alt="not found">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5 mb-2">
                                        <div class="col mb-4">
                                            <table>
                                                <tr>
                                                    <th>Nama Perusahaan</th>
                                                    <td><?= ': ', $value['nm_prshn'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td><?= ': ', $value['alamat'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Kontak</th>
                                                    <td><?= ': ', $value['tlp'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?= ': ', $value['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Surat Izin</th>
                                                    <td><?= ': ', $value['srt_izin'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Struktur</th>
                                                    <td><?= ': ', $value['strk_organis'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div class="text-center mb-4">
                                        <a href="mailto:bahrysaipul266@gmail.com?subject=Susd&body=dasda"><?php //$value['email'] 
                                                                                                            ?></a>
                                    </div> -->
                                    <!-- <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <div class="d-flex justify-content-center">
                                                <div class="justify-content-end mr-5">
                                                    <button type="button" class="btn btn-warning" data-dismiss="model">Cancel</button>
                                                </div>
                                                <div class="justify-content-start ml-5">
                                                    <button type="submit" class="btn btn-info">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- end-modal-info -->

        <!-- modal-edit -->
        <?php foreach ($perusahaan as $row) : ?>
            <div id="modalEdit<?= $row->id_prshn ?>" class="modal fade custom-modal custom-modal-verify-account">
                <div class="modal-dialog" role="document">
                    <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="ua-icon-modal-close"></span>
                    </button>
                    <form action="<?= base_url('/admin/perusahaan/edit/' . $row->id_prshn) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="mt-2">
                                <div class="container">
                                    <div class="col-sm-50">
                                        <div>
                                            <h2 class="page-content__header-heading text-center">Edit Data Perusahaan</h2>
                                        </div>
                                        <input type="hidden" name="id_prshn" value="<?= $row->id_prshn ?>">
                                        <div class="form-group">
                                            <label for="nm_prshn">Nama Perusahaan</label>
                                            <input type="text" name="nm_prshn" value="<?= $row->nm_prshn ?>" class="form-control form-control-md">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" value="<?= $row->alamat ?>" class="form-control form-control-md">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="email" name="email" value="<?= $row->email ?>" class="form-control form-control-md">
                                        </div>
                                        <div class="form-group">
                                            <label for="tlp">Telepon</label>
                                            <input type="text" name="tlp" value="<?= $row->tlp ?>" class="form-control form-control-md">
                                        </div>
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" name="logo" value="<?= $row->logo ?>" class=" form-control form-control-md">
                                        </div>
                                        <div class="form-group">
                                            <label for="srt_izin">Surat Izin</label>
                                            <input type="file" name="srt_izin" value="<?= $row->srt_izin ?>" class=" form-control form-control-md">
                                        </div>
                                        <div class="form-group">
                                            <label for="strk_organis">Struktur Organisasi</label>
                                            <input type="file" name="strk_organis" value="<?= $row->strk_organis ?>" class=" form-control form-control-md">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center">
                                                <div class="justify-content-end mr-5">
                                                    <button type="button" class="btn btn-warning" data-dismiss="model">Cancel</button>
                                                </div>
                                                <div class="justify-content-start ml-5">
                                                    <button type="submit" class="btn btn-info">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- end-modal-edit -->

        <!-- modal-hapus -->
        <?php foreach ($perusahaan as $row) : ?>
            <div id="modalHapus<?= $row->id_prshn ?>" class="modal fade custom-modal custom-modal-verify-account">
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
                                                <button type="button" class="btn btn-warning" data-dismiss="model">Tidak</button>
                                            </div>
                                            <div class="justify-content-start ml-5">
                                                <a href="<?= base_url('/admin/perusahaan/hapus/' . $row->id_prshn) ?>" class="btn btn-info">Ya</a>
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

        <div class="table-responsive">
            <div class="m-datatable">
                <table id="datatable" class="table table-striped">
                    <thead class="text-center">
                        <tr>
                            <th scope="col"><b>No</b></th>
                            <th scope="col"><b>Nama Perusahaan</b></th>
                            <th scope="col"><b>Alamat</b></th>
                            <th scope="col"><b>Email</b></th>
                            <th scope="col"><b>Telepon</b></th>
                            <th scope="col"><b>Logo</b></th>
                            <th scope="col"><b>Surat Izin</b></th>
                            <th scope="col"><b>Struktur</b></th>
                            <th scope="col"><b>Aksi</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($perusahaan as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row->nm_prshn ?></td>
                                <td><?= $row->alamat ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->tlp ?></td>
                                <td><img src="<?= base_url() ?>/img2/<?= $row->logo; ?>" width="100"></td>
                                <td><?= $row->srt_izin ?></td>
                                <td><?= $row->strk_organis ?></td>
                                <td class="d-flex justify-content-center">

                                    <!-- tombol-info data-->
                                    <div class="row">
                                        <div class="col-sm">
                                            <!-- mr-1 -->
                                            <button type="button" class="btn btn-warning btn-sm-2" data-toggle="modal" data-target="#modalInfo<?= $row->id_prshn ?>">
                                                <i class="ua-icon-alert-info"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end-tombol info data -->
                                    <!-- tombol-edit data-->
                                    <!-- <div class="row">
                                        <div class="col-sm mr-1 ml-1">
                                            <button type="button" class="btn btn-info btn-sm-2" data-toggle="modal" data-target="#modalEdit<?= $row->id_prshn ?>">
                                                <i class="ua-icon-activity-edit"></i>
                                            </button>
                                        </div>
                                    </div> -->
                                    <!-- end-tombol edit data -->

                                    <!-- tombol-hapus data-->
                                    <!-- <div class="row">
                                        <div class="col-sm ml-1">
                                            <button type="button" class="btn btn-danger btn-sm-2" data-toggle="modal" data-target="#modalHapus<?= $row->id_prshn ?>">
                                                <i class="ua-icon-trash"></i>
                                            </button>
                                        </div>
                                    </div> -->
                                    <!-- end-tombol hapus data -->

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<?= $this->endSection(); ?>