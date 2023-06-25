<?=$this->session->flashdata('flash') ?>

<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Data Jadwal Program</h6>
      </div>
      <div class="ml-auto">
        <a class="btn btn-sm btn-primary text-light" href="<?=base_url('admin/jadwal/create')?>">
          <i class="fa fa-plus"></i> <b>Tambah</b>
        </a>
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
                <th>Pembimbing</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($schedulers as $key => $value): 
            $id_encryption = str_replace(['=','+','/'],['-','_','~',], $this->encryption->encrypt($value->id));
            $start_time = strtotime($value->start_time);
            $end_time   = strtotime($value->end_time);
          ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->name ?></td>
                <td><?= $value->day ?></td>
                <td><?= date('H:i' ,$start_time) .' - '. date('H:i', $end_time)?></td>
                <td><?= $value->mentor ?></td>
                <td width="120px">
                  <a class="btn btn-sm btn-warning" href="<?=base_url('admin/jadwal/edit/'.$id_encryption)?>" title="Ubah">
                    <i class="fas fa-edit"></i>
                  </a>
                  <button href="" onclick="deleteConfirm('<?=base_url('admin/jadwal/delete/'.$id_encryption)?>')" class="btn btn-sm btn-danger" title="Hapus" data-target="#modalDelete" data-toggle="modal">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-sm btn-danger btn-ok" id="btn-delete">Hapus</a>
      </div>
    </div>
  </div>
</div>


<script>
    function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    };  
</script>