<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
        </div>
        <div class="row mb-2">
            <div class="col-2">
                <a href="/barang" class="btn btn-block btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 500px;">
                        <table class="table table-head-fixed table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jenis Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah</th>
                                    <th>Cabang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $row = 1 ?>
                                <?php foreach ($barang as $b) : ?>
                                    <tr>
                                        <td><?= $row++; ?></td>
                                        <td><?= $b['nama_barang']; ?></td>
                                        <td><?= $b['nama_jenis_barang']; ?></td>
                                        <td><?= $b['deskripsi_barang']; ?></td>
                                        <td><?= $b['qty_barang']; ?></td>
                                        <td><?= $b['nama_cabang']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?= $this->endSection(); ?>