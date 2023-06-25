<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Tambah Pembimbing</h6>
      </div>
  </div>
  <div class="card-body w-100">
    <form class="col-md-8" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/pembimbing/store')?>">
      <div class="form-group">
        <label class="my-1 font-weight-bold">Nama Lengkap</label>
        <input type="text" class="form-control" placeholder="Masukkan nama" name="name" value="<?=set_value('name')?>" required>
        <?=form_error('name', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Masukkan tempat lahir" name="place_of_birth" value="<?=set_value('place_of_birth')?>" required>
        <?=form_error('place_of_birth', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group ">
        <label class="my-1 font-weight-bold">Tanggal Lahir</label>
        <input type="date" class="form-control " placeholder="Masukkan tempat lahir" name="date_of_birth" value="<?=set_value('date_of_birth')?>" required>
        <?=form_error('date_of_birth', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Nomer Telepone</label>
        <input type="text" class="form-control" placeholder="Masukkan nomer telepon" onkeypress="return inputNumber(event)" name="handphone" value="<?=set_value('handphone')?>" required>
        <?=form_error('handphone', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Email</label>
        <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan email" name="email" value="<?=set_value('email')?>" required>
        <?=form_error('email', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="font-weight-bold">Alamat Lengkap</label>
        <textarea class="form-control" rows="3" name="address" required><?=set_value('address')?></textarea>
        <?=form_error('address', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group ">
        <label class="my-1 font-weight-bold">Program</label>
        <select class="custom-select my-1 mr-sm-2" name="program_id">
          <?php foreach ($programs as $value): ?>
            <option value="<?=$value->id?>" <?=set_select('program', $value->name)?>>
              <?= $value->name ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      

      <div class="d-flex">
        <button type="submit" class="btn btn-primary mr-3">Simpan</button>
    </form>
        <a href="<?=base_url('admin/peserta') ?>" class="btn btn-secondary">Kembali</a>
      </div>
  </div>
</div>

<script>
  function inputNumber(evt){
      var charCode = (evt.charCode);
      // jika charCode lebih dari 31(spasi) dan carCode kurang dari 48 atau charCode besar dari 57
      if (charCode > 32 && (charCode < 48 || charCode > 57) && charCode != 45) return false;
      return true;
  }

</script>