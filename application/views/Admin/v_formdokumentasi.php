<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_datadokumentasi') ?>">Data Dokumentasi</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
    </ol>
  </nav>
  <div class="card">
    <div class="card-header">
      <?= $title; ?>
    </div>
  </div>
  <div class="card-body">
    <?php if (validation_errors()) : ?>
      <h6 class="text-danger"><?= validation_errors(); ?></h6>
    <?php endif; ?>
    <?php echo form_open_multipart('Admin/C_datadokumentasi/tambah'); ?>
    <div class="form-group">
      <label for="nama">Nama Kegiatan</label>
      <input class="form-control" type="text"  id="namakegiatan" name="namakegiatan" placeholder="Masukan Nama Kegiatan">
    </div>
    <div class="form-group">
      <label>Gambar Kegiatan</label>
      <input class="form-control" type="file" id="gambarkegiatan" name="gambarkegiatan" >
    </div>
    <div class="form-group">
      <label>Tanggal Kegiatan</label>
      <input class="form-control" type="date" id="tanggal" name="tanggal" placeholder="Masukan Tanggal Kegiatan">
    </div>
    <div class="mt-3">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>