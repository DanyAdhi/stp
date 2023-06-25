<?=$this->session->flashdata('flash') ?>

<div class="card shadow">
  <div class="card-header py-3 d-flex">
    <h6 class=" font-weight-bold text-primary">Data Arsip Peserta</h6>
  </div>
  <div class="card-body w-100">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>NO</th>
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
                <td width="80px">
                  <a  class="btn btn-sm btn-info" href="<?=base_url('admin/peserta/detail/'.$id_encryption)?>" title="Detail">
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