<?= $this->extend('admin/layout/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title"><?= esc($judul); ?></h4>
                </div>
                <div class="col-md-6 col-lg-6">
                    <form action="<?= base_url("pemesanan/update/{$pemesanan['id_pemesanan']}") ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input
                                type="text"
                                class="form-control"
                                id="total_harga"
                                name="total_harga"
                                value="<?= old('total_harga', $pemesanan['total_harga']) ?>"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="jumlh_tiket">Jumlah Tiket</label>
                            <input
                                type="number"
                                class="form-control"
                                id="jumlh_tiket"
                                name="jumlh_tiket"
                                value="<?= old('jumlh_tiket', $pemesanan['jumlh_tiket']) ?>"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="Tgl_pemesanan">Tanggal Pemesanan</label>
                            <input
                                type="date"
                                class="form-control"
                                id="Tgl_pemesanan"
                                name="Tgl_pemesanan"
                                value="<?= old('Tgl_pemesanan', $pemesanan['Tgl_pemesanan']) ?>"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="id_tiket">Tiket</label>
                            <select class="form-select" id="id_tiket" name="id_tiket" required>
                                <option value="">Pilih tiket</option>
                                <?php foreach ($tiket as $item) : ?>
                                    <option value="<?= $item['id_tiket']; ?>"
                                        <?= $item['id_tiket'] == $pemesanan['id_tiket'] ? 'selected' : ''; ?>>
                                        <?= esc($item['id_tiket']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pengguna">Nama Pengguna</label>
                            <select class="form-select" id="id_pengguna" name="id_pengguna" required>
                                <option value="">Pilih pengguna</option>
                                <?php foreach ($pengguna as $user) : ?>
                                    <option value="<?= $user['id_pengguna']; ?>"
                                        <?= $user['id_pengguna'] == $pemesanan['id_pengguna'] ? 'selected' : ''; ?>>
                                        <?= esc($user['nama']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="<?= base_url('pemesanan'); ?>" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>