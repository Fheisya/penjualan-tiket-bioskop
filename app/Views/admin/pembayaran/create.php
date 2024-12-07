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
                    <form action="<?= base_url('pembayaran/store'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="pemesanan">Pemesanan</label>
                            <select name="id_pemesanan" id="pemesanan" class="form-control <?= (session('errors.id_pemesanan')) ? 'is-invalid' : ''; ?>">
                                <option value="" disabled selected>Pilih pemesanan</option>
                                <?php foreach ($pemesanan as $s): ?>
                                    <option value="<?= $s['id_pemesanan']; ?>" <?= old('id_pemesanan') == $s['id_pemesanan'] ? 'selected' : '' ?>>
                                        <?= $s['id_pemesanan']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= session('errors.id_pemesanan'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pembayaran">Tanggal Pembayaran</label>
                            <input
                                type="date"
                                class="form-control <?= (session('errors.tgl_pembayaran')) ? 'is-invalid' : ''; ?>"
                                name="tgl_pembayaran"
                                value="<?= old('tgl_pembayaran'); ?>" />
                            <div class="invalid-feedback">
                                <?= session('errors.tgl_pembayaran'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="metode_pembayaran">Metode Pembayaran</label>
                            <input
                                type="text"
                                class="form-control <?= (session('errors.metode_pembayaran')) ? 'is-invalid' : ''; ?>"
                                name="metode_pembayaran"
                                value="<?= old('metode_pembayaran'); ?>" />
                            <div class="invalid-feedback">
                                <?= session('errors.metode_pembayaran'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jmlh_pembayaran">Jumlah Pembayaran</label>
                            <input
                                type="number"
                                class="form-control <?= (session('errors.jmlh_pembayaran')) ? 'is-invalid' : ''; ?>"
                                name="jmlh_pembayaran"
                                value="<?= old('jmlh_pembayaran'); ?>" />
                            <div class="invalid-feedback">
                                <?= session('errors.jmlh_pembayaran'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/pembayaran" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>