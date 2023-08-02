<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dokter</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?= form_open('dokter/ubah/' . $dokter['id_dokter']); ?>
                    <input type="hidden" name="id_dokter" class="form-control" value="<?= $dokter['id_dokter']; ?>">
                    <div class="form-group mb-3">
                        <label for="nama">Nama Dokter</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $dokter['nama_dokter']; ?>">
                        <small class="muted text-danger"><?= form_error('nama'); ?></small>
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