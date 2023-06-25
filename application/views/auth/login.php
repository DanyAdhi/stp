<div class="container">
    <!-- navbar -->
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
                        <a class="nav-link " aria-current="page" href="<?= base_url('home') ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home') ?>">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home') ?>">VISI & MISI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth') ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registrasi'); ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>