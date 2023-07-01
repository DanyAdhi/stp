<?=$this->session->flashdata('flash') ?>

<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Data Pembimbing</h6>
      </div>
  </div>
  <div class="card-body w-100">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="25px">NO</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Program</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($mentors as $key => $value): 
            $id_encryption = str_replace(['=','+','/'],['-','_','~',], $this->encryption->encrypt($value->id));
          ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->name ?></td>
                <td><?= $value->address ?></td>
                <td><?= $value->email ?></td>
                <td><?= $value->handphone ?></td>
                <td><?= $value->program ?></td>
                <td width="60px">
                  <a  class="btn btn-sm btn-info" href="<?=base_url('peserta/pembimbing/detail/'.$id_encryption)?>" title="Detail">
                    <i class="fas fa-eye"></i>
                  </a>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>