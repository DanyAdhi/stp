<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow-lg mx-auto">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ATENSI | <a href="<?= base_url('admin/daftarnama'); ?>">KEMBALI</a></h6>
                </div>
                <div class="row mt-5 ml-5 ">
                    <div class="col-lg-7">
                        <?= $this->session->flashdata('editnama'); ?>
                        <h2>Ubah Dokumen</h2>
                    </div>
                </div>
                <div class="row ml-5 ">
                    <div class="col">
                        <p>Lengkapi Dokumenmu Untuk Dapat Mendaftar Asistensi Rehabilitasi sosial , Informasimu Akan Kami Simpan Dengan Aman.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $editnama['id']; ?>">
                            <div class="card-body">
                                <div class="ml-5 mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" readonly aria-describedby="nik" value="<?= $editnama['nik']; ?>">
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="namalengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namalengkap" name="namalengkap" readonly aria-describedby="namalengkap" value="<?= $editnama['namalengkap']; ?>">
                                    <?= form_error('namalengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" aria-describedby="tempatlahir" value="<?= $editnama['tempatlahir']; ?>">
                                    <?= form_error('tempatlahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="tanggallahir" class="form-label">Tanggl Lahir</label>
                                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" aria-describedby="tanggallahir" value="<?= $editnama['tanggallahir']; ?>">
                                    <?= form_error('tanggalahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin" id="jeniskelamin" value="<?= $editnama['jeniskelamin']; ?>">
                                        <?php foreach ($jkelamin as $jkel) : ?>
                                            <?php if ($jkel == $editnama['jeniskelamin']) : ?>
                                                <option value="<?= $jkel; ?>" selected><?= $jkel; ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?= $jkel; ?>"><?= $jkel; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                    </select>
                                    <?= form_error('jeniskelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <input type="text" class="form-control" id="agama" name="agama" aria-describedby="agama" value="<?= $editnama['agama']; ?>">
                                    <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="namaort" class="form-label">Nama Orangtua / Wali</label>
                                    <input type="text" class="form-control" id="namaort" name="namaort" aria-describedby="namaort" value="<?= $editnama['namaort']; ?>">
                                    <?= form_error('namaort', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="domsili" class="form-label">Domisili</label>
                                    <select class="form-control" name="domisili" id="domisili" value="<?= $editnama['domisili']; ?>">
                                        <?php foreach ($domisili as $dom) : ?>
                                            <?php if ($dom == $editnama['domisili']) : ?>
                                                <option value="<?= $dom; ?>" selected><?= $dom; ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?= $dom; ?>"><?= $dom; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                    </select>
                                    <?= form_error('domisili', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat" value="<?= $editnama['alamat']; ?>">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="telpon" class="form-label">Nomer Telpon</label>
                                    <input type="number" class="form-control" id="telpon" name="telpon" aria-describedby="telpon" value="<?= $editnama['telpon']; ?>">
                                    <?= form_error('telpon', '<small class="text-danger pl-3">', '</small>'); ?>
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