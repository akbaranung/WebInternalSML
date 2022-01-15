<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_statuskaryawan') ?>">Status Karyawan</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($status as $s) : ?>
            <?php echo form_open('Admin/C_statuskaryawan/update'); ?>
            <div class="form-group">
                <label for="judul">Status Karyawan</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $s->id ?>">
                <input type="text" class="form-control" id="status" name="status" placeholder="Masukan Status Karyawan" value="<?= $s->status ?>">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        <?php endforeach ?>
    </div>
</div>