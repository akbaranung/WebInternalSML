<header class="masthead" style="background-image: url(<?= base_url("assets2/img/headway-5QgIuuBxKwM-unsplash.jpg") ?>)">
    <div class="container">
        <div class="masthead-heading text-uppercase">PT Sarana Maju Lestari</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#berita">News</a>
    </div>
</header>

<section class="berita" id="berita">
    <h2 class="title">Berita Terbaru</h2>
    <div class="container">
        <div class="row">
            <?php foreach ($berita_home_terbaru as $b) : ?>
                <div class="col-lg-4 col-sm-12">
                    <div class="card mt-3">
                        <img class=" card-img-top" src="<?= base_url('./uploads/berita/') . $b->gambar ?>" alt="Card image cap" style="height: 200px;">
                        <div class=" card-body">
                            <p class="date"><?= date('d F, Y', strtotime($b->tgl_berita_terbit)) ?></p>
                            <p class="title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $b->judul ?></p>
                            <p class="kategori">Kategori Berita : <?= $b->kategori ?></p>
                            <a href="<?= base_url('User/C_berita/detail_berita/' . $b->id) ?>">
                                <h5>Lihat Selengkapnya <i class="fas fa-arrow-right"></i></h5>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
</section>