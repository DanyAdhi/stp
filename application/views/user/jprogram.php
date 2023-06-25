  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="row">
      <div class="col-lg-7 mx-auto mt-3">
        <?= $this->session->flashdata('jprogram'); ?>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">JADWAL PROGRAM | <a href="<?= base_url('user'); ?>">KEMBALI</a></h6>
          </div>
          <div class="card-body ">
            <div class=" table-responsive text-center">
              <table class="table table-bordered  " id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Program</th>
                    <th>Hari</th>
                    <th>Jam</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($jprogram as $jpo) : ?>
                    <tr>
                      <th><?= $i++; ?></th>
                      <td><?= $jpo['program'] ?></td>
                      <td><?= $jpo['hari'] ?></td>
                      <td><?= $jpo['jam'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->