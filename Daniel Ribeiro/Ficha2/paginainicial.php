<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
  <script src="bootstrap-5.3.0-alpha1-dist/js/bootstrap.js"></script>
</head>

<body>
  <?php include 'index.php' ?>
  <div class="container-fluid">
    <div id="carouselExample" class="carousel slide">
      <h1>Cidade de Leiria</h1>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/img1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/img2.JPG" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/img3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="container-fluid text-start">
    <div class="row">
      <div class="col-10">
        <h1>Descrição</h1>
        <p>
          Leiria é uma cidade portuguesa, capital do distrito de Leiria, na
          província da Beira Litoral, sede da Comunidade Intermunicipal da Região de Leiria, no Centro de
          Portugal, com cerca de 63000 habitantes no seu perímetro urbano. Os habitantes desta cidade
          chamam-se leirienses ou coliponenses.
        </p>
        <p>
          É sede de um município com 565,09 km² de área e 128 616 habitantes (2021) subdividido
          em 18 freguesias, o que faz dele o segundo concelho mais populoso das Beiras, só superado por
          Coimbra. É limitado a norte/nordeste pelo concelho de Pombal, a leste pelo de Ourém, a sul pelos
          municípios de Batalha e Porto de Mós, a sudoeste pelo de Alcobaça, a oeste pelo concelho da
          Marinha Grande e a noroeste pelo Oceano Atlântico.
        </p>
      </div>
      <div class="col-sm-2">
        <h1>Estatísticas</h1>
        <ul>
          <li>565,09 km²</li>
          <li> 128 616 habitantes </li>
          <li>18 freguesias</li>
          <li>2400 código-postal</li>
        </ul>
      </div>
    </div>
  </div>
  <?php include 'footer.php' ?>
</body>

</html>