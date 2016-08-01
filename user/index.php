<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == 0){
  if ($_SESSION['status'] == "ADMIN") {
    header('Location: ../index.php');
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

                        <tbody>
                            <tr class="form1">
                                <td>1</td>
                                <td>Selesa memberitahu kawan-kawan mengenai apa-apa sahaja yang ada dalam fikiran saya</td>
                                <td>
                                    <!-- Switch -->
                                    <div class="switch">
                                        <label>
                                            <em>Tidak</em>
                                            <input type="checkbox" id="soalan1">
                                            <span class="lever"></span>
                                            <strong>Ya</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>2</td>
                                <td>Lebih suka bekerja dengan idea-idea dari bekerja dengan data dan benda</td>
                                <td>
                                    <div class="switch">
                                        <label>
                                            <em>Tidak</em>
                                            <input type="checkbox" id="soalan2">
                                            <span class="lever"></span>
                                            <strong>Ya</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>3</td>
                                <td>Suka melakukan sesuatu mengikut cara saya sendiri dari mengikut struktur yang telah ditetapkan</td>
                                <td>
                                    <div class="switch">
                                        <label>
                                            <em>Tidak</em>
                                            <input type="checkbox">
                                            <span class="lever" id="soalan3"></span>
                                            <strong>Ya</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>4</td>
                                <td>Merasa selamat bila saya tahu orang yang saya percayai berada di samping saya</td>
                                <td>
                                    <div class="switch">
                                        <label>
                                            <em>Tidak</em>
                                            <input type="checkbox">
                                            <span class="lever" id="soalan4"></span>
                                            <strong>Ya</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>5</td>
                                <td>Suka menghadiri majlis-majlis kenduri dan perkahwinan</td>
                                <td>
                                    <div class="switch">
                                        <label>
                                            <em>Tidak</em>
                                            <input type="checkbox" id="soalan5">
                                            <span class="lever"></span>
                                            <strong>Ya</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>6</td>
                                <td>Suka membuat kritikan yang membina mengenai apa-apa sahaja bahan yang saya baca</td>
                                <td>
                                    <div class="switch">
                                        <label>
                                            <em>Tidak</em>
                                            <input type="checkbox" id="soalan6">
                                            <span class="lever"></span>
                                            <strong>Ya</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>7</td>
                                <td>Lebih selesa tinggal di kawasan yang tidak mempunyai ramai jiran tetangga</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan7"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>8</td>
                                <td>Sukakan suasana kehidupan yang berubah-ubah</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan8"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>9</td>
                                <td>Tidak mudah kecewa apabila berhadapan dengan masalah-masalah yang rumit</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan9"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>10</td>
                                <td>Selalu mengelak dari bertanya kerana takut akan salah</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan10"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>11</td>
                                <td>Mempunyai keinginan supaya orang lain menganggap diri saya sebagai pemimpin</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan11"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>12</td>
                                <td>Menolong sedaya upaya kawan-kawan yang menghadapi masalah</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan12"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>13</td>
                                <td>Mengharapkan sanjungan dari kawan-kawan untuk mengelakkan diri dari rasa tertekan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan13"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>14</td>
                                <td>Suka kepada kerja-kerja yang mempunyai struktur yang jelas</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan14"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>15</td>
                                <td>Mengharapkan supaya orang lain menganggap saya sebagai seorang yang amat berjaya</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan15"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form1">
                                <td>16</td>
                                <td>Setakat ingatan saya, saya tidak pernah meradang dengan sesiapa</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan16"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>17</td>
                                <td>Selesa meminta pertolongan dari kawan-kawan dan ahli-ahli professional bila menghadapi masalah.</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan17"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>18</td>
                                <td>Memikirkan secara kritikal setiap perkara yang saya buat dan lihat</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan18"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>19</td>
                                <td>Memikirkan sendiri cara-cara untuk menyelesaikan masalah yang saya hadapi</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan19"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>20</td>
                                <td> Mengelak dari memperkatakan perkara-perkara yang boleh menyebabkan orang lain marah</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan20"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>

                            <tr class="form2">
                                <td>21</td>
                                <td>Suka berucap semasa berada di dalam kumpulan yang besar</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan21"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>22</td>
                                <td>Suka memikirkan masalah-masalah yang rumit dan mencabar</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan22"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>23</td>
                                <td>Sering kali memendamkan perasaan saya agar tidak diketahui oleh orang lain</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan23"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>24</td>
                                <td>Tidak suka terikat dengan jadual yang ketat untuk aktiviti-aktiviti masa lapang</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan24"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>25</td>
                                <td>Selalu tidur lewat untuk menyelesaikan kerja-kerja yang telah dimulakan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan25"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>26</td>
                                <td>Merasa kecewa bila memikirkan diri saya tidak berupaya mengawal keadaan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan26"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>27</td>
                                <td>Selalu membuat keputusan-keputusan penting bersendirian tanpa mengharapkan bantuan orang lain</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan27"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>28</td>
                                <td>Tidak sampai hati melihat orang lain dihukum walaupun ianya telah diadili</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan28"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>29</td>
                                <td>Ingin supaya orang lain bersimpati dengan masalah hidup yang saya alami</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan29"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>30</td>
                                <td>Suka melakukan sesuatu kerja dengan kemas dan teratur</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan30"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>31</td>
                                <td>Beranggapan adalah penting mempunyai pekerjaan di mana orang lain tidak berupaya melakukannya</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan31"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form2">
                                <td>32</td>
                                <td>Saya tidak pernah mengumpat tentang diri seseorang</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan32"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>33</td>
                                <td>Selesa meminta kembali barang-barang yang telah dipinjam oleh kawan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan33"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>34</td>
                                <td>Berminat membaca buku-buku bercorak akademik, falsafah dan psikologi</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan34"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>35</td>
                                <td>Akan menghadiri sesuatu majlis jika saya rasa ingin berbuat demikian</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan35"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>36</td>
                                <td>Selalu memihak kepada kumpulan yang mendapat suara majoriti</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan36"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>37</td>
                                <td>Percaya bahawa diri saya adalah seorang yang peramah dan mudah mesra</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan37"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>38</td>
                                <td>Lebih selesa berdampingan dengan orang yang intelek berbanding orang yang praktikal</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan38"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>39</td>
                                <td>Jarang bercakap di dalam sesuatu sesi perbualan atau perbincangan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan39"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>40</td>
                                <td>Merasa seakan-akan berminat kepada semua perkara</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan40"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>41</td>
                                <td>Akan menyelesaikan sesuatu kerja sebelum memulakan kerja-kerja yang lain</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan41"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>42</td>
                                <td>Percaya bahawa orang lain membuat sesuatu kerja lebih baik daripada saya</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan42"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>43</td>
                                <td>Lebih suka menjadi ketua dari menjadi pengikut</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan43"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>44</td>
                                <td>Sedia memberi pertolongan kepada orang lain tanpa mengira pertolongan itu dihargai atau tidak</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan44"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>45</td>
                                <td>Selalu menceritakan masalah-masalah peribadi saya kepada orang lain</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan45"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>46</td>
                                <td>Suka kepada aktiviti-aktiviti yang memerlukan perhatian dan tumpuan yang terperinci</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan46"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>47</td>
                                <td>Mencuba bersungguh-sungguh dalam melakukan apa sahaja kerja</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan47"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form3">
                                <td>48</td>
                                <td>Saya tidak pernah memecahkan rahsia kawan-kawan saya</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan48"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td>49</td>
                                <td>Mudah melenting apabila kerja yang saya lakukan tidak menjadi</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan49"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td> 50</td>
                                <td>Berminat untuk mencipta idea-idea dan teori-teori baru yang berhubung dengan manusia</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan50"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td> 51</td>
                                <td>Tidak mengharapkan orang lain membantu menyelesaikan kerja-kerja saya</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan51"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td> 52</td>
                                <td>Suka menerima pimpinan orang lain</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan52"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td> 53</td>
                                <td> Mudah memulakan perbualan dengan orang-orang yang belum saya kenali</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan53"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td> 54</td>
                                <td> Suka menyelesaikan masalah-masalah yang dihadapi melalui kajian dan penyelidikan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan54"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td> 55</td>
                                <td> Mengelak daripada bercakap dengan orang lain melainkan jika ditegur terlebih dahulu</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan55"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td> 56</td>
                                <td> Merasa bosan bila tiada kerja-kerja baru yang boleh dibuat</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan56"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td>57</td>
                                <td>Akan meneruskan kerja-kerja yang susah walaupun peluang untuk berjaya adalah tipis</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan57"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td>58</td>
                                <td>Rasa tidak puas hati dengan apa yang telah saya capai dan perolehi sehingga ini</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan58"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td>59</td>
                                <td>Suka membuat keputusan untuk kumpulan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan59"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td>60</td>
                                <td>Selalu meminjamkan barang-barang yang saya sayangi kepada kawan-kawan yang memerlukan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan60"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td> 61</td>
                                <td>Selalu mengharapkan belaian kasih sayang dan perhatian dari orang lain</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan61"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td>62</td>
                                <td>Ada jadual makan dan tidur yang tetap untuk setiap hari</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan62"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td>63</td>
                                <td>Suka menerima hadiah-hadaiah dan anugerah-anugerah bagi setiap pencapaian cemerlang yang saya perolehi</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan63"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form4">
                                <td>64</td>
                                <td>Saya sentiasa bersetuju dengan pendapat ibu bapa saya</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan6"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>65</td>
                                <td>Akan berterus terang menyatakan bahawa tingkah lakunya telah menyakitkan hati saya</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan65"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>66</td>
                                <td>Suka menganalisis personaliti individu yang saya temui</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan66"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>67</td>
                                <td>Tidak suka dikawal oleh individu yang mempunyi autoriti</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan67"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>68</td>
                                <td>Tidak akan melanggar peraturan yang telah ditetapkan walaupun saya tidak bersetuju dengan peraturan itu</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan68"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>69</td>
                                <td>Cenderung bercakap lebih banyak dari orang lain apabila berada di dalam sesuatu kumpulan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan69"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>70</td>
                                <td>Suka melibatkan diri dalam perbincangan mengenai idea-idea yang abstrak</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan70"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>71</td>
                                <td>Suka menghabiskan waktu petang seorang diri dari berbual dan bermain dengan kawan-kawan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan71"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>72</td>
                                <td>Selalu mengubah program dan aktiviti yang telah saya rancangkan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan72"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>73</td>
                                <td>Boleh bekerja dalam satu jangka masa yang panjang tanpa mudah merasa letih dan jemu</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan73"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>74</td>
                                <td>Rasa bersalah terhadap beberapa perkara buruk yang telah saya lakukan pada masa lalu</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan74"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>75</td>
                                <td>Akan mengambil alih tugas kepimpinan apabila suasana berada dalam keadaan tertekan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan75"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>76</td>
                                <td>Gembira menghabiskan sebahagian dari masa saya membantu menyelesaikan masalah-masalah sosial</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan76"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>77</td>
                                <td>Merasa perlu mencurahkan perasaan yang terkandung di dalam hati saya kepada kawan-kawan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan77"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>78</td>
                                <td>Menyusun idea dan pemikiran saya dengan cermat sebelum memulakan perbualan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan78"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>79</td>
                                <td>Berusaha bersungguh-sungguh untuk mencapai kemenangan dalam aktiviti yang bercorak pertandingan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan79"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form5">
                                <td>80</td>
                                <td>Saya tidak pernah tersinggung apabila ditegur oleh kawan-kawan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan80"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>81</td>
                                <td>Selesa bertanya apabila arahan yang diberikan oleh Ketua kurang jelas</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan81"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>82</td>
                                <td>Suka melibatkan diri dalam perbincangan yang berkaitan dengan falsafah hidup masyarakat yang ideal</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan82"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>83</td>
                                <td>Suka melakukan kerja-kerja yang tidak melibatkan arahan, persetujuan dan pendapat orang lain</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan83"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>84</td>
                                <td>Meminta pendapat dan persetujuan orang lain sebelum memulakan sesuatu pekerjaan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan84"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>85</td>
                                <td>Suka kepada aktiviti-aktiviti yang melibatkan orang ramai</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan85"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>86</td>
                                <td>Selalu menghabiskan masa dalam perpustakaan membaca buku-buku yang bercorak akademik</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan86"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>87</td>
                                <td>Suka menyendiri melayan fikiran</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan87"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>88</td>
                                <td>Selesa dalam menghadapi situasi-situasi baru</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan88"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>89</td>
                                <td>Jarang menangguhkan kerja yang telah diberikan kepada saya walaupun saya tidak suka</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan89"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>90</td>
                                <td>Merasa diri saya gagal bila orang lain membuat kerja lebih baik daripada saya</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan90"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>91</td>
                                <td>Bercita-cita menjadi pemimpin sesubuah kelab atau organisasi</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan91"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>92</td>
                                <td>Ingin bergiat cergas dalam persatuan yang bertanggungjawap membantu individu yang kurang bernasib baik</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan92"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>93</td>
                                <td>Selalu meminta kepastian dari orang lain bahawa apa yang saya buat dan katakan adalah betul</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan93"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>94</td>
                                <td>Sentiasa menjaga ruang tempat kerja saya supaya kelihatan bersih dan kemas</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan94"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>95</td>
                                <td>Melihat diri saya sebagai seorang yang bercita-cita tinggi</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan95"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>96</td>
                                <td>Saya tidak pernah berselisih faham dengan sesiapa</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan96"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form6">
                                <td>97</td>
                                <td>Akan terus bertanya sehingga saya berpuas hati dengan jawapan yang diberikan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan97"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>98</td>
                                <td>Selalu memikirkan jalan-jalan penyelesaian kepada bermacam-macam masalah sosial, politik dan ekonomi</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan98"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>99</td>
                                <td>Melakukan sesuatu mengikut cara saya sendiri tanpa memikirkan apa orang lain akan kata</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan99"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>100</td>
                                <td>Lebih banyak bertolak ansur mengenai sesuatu perkara berbanding dengan orang lain </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan100"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>101</td>
                                <td>Selesa bercakap dengan seseorang walaupun bertemu buat kali pertama </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan101"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>102</td>
                                <td>Suka menulis ulasan kritikal mengenai buku-buku dan artikel-artikel bercorak akademik yang saya baca </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan102"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>103</td>
                                <td>Merasa gugup bercakap di hadapan khalayak ramai </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan103"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>104</td>
                                <td>Tidak suka tinggal di sesuatu tempat dalam satu jangka masa yang lama </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan104"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>105</td>
                                <td>Akan meneruskan kerja-kerja yang menghadapai kebuntuan, walaupun orang lain telah menarik diri </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan105"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>106</td>
                                <td>Merasakan bahawa kehidupan saya adalah tidak menggembirakan </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan106"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>107</td>
                                <td>Selalu mempengaruhi orang lain supaya menerima pendapat saya </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan107"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>108</td>
                                <td>Percaya bahawa menolong orang lain adalah sama penting dengan menolong diri saya sendiri </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan108"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>109</td>
                                <td>Rasa sedih menghadapi masalah-masalah peribadi bersendirian tanpa sokongan dari kawan-kawan </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan109"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>110</td>
                                <td>Merancang dengan teliti matlamat yang ingin saya capai di masa akan datang </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan110"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>111</td>
                                <td>Merasakan bahawa kejayaan orang lain selalu mendorong saya untuk mencuba dengan lebih bersungguh-sungguh </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan111"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form7">
                                <td>112</td>
                                <td>Sejarah kehidupan saya sentiasa menyeronokkan dan menggembirakan </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan112"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>113</td>
                                <td>Lebih selesa membuat kerja-kerja yang telah saya rancang dari membuat kerja yang disuruh oleh orang lain </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan113"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>114</td>
                                <td>Berminat mencari sebab musabab mengenai tingkah laku dan permasalahan manusia </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan114"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>115</td>
                                <td>Selalu bertindak mengikut keyakinan diri </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan115"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>116</td>
                                <td>Merasa perlu bergantung kepada individu yang saya percayai membentuk nilai-nilai hidup saya </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan116"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>117</td>
                                <td>Lebih selesa berinteraksi dengan individu yang tidak saya kenali dari duduk seorang diri </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan117"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>118</td>
                                <td>Sering memikirkan sebab-sebab berlakunya masalah di dunia ini serta cara penyelesaiannya </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan118"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>119</td>
                                <td>Selalu merasa bimbang bila bertemu dengan orang yang belum saya kenali </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan119"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>120</td>
                                <td>Suka membuat sesuatu kerja hanya disebabkan ianya berbeza dari yang lain </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan120"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>121</td>
                                <td>Akan menyelesaikan segala tugas yang diamanahkan kepada saya walaupun saya terpaksa bekerja lebih masa </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan121"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>122</td>
                                <td>Merasakan yang diri saya patut dihukum kerana telah melakukan sesuatu yang salah </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan122"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>123</td>
                                <td>Suka kepada aktiviti-aktiviti kumpulan di mana saya bertindak sebagai ketua </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan123"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>124</td>
                                <td>Mudah mesra dan mudah membina persahabatan dengan orang lain </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan124"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>125</td>
                                <td>Merasa kecewa bila orang lain tidak menghargai diri saya </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan125"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>126</td>
                                <td>Merancang semua aktiviti-aktiviti supaya ia dapat dijalankan dengan lancar </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan126"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>127</td>
                                <td>Mempunyai keinginan yang tinggi untuk lebih berjaya daripada orang lain </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan127"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form8">
                                <td>128</td>
                                <td>Walaupun rakan-rakan selalu membuatkan saya ternanti-nanti, saya tidak pernah marah </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan128"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>129</td>
                                <td>Agak mudah marah berbanding dengan kawan-kawan saya yang lain </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan129"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>130</td>
                                <td>Memperuntukkan masa yang lama bagi memikirkan masalah-masalah rumit yang perlu diselesaikan </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan130"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>131</td>
                                <td>Percaya yang saya mempunyai hak untuk menentukan sendiri apa yang ingin saya lakukan </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan131"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>132</td>
                                <td>Lebih suka meminta nasihat dari orang lain daripada cuba menyelesaikan masalah saya sendiri </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan132"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>133</td>
                                <td>Menganggap diri saya sebagai orang yang mudah untuk didampingi </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan133"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>134</td>
                                <td>Merasakan yang diri saya lebih berkebolehan membuat sesuatu kerja berbanding dengan kawan-kawan saya yang lain </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan134"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>135</td>
                                <td>Merasakan amat sukar memberitahu orang lain mengenai diri saya </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan135"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>136</td>
                                <td>Ingin mencuba sesuatu sekurang-kurangnya sekali </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan136"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>137</td>
                                <td>Bila saya membuat sesuatu keputusan, jarang sekali saya akan mengubahnya </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan137"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>138</td>
                                <td>Percaya bahawa diri saya mempunyai lebih banyak masalah peribadi dari orang lain </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan138"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>139</td>
                                <td>Gembira jika saya terpilih untuk memegang jawatan yang mempunyai autoriti </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan139"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>140</td>
                                <td>Percaya bahawa kebanyakan orang yang saya temui boleh menjadi kawan kepada saya </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan140"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>141</td>
                                <td>Ingin supaya diri saya difahami dan diterima oleh orang lain </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan141"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>142</td>
                                <td>Bekerja lebih efektif mengikut jadual yang telah dirancang terlebih dahulu </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan142"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>143</td>
                                <td>Suka mengisi masa lapang dengan aktiviti-aktiviti dan kerja-kerja yang mencabar </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan143"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form9">
                                <td>144</td>
                                <td>Saya tidak pernah bosan melakukan kerja yang berulang-ulang </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan144"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>145</td>
                                <td>Suka kepada perdebatan yang hangat tidak kira sama ada saya menang atau kalah </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan145"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>146</td>
                                <td>Suka membaca buku-buku yang boleh membantu saya mengenali diri dengan lebih baik </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan146"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>147</td>
                                <td>Berpendapat bahawa apa yang betul dan apa yang salah adalah ditentukan oleh saya sendiri </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan147"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>148</td>
                                <td>Tidak akan memulakan sesuatu kerja bila saya dapati orang lain tidak berminat untuk melakukannya </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan148"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>149</td>
                                <td>Mempunyai ramai sahabat dan kenalan</td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan149"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>150</td>
                                <td>Suka berbincang mengenai konsep-konsep dan idea-idea </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan150"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>151</td>
                                <td>Akan mengelak situasi-situasi yang memaksa saya berhubung dan berinteraksi dengan orang ramai </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan151"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>152</td>
                                <td>Merasa bosan hidup dalam keadaan yang stabil di sepanjang masa tanpa perubahan </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan152"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>153</td>
                                <td>Tidak suka membiarkan sesuatu kerja terbengkalai tanpa mencari jalan penyelesaiannya segera </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan153"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>154</td>
                                <td>Takut akan kecewa dalam mengharungi hidup </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan154"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>155</td>
                                <td>Akan memilih pekerjaan di mana saya mempunyai tanggungjawab penuh untuk menyelia </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan155"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>156</td>
                                <td>Suka melawat kawan-kawan dan jiran-jiran saya yang sakit </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan156"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>157</td>
                                <td>Akan meminta pertolongan kawan-kawan yang lain apabila menghadapi kebuntuan </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan157"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>158</td>
                                <td>Rasa kecewa bila ada sesuatu yang mengganggu perjalanan rangsangan saya </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan158"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>159</td>
                                <td>Ingin diiktiraf sebagai seorang yang berpengaruh </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan159"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form10">
                                <td>160</td>
                                <td>Saya tidak pernah cemburu walaupun kekasih atau orang yang saya sayangi bermesra dengan orang lain </td>
                                <td>
                                    <div class="switch">
                                        <label> <em>Tidak</em>
                                            <input type="checkbox" id="soalan160"><span class="lever"></span><strong>Ya</strong></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
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

            <div class="section">
                <div class="row">
                  <div id="hilang" class="col s12">
                    <div class="card-panel light-blue lighten-1 white-text">
                      <h5>Terima Kasih</h5>
                      <p>
                        Graf diatas menunjukkan taburan markah yang telah anda perolehi berdasarkan jawapan inventori.
                        <br> Klik pada gambar-gambar dibawah untuk mengetahui butiran markah pada setiap sifat personaliti.
                        <br> Untuk mencetak markah, klik butang cetak yang terletak dibawah halaman.
                      </p>
                    </div>
                  </div>
                    <div class="col s6">
                        <div class="card small hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/miniaggresif.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Aggresif<i class="material-icons right">more_vert</i></span>
                                <p id="skorAggresif"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Aggresif<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan anda adalah seorang yang pasif. Dalam kebanyakkan hal anda membenar
                    kan orang memanipulasikan diri & perasaan anda.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan anda seorang yang asertif/tegas. Dalam kebanyakkan hal anda selalunya menuntut
                  hak anda tetap pada masa yang sama, hati & perasaan orang lain anda turut juga.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan anda seorang yang agresif. Anda suka mengkritik orang lain. Dalam kebanyakkan
                  hak, hati & perasaan orang lain bukanlah tumpuan anda, yang penting ialah hajat dan matlamat anda tercapai.</p>
                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="card small">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/analitikalmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Analitikal<i class="material-icons right">more_vert</i></span>
                                <p id="skorAnalitikal"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Analitikal<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan individu seorang yang kurang atau tidak berminat dengan perkara-perkara yang memerlukan
                     anda membuat analisis. Individu seorang yang praktikal. Ketikat berinteraksi dengan orang lain, individu tidak cuba membaca yang tersirat.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan yang ciri analitikal individu adalah sederhana
                    . Minat anda untuk menganalisis adalah pada tahap sederhana.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan seorang yang sensitif kepada persekitaran, suka menganalisis
                     orang lain, diri sendiri mahupun situasi. Individu suka membuat pemerhatian, penyelidikan dan analisis.</p>
                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="card small hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/autonomimini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Autonomi<i class="material-icons right">more_vert</i></span>
                                <p id="skorAutonomi"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Autonomi<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan anda lebih suka menerima arahan orang lain dari struktur sosial yang
                    memerlukan keakuran.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan ciri autonomi anda adalah di tahap sederhana.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan anda sukakan kebebasan sepenuhnya dalam segala tindakan serta dapat
                    mengawal dan menentukan aktiviti-aktiviti seharian.</p>
              </small>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="card small hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/bersandarmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Bersandar<i class="material-icons right">more_vert</i></span>
                                <p id="skorBersandar"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Bersandar<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan anda aadalah individu yang suka berdikari. Dalam membuat keputusandan melakukan sesuatu aktiviti,
                    anda selalunya tidak bergantung kepada orang lain</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menggambarkan tahap pergantungan anda di tahap sederhana.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan anda suka bergantung kepada orang lain. Dalam membuat keputusan, anda
                  selalunya akan mengharapkan pendapat dan nasihat daripada orang lain terutama yang mempunyai autoriti.</p>
              </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="card small hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/ekstrovertmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Ekstrovert<i class="material-icons right">more_vert</i></span>
                                <p id="skorEkstrovert"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Ekstrovert<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan anda adalah individu yang kurang/tidak sosial. Anda suka mengelak
                    untuk berinteraksi dalam kumpulan besar & lebih selesa berada dalam kumpulan kecil. Suka kepada suasana
                    kerja sendirian.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan yang anda mempunyai kedua-dua ciri sosial & tidak sosial. Umumnya
                    , tahap sosial anda adalah sederhana.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan anda individu yang sosial. Anda suka berinteraksi &
                    dikelilingi orang ramai disamping merasa tidak selesa duduk bersendirian.</p>
                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="card small">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/intelektualmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Intelektual<i class="material-icons right">more_vert</i></span>
                                <p id="skorIntelektual"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Intelektual<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan individu tidak berasa selesa dengan perkara-perkara yang bersifat teoretikal.
                     Individu lebih berminat dan selesa dengan kerja-kerja yang berstruktur, praktikal, dan pragmatik. Kerja yang dipilih
                      selalunya ialah kerja-kerja berkemahiran.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan ciri-ciri atau sifat keintelektualan individu berada pada tahap sederhana.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan individu sukakan aktiviti yang memberi cabaran dari segi intelektual.
                     Individu berasa puas dengan aktiviti-aktiviti keilmuan tetapi tidak puas dengan aktiviti-aktiviti yang berulang-ulang.</p>
                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="card small">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/introvertmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Introvert<i class="material-icons right">more_vert</i></span>
                                <p id="skorIntrovert"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Introvert<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan anda ialah individu yang suka melibatkan diri dalam perhubungan interpersonal dan suka
                     berada di kalangan orang ramai. Anda seorang yang sosial.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan ciri-ciri sosial individu adalah pada tahap sederhana, iaitu tidak terlalu
                    tinggi dan tidak terlalu rendah.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan individu ialah individu yang tidak sosial dan suka mengelakkan situasi-situasi yang memaksanya
                    berkomunikasi. Individu lebih selesa dengan <em>setting</em> kerja bersendirian atau satu-sama-satu.</p>
                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="card small hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/kepelbagaianmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Kepelbagaian<i class="material-icons right">more_vert</i></span>
                                <p id="skorKepelbagaian"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Kepelbagaian<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan anda lebih suka situasi-situasi pekerjaan yang stabil & selamat.
                     Anda tidak selesa dengan situasi-situasi & pengalaman-pengalaman baru.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan ciri-ciri kepelbagaian anda adalah sederhana.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan anda dapat menghayati situasi-situasi yang dapat memberikan peluang-
                    peluang untuk pengalaman baru. Anda suka kepada perubahan dan selalunya suka mencuba sesuatu yang baru.</p>
                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="card small hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/ketahananmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Ketahanan<i class="material-icons right">more_vert</i></span>
                                <p id="skorKetahanan"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Ketahanan<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan anda kurang ketahanan dari fizikal, mental & emosi. Anda
                    mudah mengenepikan sesuatu jika dirasakan tidak bernilai & lebih mendapat kepuasan dari
                    kerja-kerja kreatif / yang berkaitan orang ramai.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan ciri-ciri ketahanan adalah sederhana.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan anda adalah individu yang mempunyai ketahanan dari segi fizikal, mental
                    & emosi. Anda akan menghabiskan semua tugas-tugas yang telah dimulakan & tidak akan berhenti separuh jalan. Anda
                    sangat bermotivasi dalam melakukan sesuatu.</p>
                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="card small hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/kritikdirimini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Kritik Diri<i class="material-icons right">more_vert</i></span>
                                <p id="skorKritikDiri"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Kritik Diri<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 30%)</b> menganggap dir mereka sentiasa betul & yang bersalah ialah orang lain.</p>
                  <p><b>Skor sederhana (40 - 50%)</b> dikaitkan dengan individu yang stabil dari segi emosi & psikologi.</p>
                  <p><b>Skor tinggi (60 - 99%)</b> menunjukkan individu yang bermasalah. Skor yang tinggi ini selalunya dikaitkan
                     dengan individu selalu merasa rendah diri, bimbang, rasa bersalah terhadap apa yang telah dilakukan /
                      tidak percaya yang ia telah mencapai sesuatu dengan jayanya.</p>
                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="card small">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/mengawalmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Mengawal<i class="material-icons right">more_vert</i></span>
                                <p id="skorMengawal"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title activator grey-text text-darken-4">Mengawal<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan individu lebih selesa dipimpin daripada memimpin. Kerjaya utama yang berkaitan ialah setiausaha,
                    akauntan, dan lain-lain.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan ciri-ciri mengawal dan kepemimpinannya adalah pada tahap sederhana.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan individu yang suka mengawal dan memimpin orang lain. Individu lebih
                    suka memimpin daripada dipimpin. Selalunya memilih kerjaya yang berkaitan dengan kepemimpinan seperti pengurus,
                    pentadbir awam, dan lain-lain.</p>
                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="card small">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/menolongmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Menolong<i class="material-icons right">more_vert</i></span>
                                <p id="skorMenolong"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Menolong<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan individu yang tidak suka terlibat secara emosi
                     dengan orang lain. Individu lebih memfokes kepada diri sendiri.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan ciri-ciri menolong individu adalah pada tahap sederhana.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan anda individu yang mempunyai keinginan untuk mencurahkan simpati
                    , kasih sayang, memberi bantuan serta membuat kebaikan dan kebajikan kepada orang lain.</p>
                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="card small">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/sokonganmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Sokongan<i class="material-icons right">more_vert</i></span>
                                <p id="skorSokongan"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Sokongan<i class="material-icons right">close</i></span>
                                <small>
                            <p><b>Skor rendah (1 - 40%)</b> menunjukkan individu tidak suka bergantung secara emosi kepada orang lain.</p>
                            <p><b>Skor sederhana (40 - 70%)</b> menunjukkan ciri-ciri sokongan individu berada pada tahap sederhana.</p>
                            <p><b>Skor tinggi (70 - 99%)</b> menunjukkan individu mempunyai keinginan untuk dikasihi,
                               difahami, dan mendapat simpati. Skor tinggi ini jika berkombinasi dengan skor rendah untuk tret personaliti
                                Menolong menunjukkan individu ialah seorang yang sangat mementingkan diri.</p>
                            </small>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="card small">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/strukturmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Struktur<i class="material-icons right">more_vert</i></span>
                                <p id="skorStruktur"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title activator grey-text text-darken-4">Struktur<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan individu lebih suka kepada aktiviti-aktiviti yang tidak berstruktur dan tidak berulang-ulang.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan ciri-ciri personaliti struktur individu berapa pada tahap sederhasa.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan individu ialah seorang yang suka kepada perkara-perkara berstruktur, rutin dan terperinci
                    . Individu lebih gemarkan aktiviti atau kerja-kerja yang memerlukan kekemasan, peraturan, ketelitian dan berulang-ulang.</p>
                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="card small hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/pencapaianmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Pencapaian<i class="material-icons right">more_vert</i></span>
                                <p id="skorPencapaian"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Pencapaian<i class="material-icons right">close</i></span>
                                <small>
                  <p><b>Skor rendah (1 - 40%)</b> menunjukkan individu yang rendah motivasinya & tidak begitu kisah tentang peranan status &
                     kuasa dalam kerjaya.</p>
                  <p><b>Skor sederhana (40 - 70%)</b> menunjukkan motivasi anda pada tahap sederhana.</p>
                  <p><b>Skor tinggi (70 - 99%)</b> menunjukkan anda adalah individu yang sangat bermotivasi & suka bersaing dalam mencapai
                     sesuatu matlamat.</p>
                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="card small hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/kejujuranmini.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Kejujuran<i class="material-icons right">more_vert</i></span>
                                <p id="skorKejujuran"> Markah anda : </p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Kejujuran<i class="material-icons right">close</i></span>
                                <small>
                  <p>Skala ini adalah skala yang khusus untuk <b>mengesan kejujuran</b>  responden dalam
                     menjawab item ujian.</p>
                  <p><b>Skor melebihi 50% </b> menunjukkan responden cenderung untuk tidak jujur dalam memberikan jawapan
                     & dengan itu profil yang diperolehi adalah tidak boleh dipercayai.</p>
                </small>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                      <button id="print" class="btn waves-effect waves-light light-blue accent-3" onclick="window.print()" type="button" name="print">
                        Cetak
                        <i class="material-icons right">print</i>
                      </button>
                    </div>
                </div>
            </div>
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
