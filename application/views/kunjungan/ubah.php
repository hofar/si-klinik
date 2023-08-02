<main role="main" class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kunjungan</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?= form_open('kunjungan/ubah/' . $kunjungan['id_berobat']); ?>
                    <input type="text" name="id_berobat" class="form-control" value="<?= $kunjungan['id_berobat']; ?>">
                    <div class="form-group">
                        <label for="pasien">Pasien</label>
                        <select name="pasien" id="pasien" class="form-control">
                            <option value="">-- Pilih Pasien --</option>
                            <?php foreach ($pasien as $p) : ?>
                                <?php if ($p['id_pasien'] == $kunjungan['id_pasien']) : ?>
                                    <option value="<?= $p['id_pasien']; ?>" selected><?= $p['nama_pasien']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $p['id_pasien']; ?>"><?= $p['nama_pasien']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <small class="muted text-danger"><?= form_error('pasien'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="dokter">Dokter</label>
                        <select name="dokter" id="dokter" class="form-control">
                            <option value="">-- Pilih Pasien --</option>
                            <?php foreach ($dokter as $d) : ?>
                                <?php if ($d['id_dokter'] == $kunjungan['id_dokter']) : ?>
                                    <option value="<?= $d['id_dokter']; ?>" selected><?= $d['nama_dokter']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $d['id_dokter']; ?>"><?= $d['nama_dokter']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <small class="muted text-danger"><?= form_error('dokter'); ?></small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tgl">Tanggal Berobat</label>
                        <input type="date" name="tgl" id="tgl" class="form-control" value="<?= $kunjungan['tgl_berobat']; ?>">
                        <small class="muted text-danger"><?= form_error('tgl'); ?></small>
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