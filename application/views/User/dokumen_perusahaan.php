<div class="jumbotron jumbotron-fluid dokumen-perusahaan">
    <div class="container">
        <h2> Dokumen Perusahaan</h2>
        <p> Silahkan Cari Dokumen Yang Diinginkan Berdasarkan Dengan Kategorinya : </p>
        <div class="row">
            <div class="col-lg-6">
                <form action="<?= base_url('User/C_dokumenperusahaan_user/Kategori') ?>" method="get">
                    <div class="form-group" style="width:50%;">
                        <select class="form-control" id="kategori" name="kategori">
                            <option value="">-- Pilih Kategori Dokumen --</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k->id ?>"><?= $k->nama_kategori ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Cari</button>
                </form>
            </div>
            <div class="col-lg-6">
                <a href="<?= base_url('User/C_dokumenperusahaan_user/dokumen') ?>" class="btn btn-primary">Tampilkan Semua Dokumen</a>
            </div>
        </div>

        <br>
        <br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Dokumen</th>
                    <th>File</th>
                    <th>Kategori Dokumen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($relasi as $d) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $d->judul_dokumen; ?></td>
                        <td><a href="<?php echo base_url('User/C_dokumenperusahaan_user/download/') . $d->id; ?>"> <?= $d->file; ?> </td>
                        <td><?= $d->nama_kategori; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <br>
    </div>
</div>