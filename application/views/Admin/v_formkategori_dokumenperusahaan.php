<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_kategori_dokumenperusahaan') ?>">Kategori Dokumen Perusahaan</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('Admin/C_kategori_dokumenperusahaan/tambah'); ?>
        <div class="form-group">
            <label for="judul">Kategori Dokumen Perusahaan</label>
            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukan Kategori Dokumen Perusahaan">
            <h6 class="text-danger"><?= validation_errors(); ?></h6>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>