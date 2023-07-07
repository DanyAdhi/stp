<div class="card shadow">
  <div class="card-header py-3 d-flex">
    <div>
      <h6 class=" font-weight-bold text-primary">Pilih data yang ingin dicetak</h6>
    </div>
    <div class="ml-auto">
      <?php if ($progress == []):?>
        <button class="btn-secondary" title="Data kosong" disabled>
          <i class="fa fa-print mr-1"></i> <b>Cetak</b>
        </button>
      <?php else: ?>
        <a class="btn btn-sm btn-info text-light" href="<?=base_url('admin/progress/print-pdf?program_id='.$_GET['program_id'].'&start_date='.$_GET['start_date'].'&end_date='.$_GET['end_date']);?>" target="_blank">
          <i class="fa fa-print mr-1"></i> <b>Cetak</b>
        </a>
      <?php endif; ?>
    </div>
  </div>
  <div class="card-body w-100">
    <form method="GET" action="<?=base_url('admin/progress/print')?>">
      <div class="row">
          <div class="col-2">
            <label class="font-weight-bold">Program</label>
            <select class="custom-select mr-sm-2" name="program_id" id="program" required>
              <option value=""> --- Pilih Program --- </option>
              <?php foreach ($programs as $value): ?>
                <option value="<?=$value->id?>" <?=set_select('program_id', $value->id, (isset($_GET['program_id']) == $value->id))?>>
                  <?= $value->name ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-2">
            <label class="font-weight-bold">Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control" value="<?=isset($_GET['start_date']) ? $_GET['start_date'] : '' ?>" required>
          </div>
          <div class="col-2">
            <label class="font-weight-bold">Tanggal Selesai</label>
            <input type="date" name="end_date" class="form-control" value="<?=isset($_GET['end_date']) ? $_GET['end_date'] : '' ?>" required>
          </div>
          <div class="col-3 align-self-end mb-1">
            <button type="submit" class="btn btn-sm btn-primary" class>Cari</button>
          </div>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="25px">NO</th>
            <th>Progres</th>
            <th width="170px">Program</th>
            <th width="170px">Pembimbing</th>
            <th width="150px">Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($progress as $key => $value): 
          ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $value->progress ?></td>
              <td><?= $value->program ?></td>
              <td><?= $value->mentor ?></td>
              <td><?= $value->created_at ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#datatable').DataTable({
      searching: false,
      ordering: false,
      lengthChange: false
    });
  });
</script>

<?php if ($this->session->flashdata('close')): ?>
  <script>
    window.close();
  </script>
<?php endif; ?>
