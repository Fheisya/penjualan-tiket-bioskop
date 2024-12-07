<?= $this->extend('admin/layout/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title"><?= $judul; ?></h4>
                    <!-- Tombol Tambah Data -->
                    <a class="btn btn-primary" href='pemesanan/create'>
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
                                    <th>Id Tiket</th>
                                    <th>Id Pengguna</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Total Harga</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tbpemesanan as $key => $value): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['id_tiket']; ?></td>
                                        <td><?= $value['id_pengguna']; ?></td>
                                        <td><?= $value['Tgl_pemesanan']; ?></td>
                                        <td><?= $value['jumlh_tiket']; ?></td>
                                        <td><?= $value['total_harga']; ?></td>
                                        <td style="text-align: center;">
                                            <a href="pemesanan/update/<?= $value['id_pemesanan'] ?>" class="btn btn-warning btn-sm" title="Update">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-danger btn-sm"
                                                title="Delete"
                                                onclick="confirmDelete('<?= ('/pemesanan/delete/' . $value['id_pemesanan']) ?>')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a href="" class="btn btn-info btn-sm" title="Detail">
                                                <i class="fas fa-info-circle"></i>
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