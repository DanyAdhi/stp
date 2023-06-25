<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Tambah Periode</h6>
      </div>
  </div>
  <div class="card-body w-100">
    <form class="col-md-8" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/periode/store')?>">
      <div class="form-group">
        <label class="my-1 font-weight-bold">Nama</label>
        <input type="text" class="form-control" placeholder="Masukkan nama" name="name" value="<?=set_value('name')?>" required>
        <?=form_error('name', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group ">
        <label class="my-1 font-weight-bold">Tanggal Mulai</label>
        <input type="date" class="form-control " name="start_date" value="<?=set_value('start_date')?>" required>
        <?=form_error('start_date', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group ">
        <label class="my-1 font-weight-bold">Tanggal Selesai</label>
        <input type="date" class="form-control " name="end_date" value="<?=set_value('end_date')?>" required>
        <?=form_error('end_date', "<small class='form-text text-danger'>",'</small>') ?>
      </div>

      <div class="d-flex">
        <button type="submit" class="btn btn-primary mr-3">Simpan</button>
    </form>
        <a href="<?=base_url('admin/periode') ?>" class="btn btn-secondary">Kembali</a>
      </div>
  </div>
</div>