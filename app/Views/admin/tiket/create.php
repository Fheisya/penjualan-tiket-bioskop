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
                    <form action="<?= base_url('tiket/store') ?>" method="post">
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" name="harga" value="<?= old('harga') ?>" />
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" value="<?= old('jumlah') ?>" />
                        </div>
                        <div class="form-group">
                            <label for="tempat_duduk">Tempat Duduk</label>
                            <input type="text" class="form-control" name="tempat_duduk" value="<?= old('tempat_duduk') ?>" />
                        </div>
                        <div class="form-group">
                            <label for="jadwal">Jadwal</label>
                            <select name="id_jadwal" id="jadwal" class="form-control">
                                <option value="" disabled selected>Pilih Jadwal</option>
                                <?php foreach ($jadwal as $s): ?>
                                    <option value="<?= $s['id_jadwal']; ?>" <?= old('id_jadwal') == $s['id_jadwal'] ? 'selected' : '' ?>><?= $s['jam']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/tiket" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>