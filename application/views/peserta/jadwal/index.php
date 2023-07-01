<?=$this->session->flashdata('flash') ?>

<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Data Jadwal Program</h6>
      </div>
  </div>
  <div class="card-body w-100">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="25px">NO</th>
                <th>Nama</th>
                <th>Hari</th>
                <th>Jam</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($schedulers as $key => $value):
            $start_time = strtotime($value->start_time);
            $end_time   = strtotime($value->end_time);
          ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $value->name ?></td>
              <td><?= $value->day ?></td>
              <td><?= date('H:i' ,$start_time) .' - '. date('H:i', $end_time)?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>