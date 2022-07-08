<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form <?=$detail ? 'Ubah' : 'Tambah'?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?=$detail ? $detail->nama : ''?>" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" name="kota" id="kota" value="<?=$detail ? $detail->kota : ''?>" placeholder="Masukkan kota">
                    </div>
                    <div class="form-group">
                        <label for="kontak">Kontak</label>
                        <input type="text" class="form-control" name="kontak" id="kontak" value="<?=$detail ? $detail->kontak : ''?>" placeholder="Masukkan kontak">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"><?=$detail ? $detail->alamat : ''?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telpon">Telepon</label>
                        <input type="text" class="form-control" name="telpon" id="telpon" value="<?=$detail ? $detail->telpon : ''?>" placeholder="Masukkan telpon">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer float-right">
                    <a href="<?= base_url('admin/suplier') ?>" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i></a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>