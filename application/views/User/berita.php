<header class="masthead" style="background-image: url(<?= base_url("assets2/img/berita.jpg") ?>)">
    <div class="container">
        <div class="masthead-heading text-uppercase">Berita Perusahaan</div>
    </div>
</header>

<div class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <?php foreach ($berita as $b) : ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="card mb-5" style="height: 450px;">
                                <?php if ($b->gambar == '') { ?>
                                    <img class="card-img-top" src="<?= base_url('/uploads/berita/berita.jpg') ?> " style="height: 200px;">
                                <?php } else { ?>
                                    <img class="card-img-top" src="<?= base_url('/uploads/berita/') . $b->gambar ?> " style="height: 200px;">
                                <?php } ?>
                                <div class="card-body">
                                    <p class="date"><?= date('d F, Y', strtotime($b->tgl_berita_terbit)) ?></p>
                                    <h5 class="card-title"><?= $b->judul ?></h5>
                                    <a href="<?= base_url('User/C_berita/detail_berita/' . $b->id) ?>" class="btn btn-primary">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h1 class="populer">Berita Terbaru</h1>
                        <hr>
                        <?php foreach ($berita_terbaru as $bb) : ?>
                            <div>
                                <p class="title"><a href="<?= base_url('User/C_berita/detail_berita/' . $bb->id) ?>"><?= $bb->judul ?></p>
                                <p class="date"><i class="far fa-clock"></i> <?= date('d F, Y', strtotime($bb->tgl_berita_terbit)) ?></p>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>