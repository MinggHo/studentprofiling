<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){
  header('Location: ../index.php');
}

require_once "../model/query.php";

$profil_pelajar = profilPelajar($_GET['id']);
$skor_pelajar = skorPelajar($_GET['id']);
$sejarah_skor = sejarahSkor($_GET['id']);


if ($skor_pelajar) {
  while ($row = mysqli_fetch_assoc($skor_pelajar)) {
    $array = array(
      $row['markah_agg'] ,
      $row['markah_ana'] ,
      $row['markah_aut'] ,
      $row['markah_ktf'] ,
      $row['markah_eks'] ,
      $row['markah_int'] ,
      $row['markah_wsn'] ,
      $row['markah_kep'] ,
      $row['markah_ket'] ,
      $row['markah_kri'] ,
      $row['markah_mng'] ,
      $row['markah_mnl'] ,
      $row['markah_skg'] ,
      $row['markah_str'] ,
      $row['markah_pcp'] ,
      $row['markah_kjj']
    );
    unset($value);
    $fakulti = $row['fakulti_pelajar'];
    $purata_skor_pelajar = purataFakulti($fakulti);

        while ($row = mysqli_fetch_assoc($purata_skor_pelajar)) {
          $arrayAvg = array(
            $row['avg_agg'] ,
            $row['avg_ana'] ,
            $row['avg_aut'] ,
            $row['avg_ktf'] ,
            $row['avg_eks'] ,
            $row['avg_int'] ,
            $row['avg_wsn'] ,
            $row['avg_kep'] ,
            $row['avg_ket'] ,
            $row['avg_kri'] ,
            $row['avg_mng'] ,
            $row['avg_mnl'] ,
            $row['avg_skg'] ,
            $row['avg_str'] ,
            $row['avg_pcp'] ,
            $row['avg_kjj']
            );
        }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Profiling | Profil Pelajar</title>
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

<?php
  include("./includes/header.php");
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Pelajar
      </h1>
      <ol class="breadcrumb">
        <li><a href="./index.php"><i class="fa fa-dashboard"></i> Laman utama</a></li>
        <li>Panel kawalan</li>
        <li class="active">Profil Pelajar</li>
      </ol>
    </section>

    <!-- Main content -->
    <?php
    while ($row = mysqli_fetch_assoc($profil_pelajar)) {
     ?>
    <section class="content">
      <div class="row">
        <div class="col-lg-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="./dist/img/avatar5.png" alt="User profile picture">
              <h3 class="profile-username text-center"><?php echo $row['nama_pelajar'];?></h3>
              <p class="text-muted text-center"><?php echo $row['kad_matrik'];?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Fakulti</b> <a class="pull-right"><?php echo $row['fakulti_pelajar'];?></a>
                </li>
                <li class="list-group-item">
                  <b>Kursus</b> <a class="pull-right"><?php echo $row['kursus_pelajar'];?></a>
                </li>
                <li class="list-group-item">
                  <b>Tahun</b> <a class="pull-right"><?php echo $row['tahun_pelajar'];}?></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Markah</h3>
            </div>
            <div class="box-body">
              <p>
                <?php if ($skor_pelajar) { ?>
                <span class="label label-success">Agresif : <?php echo $array[0]; ?></span><span class="label label-success pull-right"> Analitikal : <?php echo $array[1]; ?></span> </br>
                <span class="label label-success">Autonomi : <?php echo $array[2]; ?></span><span class="label label-success pull-right"> Kreatif : <?php echo $array[3]; ?></span> </br>
                <span class="label label-success">Ekstrovert : <?php echo $array[4]; ?></span><span class="label label-success pull-right"> Intelektual : <?php echo $array[5]; ?></span> </br>
                <span class="label label-success">Wawasan : <?php echo $array[6]; ?></span><span class="label label-success pull-right"> Kepelbagaian : <?php echo $array[7]; ?></span> </br>
                <span class="label label-success">Ketahanan : <?php echo $array[8]; ?></span><span class="label label-success pull-right"> Kritik Diri : <?php echo $array[9]; ?></span> </br>
                <span class="label label-success">Mengawal : <?php echo $array[10]; ?></span><span class="label label-success pull-right"> Menolong : <?php echo $array[11]; ?></span> </br>
                <span class="label label-success">Sokongan : <?php echo $array[12]; ?></span><span class="label label-success pull-right"> Struktur : <?php echo $array[13]; ?></span> </br>
                <span class="label label-success">Pencapaian : <?php echo $array[14]; ?></span><span class="label label-success pull-right"> Kejujuran : <?php echo $array[15]; ?></span> </br>
                <?php } ?>
               </p>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
              <?php if(isset($_SESSION['error_msg'])){?>
              <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-info"></i> Ralat!</h4>
              <?= $_SESSION['error_msg']; ?>
            </div>
              <?php unset($_SESSION['error_msg']); ?>
              <?php } ?>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Skor Markah</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button> -->
            </div>
          </div>
          <div class="box-body">
              <div class="chart">
                <canvas id="myChart" style="height:50px"></canvas>
              </div>
          <!-- /.box-body -->
        </div>
        </div>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Sejarah Skor</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button> -->
            </div>
          </div>
          <div class="box-body">
            <table id="example1" class="table table-condensed table-bordered table-striped">
              <thead>
              <tr>
                <th>Tarikh</th>
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
                if ($skor_pelajar) {
                $i = 1;

                while ($row = mysqli_fetch_assoc($sejarah_skor)) {
                  echo '<tr>';
                    echo '<td>'.$row['waktu_buat'].'</td>';
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
              } else {
                echo '<h5> Tiada rekod </h5>';
              }
                ?>
              </tbody>
            </table>
          <div class="box-footer">
            <!-- Footer -->
          </div>
          <!-- /.box-body -->
        </div>
        </div>

      </div>
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    var dataPelajar = <?php echo json_encode($array); ?>;
    var dataPurataFakulti = <?php echo json_encode($arrayAvg); ?>;
    var ctx = document.getElementById("myChart").getContext("2d");

    var data = {
      labels: ["Agresif", "Analitikal", "Autonomi", "Kreatif", "Ekstrovert", "Intelektual", "Wawasan", "Kepelbagaian", "Ketahanan", "Kritik Diri", "Mengawal", "Menolong", "Sokongan", "Struktur", "Pencapaian",
          "Kejujuran"
      ],
      datasets: [
          {
              label: "Skor pelajar",
              backgroundColor: "rgba(0, 42, 74, 0.25)",
              borderColor: "rgba(23, 96, 125, 0.75)",
              pointBackgroundColor: "#14E32C",
              pointBorderColor: "#fff1ce",
              pointHoverBackgroundColor: "#1fda9a",
              pointHoverBorderColor: "rgba(255, 255, 255, 1)",
              data: dataPelajar
          },
          {
              label: "Purata Fakulti",
              backgroundColor: "rgba(214, 71, 0, 0.55)",
              borderColor: "rgba(255, 147, 17, 0.75)",
              pointBackgroundColor: "rgb(231, 31, 85)",
              pointBorderColor: "#696969",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(255,99,132,1)",
              data:  dataPurataFakulti
          }
          // },
          // {
          //     label: "Purata Universiti",
          //     backgroundColor: "rgba(214, 71, 0, 0.55)",
          //     borderColor: "rgba(255, 147, 17, 0.75)",
          //     pointBackgroundColor: "rgb(231, 31, 85)",
          //     pointBorderColor: "#696969",
          //     pointHoverBackgroundColor: "#fff",
          //     pointHoverBorderColor: "rgba(255,99,132,1)",
          //     data:  dataPurataFakulti
          // }
      ]
  };


      var myRadarChart = new Chart(ctx, {
      type: 'radar',
      data: data,
      options: {
              scale: {
                  ticks: {
                    max: 100,
                    //Boolean - If we want to override with a hard coded scale
                    scaleOverride: true,
                    //** Required if scaleOverride is true **
                    //Number - The number of steps in a hard coded scale
                    scaleSteps: 10,
                    //Number - The value jump in the hard coded scale
                    scaleStepWidth: 10,
                    //Number - The centre starting value
                    scaleStartValue: 0
                  }
              }
            }
    });
  // end
  });

</script>
</body>
</html>
