<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
    </ol>
  </nav>
  <?= $this->session->flashdata('message'); ?>
  <a href="<?= base_url('Admin/C_datadokumentasi/tambah'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Kegiatan</th>
        <th>Gambar</th>
        <th>Tanggal Kegiatan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      foreach ($dokumentasi as $d) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $d->nama_kegiatan ?></td>
          <td><img src="<?= base_url('./uploads/dokumentasi/') . $d->gambar ?>" alt="" width="100px"></td>  
          <td><?= $d->tgl_kegiatan ?></td>
          <td colspan="3">
            <a class="text-success" href="<?= base_url('Admin/C_datadokumentasi/edit/' . $d->id) ?>"><i class="far fa-edit"></i></a>
            <a class="text-danger" onclick="javascript : return confirm('Anda yakin akan menghapus data ini?')" href="<?= base_url('Admin/C_datadokumentasi/hapus/' . $d->id) ?>"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>