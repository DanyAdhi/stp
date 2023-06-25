<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- boosttrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css" />

    <title><?= $title ?></title>
</head>

<body id="home">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #003b46">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h3>ATENSI</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <!-- mindahin Navbar ke kiri Pke margin start(ms) -->
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">VISI & MISI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth') ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- jumbotron pke 4.6 -->
    <section class="jumbotron text-center">
        <img src="<?= base_url('assets/img/atensi.png') ?>" alt="Bilily ellies" width="200" class=" " />
        <h1 class="display-4">BALAI SENTRA TERPADU PANGUDILUHUR</h1>
        <p class="lead">DEPARTEMEN SOSIAL KOTA BEKASI</p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffff" fill-opacity="1" d="M0,192L34.3,165.3C68.6,139,137,85,206,69.3C274.3,53,343,75,411,112C480,149,549,203,617,202.7C685.7,203,754,149,823,144C891.4,139,960,181,1029,197.3C1097.1,213,1166,203,1234,170.7C1302.9,139,1371,85,1406,58.7L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
        </svg>
    </section>
    <!-- akhir jumbotron  -->

    <!-- About -->
    <section id="about">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Pendaftaran Rehabilitasi</h2>
                </div>
            </div>
            <div class="row justify-content-center text-left">
                <!-- colom posisi di tegah  -->
                <div class="col-md-6 fs-5">
                    <p>1. Formulir Pendaftaran</p>
                    <p>2. Rekomendasi Dinas Sosial atau Istansi Terkait</p>
                    <p>3. Surat Keterangan Dokter Spesialis Mata</p>
                    <p>4. Surat Pernyataan Orang Tua</p>
                    <a href="<?= base_url('auth/registrasi') ?>"><button class="btn btn-primary btn-simpan">Daftar Sekarang</button></a>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#e2edff" fill-opacity="1" d="M0,224L48,240C96,256,192,288,288,256C384,224,480,128,576,122.7C672,117,768,203,864,213.3C960,224,1056,160,1152,144C1248,128,1344,160,1392,176L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>


    <!-- Akhir About -->

    <!-- projects -->
    <section id="projects">
        <div class="container">
            <div class="row justify-content-center">
                <!-- colom posisi di tegah  -->
                <div class="col-md-4 fs-5">
                    <div class="col text-center">
                        <h2>Visi</h2>
                    </div>
                    <p>Terwujudnya Penyandang Disabilitas Sensorik Netra yang memiliki Kabilitas Sosial dan Tanggung Jawab Sosial di masyarakat.</p>
                </div>
                <div class="col-md-4 fs-5">
                    <div class="col text-center">
                        <h2>Misi</h2>
                    </div>
                    <p>1. Menyelenggarakan Atensi (Asistensi Rehabiitasi Sosial) bagi penyandang disabilitas sensorik.
                        2. Meningkatkan kompetisi penyelenggaraan Atensi bagi penyandang disabilitas sensorik netra.
                        3. Meningkatkan saran dan prasarana pendukung Atensi Sentra Terpadu Pangudi Luhur dibekasi.
                        4. Menigkatkan dan mengembangkan program peleyanan Atensi bagi penyandang disabilitas sensorik netra.
                        5. Menjadikan pusat pengembangan model pelayanan Atensi.
                    </p>
                </div>
            </div>

        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#22b2ff" fill-opacity="1" d="M0,128L30,138.7C60,149,120,171,180,197.3C240,224,300,256,360,256C420,256,480,224,540,176C600,128,660,64,720,80C780,96,840,192,900,218.7C960,245,1020,203,1080,170.7C1140,139,1200,117,1260,133.3C1320,149,1380,203,1410,229.3L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
        </svg>
    </section>

    <!-- akhir projects -->

    <!-- contact -->
    <!-- <section id="contact">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Contact Me</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8"> -->
    <!-- awal alert -->
    <!-- <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                        <strong>Terimakasih!</strong> Pesan sudah kami terima.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> -->
    <!-- akhir alert -->
    <!-- <form name="wpu-contact-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" name="nama" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email
                            </label>
                            <input type="email" class="form-control" id="email" aria-describedby="email" name="email" />
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="3" name="pesan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-kirim">
                            Kirim
                        </button>

                        <button class="btn btn-primary btn-loading d-none" type="button" disabled>
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#22b2ff" fill-opacity="1" d="M0,128L30,138.7C60,149,120,171,180,197.3C240,224,300,256,360,256C420,256,480,224,540,176C600,128,660,64,720,80C780,96,840,192,900,218.7C960,245,1020,203,1080,170.7C1140,139,1200,117,1260,133.3C1320,149,1380,203,1410,229.3L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
        </svg>
    </section> -->

    <!-- akhir contact -->

    <!-- footer -->
    <footer class="text-center text-white pb-3" style="background-color: #22b2ff">
        <p>
            Created with <i class="bi bi-balloon-heart-fill text-danger"></i> by
            <a href="https://l.instagram.com/?u=http%3A%2F%2Fbillieeilish.lnk.to%2FHappierThanEver&e=ATMR9PRh7kN04R8M579_Nn4ZkaaYav9fXU3FJ2ZxDHL4j1fapmlBNwRHyuRppp0A1TmBdN6ZiTDv170p&s=1" class="text-white fw-bold">Sentra Terpadu Pangudiluhur</a>
        </p>
    </footer>

    <!-- akhir footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbxZIS8_4HQC-KgjpOEWWEoX6mXoC5ez3DwNNB5vfel28wgOfAVsGahNu8XkYx_vWRMq/exec';
        const form = document.forms['wpu-contact-form'];
        const btnKirim = document.querySelector('.btn-kirim');
        const btnLoading = document.querySelector('.btn-loading');
        const alert = document.querySelector('.alert');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            //ketika tombol sumbit diklik
            //tampilkan tombol loading, hilangkan tombol kirims
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');

            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then((response) => {
                    //tampilkan tombol kirim, hilangkan tombol loading
                    btnLoading.classList.toggle('d-none');
                    btnKirim.classList.toggle('d-none');
                    //tampilkan alert
                    alert.classList.toggle('d-none');
                    //reset form
                    form.reset();
                    console.log('Success!', response);
                })
                .catch((error) => console.error('Error!', error.message));
        });
    </script>
</body>

</html>