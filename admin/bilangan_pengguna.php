<?php
  session_start();

  require_once "../model/query.php";
  $bil_user = bilanganUser();
  $bil_skor = bilanganSkor();
  $skor_baru = skorBaru();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Profiling | Informasi Pengguna</title>
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
<!-- Site wrapper -->
<div class="wrapper">

  <?php include("./includes/header.php"); ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Informasi Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="./index.php"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
        <li>Panel Kawalan</li>
        <li class="active">Informasi Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><span class="label label-warning">FTMK</span></a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><span class="label label-info">FKEKK</span></a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><span class="label label-success">FKM</span></a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false"><span class="label label-danger">FKP</span></a></li>
              <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false"><span class="label label-default bg-orange">FKE</span></a></li>
              <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false"><span class="label label-default bg-purple">FPTT</span></a></li>
              <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="false"><span class="label label-default bg-purple">FTK</span></a></li>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                      <table id="example1" class="table table-condensed table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Kad Matrik</th>
                          <th>Nama</th>
                          <th>Fakulti</th>
                          <th>Kursus</th>
                          <th>Tahun</th>
                          <th>Kekerapan</th>
                          <th>Status Invetori</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                          $bil_skor_latest_fakulti = bilanganSkorLatestFakulti('FTMK');
                          $i = 1;

                          while ($row = mysqli_fetch_assoc($bil_skor_latest_fakulti)) {
                            echo '<tr>';
                              echo '<td><b><a href="profil_pelajar.php?id='.$row['kad_matrik'].'" target="_blank">'.$row['kad_matrik'].'</a></b></td>';
                              echo '<td>'.$row['nama_pelajar'].'</td>';
                              echo '<td>'.$row['fakulti_pelajar'].'</td>';
                              echo '<td>'.$row['kursus_pelajar'].'</td>';
                              echo '<td>'.$row['tahun_pelajar'].'</td>';

                              $student_rekod = studentRekod($row['kad_matrik']);

                              if(mysqli_num_rows($student_rekod)) {
                                while ($maklumat = mysqli_fetch_assoc($student_rekod)) {
                                  if ($maklumat['bilangan'] > 0) {
                                    echo '<td>' . $maklumat['bilangan'] . '</td>';
                                    echo '<td><i class="fa fa-fw fa-thumbs-o-up" style="color:green"></i></td>';
                                  }
                                }
                              } else {
                                echo '<td>0</td>';
                                echo '<td><i class="fa fa-fw fa-thumbs-o-down" style="color:red"></i></td>';
                              }

                            echo '</tr>';
                            $i++;
                          }
                          ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Kad Matrik</th>
                          <th>Nama</th>
                          <th>Fakulti</th>
                          <th>Kursus</th>
                          <th>Tahun</th>
                          <th>Kekerapan</th>
                          <th>Status Invetori</th>
                        </tr>
                        </tfoot>
                      </table>
              <!-- /.content -->
            </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <table id="example2" class="table table-condensed table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bil_skor_latest_fakulti = bilanganSkorLatestFakulti('FKEKK');
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($bil_skor_latest_fakulti)) {
                      echo '<tr>';
                        echo '<td><b><a href="profil_pelajar.php?id='.$row['kad_matrik'].'" target="_blank">'.$row['kad_matrik'].'</a></b></td>';
                        echo '<td>'.$row['nama_pelajar'].'</td>';
                        echo '<td>'.$row['fakulti_pelajar'].'</td>';
                        echo '<td>'.$row['kursus_pelajar'].'</td>';
                        echo '<td>'.$row['tahun_pelajar'].'</td>';

                        $student_rekod = studentRekod($row['kad_matrik']);

                        if(mysqli_num_rows($student_rekod)) {
                          while ($maklumat = mysqli_fetch_assoc($student_rekod)) {
                            if ($maklumat['bilangan'] > 0) {
                              echo '<td>' . $maklumat['bilangan'] . '</td>';
                              echo '<td><i class="fa fa-fw fa-thumbs-o-up" style="color:green"></i></td>';
                            }
                          }
                        } else {
                          echo '<td>0</td>';
                          echo '<td><i class="fa fa-fw fa-thumbs-o-down" style="color:red"></i></td>';
                        }

                      echo '</tr>';
                      $i++;
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Inventori</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <table id="example3" class="table table-condensed table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bil_skor_latest_fakulti = bilanganSkorLatestFakulti('FKM');
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($bil_skor_latest_fakulti)) {
                      echo '<tr>';
                        echo '<td><b><a href="profil_pelajar.php?id='.$row['kad_matrik'].'" target="_blank">'.$row['kad_matrik'].'</a></b></td>';
                        echo '<td>'.$row['nama_pelajar'].'</td>';
                        echo '<td>'.$row['fakulti_pelajar'].'</td>';
                        echo '<td>'.$row['kursus_pelajar'].'</td>';
                        echo '<td>'.$row['tahun_pelajar'].'</td>';

                        $student_rekod = studentRekod($row['kad_matrik']);

                        if(mysqli_num_rows($student_rekod)) {
                          while ($maklumat = mysqli_fetch_assoc($student_rekod)) {
                            if ($maklumat['bilangan'] > 0) {
                              echo '<td>' . $maklumat['bilangan'] . '</td>';
                              echo '<td><i class="fa fa-fw fa-thumbs-o-up" style="color:green"></i></td>';
                            }
                          }
                        } else {
                          echo '<td>0</td>';
                          echo '<td><i class="fa fa-fw fa-thumbs-o-down" style="color:red"></i></td>';
                        }

                      echo '</tr>';
                      $i++;
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                <table id="example4" class="table table-condensed table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bil_skor_latest_fakulti = bilanganSkorLatestFakulti('FKP');
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($bil_skor_latest_fakulti)) {
                      echo '<tr>';
                        echo '<td><b><a href="profil_pelajar.php?id='.$row['kad_matrik'].'" target="_blank">'.$row['kad_matrik'].'</a></b></td>';
                        echo '<td>'.$row['nama_pelajar'].'</td>';
                        echo '<td>'.$row['fakulti_pelajar'].'</td>';
                        echo '<td>'.$row['kursus_pelajar'].'</td>';
                        echo '<td>'.$row['tahun_pelajar'].'</td>';

                        $student_rekod = studentRekod($row['kad_matrik']);

                        if(mysqli_num_rows($student_rekod)) {
                          while ($maklumat = mysqli_fetch_assoc($student_rekod)) {
                            if ($maklumat['bilangan'] > 0) {
                              echo '<td>' . $maklumat['bilangan'] . '</td>';
                              echo '<td><i class="fa fa-fw fa-thumbs-o-up" style="color:green"></i></td>';
                            }
                          }
                        } else {
                          echo '<td>0</td>';
                          echo '<td><i class="fa fa-fw fa-thumbs-o-down" style="color:red"></i></td>';
                        }

                      echo '</tr>';
                      $i++;
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_5">
                <table id="example5" class="table table-condensed table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bil_skor_latest_fakulti = bilanganSkorLatestFakulti('FKE');
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($bil_skor_latest_fakulti)) {
                      echo '<tr>';
                        echo '<td><b><a href="profil_pelajar.php?id='.$row['kad_matrik'].'" target="_blank">'.$row['kad_matrik'].'</a></b></td>';
                        echo '<td>'.$row['nama_pelajar'].'</td>';
                        echo '<td>'.$row['fakulti_pelajar'].'</td>';
                        echo '<td>'.$row['kursus_pelajar'].'</td>';
                        echo '<td>'.$row['tahun_pelajar'].'</td>';

                        $student_rekod = studentRekod($row['kad_matrik']);

                          if(mysqli_num_rows($student_rekod)) {
                            while ($maklumat = mysqli_fetch_assoc($student_rekod)) {
                              if ($maklumat['bilangan'] > 0) {
                                echo '<td>' . $maklumat['bilangan'] . '</td>';
                                echo '<td><i class="fa fa-fw fa-thumbs-o-up" style="color:green"></i></td>';
                              }
                            }
                          } else {
                            echo '<td>0</td>';
                            echo '<td><i class="fa fa-fw fa-thumbs-o-down" style="color:red"></i></td>';
                          }

                      echo '</tr>';
                      $i++;
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <div class="tab-pane" id="tab_6">
                <table id="example6" class="table table-condensed table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bil_skor_latest_fakulti = bilanganSkorLatestFakulti('FTTP');
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($bil_skor_latest_fakulti)) {
                      echo '<tr>';
                        echo '<td><b><a href="profil_pelajar.php?id='.$row['kad_matrik'].'" target="_blank">'.$row['kad_matrik'].'</a></b></td>';
                        echo '<td>'.$row['nama_pelajar'].'</td>';
                        echo '<td>'.$row['fakulti_pelajar'].'</td>';
                        echo '<td>'.$row['kursus_pelajar'].'</td>';
                        echo '<td>'.$row['tahun_pelajar'].'</td>';

                        $student_rekod = studentRekod($row['kad_matrik']);

                        if(mysqli_num_rows($student_rekod)) {
                          while ($maklumat = mysqli_fetch_assoc($student_rekod)) {
                            if ($maklumat['bilangan'] > 0) {
                              echo '<td>' . $maklumat['bilangan'] . '</td>';
                              echo '<td><i class="fa fa-fw fa-thumbs-o-up" style="color:green"></i></td>';
                            }
                          }
                        } else {
                          echo '<td>0</td>';
                          echo '<td><i class="fa fa-fw fa-thumbs-o-down" style="color:red"></i></td>';
                        }

                      echo '</tr>';
                      $i++;
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <div class="tab-pane" id="tab_7">
                <table id="example7" class="table table-condensed table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bil_skor_latest_fakulti = bilanganSkorLatestFakulti('FTK');
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($bil_skor_latest_fakulti)) {
                      echo '<tr>';
                        echo '<td><b><a href="profil_pelajar.php?id='.$row['kad_matrik'].'" target="_blank">'.$row['kad_matrik'].'</a></b></td>';
                        echo '<td>'.$row['nama_pelajar'].'</td>';
                        echo '<td>'.$row['fakulti_pelajar'].'</td>';
                        echo '<td>'.$row['kursus_pelajar'].'</td>';
                        echo '<td>'.$row['tahun_pelajar'].'</td>';

                        $student_rekod = studentRekod($row['kad_matrik']);

                        if(mysqli_num_rows($student_rekod)) {
                          while ($maklumat = mysqli_fetch_assoc($student_rekod)) {
                            if ($maklumat['bilangan'] > 0) {
                              echo '<td>' . $maklumat['bilangan'] . '</td>';
                              echo '<td><i class="fa fa-fw fa-thumbs-o-up" style="color:green"></i></td>';
                            }
                          }
                        } else {
                          echo '<td>0</td>';
                          echo '<td><i class="fa fa-fw fa-thumbs-o-down" style="color:red"></i></td>';
                        }

                      echo '</tr>';
                      $i++;
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kad Matrik</th>
                    <th>Nama</th>
                    <th>Fakulti</th>
                    <th>Kursus</th>
                    <th>Tahun</th>
                    <th>Kekerapan</th>
                    <th>Status Invetori</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <div class="callout callout-info">
                <h4>Informasi Laman</h4>

                <p>Berikut menyenaraikan semua pengguna yang telah didaftarkan untuk menggunakan sistem ini.</br> Tab khas telah disediakan untuk melihat perincian pengguna berdasarkan fakulti.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Lagenda</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <p>
                <i class="fa fa-fw fa-thumbs-o-down" style="color:red"></i>
                : Pelajar belum mengambil inventori
              </p>
              <p>
                <i class="fa fa-fw fa-thumbs-o-up" style="color:green"></i>
                : Pelajar sudah mempunyai rekod inventori
              </p>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

      <!-- Widget -->
    </section>
    <!-- /.content -->
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
window.onload = function() {
  $("#example1").DataTable();
  $("#example2").DataTable();
  $("#example3").DataTable();
  $("#example4").DataTable();
  $("#example5").DataTable();
  $("#example6").DataTable();
  $("#example7").DataTable();
};
</script>
</body>
</html>
