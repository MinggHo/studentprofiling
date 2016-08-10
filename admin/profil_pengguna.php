<?php
  session_start();

  if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){

    header('Location: ../index.php');
  }

  if ($_SESSION['status'] == 'STUDENT') {
    header('Location: ../user/index.php');
  }

require_once "../model/query.php";
$maklumat_pengguna = maklumatPengguna($_SESSION['kad_matrik']);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Profiling | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="./plugins/datatables/dataTables.bootstrap.css">

  <link rel="icon" href="dist/img/logoutem.jpg">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition sidebar-collapse skin-blue sidebar-mini">
<div class="wrapper">

  <?php include("./includes/header.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Laman utama</a></li>
        <li class="active">Panel Kawalan</li>
        <li class="active">Profil Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Info</h4>
        Pengguna boleh menukar kata laluan disini.
      </div>
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
        <!-- Left col -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Maklumat Pengguna</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php if(isset($_SESSION['error_msg'])){?>
            <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Ralat!</h4>
            <?= $_SESSION['error_msg']; ?>
          </div>
            <?php unset($_SESSION['error_msg']); ?>
            <?php } ?>

            <?php if(isset($_SESSION['success_msg'])){?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Berjaya!</h4>
            <?= $_SESSION['success_msg']; ?>
          </div>
            <?php unset($_SESSION['success_msg']); ?>
            <?php } ?>


            <div class="col-xs-4">
              <?php
                  while ($row = mysqli_fetch_assoc($maklumat_pengguna)) {
              ?>
              <form class="" action="../controller/ctrlUpdate.php" method="post">
              <div class="form-group">
                <label for="staff_name">Name</label>
                <input type="text" name="staff_name" class="form-control" value = "<?php echo $row['nama_pelajar']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="staff_id">Staff ID</label>
                <input type="text" name="staff_id" class="form-control" value = "<?php echo $row['kad_matrik']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="staff_email">Email</label>
                <input type="text" name="staff_email" class="form-control" value = "<?php echo $row['emel']; ?>" required>
              </div>
              <div class="form-group">
                <label for="staff_password">Password</label>
                <input type="password" name="staff_password" id="staff_password" class="form-control" value = "<?php echo $row['katalaluan']; ?>" required>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="password-box"> See Password
                  </label>
                </div>
                <?php } ?>
              </div>
              <div class="pull-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>

    <!-- /.content -->
  </div>
</section>
</div>
  <!-- /.content-wrapper -->

  <?php
    include("./includes/footer.php");
   ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<script>
$("#password-box").change(function() {
  var $input = $(this);
  var checked = $input.prop("checked");

  checked ? showPass(true) : showPass(false);

});

function showPass(x) {
  x ? $("#staff_password").get(0).type = "text" : $("#staff_password").get(0).type = "password"
}</script>
</body>
</html>
