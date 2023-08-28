<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-2">
                <a href="/cabang" class="btn btn-block btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">

                <!-- Default box -->
                <div class="card card-primary card-outline">
                    <div class="card-body row">
                        <div class="col-3 text-center d-flex align-items-center justify-content-center">
                            <div class="">
                                <img src="/dist/img/default-150x150.png" alt="test">
                            </div>
                        </div>
                        <div class="col-9">
                            <dl class="row">
                                <dt class="col-sm-2">Nama cabang</dt>
                                <dd class="col-sm-10"><?= $cabang['nama_cabang']; ?></dd>
                                <dt class="col-sm-2">Kota</dt>
                                <dd class="col-sm-10"><?= $cabang['kota_cabang']; ?></dd>
                            </dl>
                            <a href="/cabang/edit/<?= $cabang['id_cabang']; ?>" class="btn btn-warning">Edit</a>
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