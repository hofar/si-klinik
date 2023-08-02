<main role="main" class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kunjungan</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#formModalKunjungan">
                <i class="fas fa-plus"></i> Tambah Data Kunjungan
            </button>
            <a href="<?= base_url('laporan/kunjungan'); ?>" target="_blank" class="btn btn-secondary mb-2"><i class="bi bi-printer"></i></a>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Tanggal</th>
                            <th>Pasien</th>
                            <th>Umur</th>
                            <th>Dokter</th>
                            <th>Rekam Medis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kunjungan as $u) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $u['tgl_berobat']; ?></td>
                                <td><?= $u['nama_pasien']; ?></td>
                                <td><?= $u['umur_pasien']; ?></td>
                                <td><?= $u['nama_dokter']; ?></td>
                                <td>
                                    <a href="<?= base_url('kunjungan/rekam/' . $u['id_berobat']); ?>" class="btn btn-success btn-sm">Rekam</a>
                                </td>
                                <td>
                                    <a href="<?= base_url('kunjungan/ubah/') . $u['id_berobat']; ?>" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                                    <a href="<?= base_url('kunjungan/hapus/') . $u['id_berobat']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="formModalKunjungan" tabindex="-1" aria-labelledby="formModalLabelKunjungan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelKunjungan">Tambah Data Kunjungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('kunjungan'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="pasien">Pasien</label>
                    <select name="pasien" id="pasien" class="form-control">
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach ($pasien as $p) : ?>
                            <option value="<?= $p['id_pasien']; ?>"><?= $p['nama_pasien']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="muted text-danger"><?= form_error('pasien'); ?></small>
                </div>
                <div class="form-group">
                    <label for="dokter">Dokter</label>
                    <select name="dokter" id="dokter" class="form-control">
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach ($dokter as $d) : ?>
                            <option value="<?= $d['id_dokter']; ?>"><?= $d['nama_dokter']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="muted text-danger"><?= form_error('dokter'); ?></small>
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal Berobat</label>
                    <input type="date" name="tgl" id="tgl" class="form-control">
                    <small class="muted text-danger"><?= form_error('tgl'); ?></small>
                </div>
                <!--
                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea name="keluhan" id="keluhan" class="form-control"></textarea>
                    <small class="muted text-danger">
                        <!?= form_error('keluhan'); ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="diagnosa">Diagnosa</label>
                    <input type="text" name="diagnosa" id="diagnosa" class="form-control">
                    <small class="muted text-danger">
                        <!?= form_error('diagnosa'); ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="penata">Penatalaksanaan</label>
                    <select name="penata" id="penata" class="form-control">
                        <option value="">-- Pilih Penatalaksaan --</option>
                        <option value="Rawat Inap">Rawat Inap</option>
                        <option value="Rawat Jalan">Rawat Jalan</option>
                        <option value="Rujuk">Rujuk</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <small class="muted text-danger"><!?= form_error('penata'); ?></small>
                </div>
                -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>