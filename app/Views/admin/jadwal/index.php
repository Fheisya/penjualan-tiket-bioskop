<?= $this->extend('admin/layout/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title"><?= $judul; ?></h4>
                    <!-- Tombol Tambah Data -->
                    <a class="btn btn-primary" href="<?= base_url('jadwal/create'); ?>">
                        <span class="btn-label">
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
                                    <th>Tanggal</th>
                                    <th>Film</th>
                                    <th>Studio</th>
                                    <th>Jam</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tbjadwal as $value): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= date('d-m-Y', strtotime($value['tgl'])); ?></td>
                                        <td><?= $value['id_film']; ?></td>
                                        <td><?= $value['id_studio']; ?></td>
                                        <td><?= $value['jam']; ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?= base_url('jadwal/edit/' . $value['id_jadwal']); ?>"
                                                class="btn btn-warning btn-sm"
                                                title="Update">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-danger btn-sm"
                                                title="Delete"
                                                onclick="confirmDelete('<?= base_url('jadwal/delete/' . $value['id_jadwal']); ?>')">
                                                <i class="fas fa-trash-alt"></i> Hapus
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