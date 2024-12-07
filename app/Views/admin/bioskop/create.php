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
                            <label for="email2">Nama Bioskop</label>
                            <input
                                type="text"
                                class="form-control"
                                name="nama_bioskop">
                        </div>
                        <div class="form-group">
                            <label for="email2">Lokasi Bioskop</label>
                            <input
                                type="text"
                                class="form-control"
                                name="lokasi" />
                        </div>
                        <div class="form-group">
                            <label for="email2">Kota</label>
                            <input
                                type="text"
                                class="form-control"
                                name="kota" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/bioskop" class="btn btn-danger">Cancel</a>
                            <!-- <a onclick="window.location.href='bioskop/create'" class="btn btn-danger">Cancel</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>