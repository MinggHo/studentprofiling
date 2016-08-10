<?php
require_once 'connection.php';

function q_datalogin($kadmatrik, $katalaluan) {
  global $conn;

  if (isset($kadmatrik) && isset($katalaluan)) {
    $sql = "SELECT * FROM maklumat_pengguna WHERE kad_matrik = '$kadmatrik' and katalaluan = '$katalaluan'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      return $result;
    } else {
      return FALSE;
    }
  }else{
    return FALSE;
  }
}

function maklumatPengguna($kadmatrik) {
  global $conn;
  $sql = "SELECT *
  FROM maklumat_pengguna
  WHERE kad_matrik = '$kadmatrik'";

  $result = $conn->query($sql);

  if ($result) {
    return $result;
  } else {
    return FALSE;
  }
}

function updateMaklumat($emel, $password, $id) {
  global $conn;
  $sql = "UPDATE maklumat_pengguna
  SET katalaluan = '$password', emel = '$emel'
  WHERE kad_matrik = '$id'";
  // echo $sql;
  // die();
  $result = $conn->query($sql);

  if ($result) {
    return TRUE;
  } else {
    return FALSE;
  }
}

function bilanganUser() {
  global $conn;
  $sql = "SELECT * FROM maklumat_pengguna
  WHERE status='STUDENT'";
  $result = $conn->query($sql);

  if ($result->num_rows == 0 || $result->num_rows >= 0) {
    return $result;
  }
  else
  {
    return FALSE;
  }
}

function bilanganUserJawap() {
  global $conn;
  $sql = "SELECT DISTINCT(kad_matrik) FROM maklumat_pengguna
  NATURAL JOIN skor_markah
  WHERE status='STUDENT'";
  $result = $conn->query($sql);

  if ($result->num_rows == 0 || $result->num_rows >= 0) {
    return $result;
  }
  else
  {
    return FALSE;
  }
}

function bilanganSkor() {
  global $conn;
  $sql = "SELECT * FROM skor_markah";
  $result = $conn->query($sql);

  if ($result->num_rows == 0 || $result->num_rows >= 0) {
    return $result;
  }
  else
  {
    return FALSE;
  }
}

function bilanganSkorLatest() {
  global $conn;
  $sql = "SELECT t.id_markah, t.kad_matrik, t.waktu_buat, t.markah_agg, t.markah_ana, t.markah_aut, t.markah_ktf,
  t.markah_eks, t.markah_int, t.markah_wsn, t.markah_kep, t.markah_ket, t.markah_kri, t.markah_mng, t.markah_mnl,  t.markah_skg,
  t.markah_str, t.markah_pcp, t.markah_kjj, k.nama_pelajar
FROM skor_markah t JOIN maklumat_pengguna k ON t.kad_matrik = k.kad_matrik
INNER JOIN (
	SELECT kad_matrik, max(id_markah) as latest
    from skor_markah
    GROUP BY kad_matrik
) tm on t.kad_matrik = tm.kad_matrik and t.id_markah = tm.latest
ORDER BY id_markah DESC";
  $result = $conn->query($sql);

  if ($result->num_rows == 0 || $result->num_rows >= 0) {
    return $result;
  }
  else
  {
    return FALSE;
  }
}

function bilanganSkorLatestFakulti($fakulti) {
  global $conn;
  $sql = "SELECT kad_matrik, nama_pelajar, fakulti_pelajar, kursus_pelajar, tahun_pelajar
  FROM maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'";
  $result = $conn->query($sql);

  if ($result->num_rows == 0 || $result->num_rows >= 0) {
    return $result;
  }
  else
  {
    return "FALSE";
  }
}

function studentRekod($matrik) {
  global $conn;
  $sql = "SELECT COUNT(kad_matrik) as bilangan
  FROM skor_markah
  WHERE kad_matrik = '$matrik'
  GROUP BY kad_matrik";
  $result = $conn->query($sql);

  if ($result->num_rows == 0 || $result->num_rows > 0) {
    return $result;
  }
  else
  {
    return "FALSE";
  }
}

function skorBaru() {
  global $conn;
  $sql = "SELECT * FROM skor_markah WHERE waktu_buat BETWEEN NOW() - INTERVAL 7 DAY AND NOW()";
  $result = $conn->query($sql);

  if ($result->num_rows == 0 || $result->num_rows >= 0) {
    return $result;
  }
  else
  {
    return FALSE;
  }
}

function skorBaruTable() {
  global $conn;
  $sql = "SELECT kad_matrik, waktu_buat, nama_pelajar, fakulti_pelajar, markah_agg, markah_ana,markah_aut,markah_ktf,markah_eks,markah_int,markah_wsn ,markah_kep,markah_ket,markah_kri,markah_mng,markah_mnl ,markah_skg,markah_str ,markah_pcp,markah_kjj
          FROM skor_markah
          NATURAL JOIN maklumat_pengguna
          WHERE waktu_buat BETWEEN NOW() - INTERVAL 7 DAY AND NOW()";
  $result = $conn->query($sql);

  if ($result->num_rows == 0 || $result->num_rows >= 0) {
    return $result;
  }
  else
  {
    return FALSE;
  }
}

function profilPelajar($data) {
  global $conn;
  $sql = "SELECT * FROM maklumat_pengguna WHERE kad_matrik = '$data'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    return $result;
  } else {
    return FALSE;
  }
}

