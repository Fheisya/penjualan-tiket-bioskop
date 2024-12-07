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
                    <form action="<?= base_url("pembayaran/update/{$pembayaran['id_pembayaran']}") ?>" method="post">
                        <div class="form-group">
                            <label for="pemesanan">ID Pemesanan</label>
                            <select class="form-select" id="pemesanan" name="id_pemesanan" required>
                                <option value="">Pilih ID Pemesanan</option>
                                <?php foreach ($pemesanan as $bio) : ?>
                                    <option value="<?= $bio['id_pemesanan']; ?>"
                                        <?= $bio['id_pemesanan'] == $pembayaran['id_pemesanan'] ? 'selected' : ''; ?>>
                                        <?= $bio['id_pemesanan']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pembayaran">Tanggal pembayaran</label>
                            <input
                                type="date"
                                class="form-control"
                                name="tgl_pembayaran"
                                value="<?= old('tgl_pembayaran', $pembayaran['tgl_pembayaran']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="tgl_pembayaran">Metode pembayaran</label>
                            <input
                                type="text"
                                class="form-control"
                                name="metode_pembayaran"
                                value="<?= old('metode_pembayaran', $pembayaran['metode_pembayaran']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="jmlh_pembayaran">Jumlah Pembayaran</label>
                            <input
                                type="text"
                                class="form-control"
                                name="jmlh_pembayaran"
                                value="<?= old('jmlh_pembayaran', $pembayaran['jmlh_pembayaran']) ?>" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/pembayaran" class="btn btn-danger">Cancel</a>
                            <!-- <a onclick="window.location.href='pembayaran/create'" class="btn btn-danger">Cancel</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>