<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata("mess") ?>
    </div>
    <div class="col-md-7">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form <?= $detail ? 'Ubah' : 'Tambah' ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Jenis Produk</label>
                        <select name="jenis_produk" id="jenis_produk" class="form-control">
                            <?php foreach ($jenis_produk as $key => $value) :
                            $selected = $detail ? ($value->id === $detail->jenis_id ? 'selected' : '') : '';
                            ?>
                            <option value="<?=$value->id?>" <?=$selected?>><?=$value->nama?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" name="kode" id="kode" value="<?=$detail ? $detail->kode : ''?>" placeholder="Masukkan kode">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?=$detail ? $detail->nama : ''?>" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control w-15" name="stok" id="stok" value="<?=$detail ? $detail->stok : 0?>" min="0">
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" class="form-control w-50" name="harga_beli" id="harga_beli" value="<?=$detail ? $detail->harga_beli : 0?>" min="0">
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" class="form-control w-50" name="harga_jual" id="harga_jual" value="<?=$detail ? $detail->harga_jual : 0?>" min="0">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"><?=$detail ? $detail->deskripsi : ''?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="d-block" name="foto" id="foto" accept="image/*">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer float-right">
                    <a href="<?= base_url('admin/jenis-produk') ?>" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i></a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>