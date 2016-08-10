<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){
  header('Location: ../index.php');
}

require_once "../model/query.php";

$purata_fakulti_FTMK = kiraTinggiFakulti('FTMK');
$rendah_fakulti_FTMK = kiraRendahFakulti('FTMK');
$sederhana_fakulti_FTMK = kiraSederhanaFakulti('FTMK');
$totalBilanganFTMK = totalBilangan('FTMK');
$row = mysqli_fetch_assoc($totalBilanganFTMK);
$bilFTMK = $row['bil'];

$purata_fakulti_FKE = kiraTinggiFakulti('FKE');
$rendah_fakulti_FKE = kiraRendahFakulti('FKE');
$sederhana_fakulti_FKE = kiraSederhanaFakulti('FKE');
$totalBilanganFKE = totalBilangan('FKE');
$row = mysqli_fetch_assoc($totalBilanganFKE);
$bilFKE = $row['bil'];

$purata_fakulti_FKEKK = kiraTinggiFakulti('FKEKK');
$rendah_fakulti_FKEKK = kiraRendahFakulti('FKEKK');
$sederhana_fakulti_FKEKK = kiraSederhanaFakulti('FKEKK');
$totalBilanganFKEKK = totalBilangan('FKEKK');
$row = mysqli_fetch_assoc($totalBilanganFKEKK);
$bilFKEKK = $row['bil'];

$purata_fakulti_FKM = kiraTinggiFakulti('FKM');
$rendah_fakulti_FKM = kiraRendahFakulti('FKM');
$sederhana_fakulti_FKM = kiraSederhanaFakulti('FKM');
$totalBilanganFKM = totalBilangan('FKM');
$row = mysqli_fetch_assoc($totalBilanganFKM);
$bilFKM = $row['bil'];

$purata_fakulti_FKP = kiraTinggiFakulti('FKP');
$rendah_fakulti_FKP = kiraRendahFakulti('FKP');
$sederhana_fakulti_FKP = kiraSederhanaFakulti('FKP');
$totalBilanganFKP = totalBilangan('FKP');
$row = mysqli_fetch_assoc($totalBilanganFKP);
$bilFKP = $row['bil'];

$purata_fakulti_FTK = kiraTinggiFakulti('FTK');
$rendah_fakulti_FTK = kiraRendahFakulti('FTK');
$sederhana_fakulti_FTK = kiraSederhanaFakulti('FTK');
$totalBilanganFTK = totalBilangan('FTK');
$row = mysqli_fetch_assoc($totalBilanganFTK);
$bilFTK = $row['bil'];

