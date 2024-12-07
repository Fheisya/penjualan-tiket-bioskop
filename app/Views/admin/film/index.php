<?= $this->extend('admin/layout/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title"><?= $judul; ?></h4>
                    <!-- Tombol Tambah Data -->
                    <a class="btn btn-primary" href='film/create'>
                        <span class=" btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Film</th>
                                    <th>Durasi</th>
                                    <th>Genre</th>
                                    <th>Rating</th>
                                    <th>Sutradara</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tbfilm as $key => $value): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['judul']; ?></td>
                                        <td><?= $value['durasi']; ?> Menit</td>
                                        <td><?= $value['genre']; ?></td>
                                        <td><?= $value['rating']; ?></td>
                                        <td><?= $value['sutradara']; ?></td>
                                        <td style="text-align: center;">
                                            <a href="/  admin/film/ubah/<?= $value['id_film'] ?>" class="btn btn-warning btn-sm" title="Update">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-danger btn-sm"
                                                title="Delete"
                                                onclick="confirmDelete('<?= ('/admin/film/delete/' . $value['id_film']) ?>')">
                                                <i class="fas fa-trash-alt"></i> <!-- Ikon untuk Delete -->
                                            </a>
                                            </a>
                                            <a href="" class="btn btn-info btn-sm" title="Detail">
                                                <i class="fas fa-info-circle"></i> <!-- Ikon untuk Detail -->
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
<?= $this->endSection(); ?>