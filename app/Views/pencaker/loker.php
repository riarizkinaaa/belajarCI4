<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <div class="container-fluid">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Data Lowongan Kerja</h2>
            </div>
            <!-- modal-tambah data-->
            <div class="row">
                <div class="col-sm">
                    <button type="button" class="btn btn-success py-2 btn-block mt-3" data-toggle="modal" data-target="#exampleModal">
                        <i class="ua-icon-plus-alt mr-3"></i>
                        Tambah
                    </button>
                    <div id="exampleModal" class="modal fade custom-modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="ua-icon-modal-close">&times;</span>
                            </button>

                            <form action="/loker/tambah" method="POST">
                                <div class="modal-content">
                                    <div class="mt-2">
                                        <div class="container-fluid">
                                            <div class="col-sm">
                                                <div>
                                                    <h2 class="page-content__header-heading text-center">Tambah lowongan kerja</h2>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_prshn">Id Perusahaan</label>
                                                    <select name="id_prshn" class="form-select form-control form-control-md" aria-label="Default select example">
                                                        <option selected>---pilih perusahaan---</option>
                                                        <!-- loop perusahaan id -->
                                                        <?php foreach ($perusahaan as $prs) : ?>
                                                            <option value="<?= $prs['id_prshn']; ?>"><?= $prs['nm_prshn']; ?></option>
                                                        <?php endforeach; ?>
                                                        <!-- end-loop perusahaan id -->
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_ktgr">Kategori Loker</label>
                                                    <select name="id_ktgr" class="form-select form-control form-control-md" aria-label="Default select example">
                                                        <option selected>---pilih kategori loker---</option>
                                                        <!-- loop kategori loker id -->
                                                        <?php foreach ($ktgrLoker as $ktgr) : ?>
                                                            <option value="<?= $ktgr['id_ktgr']; ?>"><?= $ktgr['nm_ktgr']; ?></option>
                                                        <?php endforeach; ?>
                                                        <!-- end-loop kategori loker id -->
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="judul_loker">Judul Loker</label>
                                                    <input type="text" name="judul_loker" placeholder="judul lowongan kerja" class="form-control form-control-md" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="posisi">Posisi</label>
                                                    <input type="text" name="posisi" placeholder="posisi atau kedudukan" class="form-control form-control-md" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_buka">Tgl Buka</label>
                                                    <input type="date" name="tgl_buka" placeholder="tanggal upload" class="form-control form-control-md" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_tutup">Tgl Upload</label>
                                                    <input type="date" name="tgl_tutup" placeholder="tanggal upload" class="form-control form-control-md" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="syrt_pend">Syarat Pendidikan</label>
                                                    <input type="text" name="syrt_pend" placeholder="syarat pendidikan" class="form-control form-control-md" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="detail_loker">Detail Loker</label>
                                                    <input type="text" name="detail_loker" placeholder="detail lowongan kerja" class="form-control form-control-md" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gaji">Gaji</label>
                                                    <input type="text" name="gaji" placeholder="gaji" class="form-control form-control-md" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bts_wktu">Batas Waktu</label>
                                                    <input type="date" name="bts_wktu" placeholder="batas waktu" class="form-control form-control-md" required>
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="justify-content-end mr-5">
                                                            <button type="button" class="btn btn-warning" data-dismiss="model">Cancel</button>
                                                        </div>
                                                        <div class="justify-content-start ml-5">
                                                            <button type="submit" class="btn btn-info">Tambah</button>
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

            <!-- modal-info data -->
            <?php foreach ($joinAll as $lok => $value) : ?>
                <div id="modalInfo<?php $value['id_loker'] ?>" class="modal fade custom-modal custom-modal-verify-account">
                    <div class="modal-dialog" role="document">
                        <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="ua-icon-modal-close"></span>
                        </button>
                        <div class="modal-content">
                            <div class="mt-2">
                                <div class="container-fluid">
                                    <div class="col-sm">
                                        <div>
                                            <h2 class="page-content__header-heading text-center">Detail lowongan kerja</h2>
                                        </div>
                                        <div class="form-group">
                                            <p><b>Nama Perusahaan : </b> <?= $value['nm_prshn'] ?></p>
                                            <p><b>Nama Kategori : </b><?= $value['nm_ktgr'] ?></p>
                                            <p><b>Posisi : </b><?= $value['posisi'] ?></p>
                                            <p><b>Syarat Pendidikan : </b><?= $value['syrt_pend'] ?></p>
                                            <p><b>Deskripsi : </b><?= $value['detail_loker'] ?></p>
                                            <p><b>TGL Buka : </b><?= $value['tgl_buka'] ?></p>
                                            <p><b>TGL Tutup : </b><?= $value['tgl_tutup'] ?></p>
                                            <p><b>Di Posting : </b><?= $value['created_at'] ?></p>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center">
                                                <div class="justify-content-end mr-5">
                                                    <button type="button" class="btn btn-warning" data-dismiss="model">Cancel</button>
                                                </div>
                                                <div class="justify-content-start ml-5">
                                                    <button type="button" class="btn btn-info">Simpan</button>
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
            <!-- end-modal info -->

            <!-- modal-edit data -->
            <?php foreach ($joinAll as $lok => $value) : ?>
                <div id="modalEdit<?php $value['id_loker'] ?>" class="modal fade custom-modal custom-modal-verify-account">
                    <div class="modal-dialog" role="document">
                        <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="ua-icon-modal-close"></span>
                        </button>
                        <form action="<?= base_url('/loker/edit/' . $value['id_loker']) ?>" method="post">
                            <div class="modal-content">
                                <div class="mt-2">
                                    <div class="container-fluid">
                                        <div class="col-sm">
                                            <div>
                                                <h2 class="page-content__header-heading text-center">Edit lowongan kerja</h2>
                                            </div>
                                            <input type="hidden" name="id_loker" value="<?= $value['id_loker'] ?>">
                                            <div class="form-group">
                                                <label for="id_prshn">Id Perusahaan</label>
                                                <select name="id_prshn" class="form-select form-control form-control-md" aria-label="Default select example">
                                                    <option selected>---pilih perusahaan---</option>
                                                    <?php foreach ($perusahaan as $prs => $val) : ?>
                                                        <option value="<?= $val['id_prshn'] ?>"><?= $val['nm_prshn']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_ktgr">Kategori Loker</label>
                                                <select name="id_ktgr" class="form-select form-control form-control-md" aria-label="Default select example">
                                                    <option selected>---pilih kategori loker---</option>
                                                    <?php foreach ($ktgrLoker as $ktgr => $val) : ?>
                                                        <option value="<?= $val['id_ktgr'] ?>"><?= $val['nm_ktgr']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="judul_loker">Judul Loker</label>
                                                <input type="text" name="judul_loker" value="<?= $value['judul_loker'] ?>" class="form-control form-control-md">
                                            </div>
                                            <div class="form-group">
                                                <label for="posisi">Posisi</label>
                                                <input type="text" name="posisi" value="<?= $value['posisi'] ?>" class="form-control form-control-md">
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_buka">Tgl Buka</label>
                                                <input type="date" name="tgl_buka" value="<?= $value['tgl_buka'] ?>" class="form-control form-control-md">
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_tutup">Tgl Tutup</label>
                                                <input type="date" name="tgl_tutup" value="<?= $value['tgl_tutup'] ?>" class="form-control form-control-md">
                                            </div>
                                            <div class="form-group">
                                                <label for="syrt_pend">Syarat Pendidikan</label>
                                                <input type="text" name="syrt_pend" value="<?= $value['syrt_pend'] ?>" class="form-control form-control-md">
                                            </div>
                                            <div class="form-group">
                                                <label for="gaji">Gaji</label>
                                                <input type="text" name="gaji" value="<?= $value['gaji'] ?>" class="form-control form-control-md">
                                            </div>
                                            <div class="form-group">
                                                <label for="detail_loker">Detail Loker</label>
                                                <input type="text" name="detail_loker" value="<?= $value['detail_loker'] ?>" class="form-control form-control-md">
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
            <!-- end-modal edit -->

            <!-- modal-hapus data -->
            <?php foreach ($joinAll as $lok => $value) : ?>
                <div id="modalHapus<?php $value['id_loker'] ?>" class="modal fade custom-modal custom-modal-verify-account">
                    <div class="modal-dialog" role="document">
                        <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="ua-icon-modal-close"></span>
                        </button>
                        <div class="modal-content">
                            <div class="mt-2">
                                <div class="container">
                                    <div class="col-sm-50">
                                        <div class="form-group">
                                            <p class="text-center mt-2">Apakah Anda Yakin ingin Menghapus Data Ini?</p>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center">
                                                <div class="justify-content-end mr-5">
                                                    <a href="<?= base_url('loker') ?>" class="btn btn-warning">Tidak</a>
                                                </div>
                                                <div class="justify-content-start ml-5">
                                                    <a href="<?= base_url('/loker/hapus/' . $value['id_loker']) ?>" class="btn btn-info">Ya</a>
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
            <!-- end-modal hapus -->

        </div>
        <div class="table-responsive">
            <div class="m-datatable">
                <table id="datatable" class="table table-striped">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Nama Loker</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Tgl Buka</th>
                            <th scope="col">Tgl Tutup</th>
                            <th scope="col">Syarat Pendidikan</th>
                            <th scope="col">Gaji</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($joinAll as $lok => $value) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $value['nm_ktgr']; ?></td>
                                <td><?= $value['nm_prshn'] ?></td>
                                <td><?= $value['judul_loker'] ?></td>
                                <td><?= $value['posisi'] ?></td>
                                <td><?= $value['tgl_buka'] ?></td>
                                <td><?= $value['tgl_tutup'] ?></td>
                                <td><?= $value['syrt_pend'] ?></td>
                                <td><?= $value['gaji'] ?></td>
                                <td><?= $value['detail_loker'] ?></td>
                                <td class="d-flex justyify-content-center ">
                                    <!-- tombol Info -->
                                    <div class="row">
                                        <div class="col-sm mr-1">
                                            <button type="button" class="btn btn-warning btn-sm-2" data-toggle="modal" data-target="#modalInfo<?php $value['id_loker'] ?>">
                                                <i class="ua-icon-alert-info"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end-tombol Info -->

                                    <!-- tombol-edit data-->
                                    <div class="row">
                                        <div class="col-sm mr-1 ml-1">
                                            <button type="button" class="btn btn-info btn-sm-2" data-toggle="modal" data-target="#modalEdit<?php $value['id_loker'] ?>">
                                                <i class="ua-icon-activity-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- tombol edit data -->

                                    <!-- tombol-hapus data-->
                                    <div class="row">
                                        <div class="col-sm ml-1">
                                            <button type="button" class="btn btn-danger btn-sm-2" data-toggle="modal" data-target="#modalHapus<?php $value['id_loker'] ?>">
                                                <i class="ua-icon-trash"></i>
                                            </button>
                                        </div>
                                    </div>
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