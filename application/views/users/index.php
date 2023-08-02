<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<main role="main" class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-2 tombolTambahUser" data-bs-toggle="modal" data-bs-target="#formModalUser">
                <i class="fas fa-plus"></i> Tambah Data User
            </button>

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($users as $u) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $u['nama_lengkap']; ?></td>
                                <td><?= $u['username']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-info tombolUbahUser" data-bs-toggle="modal" data-id="<?= $u['id_user']; ?>" data-bs-target="#formModalUser">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <a href="<?= base_url('users/hapus/') . $u['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?')"><i class="bi bi-trash"></i></a>
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
<div class="modal fade" id="formModalUser" tabindex="-1" aria-labelledby="formModalLabelUser" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelUser">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('users'); ?>
            <div class="modal-body">
                <input type="hidden" name="id_user" id="id_user">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                    <small class="muted text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <small class="muted text-danger"><?= form_error('username'); ?></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <small class="muted text-danger"><?= form_error('password'); ?></small>
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

<script>
    $(document).ready(function() {
        $('.tombolTambahUser').click(function() {
            $('#formModalLabelUser').html('Tambah Data User');
            $('.modal-footer button[type="submit"]').html('Tambah');
        });

        $('.tombolUbahUser').click(function() {
            $('#formModalLabelUser').html('Ubah Data User');
            $('.modal-footer button[type="submit"]').html('Ubah');
            $('.modal-body form').attr('action', "<?= site_url('users/ubahUser') ?>");

            const id = $(this).data('id');

            $.ajax({
                url: "<?= site_url('users/getuserid') ?>",
                method: 'post',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#id_user').val(data.id_user);
                    $('#nama').val(data.nama_lengkap);
                    $('#username').val(data.username);
                    // $('#password').val(data.password);
                }
            });
        });
    });
</script>