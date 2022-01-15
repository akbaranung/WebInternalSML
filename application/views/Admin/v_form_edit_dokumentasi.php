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
    <?php foreach ($data_dokumentasi as $dd) : ?>
      <?php echo form_open_multipart('Admin/C_datadokumentasi/update'); ?>
      <div class="form-group">
        <label for="nama">Nama Kegiatan</label>
        <input type="hidden" value="<?= $dd->id ?>" id="id" name="id">
        <input class="form-control" type="text" id="namakegiatan" name="namakegiatan" placeholder="Masukan Nama Kegiatan" value="<?= $dd->nama_kegiatan; ?>">
        <?= form_error('namakegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label>Gambar Kegiatan</label>
        <div class="row">
          <div class="col-sm-3">
            <img src="<?= base_url('./uploads/dokumentasi/') . $dd->gambar ?>" alt="" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
            <input class="form-control" type="file" name="gambarkegiatan" id="gambarkegiatan">
            <?= form_error('gambarkegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Tanggal Kegiatan</label>
        <input class="form-control" type="date" id="tanggal" name="tanggal" placeholder="Masukan Tanggal Kegiatan" value="<?= $dd->tgl_kegiatan; ?>">
        <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?php echo form_close(); ?>
    <?php endforeach ?>
  </div>
</div>