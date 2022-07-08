<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata("mess") ?>
    </div>
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form <?= $detail ? 'Ubah' : 'Tambah' ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Produk</label>
                        <select name="produk_id" id="produk_id" class="form-control">
                            <?php foreach ($produk as $key => $value) :
                            $selected = $detail ? ($value->id === $detail->produk_id ? 'selected' : '') : '';
                            ?>
                            <option value="<?=$value->id?>" <?=$selected?>><?=$value->nama?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?=$detail ? $detail->tanggal : ''?>" placeholder="Masukkan tanggal">
                    </div>
                    <div class="form-group">
                        <label for="suplier_id">Suplier</label>
                        <select name="suplier_id" id="suplier_id" class="form-control">
                            <?php foreach ($suplier as $key => $value) :
                            $selected = $detail ? ($value->id === $detail->suplier_id ? 'selected' : '') : '';
                            ?>
                            <option value="<?=$value->id?>" <?=$selected?>><?=$value->nama?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control w-15" name="jumlah" id="jumlah" value="<?=$detail ? $detail->jumlah : 0?>" min="0">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control w-50" name="harga" id="harga" value="<?=$detail ? $detail->harga : 0?>" min="0">
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