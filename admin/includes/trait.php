<div class="tab-pane active" id="">
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Alert!</h4> Pilih tret menu diatas untuk melihat skor tret & menu fakulti untuk menukar fakulti
    </div>
</div>
<div class="tab-pane" id="tab_1">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[0] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[0] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[0] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Aggresif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[0]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[0]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[0]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[0]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[0]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[0]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <!-- <div class="progress progress-xs progress-striped active">
        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
      </div> -->
                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET1-->

<div class="tab-pane" id="tab_2">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[1] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[1] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[1] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Analitikal</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[1]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[1]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[1]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[1]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[1]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[1]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <!-- <div class="progress progress-xs progress-striped active">
        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
      </div> -->
                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET2-->

<div class="tab-pane" id="tab_3">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[2] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[2] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[2] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Autonomi</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[2]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[2]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[2]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[2]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[2]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[2]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET3-->

<div class="tab-pane" id="tab_4">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[3] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[3] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[3] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[3]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[3]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[3]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[3]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[3]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[3]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET4-->

<div class="tab-pane" id="tab_5">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[4] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[4] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[4] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[4]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[4]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[4]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[4]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[4]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[4]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET5-->

<div class="tab-pane" id="tab_6">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[5] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[5] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[5] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[5]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[5]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[5]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[5]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[5]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[5]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET6-->


<div class="tab-pane" id="tab_7">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[6] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[6] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[6] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[6]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[6]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[6]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[6]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[6]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[6]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET7-->

<div class="tab-pane" id="tab_8">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[7] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[7] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[7] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[7]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[7]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[7]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[7]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[7]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[7]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET8-->

<div class="tab-pane" id="tab_9">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[8] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[8] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[8] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[8]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[8]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[8]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[8]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[8]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[8]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET9-->

<div class="tab-pane" id="tab_10">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[9] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[9] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[9] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[9]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[9]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[9]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[9]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[9]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[9]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET10-->


<div class="tab-pane" id="tab_11">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[10] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[10] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[10] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[10]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[10]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[10]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[10]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[10]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[10]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET11-->

<div class="tab-pane" id="tab_12">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[11] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[11] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[11] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[11]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[11]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[11]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[11]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[11]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[11]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET12-->

<div class="tab-pane" id="tab_13">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[12] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[12] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[12] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[12]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[12]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[12]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[12]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[12]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[12]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET13-->

<div class="tab-pane" id="tab_14">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[13] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[13] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[13] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[13]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[13]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[13]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[13]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[13]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[13]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET14-->

<div class="tab-pane" id="tab_15">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[14] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[14] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[14] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[14]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[14]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[14]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[14]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[14]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[14]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET15-->

<div class="tab-pane" id="tab_16">
    <div class="progress progress-sm active">
        <div class="progress-bar progress-bar-success progress-bar-striped" title="Peratus rendah" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $LOW[15] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning progress-bar-striped" title="Peratus sederhana" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $MID[15] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-danger progress-bar-striped" title="Peratus tinggi" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="300" <?php echo 'style="width:'. $HIGH[15] . '%"'; ?>>
            <span class="sr-only"></span>
        </div>
    </div>

    <table class="table table-responsive">
        <tbody>
            <tr>
                <th>Warna</th>
                <th>Butir Skor Kreatif</th>
                <th>Peratusan Pelajar</th>
                <th>Bilangan Pelajar</th>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Tinggi ( 70 - 99 )</td>
                <td><span class="badge bg-red"><?php echo $HIGH[15]; ?> %</span></td>
                <td><span class="badge bg-red"><?php echo $tinggi_fakulti[15]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Sederhana ( 40 - 60 )</td>
                <td><span class="badge bg-yellow"><?php echo $MID[15]; ?> %</span></td>
                <td><span class="badge bg-yellow"><?php echo $sederhana_fakulti[15]; ?></span></td>
            </tr>
            <tr>
                <td>
                    <div class="progress progress-sm progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                </td>
                <td>Skor Rendah ( 1 - 30 )</td>
                <td><span class="badge bg-green"><?php echo $LOW[15]; ?> %</span></td>
                <td><span class="badge bg-green"><?php echo $rendah_fakulti[15]; ?></span></td>
            </tr>
            <tr>
                <td>

                </td>
                <td><strong>Jumlah Total Pelajar</strong></td>
                <td></td>
                <td><span class="badge bg-blue"><?php echo $bil; ?></span></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.tab-pane TRET16-->
