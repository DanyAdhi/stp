<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/my.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<style>
    /* .container {
        background-color: aqua;
    } */
</style>

<body onload="window.print()">
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="row mt-5 ml-5 ">
                    <div class="col-lg pt-5 pb-3 text-left">
                        <h2>FORMULIR PENDAFTARAN</h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg pb-3 text-left">
                        <p>Lengkapi Dokumenmu Untuk Dapat Mendaftar Asistensi Rehabilitasi sosial , Informasimu Akan Kami Simpan Dengan Aman.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 ml-5">
                        <form action="post">
                            <div class="card-body">
                                <div class=" table table-borderless ">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <tr>
                                            <th style="text-align: left;">NIK</th>
                                            <td style="text-transform: uppercase;"><span class="mr-4">:</span><?= $pdfuser['nik'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left;">Nama Lengkap</th>
                                            <td style="text-transform: uppercase;"><span class="mr-4">:</span><?= $pdfuser['namalengkap'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left;">Tempat Lahir</th>
                                            <td style="text-transform: uppercase;"><span class="mr-4">:</span><?= $pdfuser['tempatlahir'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left;">Tanggal Lahir</th>
                                            <td style="text-transform: uppercase;"><span class="mr-4">:</span><?= $pdfuser['tanggallahir'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left;">Jenis Kelamin</th>
                                            <td style="text-transform: uppercase;"><span class="mr-4">:</span><?= $pdfuser['jeniskelamin'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left;">Agama</th>
                                            <td style="text-transform: uppercase;"><span class="mr-4">:</span><?= $pdfuser['agama'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left;">Nama Orangtua/Wali</th>
                                            <td style="text-transform: uppercase;"><span class="mr-4">:</span><?= $pdfuser['namaort'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left;">Domisili</th>
                                            <td style="text-transform: uppercase;"><span class="mr-4">:</span><?= $pdfuser['domisili'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left;">Alamat</th>
                                            <td style="text-transform: uppercase;"><span class="mr-4">:</span><?= $pdfuser['alamat'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left;">No Telepon</th>
                                            <td style="text-transform: uppercase;"><span class="mr-4">:</span><?= $pdfuser['telpon'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row m-5 text-right justify-content-end">
                    <div class="col-lg-4 p-5 ">
                        <h5>Bekasi,............................</h5>
                    </div>
                </div>
                <div class="row m-5 text-right justify-content-end">
                    <div class="col-lg-4 pt-5 pb-5 pr-5 ">
                        <h5>_______________________</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
</body>

</html>