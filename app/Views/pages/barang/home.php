<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
        </div>
        <div class="row mb-2">
            <div class="col-2">
                <!-- <button type="button" data-toggle="modal" data-target="#add-customer" class="btn btn-block btn-primary"><i class="fas fa-plus"></i> Add Data</button> -->
                <a href="/barang/create" class="btn btn-block btn-primary"><i class="fas fa-plus"></i> Add Data</a>
            </div>
            <div class="col-10">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        <?= session()->getFlashdata('message'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>

                        <div class="card-tools">
                            <form action="/barang/search" method="post" class="input-group input-group" style="width: 200px;">
                                <input type="text" name="keyword" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jenis Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah</th>
                                    <th>Cabang</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="rows">
                                <?php
                                $page = isset($_GET['page_barang']) ? $_GET['page_barang'] : 1;
                                $row = 1 + (7 * ($page - 1));
                                foreach ($barang as $b) : ?>
                                    <tr>
                                        <td><?= $row++; ?></td>
                                        <td><?= $b['nama_barang']; ?></td>
                                        <td><?= $b['nama_jenis_barang']; ?></td>
                                        <td><?= $b['deskripsi_barang']; ?></td>
                                        <td><?= $b['qty_barang']; ?></td>
                                        <td><?= $b['nama_cabang']; ?></td>
                                        <td>
                                            <a href="/barang/<?= $b['id_barang']; ?>" class="mr-2 btn btn-sm btn-info">Detail</a>
                                            <a href="/barang/edit/<?= $b['id_barang']; ?>" class="mr-2 btn btn-sm btn-warning">Edit</a>
                                            <form action="/barang/<?= $b['id_barang']; ?>" method="post" class="d-inline">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" onclick="return confirm('Do you want to delete this data?')" class="mr-2 btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <?= $pager->links('barang', 'datatables_pager') ?>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<div class="modal fade" id="add-customer">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form action="/barang/save" method="post">
                    <div class="form-group">
                        <label for="nama_barang">Nama</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukkan nama">
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
                        <input type="text" class="form-control" name="deskripsi_barang" id="deskripsi_barang" placeholder="Masukkan deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="qty_barang">Jumlah</label>
                        <input type="text" class="form-control" name="qty_barang" id="qty_barang" placeholder="Masukkan jumlah">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $("#keyword").on("keyup", function() {
            let value = $(this).val().toLowerCase();
            $("#rows tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    let path = location.pathname.split('/')
    let url = location.origin + '/' + path[1]
    $('ul.nav-sidebar li.nav-item a').each(function() {
        if ($(this).attr('href').indexOf(url) !== -1) {
            $(this).addClass('active');
        }
    })
</script>
<?= $this->endSection(); ?>