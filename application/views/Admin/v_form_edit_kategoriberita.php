<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_kategoriberita') ?>">Kategori Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($kategori as $k) : ?>
            <?php echo form_open('Admin/C_kategoriberita/update'); ?>
            <div class="form-group">
                <label for="judul">Nama Kategori Berita</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $k->id ?>">
                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukan Nama Kategori Berita" value="<?= $k->nama_katagori_berita ?>">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        <?php endforeach ?>
    </div>
</div>