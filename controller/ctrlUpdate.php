<?php
session_start();
require '../model/query.php';

//kump. maklumat
$data = $_POST;
$emel = $data['staff_email'];
$password = $data['staff_password'];
$id = $data['staff_id'];


  if(updateMaklumat($emel, $password, $id) == TRUE){
    $_SESSION['success_msg'] = "Profil berjaya dikemaskini.";
    header('Location: ../admin/profil_pengguna.php');
  }
  else {
    $_SESSION['error_msg'] = "Data tidak berjaya dikemaskini.";
    header('Location: ../admin/profil_pengguna.php');
  }

?>
