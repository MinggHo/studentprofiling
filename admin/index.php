<?php
  session_start();

  if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){

    header('Location: ../index.php');
  }

  if ($_SESSION['status'] == 'STUDENT') {
    header('Location: ../user/index.php');
  }

require_once "../model/query.php";
$bil_user = bilanganUser();
$bil_user_jawap = bilanganUserJawap();
$bil_skor = bilanganSkor();
$bil_skor_latest = bilanganSkorLatest();
$skor_baru = skorBaru();
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
        Panel kawalan
        <small>Laman utama</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Laman utama</a></li>
        <li class="active">Panel kawalan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?php if ($skor_baru->num_rows == true) {
                  echo $skor_baru->num_rows;
                } else {
                  echo '0';
                }?>
              </h3>

              <p>Skor Baru dari : <span id="nextDate"></span> - <span id="currDate"></span></p>
            </div>
            <div class="icon">
              <i class="ion ion-archive"></i>
            </div>
            <a href="skor_baru.php" class="small-box-footer">Maklumat lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php if ($bil_user_jawap->num_rows == true) {
                  echo $bil_user_jawap->num_rows;
                } else {
                  echo '0';
                }?>
                 /
                <?php if ($bil_user->num_rows == true) {
                  echo $bil_user->num_rows;
                } else {
                  echo '0';
                }?>
              </h3>

              <p>Bilangan Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="bilangan_pengguna.php" class="small-box-footer">Maklumat lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
                <?php if ($bil_skor->num_rows == true) {
                  echo $bil_skor->num_rows;
                } else {
                  echo '0';
                }?>
              </h3>

              <p>Skor Markah</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="skor_markah.php" class="small-box-footer">Analisis skor markah <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
        <!-- Left col -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pengguna Terkini</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-condensed table-bordered table-striped">
              <thead>
              <tr>
                <th>Kad Matrik</th>
                <th>Nama</th>
                <th>AGG</th>
                <th>ANA</th>
                <th>AUT</th>
                <th>KTF</th>
                <th>EKS</th>
                <th>ITL</th>
                <th>WSN</th>
                <th>KEP</th>
                <th>THN</th>
                <th>KRD</th>
                <th>MGL</th>
                <th>TLG</th>
                <th>SOK</th>
                <th>STR</th>
                <th>PCP</th>
                <th>Kejujuran</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;

                while ($row = mysqli_fetch_assoc($bil_skor_latest)) {
                  echo '<tr>';
                    echo '<td><b><a href="profil_pelajar.php?id='.$row['kad_matrik'].'" target="_blank">'.$row['kad_matrik'].'</a></b></td>';
                    echo '<td>'.$row['nama_pelajar'].'</td>';
                    echo '<td>'.$row['markah_agg'].'</td>';
                    echo '<td>'.$row['markah_ana'].'</td>';
                    echo '<td>'.$row['markah_aut'].'</td>';
                    echo '<td>'.$row['markah_ktf'].'</td>';
                    echo '<td>'.$row['markah_eks'].'</td>';
                    echo '<td>'.$row['markah_int'].'</td>';
                    echo '<td>'.$row['markah_wsn'].'</td>';
                    echo '<td>'.$row['markah_kep'].'</td>';
                    echo '<td>'.$row['markah_ket'].'</td>';
                    echo '<td>'.$row['markah_kri'].'</td>';
                    echo '<td>'.$row['markah_mng'].'</td>';
                    echo '<td>'.$row['markah_mnl'].'</td>';
                    echo '<td>'.$row['markah_skg'].'</td>';
                    echo '<td>'.$row['markah_str'].'</td>';
                    echo '<td>'.$row['markah_pcp'].'</td>';
                    echo '<td>'.$row['markah_kjj'].'</td>';
                  echo '</tr>';
                  $i++;
                }
                ?>
              </tbody>
            </table>
            <div class="box-footer">
              <div class="pull-right">
                <table class="table table-condensed">
                  <thead>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th class="pull-right"> Lagenda </th>
                  </thead>
                  <tbody>
                    <tr>
                    <td>
                      <b>AGG</b> : Aggresif
                    </td>
                    <td>
                      <b>ANA</b> : Analitikal
                    </td>
                    <td>
                      <b>AUT</b> : Autonomi
                    </td>
                    <td>
                      <b>KTF</b> : Kreatif
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <b>EKS</b> : Ekstrovert
                    </td>
                    <td>
                      <b>ITL</b> : Intelektual
                    </td>
                    <td>
                      <b>WSN</b> : Wawasan
                    </td>
                    <td>
                      <b>KEP</b> : Kepelbagaian
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <b>THN</b> : Ketahanan
                    </td>
                    <td>
                      <b>KRD</b> : Kritik Diri
                    </td>
                    <td>
                      <b>MGL</b> : Mengawal
                    </td>
                    <td>
                      <b>TLG</b> : Menolong
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <b>SOK</b> : Sokongan
                    </td>
                    <td>
                      <b>STR</b> : Struktur
                    </td>
                    <td>
                      <b>PCP</b> : Pencapaian
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
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
  $(function () {

    var currDate = document.getElementById('currDate');
    var nextDate = document.getElementById('nextDate');

    var today = new Date();

    currDate.innerHTML = today.getDate() + " / " + (today.getMonth()+1) + " / " + today.getFullYear();

    var dateOffset = (24*60*60*1000) * 7;
    today.setTime(today.getTime() - dateOffset);

    nextDate.innerHTML = today.getDate() + " / " + (today.getMonth()+1) + " / " + today.getFullYear();

    $("#example1").DataTable();
  });
</script>
</body>
</html>