function skorPelajar($data){
  global $conn;
  $sql = "SELECT
  fakulti_pelajar, kad_matrik, waktu_buat, markah_agg, markah_ana, markah_aut, markah_ktf, markah_eks, markah_int, markah_wsn, markah_kep, markah_ket, markah_kri, markah_mng, markah_mnl, markah_skg, markah_str, markah_pcp, markah_kjj
          FROM
  skor_markah
          NATURAL JOIN
  maklumat_pengguna
          WHERE
  kad_matrik = '$data'
          GROUP BY
  id_markah DESC
          LIMIT 1";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    return $result;
  } else {
    $_SESSION['error_msg'] = "Pelajar masih belum mengambil inventori.";
    return FALSE;
  }
}

function purataSkorPelajar($fakulti) {
  global $conn;

  $sql = "";
  $result = $conn->query($sql);
}

function sejarahSkor($data){
  global $conn;
  $sql = "SELECT * FROM skor_markah WHERE kad_matrik = '$data'
  ORDER BY id_markah DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    return $result;
  } else {
    return FALSE;
  }
}

function purataFakulti($fakulti) {
  global $conn;
  $sql = "SELECT
  ROUND( AVG(markah_agg) ) AS avg_agg ,
  ROUND( AVG(markah_ana) ) AS avg_ana ,
  ROUND( AVG(markah_aut) ) AS avg_aut ,
  ROUND( AVG(markah_ktf) ) AS avg_ktf ,
  ROUND( AVG(markah_eks) ) AS avg_eks ,
  ROUND( AVG(markah_int) ) AS avg_int ,
  ROUND( AVG(markah_wsn) ) AS avg_wsn ,
  ROUND( AVG(markah_kep) ) AS avg_kep ,
  ROUND( AVG(markah_ket) ) AS avg_ket ,
  ROUND( AVG(markah_kri) ) AS avg_kri ,
  ROUND( AVG(markah_mng) ) AS avg_mng ,
  ROUND( AVG(markah_mnl) ) AS avg_mnl ,
  ROUND( AVG(markah_skg) ) AS avg_skg ,
  ROUND( AVG(markah_str) ) AS avg_str ,
  ROUND( AVG(markah_pcp) ) AS avg_pcp ,
  ROUND( AVG(markah_kjj) ) AS avg_kjj ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    return $result;
  }
  else
  {
    return FALSE;
  }
}

function totalBilangan($fakulti) {
  global $conn;
  $sql = "SELECT
	COUNT( DISTINCT(kad_matrik) ) AS bil
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    return $result;
  }
  else
  {
    return FALSE;
  }
}

function kiraTinggiFakulti($fakulti) {
  global $conn;
  $sql = "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_agg BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_ana BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_aut BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_ktf BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_eks BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_int BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_wsn BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_kep BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_ket BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_kri BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_mng BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_mnl BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_skg BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_skg BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_str BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_pcp BETWEEN 70 AND 100;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND kjj BETWEEN 70 AND 100;";

  $arr_tinggi = array();

  if (mysqli_multi_query($conn, $sql)) {
    do {
       if ($result=mysqli_store_result($conn)) {
         while ($row=mysqli_fetch_row($result))
    {
      // echo var_dump($row);
      array_push($arr_tinggi, $row[0]);
    }
      mysqli_free_result($result);
  }
}
  while (mysqli_next_result($conn));

  return $arr_tinggi;
} else {
  return FALSE;
}
}

function kiraRendahFakulti($fakulti) {
  global $conn;
  $sql = "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_agg BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_ana BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_aut BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_ktf BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_eks BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_int BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_wsn BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_kep BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_ket BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_kri BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_mng BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_mnl BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_skg BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_skg BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_str BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_pcp BETWEEN 0 AND 30;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND kjj BETWEEN 0 AND 50;";

  $arr_tinggi = array();

  if (mysqli_multi_query($conn, $sql)) {
    do {
       if ($result=mysqli_store_result($conn)) {
         while ($row=mysqli_fetch_row($result))
    {
      // echo var_dump($row);
      array_push($arr_tinggi, $row[0]);
    }
      mysqli_free_result($result);
  }
}
  while (mysqli_next_result($conn));

  return $arr_tinggi;
} else {
  return FALSE;
}
}

function kiraSederhanaFakulti($fakulti) {
  global $conn;
  $sql = "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_agg BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_ana BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_aut BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_ktf BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_eks BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_int BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_wsn BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_kep BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_ket BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_kri BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_mng BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_mnl BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_skg BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_skg BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_str BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND markah_pcp BETWEEN 31 AND 69;";

  $sql .= "SELECT
  COUNT( DISTINCT(kad_matrik) ) AS mrkh ,
  fakulti_pelajar AS fakulti
  FROM skor_markah
  natural join maklumat_pengguna
  WHERE fakulti_pelajar = '$fakulti'
  AND kjj BETWEEN 50 AND 70;";

  $arr_tinggi = array();

  if (mysqli_multi_query($conn, $sql)) {
    do {
       if ($result=mysqli_store_result($conn)) {
         while ($row=mysqli_fetch_row($result))
    {
      // echo var_dump($row);
      array_push($arr_tinggi, $row[0]);
    }
      mysqli_free_result($result);
  }
}
  while (mysqli_next_result($conn));

  return $arr_tinggi;
} else {
  return FALSE;
}
}

?>
