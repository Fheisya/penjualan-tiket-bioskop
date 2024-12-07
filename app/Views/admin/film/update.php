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
                    <form action="<?= base_url("admin/film/update/{$film['id_film']}") ?>" method="post">
                        <div class="form-group">
                            <label for="email2">Judul</label>
                            <input
                                type="text"
                                class="form-control"
                                name="judul"
                                value="<?= old('judul', $film['judul']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Sinopsis</label>
                            <input
                                type="text"
                                class="form-control"
                                name="sinopsis"
                                value="<?= old('sinopsis', $film['sinopsis']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Durasi</label>
                            <input
                                type="text"
                                class="form-control"
                                name="durasi"
                                value="<?= old('durasi', $film['durasi']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Genre</label>
                            <input
                                type="text"
                                class="form-control"
                                name="genre"
                                value="<?= old('genre', $film['genre']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Rating</label>
                            <input
                                type="text"
                                class="form-control"
                                name="rating"
                                value="<?= old('rating', $film['rating']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Sutradara</label>
                            <input
                                type="text"
                                class="form-control"
                                name="sutradara"
                                value="<?= old('sutradara', $film['sutradara']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Poster</label>
                            <input
                                type="text"
                                class="form-control"
                                name="poster"
                                value="<?= old('poster', $film['poster']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Banner</label>
                            <input
                                type="text"
                                class="form-control"
                                name="banner"
                                value="<?= old('banner', $film['banner']) ?>" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Movie</label>
                            <input
                                type="text"
                                class="form-control"
                                name="movie"
                                value="<?= old('movie', $film['movie']) ?>" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/film" class="btn btn-danger">Cancel</a>
                            <!-- <a onclick="window.location.href='film/create'" class="btn btn-danger">Cancel</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>