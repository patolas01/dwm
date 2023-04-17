<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaceSphere Rally</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="rally-index">
    <?php
    include 'navbar.php';
    ?>
    <div class="sticky-top" id="rightinfo">
        <div id="rightTitles">
            <h3 id="titulolateral">Vodafone Rally de Portugal 2023</h3>
            <h3 id="titulolateral">11-15 Abril</h3>
        </div>

        <div class="timer" id="timer">
            <div id="logoEvento">
                <img src="img/img_daniel/logo-vodafone-rally-de-portugal-2023.png">
            </div>
            <div class="timer" id="days"></div>
            <div class="timer" id="hours"></div>
            <div class="timer" id="minutes"></div>
            <div class="timer" id="seconds"></div>
        </div>
        <div id="rightSchedule">
            <h3 id="titulolateral">Calendario do Evento</h3>
            <div class="schedule">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            11 <span>Maio</span>
                        </div>
                        <div class="col-6">
                            Race <span>15:00</span>
                        </div>
                        <div class="col">
                            <div class="scheduleArrow">
                                <i id="seta" class="fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="schedule">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            12 <span>Maio</span>
                        </div>
                        <div class="col-6">
                            Sprint <span>15:00</span>
                        </div>
                        <div class="col">
                            <div class="scheduleArrow">
                                <i id="seta" class="fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="schedule">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            13 <span>Maio</span>
                        </div>
                        <div class="col-6">
                            Race <span>17:00</span>
                        </div>
                        <div class="col">
                            <div class="scheduleArrow">
                                <i id="seta" class="fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="schedule">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-9">
                            <div class="scheduleArrow">
                                Mais horários
                            </div>
                        </div>
                        <div class="col">
                            <div class="scheduleArrow">
                                <i id="seta" class="fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="principal">
        <h1>Rally Championships </h1>
        <div id="vencedor">
            <div id="vencedorDentro">
                <div id="firstplace">
                    <h4>1º Lugar</h4>
                </div>
            </div>
        </div>

        <div class="container-xxl text-center">
            <div class="row">
                <div class="col">
                    <div id="caixa1">
                        <div class="descricaoNoticia">Piloto e co-piloto morrem em despiste no Rally Villa de Tineo em
                            Espanha</div>
                    </div>
                </div>
                <div class="col">
                    <div id="caixa2">
                        <div class="descricaoNoticia">Vodafone Rally de Portugal renova excelência Ambiental FIA</div>
                    </div>
                </div>
                <div class="col">
                    <div id="caixa3">
                        <div class="descricaoNoticia">A ligação de Al-Attiyah ao Vodafone Rally de Portugal</div>
                    </div>
                </div>
                <div class="col">
                    <div id="caixa4">
                        <div class="descricaoNoticia">Kalle Rovanperä vence na Estónia e aumenta vantagem no Mundial de
                            ralis</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>