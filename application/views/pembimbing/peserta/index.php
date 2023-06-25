<?=$this->session->flashdata('flash') ?>

<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Data Peserta</h6>
      </div>
      <div class="ml-auto">
        <a class="btn btn-sm btn-primary text-light" href="<?=base_url('admin/peserta/create')?>">
          <i class="fa fa-plus"></i> <b>Tambah</b>
        </a>
      </div>
  </div>
  <div class="card-body w-100">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="10px">NO</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Domisili</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($users as $key => $value): 
            $id_encryption = str_replace(['=','+','/'],['-','_','~',], $this->encryption->encrypt($value->id));
          ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->nik ?></td>
                <td><?= $value->name ?></td>
                <td><?= $value->domicile ?></td>
                <td><?= $value->address ?></td>
                <td><?= $value->handphone ?></td>
                <td width="50px">
                  <a  class="btn btn-sm btn-info" href="<?=base_url('pembimbing/peserta/detail/'.$id_encryption)?>" title="Detail">
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