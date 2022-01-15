<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_databerita') ?>">Data Berita</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
    </ol>
  </nav>
  <div class="card">
    <div class="card-header">
      <?= $title; ?>
    </div>
  </div>
  <div class="card-body">
    <?php echo form_open_multipart('Admin/C_databerita/tambah'); ?>
    <div class="form-group">
      <label for="judul">Judul</label>
      <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Berita" value="<?= set_value('judul'); ?>">
      <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
      <label>Tanggal Terbit</label>
      <input class="form-control" type="date" id="tanggal" name="tanggal" placeholder="Masukan Tanggal Terbit" value="<?= set_value('tanggal'); ?>">
      <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
      <label>Gambar</label>
      <input class="form-control" type="file" name="gambar" id="gambar">
    </div>
    <div class="form-group">
      <label for="deskripsi">Deskripsi</label>
      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" value="<?= set_value('deskripsi'); ?>"></textarea>
      <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
      <label for="kategori">Kategori Berita</label>
      <select class="form-control" id="kategori" name="kategori">
        <option>-- Pilih Kategori Berita --</option>
        <?php foreach ($berita as $b) : ?>
          <option value="<?= $b->id ?>"><?= $b->nama_katagori_berita ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label>File</label>
      <input class="form-control" type="file" name="file" id="file">
    </div>
    <div class="mt-3">
      <a href="<?= base_url('Admin/C_databerita') ?>" class="btn btn-secondary">Cancel</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>