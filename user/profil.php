<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){
  header('Location: ../index.php');
} else {
  if ($_SESSION['status'] == "ADMIN") {
    header('Location: ../admin/index.php');
  }
  require_once "../model/query.php";
  $maklumat_pengguna = maklumatPengguna($_SESSION['kad_matrik']);
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
            <li><a href="index.php"><i class="material-icons" title="Home">home</i></a></li>
            <li><a href="profil.php"><i class="material-icons" title="Profile">person_pin</i></a></li>
            <li><a href="../controller/ctrlAuthentication.php?a=logout"><i class="material-icons" title="Logout">lock</i></a></li>
        </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
          <h1 class="header center red-text text-darken-1" id="tajukUtama">Profil Pengguna</h1>
          <div class="card-panel white">
            <form action="" method="post">
            <div class="row">
              <?php while($row = mysqli_fetch_assoc($maklumat_pengguna)) {

              ?>
              <div class="input-field col s6">
                <input id="nama_pelajar" type="text" value="<?php echo $row['nama_pelajar'];?>" readonly>
                <label for="nama_pelajar">Nama Pelajar</label>
              </div>
              <div class="input-field col s2">
                <input id="fakulti_pelajar" type="text" value="<?php echo $row['fakulti_pelajar'];?>" readonly>
                <label for="fakulti_pelajar">Fakulti</label>
              </div>
              <div class="input-field col s2">
                <input id="kursus_pelajar" type="text" value="<?php echo $row['kursus_pelajar'];?>" readonly>
                <label for="kursus_pelajar">Kursus</label>
              </div>
              <div class="input-field col s2">
                <input id="tahun_pelajar" type="number" value="<?php echo $row['tahun_pelajar']?>" readonly>
                <label for="tahun_pelajar">Tahun</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s3">
                <input id="kad_matrik" type="text" value="<?php echo $row['kad_matrik'];?>" readonly>
                <label for="kad_matrik">Kad Matrik</label>
              </div>
              <div class="input-field col s3">
                <input id="pass_pelajar" type="password" min-length="5" value="<?php echo $row['katalaluan'];?>">
                <label for="pass_pelajar">Password</label>
              </div>
              <div class="input-field col s6">
                <input type="checkbox" class="filled-in" id="password-box"/>
                <label for="password-box">Password Check</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s3">
                <input id="notel" type="text" value="<?php echo $row['notel'];?>">
                <label for="notel">No. Telefon</label>
              </div>
              <div class="input-field col s3">
                <input id="emel" type="email" value="<?php echo $row['emel'];?>">
                <label for="emel">Emel</label>
              </div>
              <div class="input-field col s3">
                <input id="bangsa" type="text" value="<?php echo $row['bangsa'];?>">
                <label for="bangsa">Bangsa</label>
              </div>
              <div class="input-field col s3">
                <input id="agama" type="text" value="<?php echo $row['agama'];?>">
                <label for="agama">Agama</label>
              </div>
            </div>
            <?php } ?>
            <div class="row">
              <div class="right">
                <button class="btn waves-effect waves-light" id="update" type="button">Submit
                 <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>


    <div class="container">
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
    <script>
    "use strict";


    $("#password-box").change(function() {
      var $input = $(this);
      var checked = $input.prop("checked");

      checked ? showPass(true) : showPass(false);

    });

    function showPass(x) {
      x ? $("#pass_pelajar").get(0).type = "text" : $("#pass_pelajar").get(0).type = "password"
    }

    $("#update").click(function (event) {
      var password = $("#pass_pelajar").val();

      if (password.length <= 5) {
        swal({
          title: "Error !",
          text: "Password must be more that 5 character",
          type: "warning"
        })
      } else {

      swal({
        title: "Performing Update",
        text: "Click submit to update",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
      },
        function(){
            // AJAX HERE

            // get data

            var notel = $("#notel").val();
            var emel = $("#emel").val();
            var bangsa = $("#bangsa").val();
            var agama = $("#agama").val();
            var kad_matrik = $("#kad_matrik").val();


            $.ajax({
                type: "POST",
                data: {
                    password: password,
                    notel: notel,
                    emel: emel,
                    bangsa: bangsa,
                    agama: agama,
                    kad_matrik: kad_matrik,
                },
                url: "../model/updateProfile.php",
                dataType: "json",
                success: function(data) {
                  // console.log('now');
                  // console.log(data);
                }
            });

            // END AJAX
            setTimeout(function(){
            swal({
              title: "Data successfully update!",
              showConfirmButton: false,
              });
            setTimeout(function(){
            location.reload();
          }, 2000);
          }, 2000); });

        }
    });

    </script>
</body>
</html>
