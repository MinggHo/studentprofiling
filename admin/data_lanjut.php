<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){
  header('Location: ../index.php');
}

require_once "../model/query.php";

if (!isset($_GET['fakulti'])) {
  header('Location: ../index.php');
} else {

  $fakulti = $_GET['fakulti'];

  // bilangan pelajar tinggi
  $tinggi_fakulti = kiraTinggiFakulti($fakulti);

  // bilangan pelajar sederhana
  $sederhana_fakulti = kiraSederhanaFakulti($fakulti);

  // bilangan pelajar rendah
  $rendah_fakulti = kiraRendahFakulti($fakulti);

  // total bilangan
  $totalBilangan = totalBilangan($fakulti);

  $row = mysqli_fetch_assoc($totalBilangan);
  $bil = $row['bil'];

  if ($bil == 0) {
    $bil = 1;
  }


  $HIGH = array();
  $MID = array();
  $LOW = array();

  foreach ($tinggi_fakulti as $value) {
    array_push( $HIGH, (($value/$bil) * 100) );
  }

  foreach ($sederhana_fakulti as $value) {
    array_push( $MID, (($value/$bil) * 100) );
  }

  foreach ($rendah_fakulti as $value) {
    array_push( $LOW, (($value/$bil) * 100) );
  }


    $o_HIGH = array();
    $o_MID = array();
    $o_LOW = array();

    foreach ($tinggi_fakulti as $value) {
      array_push( $o_HIGH, $value );
    }

    foreach ($sederhana_fakulti as $value) {
      array_push( $o_MID, $value );
    }

    foreach ($rendah_fakulti as $value) {
      array_push( $o_LOW, $value );
    }


  // echo '<pre>' . var_export($HIGH, true) . '</pre>';

}
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
  <script src="https://oss.maxcdn.com/html5shiv.7.3/html5shiv.min.js"></script>
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
        Data Lanjut Fakulti <?php echo $_GET['fakulti'];?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./index.php"><i class="fa fa-dashboard"></i> Laman utama</a></li>
        <li>Panel kawalan</li>
        <li>Analisis Skor Pelajar</li>
        <li class="active">Data Lanjut Fakulti <?php echo $_GET['fakulti'];?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- Main row -->

    <div class="row">
      <div class="col-lg-7">
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Carta Markah Fakulti</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="chart">
            <canvas id="myChart" style="height:50px"></canvas>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <div class="col-md-5">
      <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="dropdown active">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Menu Tret <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_1">Agresif</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_2">Analitikal</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_3">Autonomi</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_4">Kreatif</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_5">Ekstrovert</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_6">Intelektual</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_7">Berwawasan</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_8">Kepelbagaian</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_9">Ketahanan</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_10">Kritik Diri</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_11">Mengawal</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_12">Menolong</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_13">Sokongan</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_14">Struktur</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_15">Pencapaian</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="tab" href="#tab_16">Kejujuran</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Fakulti <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="data_lanjut.php?fakulti=FTMK"><span class="badge bg-yellow">FTMK</span></a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="data_lanjut.php?fakulti=FKE"><span class="badge bg-orange">FKE</span></a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="data_lanjut.php?fakulti=FKEKK"><span class="badge bg-teal">FKEKK</span></a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="data_lanjut.php?fakulti=FKM"><span class="badge bg-green">FKM</span></a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="data_lanjut.php?fakulti=FKP"><span class="badge bg-red">FKP</span></a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="data_lanjut.php?fakulti=FTK"><span class="badge bg-purple">FTK</span></a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="data_lanjut.php?fakulti=FPTT"><span class="badge bg-purple">FPTT</span></a></li>
                </ul>
              </li>
            </ul>
            <div class="tab-content">
              <?php include("./includes/trait.php"); ?>
            </div>
            <!-- /.tab-content -->
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

    // BEGIN Chart
    var high = <?php echo json_encode($o_HIGH); ?>;
    var mid = <?php echo json_encode($o_MID); ?>;
    var low = <?php echo json_encode($o_LOW); ?>;

    var ctx = document.getElementById("myChart").getContext("2d");

    var data = {
      labels: ["Agresif", "Analitikal", "Autonomi", "Kreatif", "Ekstrovert", "Intelektual", "Wawasan", "Kepelbagaian", "Ketahanan", "Kritik Diri", "Mengawal", "Menolong", "Sokongan", "Struktur", "Pencapaian",
          "Kejujuran"
      ],
      datasets: [
          {
              label: "TINGGI",
              backgroundColor: "rgba(255, 255, 255, 0.1)",
              borderColor: "rgba(200, 0, 0, 1)",
              pointBackgroundColor: "rgba(200, 0, 0, 1)",
              // pointBorderColor: "#fff1ce",
              // pointHoverBackgroundColor: "#1fda9a",
              // pointHoverBorderColor: "rgba(255, 255, 255, 1)",
              data: high
          },
          {
              label: "SEDERHANA",
              backgroundColor: "rgba(255, 255, 255, 0.1)",
              borderColor: "rgba(255, 217, 17, 1)",
              pointBackgroundColor: "rgba(255, 217, 17, 1)",
              // pointBorderColor: "#696969",
              // pointHoverBackgroundColor: "#fff",
              // pointHoverBorderColor: "rgba(255,99,132,1)",
              data:  mid
          // }
          },
          {
              label: "RENDAH",
              backgroundColor: "rgba(255, 255, 255, 0.1)",
              borderColor: "rgba(0, 139, 39, 1)",
              pointBackgroundColor: "rgba(0, 139, 39, 1)",
              // pointBorderColor: "#696969",
              // pointHoverBackgroundColor: "#fff",
              // pointHoverBorderColor: "rgba(255,99,132,1)",
              data:  low
          }
      ]
  };


      var myChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: {
              scale: {
                  ticks: {
                    //Boolean - If we want to override with a hard coded scale
                    scaleOverride: true,
                    //** Required if scaleOverride is true **
                    //Number - The number of steps in a hard coded scale
                    scaleSteps: 2,
                    //Number - The value jump in the hard coded scale
                    scaleStepWidth: 2,
                    //Number - The centre starting value
                    scaleStartValue: 0
                  }
              }
            }
    });
    //END Chart

  });

</script>
</body>
</html>
