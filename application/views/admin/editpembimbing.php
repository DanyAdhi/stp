<div class="container">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card shadow-lg">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ATENSI | <a href="<?= base_url('admin/pembimbing'); ?>">KEMBALI</a></h6>
                </div>
                <div class="row mt-5 ml-5 ">
                    <div class="col">
                        <h2>Ubah Biodata Pembimbing</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 ">
                        <form action="" method="post">
                            <input type="hidden" name="id_pembimbing" value="<?= $editpembimbing['id_pembimbing']; ?>">
                            <div class="card-body">
                                <div class="ml-5 mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" value="<?= $editpembimbing['nama']; ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" aria-describedby="tempatlahir" value="<?= $editpembimbing['tempatlahir']; ?>">
                                    <?= form_error('tempatlahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="ml-5 mb-3">
                                    <label for="tanggallahir" class="form-label">Tanggallahir</label>
                                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" aria-describedby="tanggallahir" value="<?= $editpembimbing['tanggallahir']; ?>">
                                    <?= form_error('tanggallahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="ml-5 mb-3">
                                    <label for="kontak" class="form-label">Kontak</label>
                                    <input type="text" class="form-control" id="kontak" name="kontak" aria-describedby="kontak" value="<?= $editpembimbing['kontak']; ?>">
                                    <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="ml-5 mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat" value="<?= $editpembimbing['alamat']; ?>">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="ml-5 mb-3">
                                    <label for="program" class="form-label">Program</label>
                                    <select class="form-control" name="program" id="program" value="<?= $editpembimbing['program']; ?>" readonly>
                                        <?php foreach ($program as $pro) : ?>
                                            <?php if ($pro == $editpembimbing['program']) : ?>
                                                <option value="<?= $pro; ?>" selected><?= $pro; ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?= $pro; ?>"><?= $pro; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                    </select>
                                    <?= form_error('program', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-simpan ml-5 mt-3 mb-5">
                                    Ubah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>