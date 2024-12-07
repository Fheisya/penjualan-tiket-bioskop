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
                            <label for="tanggal">Tanggal</label>
                            <input
                                type="date"
                                class="form-control"
                                name="tgl" />
                        </div>
                        <div class="form-group">
                            <label for="studio">Studio</label>
                            <select name="id_studio" id="studio" class="form-control">
                                <option value="" disabled selected>Pilih Studio</option>
                                <?php foreach ($studio as $s): ?>
                                    <option value="<?= $s['id_studio']; ?>"><?= $s['id_studio']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="film">Film</label>
                            <select name="id_film" id="film" class="form-control">
                                <option value="" disabled selected>Pilih Film</option>
                                <?php foreach ($film as $s): ?>
                                    <option value="<?= $s['id_film']; ?>"><?= $s['id_film']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jam">Jam</label>
                            <input
                                type="time"
                                class="form-control <?= isset($errors['jam']) ? 'is-invalid' : ''; ?>"
                                name="jam"
                                value="<?= old('jam') ?>" />
                            <?php if (isset($errors['jam'])): ?>
                                <div class="invalid-feedback"><?= $errors['jam']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/jadwal" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>