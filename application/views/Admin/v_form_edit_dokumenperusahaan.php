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
        <?php foreach ($dokumen as $r) : ?>
            <?php echo form_open_multipart('Admin/C_dokumenperusahaan/update'); ?>
            <div class="form-group">
                <input type="hidden" value="<?= $r->id ?>" id="id" name="id">
                <label for="nama">Judul Dokumen</label>
                <input class="form-control" type="text" id="judul" name="judul" placeholder="Masukan Judul Dokumen" value="<?= $r->judul_dokumen; ?>">
                <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>File</label>
                <input class="form-control" type="file" name="file" id="file">
                <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori Dokumen</label>
                <select class="form-control" id="kategori" name="kategori">
                    <option value="<?= $r->id_dokumen ?>"><?= $r->nama_kategori ?></option>
                    <?php foreach ($relasi as $re) : ?>
                        <option value="<?= $re->id ?>"><?= $re->nama_kategori ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        <?php endforeach ?>
    </div>
</div>