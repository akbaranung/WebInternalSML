<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Berita</div>
              <?php foreach ($count_berita as $cb) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $cb->jumlah ?></div>
              <?php endforeach ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-newspaper fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Dokumen Perusahaan</div>
              <?php foreach ($count_dokumen as $dk) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dk->jumlah ?></div>
              <?php endforeach ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-folder-open fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Karyawan</div>
              <?php foreach ($count_karyawan as $dk) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dk->jumlah ?></div>
              <?php endforeach ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content Row -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Welcome To Dashboard</h6>
    </div>
    <div class="card-body">
      <p>Selamat datang <b><?= $user['nama']; ?></b>, anda bisa mengelola website Sitem Informasi Karyawan PT Sarana Maju Lestari disini.</p>
    </div>
  </div>

  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img class="card-img" src="<?= base_url('./uploads/karyawan/') . $user['foto_karyawan']; ?>" alt="">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $user['nama']; ?></h5>
          <p class="card-text"><?= $user['email']; ?></p>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->