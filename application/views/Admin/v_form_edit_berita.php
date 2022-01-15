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
    <?php foreach ($data_berita as $d) : ?>
      <?php echo form_open_multipart('Admin/C_databerita/update'); ?>
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="hidden" value="<?= $d->id ?>" id="id" name="id">
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Berita" value="<?= $d->judul; ?>">
        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label>Tanggal Terbit</label>
        <input class="form-control" type="date" id="tanggal" name="tanggal" placeholder="Masukan Tanggal Terbit" value="<?= $d->tgl_berita_terbit; ?>">
        <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label>Gambar</label>
        <div class="row">
          <div class="col-sm-3">
            <img src="<?= base_url('./uploads/berita/') . $d->gambar ?>" alt="" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
            <input class="form-control" type="file" name="gambar" id="gambar">
          </div>
        </div>
      </div>
      <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi"><?= $d->deskripsi; ?></textarea>
        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="kategori">Kategori Berita</label>
        <select class="form-control" id="kategori" name="kategori">
          <option value="<?= $d->katagori_berita; ?>"><?= $d->kategori; ?></option>
          <?php foreach ($berita as $b) : ?>
            <option value="<?= $b->id ?>"><?= $b->nama_katagori_berita ?></option>
          <?php endforeach; ?>
        </select>
        <div>
          <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group">
        <label>File</label>
        <input class="form-control" type="file" name="file" id="file">
        <div>
          <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="mt-3">
        <a href="<?= base_url('Admin/C_databerita') ?>" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?php echo form_close(); ?>
    <?php endforeach ?>
  </div>
</div>