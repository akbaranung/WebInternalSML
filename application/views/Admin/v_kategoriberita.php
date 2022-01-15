<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <?= $this->session->flashdata('message'); ?>
    <a href="<?= base_url('Admin/C_kategoriberita/tambah'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Kategori</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($berita as $b) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $b->nama_katagori_berita; ?></td>
                    <td colspan="3" class="text-center">
                        <a class="text-success" href="<?= base_url('Admin/C_kategoriberita/edit/' . $b->id) ?>"><i class="far fa-edit"></i></a>
                        <a class="text-danger" onclick="javascript : return confirm('Anda yakin akan menghapus data ini?')" href="<?= base_url('Admin/C_kategoriberita/hapus/' . $b->id) ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>