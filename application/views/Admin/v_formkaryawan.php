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
    <?php if (validation_errors()) : ?>
      <h6 class="text-danger"><?= validation_errors(); ?></h6>
    <?php endif; ?>
    <?php echo form_open_multipart('Admin/C_datakaryawan/tambah'); ?>
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Karyawan">
    </div>
    <div class="form-group">
      <label>Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label>Jenis Kelamin</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin" value="Laki-laki" checked>
                <label class="form-check-label" for="radiolakilaki">
                    Laki-laki
                </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin" value="Perempuan">
                <label class="form-check-label" for="radioperempuan">
                    Perempuan
                </label>
        </div>
    </div>
    <div class="form-group">
      <label for="deskripsi">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
    </div>
    <div class="form-group">
      <label for="deskripsi">No telepon</label>
      <input type="number" class="form-control" id="notelpon" name="notelpon" placeholder="Masukan Nomor Telfon">
    </div>
    <div class="form-group">
      <label>Foto Karyawan</label>
      <input class="form-control" type="file" name="fotokaryawan" id="fotokaryawan">
    </div>

    <div class="form-group">
      <label>Divisi</label>
      <input class="form-control" type="text" name="divisi" id="divisi"  placeholder="Masukan Divisi">
    </div>
    <div class="form-group">
      <label for="nama">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
    </div>
    <div class="form-group">
      <label for="status">Status Karyawan</label>
      <select class="form-control" id="status" name="status">
        <option>-- Pilih Status --</option>
        <?php foreach ($karyawan as $k) : ?>
          <option value="<?= $k->id ?>"><?= $k->status ?></option>
        <?php endforeach; ?>
      </select>
    </div>  
    <div class="mt-3">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>