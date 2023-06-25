<?=$this->session->flashdata('flash') ?>

<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Data Periode Program</h6>
      </div>
      <div class="ml-auto">
        <a class="btn btn-sm btn-primary text-light" href="<?=base_url('admin/periode/create')?>">
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
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($periods as $key => $value): 
            $id_encryption = str_replace(['=','+','/'],['-','_','~',], $this->encryption->encrypt($value->id));
          ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->name ?></td>
                <td><?= $value->start_date ?></td>
                <td><?= $value->end_date ?></td>
                <td>
                  <?php if($value->status == 'Aktif'): ?>
                    <a href="<?=base_url('admin/periode/update_status/'.$id_encryption)?>" class="btn btn-sm btn-success" title="Ubah ke selesai"><?= $value->status ?></a>
                  <?php else: ?>
                    <span class="badge badge-primary p-2"><?= $value->status ?></span>
                  <?php endif ?>

                </td>
                <td width="80px">
                  <button href="" onclick="deleteConfirm('<?=base_url('admin/periode/delete/'.$id_encryption)?>')" class="btn btn-sm btn-danger" title="Hapus" data-target="#modalDelete" data-toggle="modal">
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