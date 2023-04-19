<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>FIA WEC</title>
    <link rel="stylesheet" href="css/paulograca.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div id="left">
        <div id="newsTitle">
            <hr class="hrTitle">
            <h1> Noticias </h1>
            <hr class="hrTitle">
        </div>
        <div class="noticia">
            <img src="img/carroPeugeot.jpg" alt="Carro">
            <h3>WEC: PEUGEOT COM DECORAÇÃO ESPECIAL PARA LE MANS</h3>
        </div>
    </div>

    <div class="vl"></div>
    <div id="right">
        <div id="newsTitle">
            <hr class="hrTitle">
            <h1> Resultados </h1>
            <hr class="hrTitle">
        </div>
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            Última Corrida
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
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
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Penúltima Corrida
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
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
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Antepenúltima Corrida
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
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
            </div>
        </div>
    </div>
</body>

</html>