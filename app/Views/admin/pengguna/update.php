<?= $this->extend('admin/layout/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title"><?= $judul; ?></h4>
                </div>
                <div class="col-md-6 col-lg-6">
                    <form action="<?= base_url("pengguna/update/{$pengguna['id_pengguna']}") ?>" method="post">
                        <div class="form-group">
                            <label for="email2">Nama pengguna</label>
                            <input
                                type="text"
                                class="form-control"
                                name="nama"
                                value="<?= old('nama', $pengguna['nama']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Email</label>
                            <input
                                type="text"
                                class="form-control"
                                name="email"
                                value="<?= old('email', $pengguna['email']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Kata Sandi</label>
                            <input
                                type="text"
                                class="form-control"
                                name="kata_sandi"
                                value="<?= old('kata_sandi', $pengguna['kata_sandi']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Nomor Telpon</label>
                            <input
                                type="text"
                                class="form-control"
                                name="no_telp"
                                value="<?= old('no_telp', $pengguna['no_telp']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Role</label>
                            <input
                                type="text"
                                class="form-control"
                                name="role"
                                value="<?= old('role', $pengguna['role']) ?>" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/pengguna" class="btn btn-danger">Cancel</a>
                            <!-- <a onclick="window.location.href='pengguna/create'" class="btn btn-danger">Cancel</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>