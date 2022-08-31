<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Data Lamaran</h2>
            </div>

            <!-- modal-tambah data-->
            <div class="row">
                <div class="col-sm">
                    <button type="button" class="btn btn-success py-2 btn-block mt-3" data-toggle="modal" data-target="#exampleModal">
                        <i class="ua-icon-plus-alt mr-3"></i>
                        Tambah
                    </button>
                    <div id="exampleModal" class="modal fade custom-modal custom-modal-verify-account">
                        <div class="modal-dialog" role="document">
                            <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="ua-icon-modal-close"></span>
                            </button>
                            <form action="<?= base_url('lamaran/tambah'); ?>" method="post">

                                <div class="modal-content">
                                    <div class="mt-2">
                                        <div class="container">
                                            <div class="col-sm-50">
                                                <div>
                                                    <h2 class="page-content__header-heading text-center">Tambah lamaran</h2>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <select name="id_pencaker" id="id_pencaker" class="form-select form-control form-control-md" aria-label="Default select example">
                                                        <label for="id_pencaker">Nama Pelamar Kerja</label>
                                                        <option selected>---pilih pencari kerja---</option>
                                                        <?php foreach ($dataPencaker as $pencaker) : ?>
                                                            <option value="<?= $pencaker['id_pencaker'] ?>"><?= $pencaker['nm_lkp'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select name="id_loker" id="id_loker" class="form-select form-control form-control-md" aria-label="Default select example">
                                                        <label for="id_loker">Judul Loker</label>
                                                        <option selected>---pilih lowongan kerja---</option>
                                                        <?php foreach ($dataLoker as $loker) : ?>
                                                            <option value="<?= $loker['id_loker'] ?>"><?= $loker['judul_loker'] ?>one</option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="berkas">Berkas Persyaratan</label>
                                                    <input type="file" name="berkas" class="form-control form-control-md <?= ($validation->hasError('berkas')) ? 'is-invalid' : ''; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('berkas'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_lamar">Tgl Melamar</label>
                                                    <input type="date" name="tgl_lamar" placeholder="passwords" value="<?= old('tgl_lamar'); ?>" class="form-control form-control-md <?= ($validation->hasError('tgl_lamar')) ? 'is-invalid' : ''; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tgl_lamar'); ?>
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
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end-modal tambah data -->

        <!-- modal-edit -->
        <?php foreach ($lamaran as $row) : ?>
            <div id="modalEdit<?= $row->id_lamaran ?>" class="modal fade custom-modal custom-modal-verify-account">
                <div class="modal-dialog" role="document">
                    <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="ua-icon-modal-close"></span>
                    </button>
                    <form action="<?= base_url('/lamaran/edit/' . $row->id_lamaran) ?>" method="post">
                        <div class="modal-content">
                            <div class="mt-2">
                                <div class="container">
                                    <div class="col-sm-50">
                                        <div>
                                            <h2 class="page-content__header-heading text-center">Edit lamaran</h2>
                                        </div>
                                        <div class="form-group mt-3">
                                            <select name="id_pencaker" class="form-select form-control form-control-md" aria-label="Default select example">
                                                <label for="id_pencaker">Nama Pelamar Kerja</label>
                                                <option selected value="<?= $row->id_pencaker ?>"><?= $row->nm_lkp ?></option>
                                                <?php foreach ($dataPencaker as $pencaker) : ?>
                                                    <option value="<?= $pencaker['id_pencaker'] ?>"><?= $pencaker['nm_lkp'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="id_loker" class="form-select form-control form-control-md" aria-label="Default select example">
                                                <label for="id_loker">Judul Loker</label>
                                                <option selected value="<?= $row->id_loker ?>"><?= $row->judul_loker ?></option>
                                                <?php foreach ($dataLoker as $loker) : ?>
                                                    <option value="<?= $loker['id_loker'] ?>"><?= $loker['judul_loker'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="berkas">Berkas Persyaratan</label>
                                            <input type="file" name="berkas" value="<?= $row->berkas ?> type=" file" placeholder="" value="<?= $row->berkas ?>" class="form-control form-control-md" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_lamar">Tgl Melamar</label>
                                            <input type="date" name="tgl_lamar" value="<?= date("Y-m-d", strtotime($row->tgl_lamar)) ?>" placeholder="passwords" class="form-control form-control-md" required>
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
        <?php endforeach; ?>
        <!-- end-modal-edit -->

        <!-- modal-hapus -->
        <?php foreach ($lamaran as $row) : ?>
            <div id="modalHapus<?= $row->id_lamaran ?>" class="modal fade custom-modal custom-modal-verify-account">
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
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                                            </div>
                                            <div class="justify-content-start ml-5">
                                                <a href="<?= base_url('lamaran/hapus/' . $row->id_lamaran) ?>" class="btn btn-info">Ya</a>
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
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pencaker</th>
                        <th scope="col">Berkas Persyaratan</th>
                        <th scope="col">Lowongan</th>
                        <th scope="col">Tgl Melamar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($lamaran as $row) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->nm_lkp ?></td>
                            <td><?= $row->berkas ?></td>
                            <td><?= $row->judul_loker ?></td>
                            <td><?= $row->tgl_lamar ?></td>
                            <!-- <td>//<//?php
                                // $lahir    =new DateTime($row->tgl_lhr);
                                 //$today     =new DateTime();
                                 //$umur = $today->diff($lahir);
                                 //echo $umur->y;
                                // ?//></td>
                                // <td>//<//?= //date("d-m-Y",strtotime($row->tgl_lamar))//?//></td> -->

                            <td class="d-flex justify-content-center">

                                <!-- tombol-info data-->
                                <div class="row">
                                    <div class="col-sm mr-1">
                                        <button type="button" class="btn btn-warning btn-sm-2" data-toggle="modal" data-target="#modalInfo<?= $row->id_lamaran ?>">
                                            <i class="ua-icon-alert-info"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- end-tombol info data -->
                                <!-- tombol-edit data-->
                                <div class="row">
                                    <div class="col-sm mr-1 ml-1">
                                        <button type="button" class="btn btn-info btn-sm-2" data-toggle="modal" data-target="#modalEdit<?= $row->id_lamaran ?>">
                                            <i class="ua-icon-activity-edit"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- end-tombol edit data -->

                                <!-- tombol-hapus data-->
                                <div class="row">
                                    <div class="col-sm ml-1">
                                        <button type="button" class="btn btn-danger btn-sm-2" data-toggle="modal" data-target="#modalHapus<?= $row->id_lamaran ?>">
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