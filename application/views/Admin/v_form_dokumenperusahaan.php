<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_dokumenperusahaan') ?>">Dokumen Perusahaan</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('Admin/C_dokumenperusahaan/tambah'); ?>
        <div class="form-group">
            <label for="judul">Judul Dokumen</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Dokumen Perusahaan" value="<?= set_value('judul'); ?>">
            <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>File</label>
            <input class="form-control" type="file" name="file" id="file">
        </div>
        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="form-group">
            <label for="kategori">Kategori Dokumen</label>
            <select class="form-control" id="kategori" name="kategori">
                <option>-- Pilih Kategori Dokumen --</option>
                <?php foreach ($kategori as $k) : ?>
                    <option value="<?= $k->id ?>"><?= $k->nama_kategori ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>