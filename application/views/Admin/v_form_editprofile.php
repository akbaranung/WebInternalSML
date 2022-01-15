<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('Admin/C_home/update'); ?>
        <?php foreach ($data as $row) : ?>
            <div class="form-group">
                <label for="judul">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Kategori" value="<?= $row->nama ?>">
                <input type="hidden" name="id" id="id" value="<?= $row->id ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="judul">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Nama Kategori" value="<?= $row->email ?>" disabled>
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('./uploads/karyawan/') . $row->foto_karyawan ?>" alt="" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="gambar" id="gambar">
                    </div>
                </div>
            </div>
            <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        <?php endforeach ?>
        <?php echo form_close(); ?>
    </div>
</div>
</div>