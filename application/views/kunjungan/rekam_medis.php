<main role="main" class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kunjungan</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card">
                <div class="card-header bg-dark text-white font-weight-bold text-center">Biodata Pasien</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nama Pasien</th>
                                <td><?= $d['nama_pasien']; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= $d['jk_pasien'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td><?= $d['umur_pasien']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header bg-dark text-white font-weight-bold text-center">Riwayat Berobat</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Tgl Berobat</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th>Penatalaksanaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($riwayat as $r) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $r['tgl_berobat']; ?></td>
                                        <td><?= $r['keluhan']; ?></td>
                                        <td><?= $r['diagnosa']; ?></td>
                                        <td><?= $r['penatalaksaan']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white font-weight-bold text-center">Catatan Rekam Medis</div>
                <div class="card-body">
                    <?= form_open('kunjungan/tambahRekam'); ?>
                    <input type="hidden" name="id_berobat" required value="<?= $d['id_berobat']; ?>">
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" required id="keluhan" class="form-control"><?= $d['keluhan']; ?></textarea>
                        <small class="muted text-danger"><?= form_error('keluhan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <input type="text" name="diagnosa" required id="diagnosa" class="form-control" value="<?= $d['diagnosa']; ?>">
                        <small class="muted text-danger"><?= form_error('diagnosa'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="penata">Penatalaksanaan</label>
                        <select name="penata" id="penata" required class="form-control">
                            <option value="">-- Pilih Penatalaksaan --</option>
                            <option value="Rawat Inap" <?= ($d['penatalaksaan'] == 'Rawat Inap') ? "selected" : ""; ?>>Rawat Inap</option>
                            <option value="Rawat Jalan" <?= ($d['penatalaksaan'] == 'Rawat Jalan') ? "selected" : ""; ?>>Rawat Jalan</option>
                            <option value="Rujuk" <?= ($d['penatalaksaan'] == 'Rujuk') ? "selected" : ""; ?>>Rujuk</option>
                            <option value="Lainnya" <?= ($d['penatalaksaan'] == 'Lainnya') ? "selected" : ""; ?>>Lainnya</option>
                        </select>
                        <small class="muted text-danger"><?= form_error('penata'); ?></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header bg-dark text-white font-weight-bold text-center">Resep Obat</div>
                <div class="card-body">
                    <?= form_open('kunjungan/tambahResep'); ?>
                    <input type="hidden" name="id_berobat" value="<?= $d['id_berobat']; ?>">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="obat">Obat</label>
                                <select name="obat" required id="obat" class="form-control">
                                    <option value="">-- Pilih Obat --</option>
                                    <?php foreach ($obat as $o) : ?>
                                        <option value="<?= $o['id_obat']; ?>"><?= $o['nama_obat']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-4"><i class="bi bi-plus-circle"></i></button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama Obat</th>
                                <th><i class="fas fa-cogs"></i></th>
                            </tr>
                            <?php $no = 1;
                            foreach ($resep as $r) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $r['nama_obat']; ?></td>
                                    <td>
                                        <a href="<?= base_url('kunjungan/hapusResep/' . $r['id_resep'] . '/' . $r['id_berobat']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>