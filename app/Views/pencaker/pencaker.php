<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="mt-3 ml-3 mr-3 mb-0">
        <!-- session gagal simpan -->
            <?php if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-danger" role="alert">
               <?= session()->getFlashdata('pesan')?>
            </div>
    <?php endif; ?>

            <!-- session berhasil simpan -->
     <?php if(session()->getFlashdata('pesan2')): ?>
            <div class="alert alert-success" role="alert">
               <?= session()->getFlashdata('pesan2')?>
            </div>
    <?php endif; ?>
    </div>
    <div class="container-fluid">
        <div class="page-content__header">
            <div>
                <h2 class="page-content__header-heading">Data pencari kerja</h2>
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
                                <span aria-hidden="true" class="ua-icon-modal-close"></span>
                            </button>
                            <form action="<?= base_url('pencaker/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="mt-2">
                                        <div class="container-fluid">
                                            <div class="col-sm-50">

                                                <div>
                                                    <h2 class="page-content__header-heading text-center">Tambah pencari kerja</h2>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="nm_lkp">Nama</label>
                                                    <input type="text" name="nm_lkp" placeholder="nama lengkap" value="<?= old('nm_lkp');?>" class="form-control form-control-md <?= ($validation->hasError('nm_lkp')) ? 'is-invalid' : '';?>">
                                                    <div class="invalid-feedback">
                                                <?= $validation->getError('nm_lkp');?>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_lhr">Tgl Lahir</label>
                                                    <input type="date" name="tgl_lhr" placeholder="judul lowongan kerja" value="<?= old('tgl_lhr');?>" class="form-control form-control-md <?= ($validation->hasError('tgl_lhr')) ? 'is-invalid' : '';?>" >
                                                    <div class="invalid-feedback">
                                                <?= $validation->getError('tgl_lhr');?>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jk">Jenis Kelamin</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="Laki-Laki">
                                                        <label class="form-check-label" for="inlineRadio1">Pria</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="Perempuan">
                                                        <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="usia">Usia</label>
                                                    <input type="number" name="usia" placeholder="usia" value="<?= old('usia');?>" class="form-control form-control-md <?= ($validation->hasError('usia')) ? 'is-invalid' : '';?>" >
                                                    <div class="invalid-feedback">
                                                     <?= $validation->getError('usia');?>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" name="alamat" placeholder="alamat" value="<?= old('alamat');?>" class="form-control form-control-md <?= ($validation->hasError('alamat')) ? 'is-invalid' : '';?>" >
                                                    <div class="invalid-feedback">
                                                     <?= $validation->getError('alamat');?>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tlp">Telepon</label>
                                                    <input type="text" name="tlp" placeholder="telepon" value="<?= old('tlp');?>" class="form-control form-control-md <?= ($validation->hasError('tlp')) ? 'is-invalid' : '';?>" >
                                                    <div class="invalid-feedback">
                                                     <?= $validation->getError('tlp');?>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" placeholder="email@gmail.com" value="<?= old('email');?>" class="form-control form-control-md <?= ($validation->hasError('email')) ? 'is-invalid' : '';?>" >
                                                    <div class="invalid-feedback">
                                                     <?= $validation->getError('email');?>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pengker">Pengalaman Kerja</label>
                                                    <input type="text" name="peng_ker" placeholder="pengalaman kerja" value="<?= old('peng_ker');?>" class="form-control form-control-md <?= ($validation->hasError('peng_ker')) ? 'is-invalid' : '';?>" >
                                                    <div class="invalid-feedback">
                                                     <?= $validation->getError('peng_ker');?>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pend_ter">Pendidikan Terakhir</label>
                                                    <select name="pend_ter" id="pend_ter" class="form-select form-control form-control-md" aria-label="Default select example">
                                                        <option selected>---pilih pendidikan---</option>
                                                        <option value="SMK">SMK/Sederajat</option>
                                                        <option value="D1">D1</option>
                                                        <option value="D2">D2</option>
                                                        <option value="D3">D3</option>
                                                        <option value="D4">D4</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                    </select>   
                                                </div>
                                                <div class="form-group">
                                                    <label for="bid_keahlian">Bidang Keahlian</label>
                                                    <input type="text" name="bid_keahlian" placeholder="bidang keahlian" value="<?= old('bid_keahlian');?>" class="form-control form-control-md <?= ($validation->hasError('bid_keahlian')) ? 'is-invalid' : '';?>" >
                                                    <div class="invalid-feedback">
                                                     <?= $validation->getError('bid_keahlian');?>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sertifikat">Sertifikat Keahlian</label>
                                                    <input type="file" name="sertifikat" class="form-control form-control-md <?= ($validation->hasError('sertifikat')) ? 'is-invalid' : '';?>" >
                                                    <div class="invalid-feedback">
                                                     <?= $validation->getError('sertifikat');?>
                                               </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="justify-content-end mr-5">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end-modal tambah data -->

        <!-- modal-edit data -->
        <?php foreach ($pencaker as $row) : ?>
            <div id="modalEdit<?= $row->id_pencaker ?>" class="modal fade custom-modal custom-modal-verify-account">
                <div class="modal-dialog" role="document">
                    <button type="button" class="close custom-modal__close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="ua-icon-modal-close"></span>
                    </button>
                    <form action="<?= base_url('/pencaker/edit/' . $row->id_pencaker) ?>" method="post">
                        <div class="modal-content">
                            <div class="mt-2">
                                <div class="container">
                                    <div class="col-sm">
                                    <div>
                                    <h2 class="page-content__header-heading text-center">Tambah lowongan kerja</h2>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="nm_lkp">Nama</label>
                                    <input type="text" name="nm_lkp" placeholder="nama lengkap" value="<?=$row->nm_lkp?>" class="form-control form-control-md"  autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lhr">Tgl Lahir</label>
                                    <input name="tgl_lhr" type="date" placeholder="tanggal lahir" value="<?= date("Y-m-d",strtotime($row->tgl_lhr)) ?>" class="form-control form-control-md" >
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="<?=$row->jk ?> ">
                                        <label class="form-check-label" for="inlineRadio1">Pria</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk" id="inlineRadio2"  value="<?=$row-> jk ?>">
                                        <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="usia">Usia</label>
                                    <input name="usia" type="text" placeholder="usia" value="<?=$row->usia ?>" class="form-control form-control-md" >
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input name="alamat" type="text" placeholder="alamat" value="<?=$row->alamat ?> " class="form-control form-control-md" >
                                </div>
                                <div class="form-group">
                                    <label for="tlp">Telepon</label>
                                    <input name="tlp" type="text" placeholder="tlp" value="<?=$row->tlp ?> " class="form-control form-control-md" >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" placeholder="email@gmail.com" value="<?=$row->email ?> " class="form-control form-control-md" >
                                </div>
                                <div class="form-group">
                                    <label for="peng_ker">Pengalaman Kerja</label>
                                    <input name="peng_ker" type="text" placeholder="pengalaman kerja" value="<?=$row->peng_ker ?>" class="form-control form-control-md" >
                                </div>
                                <div class="form-group">
                                    <label for="pend_ter">Pendidikan Terakhir</label>
                                    <select name="pend_ter" class="form-select form-control form-control-md" aria-label="Default select example">
                                        <option selected value="<?= $row->pend_ter ?>"><?= $row->pend_ter ?></option>
                                        <option value="SMK">SMK/Sederajat</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bid_keahlian">Bidang Keahlian</label>
                                    <input name="bid_keahlian" type="text" placeholder="bidang keahlian" value="<?=$row->bid_keahlian?>" class="form-control form-control-md" >
                                </div>
                                <div class="form-group">
                                    <label for="sertifikat">Sertifikat Keahlian</label>
                                    <input name="sertifikat" type="file" placeholder="posisi atau kedudukan" value="<?=$row->sertifikat?>" class="form-control form-control-md" >
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
        <!-- end-modal edit -->

        <!-- modal-hapus data -->
        <?php foreach ($pencaker as $row) : ?>
            <div id="modalHapus<?= $row->id_pencaker ?>" class="modal fade custom-modal custom-modal-verify-account">
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
                                                <a href="<?= base_url('pencaker/hapus/' . $row->id_pencaker) ?>" class="btn btn-info">Ya</a>
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

    <div class="table-responsive">
    <div class="m-datatable">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Kelamin</th>
                        <th scope="col">Tgl Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pendidikan Terakhir</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Keahlian</th>
                        <th scope="col">Sertifikat Keahlian</th>
                        <th scope="col">Pengalaman</th>
                        <th scope="col">Usia</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                        <?php foreach ($pencaker as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row->nm_lkp ?></td>
                                <td><?= $row->jk ?></td>
                                <td><?= $row->tgl_lhr ?></td>
                                <td><?= $row->alamat?></td>
                                <td><?= $row->pend_ter ?></td>
                                <td><?= $row->tlp ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->bid_keahlian ?></td>
                                <td><?= $row->sertifikat ?></td>
                                <td><?= $row->peng_ker ?></td>
                                <td><?= $row->usia ?></td>
                                <td class="d-flex justify-content-center">


                                    <!-- tombol-info data-->
                                    <div class="row">
                                        <div class="col-sm mr-1">
                                            <button type="button" class="btn btn-warning btn-sm-2" data-toggle="modal" data-target="#modalInfo<?= $row->id_pencaker?>">
                                                <i class="ua-icon-alert-info"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end-tombol info data -->
                                    <!-- tombol-edit data-->
                                    <div class="row">
                                        <div class="col-sm mr-1 ml-1">
                                            <button type="button" class="btn btn-info btn-sm-2" data-toggle="modal" data-target="#modalEdit<?= $row->id_pencaker ?>">
                                                <i class="ua-icon-activity-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end-tombol edit data -->

                                    <!-- tombol-hapus data-->
                                    <div class="row">
                                        <div class="col-sm ml-1">
                                            <button type="button" class="btn btn-danger btn-sm-2" data-toggle="modal" data-target="#modalHapus<?= $row->id_pencaker?>">
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