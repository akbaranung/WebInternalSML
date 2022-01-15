<section class="detail_berita">
    <div class="jumbotron jumbotron-fluid">
        <?php foreach ($detailberita as $b) : ?>
            <div class="container">
                <h1><?= $b->judul ?></h1>
                <br>
                <img src="<?= base_url('./uploads/berita/') . $b->gambar ?>" style="width:90%; height:90%;">
                <ul class="navbar navbar-nav navbar-expand">
                    <li class="nav-item">
                        <p class="nav-link"><i class="far fa-user"></i> Oleh : Admin</p>
                    </li>
                    <li class="nav-item ml-4">
                        <p class="nav-link"><i class="far fa-clock"></i> <?= date('l, d F Y', strtotime($b->tgl_berita_terbit)); ?> </p>
                    </li>
                </ul>
                <p><?= $b->deskripsi ?></p>
                <p> File : <a href="<?php echo base_url('User/C_berita/download/') . $b->id; ?>"><?= $b->file ?></a></p>
                <hr>
            </div>
    </div>
<?php endforeach ?>
</section>