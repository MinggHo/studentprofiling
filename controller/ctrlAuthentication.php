<?php
session_start();
require '../model/query.php';

switch ($_GET['a']) {
  case 'login':
  $kad_matrik = $_POST['kad_matrik'];
  $katalaluan = $_POST['katalaluan'];
  login($kad_matrik, $katalaluan);
  break;

  case 'logout':
  logout();
  break;

  default:
  // code
  break;
}

function login($kad_matrik, $katalaluan) {
  $userInfo = q_datalogin($kad_matrik, $katalaluan);
  if($userInfo != FALSE) {
    while($row = $userInfo->fetch_assoc())
    {
      $_SESSION['login'] = TRUE;
      $_SESSION['time'] = time();
      $_SESSION['kad_matrik'] = $row['kad_matrik'];
      $_SESSION['status'] = $row['status'];
      $_SESSION['nama_pelajar'] = $row['nama_pelajar'];
      $_SESSION['fakulti_pelajar'] = $row['fakulti_pelajar'];
      $_SESSION['kursus_pelajar'] = $row['kursus_pelajar'];
      $_SESSION['tahun_pelajar'] = $row['tahun_pelajar'];
      // $_SESSION['katalaluan'] = $row['katalaluan'];
    }

      switch ($_SESSION['status']) {
        case 'ADMIN':
          header('Location: ../admin/index.php');
          break;

        case 'STUDENT':
          header('Location: ../user/index.php');
          break;

        default:
          header('Location: ../index.php');
          break;
      }
    }
  else {
    $_SESSION['error_msg'] = "Kata laluan atau kad matrik tidak sah.";
    header('Location: ../index.php');
  }
}

function logout() {
  session_destroy();
  header('Location: ../index.php');
}
?>
