<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Notícias</title>
    <link rel="stylesheet" href="css/pauloLeal.css">
</head>

<body>
    <?php include('navbar.php'); ?>

    <?php
    include('sqli/conn.php');

    $query = "SELECT id_noticia, titulo_noticia, cat_noticia, DATE_FORMAT(data_noticia, '%m') AS mes,
    DATE_FORMAT(data_noticia, '%d') AS dia, DATE_FORMAT(data_noticia, '%H') AS hora, DATE_FORMAT(data_noticia, '%i') AS
    minuto, desc_noticia, thumb_noticia FROM noticias ORDER BY data_noticia";
    $result = mysqli_query($conn, $query);

    // Fetch the four most recent news items
    $carouselItems = [];
    $cardItems = [];
    $vertItems = [];

    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($count < 4) {
            $carouselItems[] = $row;
        }
        if ($count > 3 && $count < 7) {
            $vertItems[] = $row;
        }
        if ($count > 6) {
            $cardItems[] = $row;
        }
        $count++;
    } ?>
 <h1 class="news">Notícias Principais</h1>
 <br>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="bd-example w-100">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php
                            $active = true;
                            foreach ($carouselItems as $index => $item) {
                                $indicatorClass = $active ? "active" : "";
                                echo '<li data-target="#carouselExampleCaptions" data-slide-to="' . $index . '" class="' . $indicatorClass . '"></li>';
                                $active = false;
                            }
                            ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            $active = true;
                            foreach ($carouselItems as $index => $item) {
                                $itemClass = $active ? "active" : "";
                                echo '<div class="carousel-item ' . $itemClass . '">';
                                echo '<img src="img/bd-img/news/' . $item["thumb_noticia"] . '" class="d-block w-100" alt="imagem de noticia">';
                                echo '<div class="carousel-caption d-none d-md-block">';
                                echo '<h5>' . $item["titulo_noticia"] . '</h5>';
                                echo '<p>' . $item["desc_noticia"] . '</p>';
                                echo '</div>';
                                echo '</div>';
                                $active = false;
                            }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="row">
                    <?php
                    foreach ($vertItems as $item) {
                        echo '<div class="col-md-12">';
                        echo '<div class="card mb-3 catN-' . $item['cat_noticia'] . '" id="' . $item['id_noticia'] . '">';
                        echo '<div class="row no-gutters">';
                        echo '<div class="col-md-4">';
                        echo '<img src="img/bd-img/news/' . $item['thumb_noticia'] . '" class="card-img" alt="imagem da noticia">';
                        echo '</div>';
                        echo '<div class="col-md-8">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text"><small class="text-muted">' . $item['dia'] . '/' . $item['mes'] . ' - ' . $item['hora'] . ':' . $item['minuto'] . '</small></p>';
                        echo '<h5 class="card-title just">' . $item['titulo_noticia'] . '</h5>';
                        echo '<p class="card-text">' . $item['desc_noticia'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="newsBox">
        <?php
        foreach ($cardItems as $item) {
            echo '<div class="card catN-' . $item['cat_noticia'] . '" id="' . $item['id_noticia'] . '">';
            echo '<img src="img/bd-img/news/' . $item['thumb_noticia'] . '" class="card-img-top" alt="imagem da noticia">';
            echo '<div class="card-body">';
            echo '<p class="card-text"><small class="text-muted">' . $item['dia'] . '/' . $item['mes'] . ' - ' . $item['hora'] . ':' . $item['minuto'] . '</small></p>';
            echo '<h5 class="card-title just">' . $item['titulo_noticia'] . '</h5>';
            echo '<p class="card-text">' . $item['desc_noticia'] . '</p>';
            echo '</div>';
            echo '</div>';
        }

        if (empty($carouselItems) && empty($cardItems)) {
            echo "Nenhuma notícia encontrada";
        }
        ?>
    </div>


    <?php include('footer.php'); ?>
</body>

</html>