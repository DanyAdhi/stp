<div class="container">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card shadow-lg">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ATENSI | <a href="<?= base_url('admin'); ?>">KEMBALI</a></h6>
                </div>
                <div class="row mt-5 ml-5 ">
                    <div class="col-8">
                        <?= $this->session->flashdata('pesanop'); ?>
                        <h2>Ubah Kata Sandi</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 ">
                        <form action="<?= base_url('admin/gantipassword'); ?>" method="post">
                            <input type="hidden" name="id" value="<?= $user['namalengkap']; ?>">
                            <div class="card-body ml-5">
                                <div class="form-group">
                                    <label for="namalengkap">Username</label>
                                    <input type="text" class="form-control" id="namalengkap" name="namalengkap" readonly value="<?= $user['namalengkap']; ?>" aria-describedby="namalengkap"> <?= form_error('pesanop', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" readonly value="<?= $user['email']; ?>" aria-describedby="email"> <?= form_error('pesanop', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="current_password">Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" aria-describedby="current_password"> <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="new_password1">New Password</label>
                                    <input type="password" class="form-control" id="new_password1" name="new_password1" aria-describedby="new_password1"> <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="new_password2">Repeat Password</label>
                                    <input type="password" class="form-control" id="new_password2" name="new_password2" aria-describedby="new_password2"> <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Ubah Password</button>
                                    <a class="btn btn-primary mt-3 mb-3" href="<?= base_url('admin') ?>" role="button">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
</div>