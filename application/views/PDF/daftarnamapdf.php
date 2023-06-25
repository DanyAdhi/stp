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

<body onload="window.print()">
    <div class=" container-fluid mb-5">
        <div class="col " style="text-align:center">
            <div class="card-header py-3">
                <h1 class="m-0 font-weight-bold text-primary">LAPORAN</a></h1>
                <h2 class="m-0 font-weight-bold text-primary">ATENSI CENTRA TERPADU PANGUDI LUHUR</a></h2>
            </div>
        </div>
        <div class="card-body">
            <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N0</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Nama Orangtua</th>
                            <th scope="col">Domisili</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($daftarnama as $daf) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $daf['nik'] ?></td>
                                <td><?= $daf['namalengkap'] ?></td>
                                <td><?= $daf['tempatlahir'] ?></td>
                                <td><?= $daf['tanggallahir'] ?></td>
                                <td><?= $daf['jeniskelamin'] ?></td>
                                <td><?= $daf['agama'] ?></td>
                                <td><?= $daf['namaort'] ?></td>
                                <td><?= $daf['domisili'] ?></td>
                                <td><?= $daf['alamat'] ?></td>
                                <td><?= $daf['telpon'] ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
</body>

</html>