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
            <div class="header">
                <h1><?= $d->judul ?></h1>
                <div class="row">
                    <div class="col-3">
                        <div>
                            <p>Terbit :</p>
                            <span class="badge badge-primary"><?= date('l, d F Y', strtotime($d->tgl_berita_terbit)); ?></span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <p>Penulis :</p>
                            <span class="badge badge-primary"><?= $user['nama']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <img src="<?= base_url('./uploads/berita/') . $d->gambar ?>" alt="">
            </div>
            <div>
                <?= $d->deskripsi; ?>
            </div>
        <?php endforeach ?>
    </div>
</div>
</div>