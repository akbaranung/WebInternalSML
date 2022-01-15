<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
    </ol>
  </nav>
  <?= $this->session->flashdata('message'); ?>
  <a href="<?= base_url('Admin/C_databerita/tambah'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
  <table id="example" class="table table-striped table-bordered" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul Berita</th>
        <th>Tanggal Terbit</th>
        <th>Gambar</th>
        <th>File</th>
        <th>Deskripsi</th>
        <th>Kategori Berita</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody width="100%">
      <?php
      $i = 1;
      foreach ($berita as $b) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $b->judul ?></td>
          <td><?= $b->tgl_berita_terbit ?></td>
          <td><img src="<?= base_url('./uploads/berita/') . $b->gambar ?>" alt="" width="100px"></td>
          <td><?= $b->file ?></td>
          <td><?= $b->deskripsi ?></td>
          <td><?= $b->kategori ?></td>
          <td>
            <a class="text-warning" href="<?= base_url('Admin/C_databerita/detail/' . $b->id) ?>"><i class="far fa-eye"></i></a>
            <a class="text-success" href="<?= base_url('Admin/C_databerita/edit/' . $b->id) ?>"><i class="far fa-edit"></i></a>
            <a class="text-danger" onclick="javascript : return confirm('Anda yakin akan menghapus data ini?')" href="<?= base_url('Admin/C_databerita/hapus/' . $b->id) ?>"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>