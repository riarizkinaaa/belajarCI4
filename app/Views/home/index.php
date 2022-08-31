<?= $this->extend('auth/template/indexs'); ?>

<?= $this->section('content'); ?>

<!-- content side -->
<div class="page-content mt-2 ml-0">
  <h1 class="text-center">Semua Lowongan Pekerjaan</h1>
</div>
<div class="row ml-2 mr-2">
  <?php foreach ($loker as $row) : ?>
    <div class="col-xl-4 col-md-6">
      <div class="main-container">
        <h3 class="text-center"><b><?= $row['judul_loker'] ?></b></h3>
        <table border="0">
          <tr>
            <th>Nama Kategori</th>
            <td><?= ': ', $row['nm_ktgr'] ?></td>
          </tr>
          <tr>
            <th>Nama Perusahaan</th>
            <td><?= ': ', $row['nm_prshn'] ?></td>
          </tr>
          <tr>
            <th>Posisi</th>
            <td><?= ': ', $row['posisi'] ?></td>
          </tr>
          <tr>
            <th>Syarat Pendidikan</th>
            <td><?= ': ', $row['syrt_pend'] ?></td>
          </tr>
          <tr>
            <th>Deskripsi</th>
            <td><?= ': ', $row['detail_loker'] ?></td>
          </tr>
          <tr>
            <th>Tgl Buka</th>
            <td><?= ': ', $row['tgl_buka'] ?></td>
          </tr>
          <tr>
            <th>Tgl Tutup</th>
            <td><?= ': ', $row['tgl_tutup'] ?></td>
          </tr>
          <tr>
            <th>Di Posting</th>
            <td><?= ': ', $row['created_at'] ?></td>
          </tr>
        </table>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>