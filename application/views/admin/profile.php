<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card shadow-lg">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ATENSI | <a href="<?= base_url('admin'); ?>">KEMBALI</a></h6>
                </div>
                <div class="row mt-5 ml-3 ">
                    <div class="col-8">
                        <?= $this->session->flashdata('profile'); ?>
                        <h2>Profile</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg ">
                        <!-- <form action="<?= base_url('admin/profile'); ?>" method="post" enctype="multipart/multipart/form-data"> -->
                        <?= form_open_multipart('admin/profile'); ?>
                        <div class="card-body ml-3">
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="email" name="email" readonly value="<?= $user['email']; ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namalengkap" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="namalengkap" name="namalengkap" value="<?= $user['namalengkap']; ?>">
                                    <?= form_error('namalengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Ubah</button>
                                <a class="btn btn-primary mt-3 mb-3" href="<?= base_url('admin/profile') ?>" role="button">Kembali</a>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
</div>