<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>Dashboard</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>
        <?php echo $_SESSION['kad_matrik']; ?>
        <br>
        <?php echo $_SESSION['nama_pelajar']; ?>
        </p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Panel Kawalan</span></a></li>
      <li><a href="profil_pengguna.php"><i class="fa fa-user-plus"></i> <span>Profil Pengguna</span></a></li>
      <li><a href="../controller/ctrlAuthentication.php?a=logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
