<div class="container">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card shadow-lg">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ATENSI | <a href="<?= base_url('admin/jprogram'); ?>">KEMBALI</a></h6>
                </div>
                <div class="row mt-5 ml-5 ">
                    <div class="col">
                        <h2>Ubah Jadwal Program</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 ">
                        <form action="" method="post">
                            <input type="hidden" name="id_jprogram" value="<?= $editjprogram['id_jprogram']; ?>">
                            <div class="card-body">
                                <div class="ml-5 mb-3">
                                    <label for="program" class="form-label">Program</label>
                                    <select class="form-control" name="program" id="program" value="<?= $editjprogram['program']; ?>" readonly>
                                        <?php foreach ($program as $pro) : ?>
                                            <?php if ($pro == $editjprogram['program']) : ?>
                                                <option value="<?= $pro; ?>" selected><?= $pro; ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?= $pro; ?>"><?= $pro; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                    </select>
                                    <?= form_error('program', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="ml-5 mb-3">
                                    <label for="hari" class="form-label">Hari</label>
                                    <input type="text" class="form-control" id="hari" name="hari" aria-describedby="hari" value="<?= $editjprogram['hari']; ?>">
                                    <?= form_error('hari', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="jam" class="form-label">Jam</label>
                                    <input type="time" class="form-control" id="jam" name="jam" aria-describedby="jam" value="<?= $editjprogram['jam']; ?>">
                                    <?= form_error('jam', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <button type="submit" class="btn btn-primary btn-simpan ml-5 mt-3 mb-5">
                                    Ubah
                                </button>
                                <a class="btn btn-success btn-simpan ml-5 mt-3 mb-5 collapse-item" target="_blank" href="<?= base_url('admin/print'); ?>">Cetak</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>