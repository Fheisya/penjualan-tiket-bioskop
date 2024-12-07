<?= $this->extend('admin/layout/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title"><?= $judul; ?></h4>
                    <!-- Tombol Tambah Data -->
                    <a class="btn btn-primary" href='tiket/create'>
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
                                    <th>Jadwal</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Tempat duduk</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tbtiket as $key => $value): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['id_jadwal']; ?></td>
                                        <td><?= $value['harga']; ?></td>
                                        <td><?= $value['jumlah']; ?></td>
                                        <td><?= $value['tempat_duduk']; ?></td>
                                        <td>
                                            <a href="tiket/update/<?= $value['id_tiket'] ?>" class="btn btn-warning btn-sm" title="Update">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-danger btn-sm"
                                                title="Delete"
                                                onclick="confirmDelete('<?= ('/tiket/delete/' . $value['id_tiket']) ?>')">
                                                <i class="fas fa-trash-alt"></i>
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