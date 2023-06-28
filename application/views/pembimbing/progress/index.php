<?=$this->session->flashdata('flash') ?>

<div class="card shadow">
  <div class="card-header py-3 d-flex">
      <div>
        <h6 class=" font-weight-bold text-primary">Data Progres Program</h6>
      </div>
      <div class="ml-auto">
        <button class="btn btn-sm btn-primary text-light" data-target="#modalCreate" data-toggle="modal">
          <i class="fa fa-plus"></i> <b>Tambah</b>
        </button>
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($progress as $key => $value): 
            $id_encryption = str_replace(['=','+','/'],['-','_','~',], $this->encryption->encrypt($value->id));
          ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->progress ?></td>
                <td><?= $value->program ?></td>
                <td><?= $value->mentor ?></td>
                <td><?= $value->created_at ?></td>
                <td width="100px">
                  <button onclick="edit('<?=$id_encryption?>', '<?=$value->progress?>', '<?=$value->created_at?>')" class="btn btn-sm btn-warning text-white" title="Edit" data-target="#modalEdit" data-toggle="modal">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button onclick="deleteConfirm('<?=base_url('pembimbing/progress/delete/'.$id_encryption)?>')" class="btn btn-sm btn-danger" title="Hapus" data-target="#modalDelete" data-toggle="modal">
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

<!-- Modal create -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalCreate">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url('pembimbing/progress/store')?>">
          <div class="form-group">
            <label class="col-form-label">Tanggal:</label>
            <input type="datetime-local" class="form-control" name="tanggal" id="dateInput" readonly>
          </div>
          <div class="form-group">
            <label class="col-form-label">Progress:</label>
            <textarea class="form-control" rows="3" name="progress"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-success text-white">Simpan</button>
        </form>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold">Edit data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url('pembimbing/progress/update/')?>" id="formEdit">
          <div class="form-group">
            <label class="col-form-label">Tanggal:</label>
            <input type="datetime-local" class="form-control" name="tanggal" id="inputDate" readonly>
          </div>
          <div class="form-group">
            <label class="col-form-label">Progress:</label>
            <textarea class="form-control" rows="3" name="progress"  id="inputProgress"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-success text-white">Update</button>
        </form>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal delete -->
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
  function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  };

  function edit(id_encryption, progress, date) {
    $('#inputDate').val(date);
    $('#inputProgress').val(progress);
    $('#formEdit').attr('action', `${$('#formEdit').attr('action')}${id_encryption}`);

  }


  // Get the date input field
  const dateInput = document.getElementById('dateInput');

  // Create a new Date object with the current date and time
  const currentDate = new Date();

  // Format the date and time as YYYY-MM-DDThh:mm
  const formattedDate = currentDate.toISOString().slice(0, 16);

  // Set the default value of the input field
  dateInput.value = formattedDate;

</script>