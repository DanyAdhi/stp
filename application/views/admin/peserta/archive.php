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
                  <a  class="btn btn-sm btn-primary" href="<?=base_url('admin/peserta/print-pdf/'.$id_encryption)?>" title="Cetak progress peserta" target="_blank">
                    <i class="fas fa-print"></i>
                  </a>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php if ($this->session->flashdata('close')): ?>
  <script>
    window.close();
  </script>
<?php endif; ?>