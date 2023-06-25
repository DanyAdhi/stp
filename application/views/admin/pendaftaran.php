<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow-lg mx-auto">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ATENSI | <a href="<?= base_url('admin'); ?>">KEMBALI</a></h6>
                </div>
                <div class="row mt-5 ml-5 ">
                    <div class="col">
                        <?= $this->session->flashdata('pendaftaran'); ?>
                        <h2>Lengkapi Dokumen</h2>
                    </div>
                </div>
                <div class="row ml-5 ">
                    <div class="col">
                        <p>Lengkapi Dokumenmu Untuk Dapat Mendaftar Asistensi Rehabilitasi sosial , Informasimu Akan Kami Simpan Dengan Aman.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <form action="<?= base_url('admin/pendaftaran'); ?>" method="post">
                            <div class="card-body">

                                <div class="ml-5 mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" aria-describedby="nik" value="<?= set_value('nik'); ?>">
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="namalengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namalengkap" name="namalengkap" aria-describedby="namalengkap" value="<?= set_value('namalengkap'); ?>">
                                    <?= form_error('namalengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" aria-describedby="tempatlahir" value="<?= set_value('tempatlahir'); ?>">
                                    <?= form_error('tempatlahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="tanggallahir" class="form-label">Tanggl Lahir</label>
                                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" aria-describedby="tanggallahir" value="<?= set_value('tanggalahir'); ?>">
                                    <?= form_error('tanggalahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin" id="jeniskelamin" value="<?= set_value('jeniskelamin'); ?>">
                                        <?= form_error('jeniskelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <option></option>
                                        <option>Pria</option>
                                        <option>Wanita</option>
                                    </select>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select class="form-control" name="agama" id="agama" value="<?= set_value('agama'); ?>">
                                        <option></option>
                                        <option>Islam</option>
                                        <option>Kristen Protestan</option>
                                        <option>Katolik</option>
                                        <option>Hindu</option>
                                        <option>Buddha</option>
                                        <option>Konghucu</option>

                                    </select>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="namaort" class="form-label">Nama Orangtua / Wali</label>
                                    <input type="text" class="form-control" id="namaort" name="namaort" aria-describedby="namaort" value="<?= set_value('namaort'); ?>">
                                    <?= form_error('namaort', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="domsili" class="form-label">Domisili</label>
                                    <select class="form-control" name="domisili" id="domisili" value="<?= set_value('domisili'); ?>">
                                        <option></option>
                                        <option>Kab. Bekasi</option>
                                        <option>Kota Bogor</option>
                                        <option>Kab. Purwakarta</option>
                                        <option>Kab. Karawang</option>
                                        <option>Kab. Kuningan</option>

                                    </select>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat" value="<?= set_value('alamat'); ?>">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="ml-5 mb-3">
                                    <label for="telpon" class="form-label">Nomer Telepon</label>
                                    <input type="number" class="form-control" id="telpon" name="telpon" aria-describedby="telpon" value="<?= set_value('telpon'); ?>">
                                    <?= form_error('telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>


                                <button type="submit" class="btn btn-primary btn-simpan ml-5 mt-3 mb-5">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>