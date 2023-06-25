 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <?= $this->session->flashdata('pendaftaran'); ?>
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">DAFTAR NAMA | <a href="<?= base_url('admin'); ?>">KEMBALI</a></h6>
         </div>
         <div class="card-body">
             <div class="table-responsive text-center">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>NO</th>
                             <th>NIK</th>
                             <th>Nama</th>
                             <th>Tanggal Lahir</th>
                             <th>Nama orangtua</th>
                             <th>Domisili</th>
                             <th>Alamat Lengkap</th>
                             <th>No Telepon</th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1;
                            foreach ($daftarnama as $daf) : ?>
                             <tr>
                                 <td><?= $i++; ?></td>
                                 <td><?= $daf['nik'] ?></td>
                                 <td><?= $daf['namalengkap'] ?></td>
                                 <td><?= $daf['tanggallahir'] ?></td>
                                 <td><?= $daf['namaort'] ?></td>
                                 <td><?= $daf['domisili'] ?></td>
                                 <td><?= $daf['alamat'] ?></td>
                                 <td><?= $daf['telpon'] ?></td>
                                 <td>
                                     <a href="<?= base_url(); ?>admin/editdaftarnama/<?= $daf['id']; ?>" class="btn btn-success mb-3 ml-2" onclick="return confirm('Data akan di Ubah!!!');">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16" data-toggle="modal" data-target="#exampleModal">
                                             <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                         </svg></a>

                                     <a href="<?= base_url(); ?>admin/hapus/<?= $daf['id']; ?>" class="btn btn-danger mb-3 ml-2" onclick="return confirm('Data akan di hapus!!!');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                             <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                         </svg></a>

                                     <a href="<?= base_url('admin/print/'); ?><?= $daf['id']; ?>" class="btn btn-primary mb-3 ml-2" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                             <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                             <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
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
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->