<?php 

$page = @$_GET['page'];

if ($page == 'data_siswa') {
  $active = 'active';
  $menu = 'menu-open';
  $siswa = 'active';
}elseif ($page == 'data_petugas') {
  $active = 'active';
  $menu = 'menu-open';
  $petugas = 'active';
}elseif ($page == 'data_kelas') {
  $active = 'active';
  $menu = 'menu-open';
  $kelas = 'active';
}elseif ($page == '') {
  $dashboard = 'active';
  $active = '';
}

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $_SESSION['nama'] ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="index.php" class="nav-link <?= $dashboard ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview <?= $menu ?>">
            <a href="#" class="nav-link <?= $active ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= baseUrl('view/petugas?page=data_siswa') ?>" class="nav-link <?= $siswa ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= baseUrl('view/petugas?page=data_petugas') ?>" class="nav-link <?=$petugas?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Petugas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= baseUrl('view/petugas?page=data_kelas') ?>" class="nav-link <?= $kelas ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>