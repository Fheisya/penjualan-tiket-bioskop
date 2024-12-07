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
                    <!-- Form untuk membuat data -->
                    <form action="/admin/film/store" method="post" enctype="multipart/form-data">
                        <div class=" form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" />
                        </div>
                        <div class="form-group">
                            <label for="sinopsis">Sinopsis</label>
                            <input type="text" class="form-control" name="sinopsis" />
                        </div>
                        <div class="form-group">
                            <label for="durasi">Durasi</label>
                            <input type="text" class="form-control" name="durasi" />
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input type="text" class="form-control" name="genre" />
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" class="form-control" name="rating" min="1" max="5" step="0.1" placeholder="Masukkan rating (1-5)" required />
                        </div>
                        <div class="form-group">
                            <label for="sutradara">Sutradara</label>
                            <input type="text" class="form-control" name="sutradara" />
                        </div>
                        <div class="form-group">
                            <label for="poster">Poster</label>
                            <input type="file" class="form-control" name="poster" accept="image/*" />
                        </div>
                        <div class="form-group">
                            <label for="poster">Banner</label>
                            <input type="file" class="form-control" name="banner" accept="image/*" />
                        </div>
                        <div class="form-group">
                            <label for="movie">Movie Link</label>
                            <input type="url" class="form-control" name="movie" placeholder="Masukkan URL Movie" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/film" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>