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
                    <form action="<?= base_url("jadwal/update/{$jadwal['id_jadwal']}") ?>" method="post">
                        <div class="form-group">
                            <label for="tgl">Tanggal</label>
                            <input
                                type="date"
                                class="form-control"
                                name="tgl"
                                value="<?= old('tgl', $jadwal['tgl']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="film">Film</label>
                            <select name="id_film" id="film" class="form-control">
                                <option value="" disabled <?= old('id_film') ? '' : 'selected' ?>>Pilih Film</option>
                                <?php foreach ($film as $s): ?>
                                    <option value="<?= $s['id_film']; ?>" <?= old('id_film', $jadwal['id_film']) == $s['id_film'] ? 'selected' : '' ?>>
                                        <?= $s['id_film']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="studio">Studio</label>
                            <select name="id_studio" id="studio" class="form-control">
                                <option value="" disabled <?= old('id_studio') ? '' : 'selected' ?>>Pilih Studio</option>
                                <?php foreach ($studio as $s): ?>
                                    <option value="<?= $s['id_studio']; ?>" <?= old('id_studio', $jadwal['id_studio']) == $s['id_studio'] ? 'selected' : '' ?>>
                                        <?= $s['id_studio']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jam">Jam</label>
                            <input type="time" name="jam" id="jam" class="form-control" value="<?= old('jam', $jadwal['jam'] ?? '') ?>" />
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