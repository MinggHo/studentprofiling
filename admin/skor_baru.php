<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){
  header('Location: ../index.php');
}

require_once "../model/query.php";

$skor_baru_table = skorBaruTable();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Profiling | Skor Baru</title>
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
        Skor Baru
      </h1>
      <ol class="breadcrumb">
        <li><a href="./index.php"><i class="fa fa-dashboard"></i>Laman utama</a></li>
        <li>Panel kawalan</li>
        <li class="active">Maklumat Skor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Senarai skor</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body" style="display: block;">
              <table id="example1" class="table table-condensed table-striped">
                <thead>
                <tr>
                  <th>Kad Matrik</th>
                  <th>Nama</th>
                  <th>Tarikh</th>
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
                  <th>KJJ</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;

                  while ($row = mysqli_fetch_assoc($skor_baru_table)) {
                    echo '<tr>';
                      echo '<td><a href="profil_pelajar.php?id='.$row['kad_matrik'].'" target="_blank">'. $row['kad_matrik'] .'</a></td>';
                      echo '<td>'.$row['nama_pelajar'].'</td>';

                      $Weddingdate = new DateTime($row['waktu_buat']);

                      echo '<td>'.$Weddingdate->format('d.m.Y').'</td>';
                      echo '<td>'.$row['markah_agg'].'</td>';
                      echo '<td>'.$row['markah_ana'].'</td>';
                      echo '<td>'.$row['markah_aut'].'</td>';
                      echo '<td>'.$row['markah_ber'].'</td>';
                      echo '<td>'.$row['markah_eks'].'</td>';
                      echo '<td>'.$row['markah_int'].'</td>';
                      echo '<td>'.$row['markah_itr'].'</td>';
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

            </div>
            <!-- /.box-body -->

            <div class="box-footer" style="display: block;">
              <div class="col-lg-4 pull-right">
              <div class="callout callout-info">
                <h4>Penerangan</h4>

                <p>Maklumat di atas memaparkan skor markah bertempoh 1 minggu yang telah di hantar oleh pengguna.</p>
              </div>
            </div>
          </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->

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
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<script>
    $("#example1").DataTable();
</script>

</body>
</html>
