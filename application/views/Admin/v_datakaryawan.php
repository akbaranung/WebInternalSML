<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('Admin/C_home') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
    </ol>
  </nav>
  <?= $this->session->flashdata('message'); ?>
  <a href="<?= base_url('Admin/C_datakaryawan/tambah'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama </th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>No Telfon</th>
        <th>Foto Karyawan</th>
        <th>Divisi</th>
        <th>Password</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      foreach ($karyawan as $k) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $k->nama ?></td>
          <td><?= $k->alamat ?></td>
          <td><?= $k->jenis_kelamin ?></td>
          <td><?= $k->email ?></td>
          <td><?= $k->no_telpon ?></td>
          <td><img src="<?= base_url('./uploads/karyawan/') . $k->foto_karyawan ?>" alt="" width="100px"></td>
          <td><?= $k->divisi ?></td>
          <td><?= $k->password ?></td>
          <td><?= $k->status ?></td>
          <td colspan="3">
            <a class="text-success" href="<?= base_url('Admin/C_datakaryawan/edit/' . $k->id) ?>"><i class="far fa-edit"></i></a>
            <a class="text-danger" onclick="javascript : return confirm('Anda yakin akan menghapus data ini?')" href="<?= base_url('Admin/C_datakaryawan/hapus/' . $k->id) ?>"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>