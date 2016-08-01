        $(document).ready(function() {

            $('select').material_select();

            var counter = 0;

            $("#start").click(function() {

                formDisable();

                var minutesLabel = document.getElementById("timeMinute");
                var secondsLabel = document.getElementById("timeSecond");
                var totalSeconds = 0;

                setInterval(setTime, 1000);

                function setTime() {
                    ++totalSeconds;
                    secondsLabel.innerHTML = pad(totalSeconds % 60);
                    minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
                }

                function pad(val) {
                    var valString = val + "";
                    if (valString.length < 2) {
                        return "0" + valString;
                    } else {
                        return valString;
                    }
                }

                $("#tableSoalan").fadeIn(3000);
                $(".form1").fadeIn(3000);
                $("#hide").fadeIn(3000);
                $("#hide1").fadeIn(3000);
                $("#next").fadeIn(3000);
                $("#start").fadeOut(2000);
                $('html, body').animate({
                    scrollTop: $("#srollHere").offset().top
                }, 3000);
            });

            $("#next").click(function() {
                try {
                    if (counter === 0) {
                        $(".form1").fadeOut(1000);
                        $(".form2").fadeIn(3000);
                        $("#back").fadeIn(3000);

                        addBar(10);

                        counter++;

                    } else if (counter === 1) {
                        $(".form2").fadeOut(1000);
                        $(".form3").fadeIn(3000);

                        addBar(20);

                        counter++;

                    } else if (counter === 2) {
                        $(".form3").fadeOut(1000);
                        $(".form4").fadeIn(3000);

                        addBar(30);

                        counter++;

                    } else if (counter === 3) {
                        $(".form4").fadeOut(1000);
                        $(".form5").fadeIn(3000);
                        addBar(40);
                        counter++;

                    } else if (counter === 4) {
                        $(".form5").fadeOut(1000);
                        $(".form6").fadeIn(3000);
                        addBar(50);
                        counter++;

                    } else if (counter === 5) {
                        $(".form6").fadeOut(1000);
                        $(".form7").fadeIn(3000);
                        addBar(60);
                        counter++;

                    } else if (counter === 6) {
                        $(".form7").fadeOut(1000);
                        $(".form8").fadeIn(3000);
                        addBar(70);
                        counter++;

                    } else if (counter === 7) {
                        $(".form8").fadeOut(1000);
                        $(".form9").fadeIn(3000);
                        addBar(80);
                        counter++;

                    } else if (counter === 8) {
                        $(".form9").fadeOut(1000);
                        $(".form10").fadeIn(3000);
                        addBar(100);
                        counter++;

                        $("#next").fadeOut(1000);
                        $("#submit").fadeIn(3000);
                    } else {
                        alert("ERR");
                    }
                } catch (e) {
                    alert(e);
                } finally {
                    $('html, body').animate({
                        scrollTop: $("#srollHere").offset().top
                    }, 3000);
                }
            });

            $("#back").click(function() {
                console.log("Back counter : " + counter);
                try {

                    if (counter === 1) {
                        $("#back").fadeOut(500);
                        $(".form2").fadeOut(500);
                        $(".form1").fadeIn(1000);

                        addBar(0);

                        counter--;

                    } else if (counter === 2) {
                        $(".form3").fadeOut(500);
                        $(".form2").fadeIn(1000);

                        addBar(10);

                        counter--;

                    } else if (counter === 3) {
                        $(".form4").fadeOut(500);
                        $(".form3").fadeIn(1000);
                        addBar(20);
                        counter--;

                    } else if (counter === 4) {
                        $(".form5").fadeOut(500);
                        $(".form4").fadeIn(1000);
                        addBar(30);
                        counter--;

                    } else if (counter === 5) {
                        $(".form6").fadeOut(500);
                        $(".form5").fadeIn(1000);
                        addBar(40);
                        counter--;

                    } else if (counter === 6) {
                        $(".form7").fadeOut(500);
                        $(".form6").fadeIn(1000);
                        addBar(50);
                        counter--;

                    } else if (counter === 7) {
                        $(".form8").fadeOut(500);
                        $(".form7").fadeIn(1000);
                        addBar(60);
                        counter--;

                    } else if (counter === 8) {
                        $(".form9").fadeOut(500);
                        $(".form8").fadeIn(1000);
                        addBar(70);
                        counter--;

                    } else if (counter === 9) {
                        $(".form10").fadeOut(500);
                        $(".form9").fadeIn(1000);
                        addBar(80);
                        counter--;

                        $("#next").fadeIn(1000);
                        $("#submit").fadeOut(500);
                    } else {
                        alert("ERR");
                    }
                } catch (e) {
                    alert(e);
                } finally {
                    $('html, body').animate({
                        scrollTop: $("#srollHere").offset().top
                    }, 1000);
                }
            });

            function addBar(value) {
                var progress = document.getElementById('progress');
                var progressBar = document.getElementById('progressBar');

                progress.innerHTML = "Progress : <strong>" + value + " %</strong>";
                progressBar.setAttribute("style", "width: " + value + "%;");
            }

            function formDisable() {
                document.getElementById('namaPelajar').readOnly = true;
                document.getElementById('noKadMatrik').readOnly = true;
                document.getElementById('jantinaPelajar').readOnly = true;
                document.getElementById('umurPelajar').readOnly = true;
                document.getElementById('fakultiPelajar').readOnly = true;
                document.getElementById('kursusPelajar').readOnly = true;

                $('select').material_select();
            }

            $("#submit").click(function() {

                formDisable();

                var table = document.getElementById('tableSoalan');
                var items = table.getElementsByTagName('input');

                var arr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                // var arr = [10, 20, 30, 40, 50, 60, 70, 80, 90, 90, 50, 40, 30, 20, 20, 50];
                // var arr = [20, 40, 20, 40, 50, 60, 70, 80, 90, 90, 50, 40, 30, 20, 20, 50];

                var check = 0;

                try {
                    for (var i = 0; i < items.length; i++) {
                        if (items[i].checked) {
                            arr[check] += 10;
                        }

                        if (check < 15) {
                            check++;
                        } else {
                            check = 0;
                        }
                    }
                } catch (e) {
                    console.log(e);
                } finally {
                    $("#myCanvas").fadeIn(2000);
                    $("#keputusan").fadeIn(2000);
                    $("#mySection").fadeOut(1000);
                    $("#start").fadeOut(1000);
                    $("#tajukUtama").fadeOut(1000);
                    getRadar(arr);
                    insertData(arr);

                    $('html, body').animate({
                        scrollTop: $("#index-banner").offset().top
                    }, 2000);
                }
            });

            function insertData(arr) {

                var agg = document.getElementById('skorAggresif');
                agg.innerHTML = "Markah anda : " + arr[0];

                var ana = document.getElementById('skorAnalitikal');
                ana.innerHTML = "Markah anda : " + arr[1];

                var aut = document.getElementById('skorAutonomi');
                aut.innerHTML = "Markah anda : " + arr[2];

                var bsd = document.getElementById('skorBersandar');
                bsd.innerHTML = "Markah anda : " + arr[3];

                var eks = document.getElementById('skorEkstrovert');
                eks.innerHTML = "Markah anda : " + arr[4];

                var itl = document.getElementById('skorIntelektual');
                itl.innerHTML = "Markah anda : " + arr[5];

                var int = document.getElementById('skorIntrovert');
                int.innerHTML = "Markah anda : " + arr[6];

                var kpl = document.getElementById('skorKepelbagaian');
                kpl.innerHTML = "Markah anda : " + arr[7];

                var thn = document.getElementById('skorKetahanan');
                thn.innerHTML = "Markah anda : " + arr[8];

                var krd = document.getElementById('skorKritikDiri');
                krd.innerHTML = "Markah anda : " + arr[9];

                var mgl = document.getElementById('skorMengawal');
                mgl.innerHTML = "Markah anda : " + arr[10];

                var tlg = document.getElementById('skorMenolong');
                tlg.innerHTML = "Markah anda : " + arr[11];

                var sok = document.getElementById('skorSokongan');
                sok.innerHTML = "Markah anda : " + arr[12];

                var str = document.getElementById('skorStruktur');
                str.innerHTML = "Markah anda : " + arr[13];

                var pcp = document.getElementById('skorPencapaian');
                pcp.innerHTML = "Markah anda : " + arr[14];

                var jjr = document.getElementById('skorKejujuran');
                jjr.innerHTML = "Markah anda : " + arr[15];

                var cardMarkah = document.getElementById('cardMarkah');
                cardMarkah.innerHTML =
                    "<p>Aggresif : " + arr[0] + "</br>" +
                    "Analitikal : " + arr[1] + "</br>" +
                    "Autonomi : " + arr[2] + "</br>" +
                    "Bersandar : " + arr[3] + "</br>" +
                    "Ekstrovert : " + arr[4] + "</br>" +
                    "Intelektual : " + arr[5] + "</br>" +
                    "Introvert : " + arr[6] + "</br>" +
                    "Kepelbagaian : " + arr[7] + "</p>";

                var cardMarkah2 = document.getElementById('cardMarkah2');
                cardMarkah2.innerHTML =
                    "<p>Ketahanan : " + arr[8] + "</br>" +
                    "Kritik Diri : " + arr[9] + "</br>" +
                    "Mengawal : " + arr[10] + "</br>" +
                    "Menolong : " + arr[11] + "</br>" +
                    "Sokongan : " + arr[12] + "</br>" +
                    "Struktur : " + arr[13] + "</br>" +
                    "Pencapaian : " + arr[14] + "</br>" +
                    "Kejujuran : " + arr[15] + "</p>";

              // insert data to DB
              var result = arr.map(function (x) {
                  return parseInt(x, 10);
              });

              var userinformation = document.getElementById('noKadMatrik').value;

            $.post("../model/addData.php",
              {data: arr,
              userinformation: userinformation},
              function(data, textStatus, jqXHR) {
              if (data==="SUCCESS") {
                swal("Berjaya!", "Skor telah berjaya dimasukkan ! \n Klik 'OK' untuk membaca penerangan dan mencetak keputusan", "success");
              } else {
                swal("Ralat!", "Skor tidak berjaya dimasukkan!", "error");
              }
              }).fail(function(jqXHR, textStatus, errorThrown) {
              console.log(errorThrown);
              });
            }

            function getRadar(arr) {
                // console.log("Array : " + arr);
                var data = {
                    labels: ["Agresif", "Analitikal", "Autonomi", "Bersandar", "Ekstrovert", "Intelektual", "Introvert", "Kepelbagaian", "Ketahanan", "Kritik Diri", "Mengawal", "Menolong", "Sokongan", "Struktur", "Pencapaian",
                        "Kejujuran"
                    ],
                    datasets: [{
                        label: "Skor Profil",
                        backgroundColor: "rgba(240, 155, 42, 0.2)",
                        borderColor: "#ff1f1f",
                        pointBackgroundColor: "#42a5f5",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(255, 31, 0, 1)",
                        data: arr
                    }]
                };
                var ctx = document.getElementById("myChart");
                var myChart = new Chart(ctx, {
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

            }
        });

        // function insert() {
        //     var kursus = document.getElementById('kursusPelajar');
        //     var eleVal = document.getElementById('fakultiPelajar').value;
        //
        //     kursus.options.length = 0;
        //
        //     switch (eleVal) {
        //         case 'ftmk':
        //             var option = document.createElement("option");
        //             option.text = "Pilih kursus anda";
        //             option.disabled = true;
        //             option.selected = true;
        //             kursus.add(option);
        //
        //             var option1 = document.createElement("option");
        //             option1.text = "DIT";
        //             kursus.add(option1);
        //
        //             var option2 = document.createElement("option");
        //             option2.text = "BITS";
        //             kursus.add(option2);
        //
        //             var option3 = document.createElement("option");
        //             option3.text = "BITD";
        //             kursus.add(option3);
        //
        //             var option4 = document.createElement("option");
        //             option4.text = "BITE";
        //             kursus.add(option4);
        //
        //             var option5 = document.createElement("option");
        //             option5.text = "BITI";
        //             kursus.add(option5);
        //
        //             var option6 = document.createElement("option");
        //             option6.text = "BITZ";
        //             kursus.add(option6);
        //
        //             var option7 = document.createElement("option");
        //             option7.text = "BITC";
        //             kursus.add(option7);
        //
        //             var option8 = document.createElement("option");
        //             option8.text = "BITM";
        //             kursus.add(option8);
        //             break;
        //
        //         case 'fkm':
        //             var option = document.createElement("option");
        //             option.text = "Pilih kursus anda";
        //             option.disabled = true;
        //             option.selected = true;
        //             kursus.add(option);
        //
        //             var option1 = document.createElement("option");
        //             option1.text = "DMC";
        //             kursus.add(option1);
        //
        //             var option2 = document.createElement("option");
        //             option2.text = "BMCA";
        //             kursus.add(option2);
        //
        //             var option3 = document.createElement("option");
        //             option3.text = "BMCD";
        //             kursus.add(option3);
        //
        //             var option4 = document.createElement("option");
        //             option4.text = "BMCS";
        //             kursus.add(option4);
        //
        //             var option5 = document.createElement("option");
        //             option5.text = "BMCT";
        //             kursus.add(option5);
        //
        //             var option6 = document.createElement("option");
        //             option6.text = "BMCG";
        //             kursus.add(option6);
        //
        //             var option7 = document.createElement("option");
        //             option7.text = "BMCL";
        //             kursus.add(option7);
        //             break;
        //
        //         case 'ftk':
        //             var option = document.createElement("option");
        //             option.text = "Pilih kursus anda";
        //             option.disabled = true;
        //             option.selected = true;
        //             kursus.add(option);
        //
        //             var option1 = document.createElement("option");
        //             option1.text = "BETI";
        //             kursus.add(option1);
        //
        //             var option2 = document.createElement("option");
        //             option2.text = "BETA";
        //             kursus.add(option2);
        //
        //             var option3 = document.createElement("option");
        //             option3.text = "BETR";
        //             kursus.add(option3);
        //
        //             var option4 = document.createElement("option");
        //             option4.text = "BETH";
        //             kursus.add(option4);
        //
        //             var option5 = document.createElement("option");
        //             option5.text = "BETM";
        //             kursus.add(option5);
        //
        //             var option6 = document.createElement("option");
        //             option6.text = "BETT";
        //             kursus.add(option6);
        //
        //             var option7 = document.createElement("option");
        //             option7.text = "BETC";
        //             kursus.add(option7);
        //
        //             var option8 = document.createElement("option");
        //             option8.text = "BETD";
        //             kursus.add(option8);
        //
        //             var option9 = document.createElement("option");
        //             option9.text = "BETE";
        //             kursus.add(option9);
        //
        //             var option10 = document.createElement("option");
        //             option10.text = "BETP";
        //             kursus.add(option10);
        //             break;
        //
        //         case 'fkekk':
        //             var option = document.createElement("option");
        //             option.text = "Pilih kursus anda";
        //             option.disabled = true;
        //             option.selected = true;
        //             kursus.add(option);
        //
        //             var option1 = document.createElement("option");
        //             option1.text = "DEN";
        //             kursus.add(option1);
        //
        //             var option2 = document.createElement("option");
        //             option2.text = "BEKE";
        //             kursus.add(option2);
        //
        //             var option3 = document.createElement("option");
        //             option3.text = "BENC";
        //             kursus.add(option3);
        //
        //             var option4 = document.createElement("option");
        //             option4.text = "BENE";
        //             kursus.add(option4);
        //
        //             var option5 = document.createElement("option");
        //             option5.text = "BENT";
        //             kursus.add(option5);
        //
        //             var option6 = document.createElement("option");
        //             option6.text = "BENW";
        //             kursus.add(option6);
        //
        //             var option7 = document.createElement("option");
        //             option7.text = "BENG";
        //             kursus.add(option7);
        //
        //             break;
        //
        //         case 'fke':
        //             var option = document.createElement("option");
        //             option.text = "Pilih kursus anda";
        //             option.disabled = true;
        //             option.selected = true;
        //             kursus.add(option);
        //
        //             var option1 = document.createElement("option");
        //             option1.text = "BEKC";
        //             kursus.add(option1);
        //
        //             var option2 = document.createElement("option");
        //             option2.text = "BEKE";
        //             kursus.add(option2);
        //
        //             var option3 = document.createElement("option");
        //             option3.text = "BEKM";
        //             kursus.add(option3);
        //
        //             var option4 = document.createElement("option");
        //             option4.text = "BEKP";
        //             kursus.add(option4);
        //
        //             var option5 = document.createElement("option");
        //             option5.text = "DEK";
        //             kursus.add(option5);
        //
        //             var option6 = document.createElement("option");
        //             option6.text = "BEKG";
        //             kursus.add(option6);
        //             break;
        //
        //         case 'fptt':
        //             var option = document.createElement("option");
        //             option.text = "Pilih kursus anda";
        //             option.disabled = true;
        //             option.selected = true;
        //             kursus.add(option);
        //
        //             var option1 = document.createElement("option");
        //             option1.text = "BTMI";
        //             kursus.add(option1);
        //
        //             var option2 = document.createElement("option");
        //             option2.text = "BTMM";
        //             kursus.add(option2);
        //
        //             var option3 = document.createElement("option");
        //             option3.text = "BTEC";
        //             kursus.add(option3);
        //             break;
        //
        //         case 'fkp':
        //             var option = document.createElement("option");
        //             option.text = "Pilih kursus anda";
        //             option.disabled = true;
        //             option.selected = true;
        //             kursus.add(option);
        //
        //             var option1 = document.createElement("option");
        //             option1.text = "DMF";
        //             kursus.add(option1);
        //
        //             var option2 = document.createElement("option");
        //             option2.text = "BMFA";
        //             kursus.add(option2);
        //
        //             var option3 = document.createElement("option");
        //             option3.text = "BMFP";
        //             kursus.add(option3);
        //
        //             var option4 = document.createElement("option");
        //             option4.text = "BMFR";
        //             kursus.add(option4);
        //
        //             var option5 = document.createElement("option");
        //             option5.text = "BMFU";
        //             kursus.add(option5);
        //             break;
        //
        //     }
        //
        //     $('select').material_select();
        // }
