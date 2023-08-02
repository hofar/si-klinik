<main role="main" class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dokter</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#formModalDokter">
                <i class="fas fa-plus"></i> Tambah Data Dokter
            </button>
            <a href="<?= base_url('laporan/dokter'); ?>" target="_blank" class="btn btn-secondary mb-2"><i class="bi bi-printer"></i></a>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Dokter</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dokter as $u) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $u['nama_dokter']; ?></td>
                                <td>
                                    <a href="<?= base_url('dokter/ubah/') . $u['id_dokter']; ?>" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                                    <a href="<?= base_url('dokter/hapus/') . $u['id_dokter']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?')"><i class="bi bi-trash"></i></a>
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
<div class="modal fade" id="formModalDokter" tabindex="-1" aria-labelledby="formModalLabelDokter" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelDokter">Tambah Data Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('dokter'); ?>
            <div class="modal-body">
                <input type="hidden" name="id_user" id="id_user">
                <div class="form-group">
                    <label for="nama">Nama Dokter</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                    <small class="muted text-danger"><?= form_error('nama'); ?></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>