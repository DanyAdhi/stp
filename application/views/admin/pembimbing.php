<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg- mx-auto mt-3">
            <!-- tambah jadwal program -->
            <a href="" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Program</a>
            <?= $this->session->flashdata('pembimbing'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">BIODATA PEMBIMBING | <a href="<?= base_url('admin'); ?>">KEMBALI</a></h6>
                </div>
                <div class="card-body ">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Kontak</th>
                                    <th>Alamat</th>
                                    <th>Program</th>
                                    <th></th>
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
                                        <td>
                                            <a href="<?= base_url(); ?>admin/editpembimbing/<?= $pem['id_pembimbing']; ?>" class="btn btn-success mb-3 ml-2" onclick="return confirm('Data akan di Ubah!!!');">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16" data-toggle="modal" data-target="#exampleModal">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg></a>

                                            <a href="<?= base_url(); ?>admin/hapus/<?= $pem['id_pembimbing']; ?>" class="btn btn-danger mb-3 ml-2" onclick="return confirm('Data akan di hapus!!!');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                </svg></a>
                                        </td>
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

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/pembimbing'); ?> " method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="teks" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>"> <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="jam">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="<?= set_value('tempatlahir'); ?>"> <?= form_error('tempatlahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="tanggallahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?= set_value('tanggallahir'); ?>"> <?= form_error('tanggallahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kontak">Kontak</label>
                        <input type="text" class="form-control" id="kontak" name="kontak" value="<?= set_value('kontak'); ?>"> <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>"> <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="program">Program</label>
                        <select class="form-control" id="program" name="program" value="<?= set_value('program'); ?>"><?= form_error('program', '<small class="text-danger pl-3">', '</small>'); ?>
                            <option></option>
                            <option>Kosmetik Massage</option>
                            <option>Keterampilan</option>
                            <option>Shiatshu</option>
                            <option>Komputer Braille</option>
                            <option>Refleksi</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- akhir modal -->