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
                    <form action="<?= base_url("studio/update/{$studio['id_studio']}") ?>" method="post">
                        <div class="form-group">
                            <label for="email2">Nama Studio</label>
                            <input
                                type="text"
                                class="form-control"
                                name="nama_studio"
                                value="<?= old('nama_studio', $studio['nama_studio']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Kapasitas</label>
                            <input
                                type="text"
                                class="form-control"
                                name="kapasitas"
                                value="<?= old('kapasitas', $studio['kapasitas']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="bioskop">Nama Bioskop</label>
                            <select class="form-select" id="bioskop" name="id_bioskop" required>
                                <option value="">Pilih Bioskop</option>
                                <?php foreach ($bioskop as $bio) : ?>
                                    <option value="<?= $bio['id_bioskop']; ?>"
                                        <?= $bio['id_bioskop'] == $studio['id_bioskop'] ? 'selected' : ''; ?>>
                                        <?= $bio['nama_bioskop']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/studio" class="btn btn-danger">Cancel</a>
                            <!-- <a onclick="window.location.href='studio/create'" class="btn btn-danger">Cancel</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>