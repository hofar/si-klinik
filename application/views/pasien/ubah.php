<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pasien</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?= form_open('pasien/ubah/' . $pasien['id_pasien']); ?>
                    <input type="hidden" name="id_pasien" class="form-control" value="<?= $pasien['id_pasien']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $pasien['nama_pasien']; ?>">
                        <small class="muted text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jk">Nama Pasien</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L" <?= ($pasien['jk_pasien'] == 'L') ? "selected" : ""; ?>>Laki-Laki</option>
                            <option value="P" <?= ($pasien['jk_pasien'] == 'P') ? "selected" : ""; ?>>Perempuan</option>
                        </select>
                        <small class="muted text-danger"><?= form_error('jk'); ?></small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="umur">Umur</label>
                        <input type="number" name="umur" id="umur" class="form-control" value="<?= $pasien['umur_pasien']; ?>">
                        <small class="muted text-danger"><?= form_error('umur'); ?></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</main>