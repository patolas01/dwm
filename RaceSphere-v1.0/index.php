<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Página Principal</title>
    <link rel="stylesheet" href="css/pauloLeal.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="resBack">
        <div class="results">
            <div class="outerCard">
                <img class="outerCard-img" src="img\wrc-logo.svg" alt="logotipo da categoria">
                <div class="resultCard" id="wrc">
                    <div class="place">
                        <div class="number">3</div>
                        <div class="driverPic" id="3"><img src="" alt="driver"></div>
                        <div class="driverName" id="3">
                            <h4 class="firstName"></h4>
                            <p class="lastName"></p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">1</div>
                        <div class="driverPic" id="1"><img src="" alt="driver"></div>
                        <div class="driverName" id="1">
                            <h4 class="firstName"></h4>
                            <p class="lastName"></p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">2</div>
                        <div class="driverPic" id="2"><img src="" alt="driver"></div>
                        <div class="driverName" id="2">
                            <h4 class="firstName"></h4>
                            <p class="lastName"></p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="outerCard">
                <img class="outerCard-img" src="img/f1-logo.svg" alt="logotipo da categoria">
                <div class="resultCard" id="f1">
                    <div class="place">
                        <div class="number">3</div>
                        <div class="driverPic" id="3"><img src="" alt="driver"></div>
                        <div class="driverName" id="3">
                            <h4 class="firstName"></h4>
                            <p class="lastName"></p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">1</div>
                        <div class="driverPic" id="1"><img src="" alt="driver"></div>
                        <div class="driverName" id="1">
                            <h4 class="firstName"></h4>
                            <p class="lastName"></p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">2</div>
                        <div class="driverPic" id="2"><img src="" alt="driver"></div>
                        <div class="driverName" id="2">
                            <h4 class="firstName"></h4>
                            <p class="lastName"></p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="outerCard">
                <img class="outerCard-img" src="img\wec-logo.png" alt="logotipo da categoria">
                <div class="resultCard" id="wec">
                    <div class="place">
                        <div class="number">3</div>
                        <div class="driverPic" id="3"><img src="" alt="driver"></div>
                        <div class="driverName" id="3">
                            <h4 class="firstName"></h4>
                            <p class="lastName"></p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">1</div>
                        <div class="driverPic" id="1"><img src="" alt="driver"></div>
                        <div class="driverName" id="1">
                            <h4 class="firstName"></h4>
                            <p class="lastName"></p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">2</div>
                        <div class="driverPic" id="2"><img src="" alt="driver"></div>
                        <div class="driverName" id="2">
                            <h4 class="firstName"></h4>
                            <p class="lastName"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1>Notícias</h1>
    <div class="newsBox">
        <?php
        include('sqli/conn.php');

        $query = "SELECT id_noticia, titulo_noticia, cat_noticia, DATE_FORMAT(data_noticia, '%m') AS mes, DATE_FORMAT(data_noticia, '%d') AS dia, DATE_FORMAT(data_noticia, '%H') AS hora, DATE_FORMAT(data_noticia, '%i') AS minuto, desc_noticia, thumb_noticia FROM noticias ORDER BY data_noticia LIMIT 4";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="newsBox">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card catN-' . $row['cat_noticia'] . '" id="' . $row['id_noticia'] . '">';
                echo '<img src="img/bd-img/news/' . $row['thumb_noticia'] . '" class="card-img-top" alt="imagem da noticia">';
                echo '<div class="card-body">';
                echo '<p class="card-text"><small class="text-muted">' . $row['dia'] . '/' . $row['mes'] . ' - ' . $row['hora'] . ':' . $row['minuto'] . '</small></p>';
                echo '<h5 class="card-title just">' . $row['titulo_noticia'] . '</h5>';
                echo '<p class="card-text">' . $row['desc_noticia'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "Nenhuma notícia encontrada";
        }

        mysqli_close($conn);
        ?>

    </div>
    <script src="jquery/main.js"></script>

    <?php include "footer.php"; ?>
</body>

</html>