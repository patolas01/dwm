<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Página Principal da Formula 1</title>
    <link rel="stylesheet" href="css/alex.css">
    <script></script>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="image">
        <img src="img/img_alex/backg.jpg">
        <!--Titulo-slogan-->
    </div>

    <div class="container noticias">
        <div class="card" style="width: 18rem;">
            <img src="img/img_alex/noticias1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Hamilton vence Bahrein</h5>
                <p class="card-text">Na primeira corrida da temporada de F1 2023,
                    Lewis Hamilton venceu o Grande Prêmio do Bahrein pela sétima vez ..</p>
                <a href="#" class="btn btn-primary">Ver Mais</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="img/img_alex/noticias2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Pista de Miami</h5>
                <p class="card-text">A F1 anunciou recentemente
                    que adicionou uma nova pista em Miami ao calendário de corridas de 2023...</p>
                <a href="#" class="btn btn-primary">Ver Mais</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="img/img_alex/noticias3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Equipas de F1</h5>
                <p class="card-text">As equipas de F1 aprovaram um novo regulamento que permitirá o uso de motores movidos a
                    combustão...  </p>
                <a href="#" class="btn btn-primary">Ver Mais</a>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#info").text("Atualizado em 18 de abril de 2023");
        });
    </script>

    <?php include "footer.php"; ?>
</body>

</html>