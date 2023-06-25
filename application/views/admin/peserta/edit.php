<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Edit Peserta</h6>
      </div>
  </div>
  <div class="card-body w-100">
    <form class="col-md-8" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/peserta/update/'.$this->uri->segment(4))?>">
      <div class="form-group">
        <label class="my-1 font-weight-bold">NIK</label>
        <input type="text" class="form-control" placeholder="Masukkan NIK" onkeypress="return inputNumber(event)" name="nik" value="<?=set_value('nik', $peserta->nik)?>" required>
        <?=form_error('nik', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Nama Lengkap</label>
        <input type="text" class="form-control" placeholder="Masukkan nama" name="name" value="<?=set_value('name', $peserta->name)?>" required>
        <?=form_error('name', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Masukkan tempat lahir" name="place_of_birth" value="<?=set_value('place_of_birth', $peserta->place_of_birth)?>" required>
        <?=form_error('place_of_birth', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group ">
        <label class="my-1 font-weight-bold">Tanggal Lahir</label>
        <input type="date" class="form-control" name="date_of_birth" value="<?=set_value('date_of_birth', isset($peserta->date_of_birth) ? date('Y-m-d', strtotime($peserta->date_of_birth)) : ''); ?>" required>
        <?=form_error('date_of_birth', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group ">
        <label class="my-1 font-weight-bold">Jenis Kelamin</label>
        <select class="custom-select my-1 mr-sm-2" name="gender">
          <option value="Pria" <?=($peserta->gender == 'Pria') ? 'selected' : ''?> <?=set_select('gender','Pria')?> >Pria</option>
          <option value="Wanita" <?=($peserta->gender == 'Wanita') ? 'selected' : ''?> <?=set_select('gender','Wanita')?> >Wanita</option>
        </select>
      </div>
      <div class="form-group ">
        <label class="my-1 font-weight-bold">Agama</label>
        <select class="custom-select my-1 mr-sm-2" name="religion">
          <?php foreach ($religions as $religion): ?>
            <option value="<?=$religion['name']?>" <?=($religion['name'] == $peserta->religion) ? 'selected':''?> <?=set_select('religion', $religion['name'])?>>
              <?= $religion['name'] ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Nama Orang Tua</label>
        <input type="text" class="form-control" placeholder="Masukkan nama Ayah atau Ibu" name="parents_name" value="<?=set_value('parents_name', $peserta->parents_name)?>" required>
        <?=form_error('parents_name', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Domisili</label>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <select class="selectpicker form-control" data-style="btn-white text-dark bordered border-secondary" data-live-search="true" title="---Pilih---" name="domicile" required>
                <?php foreach ($domicile as $data): ?>
                  <option <?=set_select('domicile', $data->name)?> <?=($data->name == $peserta->domicile) ? 'selected':''?> > <?= $data->name ?> </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <?=form_error('domicile', "<small class='form-text text-danger mt-0 pt-0'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="font-weight-bold">Alamat Lengkap</label>
        <textarea class="form-control" rows="3" name="address" required><?=set_value('address', $peserta->address)?></textarea>
        <?=form_error('address', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Nomer Telepone</label>
        <input type="text" class="form-control" placeholder="Masukkan nomer telepon" onkeypress="return inputNumber(event)" name="handphone" value="<?=set_value('handphone', $peserta->handphone)?>" required>
        <?=form_error('handphone', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Email</label>
        <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan email" name="email" value="<?=set_value('email', $peserta->email)?>" required readonly>
        <?=form_error('email', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">KTP</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="ktp" accept="image/*">
          <label class="custom-file-label"><?=$peserta->ktp?></label>
        </div>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Kartu Keluarga</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="kk" accept="image/*">
          <label class="custom-file-label"><?=$peserta->kk?></label>
        </div>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Surat Keterangan Dokter</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="medical_certificate" accept="image/*">
          <label class="custom-file-label"><?=$peserta->medical_certificate?></label>
        </div>
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