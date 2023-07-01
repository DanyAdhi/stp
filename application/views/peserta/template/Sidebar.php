<?php
  $page = strtolower($this->uri->segment(2));
?>


<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #003b46">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <img class="sidebar-brand-icon " src="http://localhost/stp/assets/img/atensi.png" width="50" height="50">
    <div class="sidebar-brand-text mx-3">ATENSI</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= ($page=='dashboard' ||$page='') ? 'active' : ''; ?>">
    <a class="nav-link" href="<?=base_url('peserta/dashboard')?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Peserta
  </div>

  <li class="nav-item <?= ($page=='jadwal') ? 'active' : ''; ?>">
    <a class="nav-link" href="<?=base_url('peserta/jadwal')?>">
      <i class="fas fa-list"></i>
      <span>Jadwal Program</span></a>
  </li>
  <li class="nav-item <?= ($page=='pembimbing') ? 'active' : ''; ?>">
    <a class="nav-link" href="<?=base_url('peserta/pembimbing')?>">
      <i class="fas fa-tasks"></i>
      <span>Daftar Pembimbing</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider my-0" />

  <li class="nav-item <?= (strtolower($this->uri->segment(3)) =='change-password') ? 'active' : ''; ?>">
    <a class="nav-link" href="<?= base_url('peserta/profile/change-password'); ?>">
      <i class="fas fa-cog"></i>
      <span>Ganti Password</span></a>
  </li>

  <!-- logout -->
  <li class="nav-item ">
    <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul> 