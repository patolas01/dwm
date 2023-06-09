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
    include 'sqli/conn.php';

    //buscar tempo neste momento
    $query = "SELECT CURRENT_TIMESTAMP";
    $result_set = $conn->query($query);
    if ($result_set) {
        while ($row = $result_set->fetch_assoc()) {
            $tempo = $row['CURRENT_TIMESTAMP'];
            //tirar horas minutos e segundos
            $data = substr($tempo, 0, 10);
        }
    }
    //buscar o ultimo evento
    $query = "SELECT id_prova, nome_prova, DATE_FORMAT(inicio_prova, '%y') AS ano, DATE_FORMAT(inicio_prova, '%d') AS dia1, DATE_FORMAT(inicio_prova, '%m') AS mes1, id_prova,nome_prova,DATE_FORMAT(fim_prova, '%d') AS dia2, logo_prova, DATE_FORMAT(fim_prova, '%m') AS mes2 FROM `prova` WHERE `inicio_prova` >= '$data' AND `categoria` = 'wrc' ORDER BY prova.inicio_prova DESC LIMIT 1";
    $result_set = $conn->query($query);
    if ($result_set) {
        while ($row = $result_set->fetch_assoc()) {
            $inicioProvaDia = $row['dia1'];
            $fimProvaDia = $row['dia2'];
            $logoProva = $row['logo_prova'];
            $nomeProva = $row['nome_prova'];
            $fimProvaMes = $row['mes2'];
            $inicioProvaMes = $row['mes1'];
            $anoProva = $row['ano'];
            $idProva = $row['id_prova'];
        }
    }

    switch ($inicioProvaMes) {
        case "1":
            $mesExtenso = "Janeiro";
            $mesExtensoInglês = "January";
            break;
        case "2":
            $mesExtenso = "Fevereiro";
            $mesExtensoInglês = "February";
            break;
        case "3":
            $mesExtenso = "Março";
            $mesExtensoInglês = "March";
            break;
        case "4":
            $mesExtenso = "Abril";
            $mesExtensoInglês = "April";
            break;
        case "5":
            $mesExtenso = "Maio";
            $mesExtensoInglês = "May";
            break;
        case "6":
            $mesExtenso = "Junho";
            $mesExtensoInglês = "June";
            break;
        case "7":
            $mesExtenso = "Julho";
            $mesExtensoInglês = "July";
            break;
        case "8":
            $mesExtenso = "Agosto";
            $mesExtensoInglês = "August";
            break;
        case "9":
            $mesExtenso = "Setembro";
            $mesExtensoInglês = "September";
            break;
        case "10":
            $mesExtenso = "Outubro";
            $mesExtensoInglês = "October";
            break;
        case "11":
            $mesExtenso = "Novembro";
            $mesExtensoInglês = "November";
            break;
        case "12":
            $mesExtenso = "Dezembro";
            $mesExtensoInglês = "December";
            break;
    }
    $tempo = $inicioProvaDia . " " . $mesExtensoInglês . " 20" . $anoProva . " 00:00:00 GMT+01:00";

    if ($inicioProvaMes != $fimProvaMes) {
        switch ($fimProvaMes) {
            case "1":
                $mesExtenso2 = "Janeiro";
                break;
            case "2":
                $mesExtenso2 = "Fevereiro";
                break;
            case "3":
                $mesExtenso2 = "Março";
                break;
            case "4":
                $mesExtenso2 = "Abril";
                break;
            case "5":
                $mesExtenso2 = "Maio";
                break;
            case "6":
                $mesExtenso2 = "Junho";
                break;
            case "7":
                $mesExtenso2 = "Julho";
                break;
            case "8":
                $mesExtenso2 = "Agosto";
                break;
            case "9":
                $mesExtenso2 = "Setembro";
                break;
            case "10":
                $mesExtenso2 = "Outubro";
                break;
            case "11":
                $mesExtenso2 = "Novembro";
                break;
            case "12":
                $mesExtenso2 = "Dezembro";
                break;
        }
    }
    ?>
    <div class="sticky-top" id="rightinfo">
        <div id="rightTitles">
            <h3 id="titulolateral">
                <?php echo $nomeProva ?>
            </h3>
            <h3 id="titulolateral">
                <?php
                if (!isset($mesExtenso2)) {
                    echo $inicioProvaDia . "-" . $fimProvaDia . " " . $mesExtenso;
                } else {
                    echo $inicioProvaDia . " " . $mesExtenso . "-" . $fimProvaDia . " " . $mesExtenso2;
                } ?>
            </h3>
        </div>

        <div class="timer" id="timer">
            <div id="logoEvento">
                <img src="img/bd-img/logos/<?php echo $logoProva ?>">
            </div>
            <div class="timer" id="days"></div>
            <div class="timer" id="hours"></div>
            <div class="timer" id="minutes"></div>
            <div class="timer" id="seconds"></div>
        </div>
        <div id="rightSchedule">
            <h3 id="titulolateral">Calendario do Evento</h3>
            <?php $query = "SELECT * FROM etapa where id_prova = '$idProva' LIMIT 3";
            $result_set = $conn->query($query);
            if ($result_set) {
                while ($row=$result_set->fetch_assoc()) { ?>
                <a href="rally-etapas.php?id=<?php echo $idProva ?>">
                    <div class="schedule">
                        
                        <?php
                        $diaFormatoTroll= strtotime($row['dia_etapa']);
                        $diaFormatoPortugal = date("d-m-Y", $diaFormatoTroll);
                        echo "Etapa ".$row['num_etapa']." dia ". $diaFormatoPortugal." das ".$row['inicio_etapa']." até às ".$row['fim_etapa']; ?> 
                    </div></a><br>
                    <?php
                }
                ?><a href="provaWrc.php"><div class="schedule" id="maisEtapas">
                    Mais provas <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </div></a>
                    <?php
            }
            ?>
        </div>
    </div>
    <div id="principal">
        <h1>WRC</h1>
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $query = "SELECT * FROM `noticias` ORDER BY noticias.id_noticia DESC limit 3";
                    $result_set = $conn->query($query);
                    if ($result_set) {
                        $count = 0;
                        while ($row = $result_set->fetch_assoc()) {
                            $count++;
                            if ($count == 3) {
                                $idTerceiraNoticia = $row['id_noticia'];
                                $idTerceiraNoticia--;
                            }
                            if ($count == 1) { ?>
                                
                                    <div class="carousel-item active"><a href="noticiaWRC.php?id=<?php echo $row['id_noticia'] ?>">
                                        <img src="img/bd-img/news/<?php echo $row['thumb_noticia'] ?>" class="d-block w-100"
                                            alt="Thumbnail noticia">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>
                                                <?php echo $row['titulo_noticia'] ?>
                                            </h5>
                                            <div class="descSlideshow">
                                                <p class="desc-slideshow">
                                                    <?php echo $row['desc_noticia'] ?>.
                                                </p>
                                            </div>
                                        </div>
                                    </a></div>
                                
                                <?php
                            } else { ?>
                                
                                    <div class="carousel-item "><a href="noticiaWRC.php?id=<?php echo $row['id_noticia'] ?>">
                                        <img src="img/bd-img/news/<?php echo $row['thumb_noticia'] ?>" class="d-block w-100"
                                            alt="Thumbnail noticia">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>
                                                <?php echo $row['titulo_noticia'] ?>
                                            </h5>
                                            <div class="descSlideshow">
                                                <p class="desc-slideshow">
                                                    <?php echo $row['desc_noticia'] ?>.
                                                </p>
                                            </div>
                                        </div>
                                    </a></div>
                                
                                <?php
                            }
                        }
                    } else {
                        ?>
                    <script>alert("Query mal feita")</script>
                    <?php
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <h2 class="middleTextTitle">
            Mais noticias
        </h2>
        <div class="container">
            <div class="row">
                <?php
                $query3 = "SELECT * FROM noticias where cat_noticia = 'wrc' ORDER BY id_noticia DESC limit 4";
                $result_set3 = $conn->query($query3);
                if ($result_set3) {
                    while ($row = $result_set3->fetch_assoc()) {
                        $imagemcarta = $row['thumb_noticia']
                            ?>
                        <div class="col-sm-3">
                            <div class="card" style="width: 18rem;">
                                <img src=<?php echo "'img/bd-img/news/$imagemcarta'"; ?> class="card-img-top" alt="fotoNoticia">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $row["titulo_noticia"]; ?>
                                    </h5>
                                    <p class="card-text ">
                                        <?php echo $row["desc_noticia"]; ?>
                                    </p>
                                </div>
                                <div class="card-body">
                                    <a href="noticiaWRC.php?id=<?php echo $row["id_noticia"]; ?>" class="btn btn-primary">Ver
                                        Noticia</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <input type="hidden" id="tempo" value="<?php echo $tempo ?>">
        </div>
    </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>