<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){
  header('Location: ../index.php');
}

require_once "../model/query.php";

$purata_fakulti_FTMK = purataFakulti('FTMK');
$purata_fakulti_FKE = purataFakulti('FKE');
$purata_fakulti_FKEKK = purataFakulti('FKEKK');
$purata_fakulti_FKM = purataFakulti('FKM');
$purata_fakulti_FKP = purataFakulti('FKP');
$purata_fakulti_FTK = purataFakulti('FTK');
$purata_fakulti_FPTT = purataFakulti('FPTT');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Profiling | Analisis Skor Markah </title>
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

<?php include("./includes/header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Analisis Skor Pelajar
      </h1>
      <ol class="breadcrumb">
        <li><a href="./index.php"><i class="fa fa-dashboard"></i> Laman utama</a></li>
        <li>Panel kawalan</li>
        <li class="active">Analisis Skor Pelajar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- Main row -->
      <div class="row">
        <div class="col-lg-12">
        <!-- Left col -->
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Purata Skor</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-condensed table-striped">
              <thead>
              <tr>
                <th>Fakulti</th>
                <th>AGG</th>
                <th>ANA</th>
                <th>AUT</th>
                <th>BSD</th>
                <th>EKS</th>
                <th>ITL</th>
                <th>INT</th>
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

                while ($row = mysqli_fetch_assoc($purata_fakulti_FTMK)) {
                  echo '<tr>';
                  if (!$row['fakulti']) {
                    echo '<td>FTMK</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                  } else {
                    echo '<td>'.$row['fakulti'].'</td>';
                    echo '<td>'.$row['avg_agg'].'</td>';
                    echo '<td>'.$row['avg_ana'].'</td>';
                    echo '<td>'.$row['avg_aut'].'</td>';
                    echo '<td>'.$row['avg_ber'].'</td>';
                    echo '<td>'.$row['avg_eks'].'</td>';
                    echo '<td>'.$row['avg_int'].'</td>';
                    echo '<td>'.$row['avg_itr'].'</td>';
                    echo '<td>'.$row['avg_kep'].'</td>';
                    echo '<td>'.$row['avg_ket'].'</td>';
                    echo '<td>'.$row['avg_kri'].'</td>';
                    echo '<td>'.$row['avg_mng'].'</td>';
                    echo '<td>'.$row['avg_mnl'].'</td>';
                    echo '<td>'.$row['avg_skg'].'</td>';
                    echo '<td>'.$row['avg_str'].'</td>';
                    echo '<td>'.$row['avg_pcp'].'</td>';
                    echo '<td>'.$row['avg_kjj'].'</td>';
                  }
                  echo '</tr>';
                }

                while ($row = mysqli_fetch_assoc($purata_fakulti_FKE)) {
                  echo '<tr>';
                  if (!$row['fakulti']) {
                    echo '<td>FKE</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                  } else {
                    echo '<td>'.$row['fakulti'].'</td>';
                    echo '<td>'.$row['avg_agg'].'</td>';
                    echo '<td>'.$row['avg_ana'].'</td>';
                    echo '<td>'.$row['avg_aut'].'</td>';
                    echo '<td>'.$row['avg_ber'].'</td>';
                    echo '<td>'.$row['avg_eks'].'</td>';
                    echo '<td>'.$row['avg_int'].'</td>';
                    echo '<td>'.$row['avg_itr'].'</td>';
                    echo '<td>'.$row['avg_kep'].'</td>';
                    echo '<td>'.$row['avg_ket'].'</td>';
                    echo '<td>'.$row['avg_kri'].'</td>';
                    echo '<td>'.$row['avg_mng'].'</td>';
                    echo '<td>'.$row['avg_mnl'].'</td>';
                    echo '<td>'.$row['avg_skg'].'</td>';
                    echo '<td>'.$row['avg_str'].'</td>';
                    echo '<td>'.$row['avg_pcp'].'</td>';
                    echo '<td>'.$row['avg_kjj'].'</td>';
                  }
                  echo '</tr>';
                }

                while ($row = mysqli_fetch_assoc($purata_fakulti_FKM)) {
                  echo '<tr>';
                  if (!$row['fakulti']) {
                    echo '<td>FKM</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                  } else {
                    echo '<td>'.$row['fakulti'].'</td>';
                    echo '<td>'.$row['avg_agg'].'</td>';
                    echo '<td>'.$row['avg_ana'].'</td>';
                    echo '<td>'.$row['avg_aut'].'</td>';
                    echo '<td>'.$row['avg_ber'].'</td>';
                    echo '<td>'.$row['avg_eks'].'</td>';
                    echo '<td>'.$row['avg_int'].'</td>';
                    echo '<td>'.$row['avg_itr'].'</td>';
                    echo '<td>'.$row['avg_kep'].'</td>';
                    echo '<td>'.$row['avg_ket'].'</td>';
                    echo '<td>'.$row['avg_kri'].'</td>';
                    echo '<td>'.$row['avg_mng'].'</td>';
                    echo '<td>'.$row['avg_mnl'].'</td>';
                    echo '<td>'.$row['avg_skg'].'</td>';
                    echo '<td>'.$row['avg_str'].'</td>';
                    echo '<td>'.$row['avg_pcp'].'</td>';
                    echo '<td>'.$row['avg_kjj'].'</td>';
                  }
                  echo '</tr>';
                }

                $i = 1;

                while ($row = mysqli_fetch_assoc($purata_fakulti_FKEKK)) {
                  echo '<tr>';
                  if (!$row['fakulti']) {
                    echo '<td>FKEKK</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                  } else {
                    echo '<td>'.$row['fakulti'].'</td>';
                    echo '<td>'.$row['avg_agg'].'</td>';
                    echo '<td>'.$row['avg_ana'].'</td>';
                    echo '<td>'.$row['avg_aut'].'</td>';
                    echo '<td>'.$row['avg_ber'].'</td>';
                    echo '<td>'.$row['avg_eks'].'</td>';
                    echo '<td>'.$row['avg_int'].'</td>';
                    echo '<td>'.$row['avg_itr'].'</td>';
                    echo '<td>'.$row['avg_kep'].'</td>';
                    echo '<td>'.$row['avg_ket'].'</td>';
                    echo '<td>'.$row['avg_kri'].'</td>';
                    echo '<td>'.$row['avg_mng'].'</td>';
                    echo '<td>'.$row['avg_mnl'].'</td>';
                    echo '<td>'.$row['avg_skg'].'</td>';
                    echo '<td>'.$row['avg_str'].'</td>';
                    echo '<td>'.$row['avg_pcp'].'</td>';
                    echo '<td>'.$row['avg_kjj'].'</td>';
                  }
                  echo '</tr>';
                }

                  while ($row = mysqli_fetch_assoc($purata_fakulti_FKP)) {
                    echo '<tr>';
                    if (!$row['fakulti']) {
                      echo '<td>FKP</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                      echo '<td>0</td>';
                    } else {
                      echo '<td>'.$row['fakulti'].'</td>';
                      echo '<td>'.$row['avg_agg'].'</td>';
                      echo '<td>'.$row['avg_ana'].'</td>';
                      echo '<td>'.$row['avg_aut'].'</td>';
                      echo '<td>'.$row['avg_ber'].'</td>';
                      echo '<td>'.$row['avg_eks'].'</td>';
                      echo '<td>'.$row['avg_int'].'</td>';
                      echo '<td>'.$row['avg_itr'].'</td>';
                      echo '<td>'.$row['avg_kep'].'</td>';
                      echo '<td>'.$row['avg_ket'].'</td>';
                      echo '<td>'.$row['avg_kri'].'</td>';
                      echo '<td>'.$row['avg_mng'].'</td>';
                      echo '<td>'.$row['avg_mnl'].'</td>';
                      echo '<td>'.$row['avg_skg'].'</td>';
                      echo '<td>'.$row['avg_str'].'</td>';
                      echo '<td>'.$row['avg_pcp'].'</td>';
                      echo '<td>'.$row['avg_kjj'].'</td>';
                    }
                    echo '</tr>';
                  }

                while ($row = mysqli_fetch_assoc($purata_fakulti_FTK)) {
                  echo '<tr>';
                  if (!$row['fakulti']) {
                    echo '<td>FTK</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                  } else {
                    echo '<td>'.$row['fakulti'].'</td>';
                    echo '<td>'.$row['avg_agg'].'</td>';
                    echo '<td>'.$row['avg_ana'].'</td>';
                    echo '<td>'.$row['avg_aut'].'</td>';
                    echo '<td>'.$row['avg_ber'].'</td>';
                    echo '<td>'.$row['avg_eks'].'</td>';
                    echo '<td>'.$row['avg_int'].'</td>';
                    echo '<td>'.$row['avg_itr'].'</td>';
                    echo '<td>'.$row['avg_kep'].'</td>';
                    echo '<td>'.$row['avg_ket'].'</td>';
                    echo '<td>'.$row['avg_kri'].'</td>';
                    echo '<td>'.$row['avg_mng'].'</td>';
                    echo '<td>'.$row['avg_mnl'].'</td>';
                    echo '<td>'.$row['avg_skg'].'</td>';
                    echo '<td>'.$row['avg_str'].'</td>';
                    echo '<td>'.$row['avg_pcp'].'</td>';
                    echo '<td>'.$row['avg_kjj'].'</td>';
                  }
                  echo '</tr>';
                }
                
                while ($row = mysqli_fetch_assoc($purata_fakulti_FPTT)) {
                  echo '<tr>';
                  if (!$row['fakulti']) {
                    echo '<td>FPTT</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                    echo '<td>0</td>';
                  } else {
                    echo '<td>'.$row['fakulti'].'</td>';
                    echo '<td>'.$row['avg_agg'].'</td>';
                    echo '<td>'.$row['avg_ana'].'</td>';
                    echo '<td>'.$row['avg_aut'].'</td>';
                    echo '<td>'.$row['avg_ber'].'</td>';
                    echo '<td>'.$row['avg_eks'].'</td>';
                    echo '<td>'.$row['avg_int'].'</td>';
                    echo '<td>'.$row['avg_itr'].'</td>';
                    echo '<td>'.$row['avg_kep'].'</td>';
                    echo '<td>'.$row['avg_ket'].'</td>';
                    echo '<td>'.$row['avg_kri'].'</td>';
                    echo '<td>'.$row['avg_mng'].'</td>';
                    echo '<td>'.$row['avg_mnl'].'</td>';
                    echo '<td>'.$row['avg_skg'].'</td>';
                    echo '<td>'.$row['avg_str'].'</td>';
                    echo '<td>'.$row['avg_pcp'].'</td>';
                    echo '<td>'.$row['avg_kjj'].'</td>';
                  }
                  echo '</tr>';
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
                      <b>BSD</b> : Bersandar
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
                      <b>INT</b> : Introvert
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
            <!-- /.box-footer-->
          </div>
          <!-- /.box-body -->
        </div>
      </div>

    <!-- /.content -->
  </div>
</section>
</div>
  <!-- /.content-wrapper -->
  <?php include("./includes/footer.php"); ?>
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
<script src="plugins/datatables/dataTables.bootstrap.min.js"></ script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();

  });

</script>
</body>
</html>
