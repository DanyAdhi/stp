<div class="row py-5">
  <div class="col-12 mt-3 text-center "> 
    <div class="font-weight-bold" style="font-size: 40px;">Selamat  Datang Peserta <?=$this->session->userdata('user_name');?> </div> <br> 
    <div style="font-size: 24px;">Silahkan akses menu yang telah disediakan pada sidebar</div>
  </div>
</div>

<div class="card shadow m-5">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Data Progress Peserta</h6>
      </div>
  </div>
  <div class="card-body w-100">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
