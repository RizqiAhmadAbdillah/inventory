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
                            <form action="/cabang/update/<?= $cabang['id_cabang']; ?>" method="post">
                                <input type="hidden" name="id_cabang" value="<?= $cabang['id_cabang']; ?>">
                                <div class="form-group">
                                    <label for="nama_cabang">Nama</label>
                                    <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" placeholder="Masukkan nama" value="<?= $cabang['nama_cabang']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="kota_cabang">Kota</label>
                                    <input type="text" class="form-control" name="kota_cabang" id="kota_cabang" placeholder="Masukkan kota" value="<?= $cabang['kota_cabang']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="/cabang" type="button" class="btn btn-secondary">Cancel</a>
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