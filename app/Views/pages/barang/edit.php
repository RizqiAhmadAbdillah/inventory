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
                            <form action="/barang/update/<?= $barang['id_barang']; ?>" method="post">
                                <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                                <div class="form-group">
                                    <label for="nama_barang">Nama</label>
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukkan nama" value="<?= $barang['nama_barang'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_barang_id">Jenis Barang</label>
                                    <select name="jenis_barang_id" id="jenis_barang_id" class="form-control">
                                        <?php foreach ($jenisbarang as $jb) : ?>
                                            <?php if ($barang['jenis_barang_id'] == $jb['id_jenis_barang']) : ?>
                                                <option value="<?= $jb['id_jenis_barang']; ?>" selected><?= $jb['nama_jenis_barang']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $jb['id_jenis_barang']; ?>"><?= $jb['nama_jenis_barang']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_barang">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi_barang" id="deskripsi_barang" placeholder="Masukkan deskripsi" value="<?= $barang['deskripsi_barang'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="qty_barang">Jumlah</label>
                                    <input type="text" class="form-control" name="qty_barang" id="qty_barang" placeholder="Masukkan jumlah" value="<?= $barang['qty_barang'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="cabang_id">Cabang</label>
                                    <select name="cabang_id" id="cabang_id" class="form-control">
                                        <?php foreach ($cabang as $c) : ?>
                                            <?php if ($barang['cabang_id'] == $c['id_cabang']) : ?>
                                                <option value="<?= $c['id_cabang']; ?>" selected><?= $c['nama_cabang']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $c['id_cabang']; ?>"><?= $c['nama_cabang']; ?></option>
                                            <?php endif; ?>
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