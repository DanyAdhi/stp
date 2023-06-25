<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Tambah Jadwal</h6>
      </div>
  </div>
  <div class="card-body w-100">
    <form class="col-md-8" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/jadwal/update/'.$this->uri->segment(4))?>">
      <div class="form-group ">
        <label class="my-1 font-weight-bold">Program</label>
        <select class="custom-select my-1 mr-sm-2" name="program_id" id="program"> 
          <?php foreach ($programs as $value): ?>
            <option value="<?=$value->id?>" <?=set_select('program_id', $value->id, ($jadwal->program_id == $value->id))?>>
              <?= $value->name ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Hari</label>
        <select class="custom-select my-1 mr-sm-2" name="days_id">
          <?php foreach ($days as $value): ?>
            <option value="<?=$value->id?>" <?=($value->id == $jadwal->days_id) ? 'selected':''?> <?=set_select('days_id', $value->id)?>>
              <?= $value->name ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label class="my-1 font-weight-bold">Jam Mulai</label>
        <input type="text" class="form-control" placeholder="08:00" name="start_time" value="<?=set_value('start_time', $jadwal->start_time)?>" data-timepicker required>
        <?=form_error('start_time', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group">
        <label class="my-1 font-weight-bold">Jam Selesai</label>
        <input type="text" class="form-control" placeholder="13:00" name="end_time" value="<?=set_value('end_time', $jadwal->end_time)?>" data-timepicker required>
        <?=form_error('end_time', "<small class='form-text text-danger'>",'</small>') ?>
      </div>
      <div class="form-group ">
        <label class="my-1 font-weight-bold">Pembimbing</label>
        <select class="custom-select my-1 mr-sm-2" name="mentor_id" id="optionMentor">
          <?php foreach ($mentors as $value): ?>
            <option value="<?=$value->id?>" <?=set_select('mentor_id', $value->id, ($jadwal->mentor_id == $value->id))?> >
              <?= $value->name ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      

      <div class="d-flex">
        <button type="submit" class="btn btn-primary mr-3">Simpan</button>
    </form>
        <a href="<?=base_url('admin/jadwal') ?>" class="btn btn-secondary">Kembali</a>
      </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#program').change(function() {
      const id = $(this).val();
      $.ajax({
        type: 'GET',
        url: `<?=base_url('admin/jadwal/get_mentor_by_program/')?>${id}`,
        success: function(res){
          $('#optionMentor').empty();
          const response = JSON.parse(res);
          if (response.code === 200) {
            for (const mentor of response.data) {
              $('#optionMentor').append(`<option value="${mentor.id}">${mentor.name}</option>`);
              $('#optionMentor').prop('disabled', false);
            }
          } else {
            $('#optionMentor').append(`<option value="">Mentor tidak ditemukan</option>`);
            $('#optionMentor').prop('disabled', true);
          }
        }
      })
    })
  })
</script>