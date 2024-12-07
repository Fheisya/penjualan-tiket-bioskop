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
                    <form action="store" method="post">
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input
                                type="text"
                                class="form-control"
                                name="total_harga" />
                        </div>
                        <div class="form-group">
                            <label for="jumlh_tiket">Jumlah Tiket</label>
                            <input
                                type="text"
                                class="form-control"
                                name="jumlh_tiket" />
                        </div>
                        <div class="form-group">
                            <label for="tgl_pemesanan">Tanggal Pemesanan</label>
                            <input
                                type="date"
                                class="form-control"
                                name="tgl_pemesanan" />
                        </div>
                        <div class="form-group">
                            <label for="tiket">Tiket</label>
                            <select name="id_tiket" id="tiket" class="form-control">
                                <option value="" disabled selected>Pilih Tiket</option>
                                <?php foreach ($tiket as $s): ?>
                                    <option value="<?= $s['id_tiket']; ?>" <?= old('id_tiket') == $s['id_tiket'] ? 'selected' : '' ?>><?= $s['id_tiket']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pengguna">Pengguna</label>
                            <select name="id_pengguna" id="pengguna" class="form-control">
                                <option value="" disabled selected>Pilih Pengguna</option>
                                <?php foreach ($pengguna as $s): ?>
                                    <option value="<?= $s['id_pengguna']; ?>" <?= old('id_pengguna') == $s['id_pengguna'] ? 'selected' : '' ?>><?= $s['id_pengguna']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="/pemesanan" class="btn btn-danger">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
<?= $this->endSection(); ?>