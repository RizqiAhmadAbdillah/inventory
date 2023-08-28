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
                            <form action="/barang/save" method="post">
                                <div class="form-group">
                                    <label for="nama_barang">Nama</label>
                                    <input type="text" class="form-control <?= (session('validation_nama_barang') !== null) ? 'is-invalid' : ''; ?>" name="nama_barang" id="nama_barang" placeholder="Masukkan nama">
                                    <span class="error invalid-feedback"><?= session('validation_nama_barang'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_barang_id">Jenis Barang</label>
                                    <select name="jenis_barang_id" id="jenis_barang_id" class="form-control">
                                        <?php foreach ($jenisbarang as $jb) : ?>
                                            <option value="<?= $jb['id_jenis_barang']; ?>"><?= $jb['nama_jenis_barang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_barang">Deskripsi</label>
                                    <input type="text" class="form-control <?= (session('validation_deskripsi_barang') !== null) ? 'is-invalid' : ''; ?>" name="deskripsi_barang" id="deskripsi_barang" placeholder="Masukkan deskripsi">
                                    <span class="error invalid-feedback"><?= session('validation_deskripsi_barang'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="qty_barang">Jumlah</label>
                                    <input type="text" class="form-control <?= (session('validation_qty_barang') !== null) ? 'is-invalid' : ''; ?>" name="qty_barang" id="qty_barang" placeholder="Masukkan jumlah">
                                    <span class="error invalid-feedback"><?= session('validation_qty_barang'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="cabang_id">Cabang</label>
                                    <select name="cabang_id" id="cabang_id" class="form-control">
                                        <?php foreach ($cabang as $c) : ?>
                                            <option value="<?= $c['id_cabang']; ?>"><?= $c['nama_cabang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="/barang" type="button" class="btn btn-secondary">Cancel</a>
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