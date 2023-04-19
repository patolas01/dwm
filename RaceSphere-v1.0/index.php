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
                        <div class="driverPic" id="3"><img src="img/perez.png" alt="driver"></div>
                        <div class="driverName" id="3">
                            <h4 class="firstName">Sergio</h4>
                            <p class="lastName">Perez</p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">1</div>
                        <div class="driverPic" id="1"><img src="img/max.png" alt="driver"></div>
                        <div class="driverName" id="1">
                            <h4 class="firstName">Max</h4>
                            <p class="lastName">Verstappen</p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">2</div>
                        <div class="driverPic" id="2"><img src="img/alo.png" alt="driver"></div>
                        <div class="driverName" id="2">
                            <h4 class="firstName">Fernando</h4>
                            <p class="lastName">Alonso</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="outerCard">
                <img class="outerCard-img" src="img/f1-logo.svg" alt="logotipo da categoria">
                <div class="resultCard" id="f1">
                    <div class="place">
                        <div class="number">3</div>
                        <div class="driverPic" id="3"><img src="img/perez.png" alt="driver"></div>
                        <div class="driverName" id="3">
                            <h4 class="firstName">Sergio</h4>
                            <p class="lastName">Perez</p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">1</div>
                        <div class="driverPic" id="1"><img src="img/max.png" alt="driver"></div>
                        <div class="driverName" id="1">
                            <h4 class="firstName">Max</h4>
                            <p class="lastName">Verstappen</p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">2</div>
                        <div class="driverPic" id="2"><img src="img/alo.png" alt="driver"></div>
                        <div class="driverName" id="2">
                            <h4 class="firstName">Fernando</h4>
                            <p class="lastName">Alonso</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="outerCard">
                <img class="outerCard-img" src="img\wec-logo.png" alt="logotipo da categoria">
                <div class="resultCard" id="wec">
                    <div class="place">
                        <div class="number">3</div>
                        <div class="driverPic" id="3"><img src="img/perez.png" alt="driver"></div>
                        <div class="driverName" id="3">
                            <h4 class="firstName">Sergio</h4>
                            <p class="lastName">Perez</p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">1</div>
                        <div class="driverPic" id="1"><img src="img/max.png" alt="driver"></div>
                        <div class="driverName" id="1">
                            <h4 class="firstName">Max</h4>
                            <p class="lastName">Verstappen</p>
                        </div>
                    </div>
                    <div class="place">
                        <div class="number">2</div>
                        <div class="driverPic" id="2"><img src="img/alo.png" alt="driver"></div>
                        <div class="driverName" id="2">
                            <h4 class="firstName">Fernando</h4>
                            <p class="lastName">Alonso</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h1>Notícias</h1>
    <div class="newsBox">
        <div class="card" id="news1">
            <img src="img/img_pauloL/not1.avif" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title just">Titulo da Notícia</h5>
                <p class="card-text">Descrição detalha e promenorizada, mas sucinta, do tema da noticia</p>
            </div>
        </div>
        <div class="card" id="news2">
            <img src="img/img_pauloL/not2.avif" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title just">Titulo da Notícia</h5>
                <p class="card-text">Descrição detalha e promenorizada, mas sucinta, do tema da noticia</p>
            </div>
        </div>
        <div class="card" id="news3">
            <img src="img/img_pauloL/not3.avif" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title just">Titulo da Notícia</h5>
                <p class="card-text">Descrição detalha e promenorizada, mas sucinta, do tema da noticia</p>
            </div>
        </div>
        <div class="card" id="news4">
            <img src="img/img_pauloL/not2.avif" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title just">Titulo da Notícia</h5>
                <p class="card-text">Descrição detalha e promenorizada, mas sucinta, do tema da noticia</p>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>