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
                    <form action="<?= base_url("tiket/update/{$tiket['id_tiket']}") ?>" method="post">
                        <div class="form-group">
                            <label for="email2">Harga tiket</label>
                            <input
                                type="text"
                                class="form-control"
                                name="harga"
                                value="<?= old('harga', $tiket['harga']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Jumlah tiket</label>
                            <input
                                type="text"
                                class="form-control"
                                name="jumlah"
                                value="<?= old('jumlah', $tiket['jumlah']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Tempat Duduk</label>
                            <input
                                type="text"
                                class="form-control"
                                name="tempat_duduk"
                                value="<?= old('tempat_duduk', $tiket['tempat_duduk']) ?>" />
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