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
    if($result_set){
        while ($row = $result_set->fetch_assoc()) {
            $tempo=$row['CURRENT_TIMESTAMP'];
            //tirar horas minutos e segundos
            $data = substr($tempo, 0,10);
        }
    }
    //buscar o ultimo evento
    $query = "SELECT DATE_FORMAT(inicio_prova, '%y') AS ano, DATE_FORMAT(inicio_prova, '%d') AS dia1, DATE_FORMAT(inicio_prova, '%m') AS mes1, id_prova,nome_prova,DATE_FORMAT(fim_prova, '%d') AS dia2, logo_prova, DATE_FORMAT(fim_prova, '%m') AS mes2 FROM `prova` WHERE `inicio_prova` <= '$data' AND `categoria` = 'wrc' ORDER BY prova.inicio_prova DESC LIMIT 1";
    $result_set = $conn->query($query);
    if($result_set){
        while ($row = $result_set->fetch_assoc()) {
            $inicioProvaDia=$row['dia1'];
            $fimProva=$row['fim_prova'];
            $logoProva=$row['logo_prova'];
        }
    }
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
        <h1>WRC</h1>
        <div id="winners">
            <div class="vencedor">
                <div class="vencedorDentro">
                    <div id="firstplace">
                        <h4>2º Lugar</h4>
                    </div>
                </div>
            </div>
            <div class="vencedor">
                <div class="vencedorDentro">
                    <div id="firstplace">
                        <h4>1º Lugar</h4>
                    </div>
                </div>
            </div>
            <div class="vencedor">
                <div class="vencedorDentro">
                    <div id="firstplace">
                        <h4>3º Lugar</h4>
                    </div>
                </div>
            </div>
        </div>
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
                                <a href="noticiaWRC.php?id=<?php echo $row['id_noticia'] ?>">
                                    <div class="carousel-item active">
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
                                    </div>
                                </a>
                                <?php
                            } else { ?>
                                <a href="noticiaWRC.php?id=<?php echo $row['id_noticia'] ?>">
                                    <div class="carousel-item">
                                        <img src="img/bd-img/news/<?php echo $row['thumb_noticia'] ?>" class="d-block w-100"
                                            alt="Thumbnail noticia">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>
                                                <?php echo $row['titulo_noticia'] ?>
                                            </h5>
                                            <div class="descSlideshow">
                                                <p class="desc-slideshow">
                                                    <?php echo $row['desc_noticia'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
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
    </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>