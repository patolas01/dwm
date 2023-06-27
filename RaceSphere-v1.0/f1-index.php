<!DOCTYPE html>
<html lang="pt">

<head>
<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Página Principal da Formula 1</title>
    <link rel="stylesheet" href="css/alex.css">
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="image-container">
        <img src="img/img_alex/imgtitulo.jpg" alt="Your Image" style="height: 350px; width: 100%; ">
        <div class="overlay">
            <img src="img/f1-logo.svg" alt="logo formula 1">
        </div>
    </div>

    <h1 class="news-title">Notícias de F1</h1>
    <br>

    <?php
    include('sqli/conn.php');

    $f1Query = "SELECT id_noticia, titulo_noticia, cat_noticia, DATE_FORMAT(data_noticia, '%m') AS mes,
DATE_FORMAT(data_noticia, '%d') AS dia, DATE_FORMAT(data_noticia, '%H') AS hora, DATE_FORMAT(data_noticia, '%i') AS
minuto, desc_noticia, thumb_noticia FROM noticias WHERE cat_noticia = 'F1' ORDER BY data_noticia DESC LIMIT 10";
    $f1Result = mysqli_query($conn, $f1Query);

    $count = 0;//Contador para não ter mais de 4 noticias
    
    if (mysqli_num_rows($f1Result) > 0) {
        echo '<div class="news-container">';
        while ($row = mysqli_fetch_assoc($f1Result)) {
            if ($count >= 4) {
                break;
            }

            echo '<div class="news-card catN-' . $row['cat_noticia'] . '" id="' . $row['id_noticia'] . '">';
            echo '<img src="img/bd-img/news/' . $row['thumb_noticia'] . '" class="news-card-img" alt="imagem da noticia">';
            echo '<div class="news-card-body">';
            echo '<p class="news-card-text"><small class="text-muted">' . $row['dia'] . '/' . $row['mes'] . ' - ' . $row['hora'] . ':' . $row['minuto'] . '</small></p>';
            echo '<h5 class="news-card-title just">' . $row['titulo_noticia'] . '</h5>';
            //echo '<p class="news-card-text">' . $row['desc_noticia'] . '</p>';
            echo '</div>';
            echo '</div>';

            $count++; // Increment the counter after displaying a news article
        }
        echo '</div>';
    } else {
        echo "Nenhuma notícia de F1 encontrada.";
    }

    mysqli_close($conn);
    ?>

    <div class="leaderboard">
        <div class="leaderboard-header">
            <h2>Classificações</h2>
        </div>
        <div class="podium">
            <div class="pilot">
                <img src="img/img_alex/sergio.jpg" alt="Pilot 2">
                <p>Sergio Perez</p>
            </div>

            <div class="pilot1st">
                <img src="img/img_alex/verstappen.jpg" alt="Pilot 1">
                <p>Max Verstappen</p>
            </div>

            <div class="pilot">
                <img src="img/img_alex/alonso.png" alt="Pilot 3">
                <p>Fernando Alonso</p>
            </div>
        </div>

        <ul>
            <li class="leaderboard-item" style="color: #F3D87A">
                <span class="position">1</span>
                <div>
                    <span class="team">Red Bull Racing - </span>
                    <span class="driver">Verstappen / Perez</span>
                </div>
                <span class="points">249 PTS</span>
            </li>
            <li class="leaderboard-item" style="color: #71706e">
                <span class="position">2</span>
                <div>
                    <span class="team">Aston Martin - </span>
                    <span class="driver">Alonso / Stroll</span>
                </div>
                <span class="points">120 PTS</span>
            </li>
            <li class="leaderboard-item" style="color: #CD7F32">
                <span class="position">3</span>
                <div>
                    <span class="team">Mercedes - </span>
                    <span class="driver">Hamilton / Rusell</span>
                </div>
                <span class="points">119 PTS</span>
            </li>
            <li class="leaderboard-item">
                <span class="position">4</span>
                <div>
                    <span class="team">Ferrari - </span>
                    <span class="driver">Leclerc / Sainz</span>
                </div>
                <span class="points">90 PTS</span>
            </li>
            <li class="leaderboard-item">
                <span class="position">5</span>
                <div>
                    <span class="team">Alpine - </span>
                    <span class="driver">Gasly / Ocon</span>
                </div>
                <span class="points">35 PTS</span>
            </li>
            <li class="leaderboard-item">
                <span class="position">6</span>
                <div>
                    <span class="team">McLaren - </span>
                    <span class="driver">Norris / Piastri</span>
                </div>
                <span class="points">17 PTS</span>
            </li>
            <li class="leaderboard-item">
                <span class="position">7</span>
                <div>
                    <span class="team">Haas - </span>
                    <span class="driver">Magnuseen / Hulkenberg</span>
                </div>
                <span class="points">8 PTS</span>
            </li>
            <li class="leaderboard-item">
                <span class="position">8</span>
                <div>
                    <span class="team">Alfa Romeo - </span>
                    <span class="driver">Bottas / Zhou</span>
                </div>
                <span class="points">6 PTS</span>
            </li>
            <li class="leaderboard-item">
                <span class="position">9</span>
                <div>
                    <span class="team">AlphaTauri - </span>
                    <span class="driver">Tsunoda / De Vries</span>
                </div>
                <span class="points">2 PTS</span>
            </li>
            <li class="leaderboard-item">
                <span class="position">10</span>
                <div>
                    <span class="team">Williams - </span>
                    <span class="driver">Albon / Sargeant</span>
                </div>
                <span class="points">1 PTS</span>
            </li>

        </ul>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>
