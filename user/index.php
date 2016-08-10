<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){
  header('Location: ../index.php');
} else {
  if ($_SESSION['status'] == "ADMIN") {
    header('Location: ../admin/index.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Student Profiling</title>

    <!-- CSS  -->
    <link href="css/style.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="bower_components/Materialize/dist/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection,print" />
    <link href="bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet"/>
    <link rel="icon" href="../admin/dist/img/logoutem.jpg">

</head>

<body>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="#" class="brand-logo center">Student Profiling</a>
          <ul class="right">
            <li><a href="#"><i class="material-icons" title="Home">home</i></a></li>
            <li><a href="profil.php"><i class="material-icons" title="Profile">person_pin</i></a></li>
            <li><a href="../controller/ctrlAuthentication.php?a=logout"><i class="material-icons" title="Logout">lock</i></a></li>
        </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br>
            <br>
            <h1 class="header center red-text text-darken-1" id="tajukUtama">Inventori Personaliti Sidek</h1>
            <h1 class="header center red-text text-darken-1" id="keputusan" style="display: none;">Keputusan</h1>
            <div class="row">
              <form action="#" method="post" name="data">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="namaPelajar" type="text" class="" value="<?php echo $_SESSION["nama_pelajar"]; ?>" readonly>
                    <label for="namaPelajar">Nama</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">payment</i>
                    <input id="noKadMatrik" type="text" class="" maxlength="10" value="<?php echo $_SESSION["kad_matrik"]; ?>" readonly>
                    <label for="noKadMatrik">No. Matrik</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">wc</i>
                    <select id="jantinaPelajar" required>
                      <option class="grey-text" value="" disabled selected>Pilih jantina anda</option>
                      <option value="lelaki">Lelaki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                    <label for="jantinaPelajar">Jantina</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">cake</i>
                    <input id="umurPelajar" type="number" class="" min="18">
                    <label for="umurPelajar">Umur</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_balance</i>
                    <input id="fakultiPelajar" type="text" class="" value="<?php echo $_SESSION["fakulti_pelajar"]; ?>" readonly>
                    <!-- <select id="fakultiPelajar" onchange="insert()" required>
                      <option class="grey-text" value="
                      <?php //echo $_SESSION["fakulti_pelajar"]; ?>
                      " selected><?php //echo $_SESSION["fakulti_pelajar"]; ?></option>
                      <option value="ftmk">FTMK</option>
                      <option value="fkp">FKP</option>
                      <option value="fkekk">FKEKK</option>
                      <option value="fke">FKE</option>
                      <option value="fkm">FKM</option>
                      <option value="ftk">FTK</option>
                      <option value="fptt">FPTT</option>
                    </select> -->
                    <label for="fakultiPelajar">Fakulti</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">book</i>
                    <input id="kursusPelajar" type="text" class="" value="<?php echo $_SESSION["kursus_pelajar"]; ?>" readonly>
                    <!-- <select id="kursusPelajar">

                    </select> -->
                    <label for="kursusPelajar">Kursus</label>
                </div>
            </div>
            <div id="hilang" class="row center">
                <button id="start" class="btn-large waves-effect waves-light red darken-1">Mula</button>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="section" id="mySection">
            <div class="row">
                <div id="srollHere" class="col s12">
                    <!-- Table Section -->
                    <form class="" action="index.html" method="post">

                    </form>

                    <div class="card-panel light-blue lighten-1 white-text" id="hide">
                        <h5>Arahan</h5>
                        <p>
                            1 - Inventori ini mengandungi 160 pernyataan.
                            <br> 2 - Jika pernyataan itu menerangkan diri anda, klik pada butang jawapan yang disediakan.
                            <br> 3- Jika anda menghadapi kesukaran untuk menentukan sama ada sesuatu pernyataan itu menerangkan diri anda ataupun tidak, pilih jawapan yang anda rasa paling selesa.
                            <strong>Jawab semua soalan</strong>
                        </p>
                    </div>

                    <div class="card-panel white" id="hide1">
                        <p>
                            Masa : <span id="timeMinute"></span> : <span id="timeSecond"></span>
                        </p>
                        <label id="progress" class="right">Progress : 0 %</label>
                        <br>
                        <div class="progress">
                            <div id="progressBar" class="determinate" style="width: 0%"></div>
                        </div>
                    </div>

                    <table id="tableSoalan" class="striped">
                        <thead>
                            <tr>
                                <th>Bil.</th>
                                <th>Item</th>
                                <th>Jawapan</th>
                            </tr>
                        </thead>
                        <?php include('./includes/soalan.php'); ?>
                    </table>
                    <!-- @End Table -->

                    <div class="divider"></div>

                    <div class="section">

                        <button id="back" style="display: none;" class="btn waves-effect waves-light red darken-1" type="button" name="back">Back
                            <i class="material-icons left">chevron_left</i>
                        </button>

                        <div class="right">
                            <button id="next" style="display: none;" class="btn waves-effect waves-light red darken-1" type="button" name="next">Next
                                <i class="material-icons right">chevron_right</i>
                            </button>

                            <!-- <button id="submit" class="btn waves-effect waves-light light-green accent-3" type="submit" name="submit">Submit -->
                            <button style="display: none;" id="submit" class="btn waves-effect waves-light light-green accent-3" type="submit" name="submit">Submit
                                <i class="material-icons right">send</i>
                            </button>
                          </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- <div class="container" id="myCanvas"> -->
        <div class="container" id="myCanvas" style="display: none;">
            <div class="col s8" id="myCanvas">
                <div class="card-panel blue lighten-5">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <div id="skorMarkah">
                <h6 class="center">Markah</h6>
                <div class="row">
                  <div class="col s6">
                    <p id="cardMarkah">
                      Markah anda :
                    </p>
                  </div>
                  <div class="col s6">
                    <p id="cardMarkah2">
                      Markah anda :
                    </p>
                  </div>
                </div>
              </div>

              <?php include("./includes/detail.php"); ?>
        </div>
    </div>
    <!-- <br>
    <br>
    <br>
    <br>
    <br>
    <br> -->

    <footer class="page-footer blue-grey darken-4">
        <div class="container">
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by <a class="blue-text text-lighten-1" href="#">The Doyan Tunggei</a>
            </div>
        </div>
    </footer>

    <!--  Scripts-->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/main.js"></script>
    <script src="bower_components/Materialize/dist/js/materialize.js"></script>
    <script src="bower_components/Chart.js/dist/Chart.js"></script>
    <script src="bower_components/Chart.js/dist/Chart.bundle.js"></script>
</body>

</html>
