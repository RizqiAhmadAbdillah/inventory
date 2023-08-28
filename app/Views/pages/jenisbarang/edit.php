<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card card-primary card-outline">
                    <div class="card-body row">
                        <div class="col-12">
                            <form action="/jenisbarang/update/<?= $jenisbarang['id_jenis_barang']; ?>" method="post">
                                <input type="hidden" name="id_jenis_barang" value="<?= $jenisbarang['id_jenis_barang']; ?>">
                                <div class="form-group">
                                    <label for="nama_jenis_barang">Nama</label>
                                    <input type="text" class="form-control" name="nama_jenis_barang" id="nama_jenis_barang" placeholder="Masukkan nama" value="<?= $jenisbarang['nama_jenis_barang']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_jenis_barang">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi_jenis_barang" id="deskripsi_jenis_barang" placeholder="Masukkan deskripsi" value="<?= $jenisbarang['deskripsi_jenis_barang']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="/jenisbarang" type="button" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?= $this->endSection(); ?>