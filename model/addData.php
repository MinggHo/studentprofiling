<?php
  require_once 'connection.php';
  global $conn;

  // date_default_timezone_set('Asia/Kuala_Lumpur');
  // $date = date("Y-m-d");
  $markah = $_POST;

  $kadmatrik = $markah['userinformation'];
  $markah_agg = $markah['data'][0];
  $markah_ana = $markah['data'][1];
  $markah_aut = $markah['data'][2];
  $markah_ktf = $markah['data'][3];
  $markah_eks = $markah['data'][4];
  $markah_int = $markah['data'][5];
  $markah_wsn = $markah['data'][6];
  $markah_kep = $markah['data'][7];
  $markah_ket = $markah['data'][8];
  $markah_kri = $markah['data'][9];
  $markah_mng = $markah['data'][10];
  $markah_mnl = $markah['data'][11];
  $markah_skg = $markah['data'][12];
  $markah_str = $markah['data'][13];
  $markah_pcp = $markah['data'][14];
  $markah_kjj = $markah['data'][15];

  $sql = "INSERT INTO skor_markah VALUES (NULL, '$kadmatrik', CURRENT_TIMESTAMP, '$markah_agg', '$markah_ana', '$markah_aut', '$markah_ktf', '$markah_eks', '$markah_int', '$markah_wsn', '$markah_kep', '$markah_ket', '$markah_kri', '$markah_mng', '$markah_mnl', '$markah_skg', '$markah_str', '$markah_pcp', '$markah_kjj')";
  $result = $conn->query($sql);

  echo "SUCCESS";
?>
