<link rel="stylesheet" href="<?= base_url('public/assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('public/assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata("mess") ?>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Daftar
                </h3>
                <a href="<?= base_url('admin/pembelian/form') ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama Suplier</th>
                            <th>Nama Produk</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) : ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?= $value->nama_suplier ?></td>
                                <td><?= $value->nama_produk ?></td>
                                <td><?= $value->tanggal ?></td>
                                <td><?= $value->jumlah ?></td>
                                <td class="text-center">
                                <a href="<?= base_url('admin/pembelian/form/'.$value->id) ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('admin/pembelian/delete/'.$value->id) ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script src="<?= base_url('public/assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public/assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $("#example1").DataTable({
        "ordering": false,
    });
</script>