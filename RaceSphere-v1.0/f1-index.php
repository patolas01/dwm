<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Página Principal da Formula 1</title>
    <link rel="stylesheet" href="css/alex.css">
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
                <p class="card-text">As equipas de F1 aprovaram um novo regulamento que permitirá o uso de motores
                    movidos a
                    combustão... </p>
                <a href="#" class="btn btn-primary">Ver Mais</a>
            </div>
        </div>
    </div>

    <p id="info"></p>

    <p>A Fórmula 1, também conhecida como F1, é uma categoria de automobilismo de alto desempenho que envolve corridas
        de carros em circuitos ao redor do mundo. A F1 é considerada a categoria mais prestigiosa do automobilismo
        mundial, com equipes e pilotos de renome internacional competindo pelo título de Campeão Mundial de Pilotos e
        Construtores a cada temporada.

        Os carros de F1 são especialmente projetados para alcançar altas velocidades e oferecer desempenho excepcional
        em curvas e retas. Eles são equipados com motores potentes e tecnologias avançadas, tornando a F1 uma das
        categorias mais tecnologicamente avançadas do esporte a motor.

        Além disso, a F1 é uma categoria que envolve muito mais do que apenas pilotar carros em alta velocidade. Requer
        habilidades de pilotagem, estratégia de corrida, trabalho em equipe, engenharia e muito mais. Os fãs da F1 são
        atraídos pela emoção e pela competitividade da categoria, bem como pela tecnologia avançada e pelas estratégias
        de corrida envolvidas.

        A cada temporada, a F1 atrai milhões de espectadores de todo o mundo, com corridas emocionantes e disputas
        acirradas pelo título. Se você é um fã de esportes a motor ou simplesmente um entusiasta da tecnologia e da
        velocidade, a F1 é uma categoria que definitivamente vale a pena acompanhar.</p>
    <div class="Paragraph">
        <img src="img/img_alex/carrof1textoindex.jpg" alt="Imagem de um carro de F1">
    </div>


    <script>

        $(document).ready(function () {
            $("#info").text("Atualizado em 18 de abril de 2023, aqui você encontra as últimas notícias e resultados da temporada.");
        });
    </script>

    <?php include "footer.php"; ?>
</body>

</html>