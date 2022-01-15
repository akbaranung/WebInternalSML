<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_datakaryawan') ?>">Data Karyawan</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
    </ol>
  </nav>
  <div class="card">
    <div class="card-header">
      <?= $title; ?>
    </div>
  </div>
  <div class="card-body">
    <?php foreach ($data_karyawan as $dk) : ?>
      <?php echo form_open_multipart('Admin/C_datakaryawan/update'); ?>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="hidden" value="<?= $dk->id ?>" id="id" name="id">
        <input type="hidden" value="<?= $dk->level ?>" id="level" name="level">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Karyawan" value="<?= $dk->nama; ?>">
        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $dk->alamat; ?></textarea>
        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin" value="Laki-laki" <?php echo ($dk->jenis_kelamin == 'Laki-laki' ? ' checked' : ''); ?>>
          <label class="form-check-label" for="radiolakilaki">
            Laki-laki
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin" value="Perempuan" <?php echo ($dk->jenis_kelamin == 'Perempuan' ? ' checked' : ''); ?>>
          <label class="form-check-label" for="radioperempuan">
            Perempuan
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="deskripsi">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" value="<?= $dk->email; ?>">
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="deskripsi">No telepon</label>
        <input type="number" class="form-control" id="notelpon" name="notelpon" placeholder="Masukan Nomor Telfon" value="<?= $dk->no_telpon; ?>">
        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label>Foto Karyawan</label>
        <div class="row">
          <div class="col-sm-3">
            <img src="<?= base_url('./uploads/karyawan/') . $dk->foto_karyawan ?>" alt="" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
            <input class="form-control" type="file" name="fotokaryawan" id="fotokaryawan">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Divisi</label>
        <input class="form-control" type="text" name="divisi" id="divisi" placeholder="Masukan Divisi" value="<?= $dk->divisi; ?>">
        <?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="nama">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" value="<?= $dk->password; ?>">
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="status">Status Karyawan</label>
        <select class="form-control" id="status" name="status">
          <option value="<?= $dk->status; ?>"><?= $dk->status_karyawan; ?></option>
          <?php foreach ($karyawan as $k) : ?>
            <option value="<?= $k->id ?>"><?= $k->status ?></option>
          <?php endforeach; ?>
        </select>
        <div>
          <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?php echo form_close(); ?>
    <?php endforeach ?>
  </div>
</div>