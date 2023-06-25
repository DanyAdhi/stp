  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- DataTales Example -->
      <div class="row">
          <div class="col-lg mx-auto mt-3">
              <?= $this->session->flashdata('pembimbing'); ?>
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Daftar Pembimbing | <a href="<?= base_url('user'); ?>">KEMBALI</a></h6>
                  </div>
                  <div class="card-body ">
                      <div class="table-responsive text-center">
                          <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>NO</th>
                                      <th>Nama</th>
                                      <th>tempat Lahir</th>
                                      <th>Tanggal Lahir</th>
                                      <th>Kontak</th>
                                      <th>Alamat</th>
                                      <th>Program</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $i = 1;
                                    foreach ($pembimbing as $pem) : ?>
                                      <tr>
                                          <td><?= $i++; ?></td>
                                          <td><?= $pem['nama'] ?></td>
                                          <td><?= $pem['tempatlahir'] ?></td>
                                          <td><?= $pem['tanggallahir'] ?></td>
                                          <td><?= $pem['kontak'] ?></td>
                                          <td><?= $pem['alamat'] ?></td>
                                          <td><?= $pem['program'] ?></td>
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