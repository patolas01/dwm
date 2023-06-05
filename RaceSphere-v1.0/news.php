<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Notícias</title>
    <link rel="stylesheet" href="css/pauloLeal.css">
</head>

<body>
    <?php include('navbar.php'); ?>

    <h1 class="news">Notícias Principais</h1>

    <div class="newsBox">



        <?php
        include('sqli/conn.php');

        $query = "SELECT id_noticia, titulo_noticia, cat_noticia, DATE_FORMAT(data_noticia, '%m') AS mes, DATE_FORMAT(data_noticia, '%d') AS dia, DATE_FORMAT(data_noticia, '%H') AS hora, DATE_FORMAT(data_noticia, '%i') AS minuto, desc_noticia, thumb_noticia FROM noticias ORDER BY data_noticia";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card catN-'.$row['cat_noticia'].'" id="'.$row['id_noticia'].'">';
                echo '  <img src="img/bd-img/news/'.$row['thumb_noticia'].'" class="card-img-top" alt="imagem da noticia">';
                echo '  <div class="card-body">';
                echo '    <p class="card-text"><small class="text-muted">'.$row['dia'].'/'.$row['mes'].' - '.$row['hora'].':'.$row['minuto'].'</small></p>';
                echo '    <h5 class="card-title just">'.$row['titulo_noticia'].'</h5>';
                echo '    <p class="card-text">'.$row['desc_noticia'].'</p>';
                echo '  </div>';
                echo '</div>';
            }

        } else {
            echo "No records found.";
        }


        ?>

    </div>


    <?php include('footer.php'); ?>
</body>

</html>