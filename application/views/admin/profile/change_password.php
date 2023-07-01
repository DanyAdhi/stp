<div class="container">
  <div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="card shadow-lg">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">ATENSI </h6>
        </div>
        <div class="row mt-5 ml-5 ">
          <div class="col-8">
            <?= $this->session->flashdata('flash'); ?>
            <h2>Ubah Kata Sandi</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 ">
            <form action="<?= base_url('admin/profile/update-password'); ?>" method="post">
              <div class="card-body ml-5">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" readonly value="<?=$profile->email?>">
                </div>
                <div class="form-group">
                  <label>Password Sekarang</label>
                  <input type="password" placeholder="Masukkan password sekarang" class="form-control" name="current_password" >
                  <?=form_error('current_password', "<small class='form-text text-danger'>",'</small>') ?>
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" placeholder="Masukkan password baru" class="form-control" name="new_password">
                    <?=form_error('new_password', "<small class='form-text text-danger'>",'</small>') ?>
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" placeholder="Masukkan kembali password baru" class="form-control" name="confirm_password">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success">Ubah Password</button>
                  <a class="btn btn-secondary mt-3 mb-3" href="<?= base_url('pembimbing/dashboard') ?>" role="button">Kembali</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>