$purata_fakulti_FPTT = kiraTinggiFakulti('FPTT');
$rendah_fakulti_FPTT = kiraRendahFakulti('FPTT');
$sederhana_fakulti_FPTT = kiraSederhanaFakulti('FPTT');
$totalBilanganFPTT = totalBilangan('FPTT');
$row = mysqli_fetch_assoc($totalBilanganFPTT);
$bilFPTT = $row['bil'];
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
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Bilangan Skor Tinggi , Rendah & Sederhana</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
          <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Markah Rendah</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true">Markah Sederhana</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Markah Tinggi</a></li>
                <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="true">Data Lanjut</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
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
                      <th>Bil. Pelajar</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      echo "<tr>";
                        echo '<td><span class="label label-warning">FTMK</span></td>';
                      foreach ($rendah_fakulti_FTMK as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFTMK);
                      echo '<td>';
                      echo $bilFTMK;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                        echo '<td><span class="label label-warning bg-purple">FTK</span></td>';
                      foreach ($rendah_fakulti_FTK as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFTK);
                      echo '<td>';
                      echo $bilFTK;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-default bg-orange">FKE</span></td>';
                      foreach ($rendah_fakulti_FKE as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKE);
                      echo '<td>';
                      echo $bilFKE;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-success">FKM</span></td>';
                      foreach ($rendah_fakulti_FKM as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKM);
                      echo '<td>';
                      echo $bilFKM;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-info">FKEKK</span></td>';
                      foreach ($rendah_fakulti_FKEKK as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKEKK);
                      echo '<td>';
                      echo $bilFKEKK;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-danger">FKP</span></td>';
                      foreach ($rendah_fakulti_FKP as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKP);
                      echo '<td>';
                      echo $bilFKP;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-default bg-purple">FPTT</span></td>';
                      foreach ($rendah_fakulti_FPTT as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFPTT);
                      echo '<td>';
                      echo $bilFPTT;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      // echo "<tr>";
                      // echo '<td><span class="label label-default bg-purple">FPTT</span></td>';
                      // foreach ($purata_fakulti_FPTT as $result) {
                      //   echo '<td>' . $result . '</td>';
                      // }
                      // $row = mysqli_fetch_assoc($totalBilanganFPTT);
                      // echo '<td>';
                      //   echo $row['bil'];
                      // echo '</td>';
                      // echo "</tr>";

                      ?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="tab_2">
                  <table id="example2" class="table table-condensed table-striped">
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
                      <th>Bil. Pelajar</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      echo "<tr>";
                        echo '<td><span class="label label-warning">FTMK</span></td>';
                      foreach ($sederhana_fakulti_FTMK as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFTMK);
                      echo '<td>';
                      echo $bilFTMK;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                        echo '<td><span class="label label-warning bg-purple">FTK</span></td>';
                      foreach ($sederhana_fakulti_FTK as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFTK);
                      echo '<td>';
                      echo $bilFTK;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-default bg-orange">FKE</span></td>';
                      foreach ($sederhana_fakulti_FKE as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKE);
                      echo '<td>';
                      echo $bilFKE;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-success">FKM</span></td>';
                      foreach ($sederhana_fakulti_FKM as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKM);
                      echo '<td>';
                      echo $bilFKM;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-info">FKEKK</span></td>';
                      foreach ($sederhana_fakulti_FKEKK as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKEKK);
                      echo '<td>';
                      echo $bilFKEKK;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-danger">FKP</span></td>';
                      foreach ($sederhana_fakulti_FKP as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKP);
                      echo '<td>';
                      echo $bilFKP;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-default bg-purple">FPTT</span></td>';
                      foreach ($sederhana_fakulti_FPTT as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFPTT);
                      echo '<td>';
                      echo $bilFPTT;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      // echo "<tr>";
                      // echo '<td><span class="label label-default bg-purple">FPTT</span></td>';
                      // foreach ($purata_fakulti_FPTT as $result) {
                      //   echo '<td>' . $result . '</td>';
                      // }
                      // $row = mysqli_fetch_assoc($totalBilanganFPTT);
                      // echo '<td>';
                      //   echo $row['bil'];
                      // echo '</td>';
                      // echo "</tr>";

                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_4">

                  <div class="center">
                    <div class="row">
                    <div class="col-md-4">
                    <div class="callout callout-info">
                      <h4>Info!</h4>
                      <p>Klik pada butang dibawah untuk memaparkan maklumat lanjut.</p>
                    </div>
                    </div>
                    </div>
                  </div>

                <a href="data_lanjut.php?fakulti=FTMK" class="btn btn-app">
                  <span class="badge bg-yellow">F T M K</span>
                  <i class="fa fa-file-o"></i>
                </a>
                <a href="data_lanjut.php?fakulti=FKE" class="btn btn-app">
                  <span class="badge bg-orange">F K E</span>
                  <i class="fa fa-file-o"></i>
                </a>
                <a href="data_lanjut.php?fakulti=FKM" class="btn btn-app">
                  <span class="badge bg-green">F K M</span>
                  <i class="fa fa-file-o"></i>
                </a>
                <a href="data_lanjut.php?fakulti=FKP" class="btn btn-app">
                  <span class="badge bg-red">F K P</span>
                  <i class="fa fa-file-o"></i>
                </a>
                <a href="data_lanjut.php?fakulti=FKEKK" class="btn btn-app">
                  <span class="badge bg-teal">F K E K K</span>
                  <i class="fa fa-file-o"></i>
                </a>
                <a href="data_lanjut.php?fakulti=FTK" class="btn btn-app">
                  <span class="badge bg-purple">F T K</span>
                  <i class="fa fa-file-o"></i>
                </a>
                <a href="data_lanjut.php?fakulti=FPTT" class="btn btn-app">
                  <span class="badge bg-purple">F P T T</span>
                  <i class="fa fa-file-o"></i>
                </a>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                  <table id="example3" class="table table-condensed table-striped">
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
                      <th>Bil. Pelajar</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      echo "<tr>";
                        echo '<td><span class="label label-warning">FTMK</span></td>';
                      foreach ($purata_fakulti_FTMK as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFTMK);
                      echo '<td>';
                        // echo $row['bil'];
                        echo $bilFTMK;
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                        echo '<td><span class="label label-warning bg-purple">FTK</span></td>';
                      foreach ($purata_fakulti_FTK as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFTK);
                      echo '<td>';
                      echo $bilFTK;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-default bg-orange">FKE</span></td>';
                      foreach ($purata_fakulti_FKE as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKE);
                      echo '<td>';
                      echo $bilFKE;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-success">FKM</span></td>';
                      foreach ($purata_fakulti_FKM as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKM);
                      echo '<td>';
                      echo $bilFKM;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-info">FKEKK</span></td>';
                      foreach ($purata_fakulti_FKEKK as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKEKK);
                      echo '<td>';
                      echo $bilFKEKK;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-danger">FKP</span></td>';
                      foreach ($purata_fakulti_FKP as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFKP);
                      echo '<td>';
                      echo $bilFKP;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      echo "<tr>";
                      echo '<td><span class="label label-default bg-purple">FPTT</span></td>';
                      foreach ($purata_fakulti_FPTT as $result) {
                        echo '<td>' . $result . '</td>';
                      }
                      // $row = mysqli_fetch_assoc($totalBilanganFPTT);
                      echo '<td>';
                        echo $bilFPTT;
                        // echo $row['bil'];
                      echo '</td>';
                      echo "</tr>";

                      // echo "<tr>";
                      // echo '<td><span class="label label-default bg-purple">FPTT</span></td>';
                      // foreach ($purata_fakulti_FPTT as $result) {
                      //   echo '<td>' . $result . '</td>';
                      // }
                      // $row = mysqli_fetch_assoc($totalBilanganFPTT);
                      // echo '<td>';
                      //   echo $row['bil'];
                      // echo '</td>';
                      // echo "</tr>";

                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.tab-pane -->
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
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
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
    $("#example2").DataTable();
    $("#example3").DataTable();

  });

</script>
</body>
</html>
