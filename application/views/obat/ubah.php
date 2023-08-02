<main role="main" class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Obat</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?= form_open('obat/ubah/' . $obat['id_obat']); ?>
                    <input type="hidden" name="id_obat" class="form-control" value="<?= $obat['id_obat']; ?>">
                    <div class="form-group mb-3">
                        <label for="nama">Nama Obat</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $obat['nama_obat']; ?>">
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