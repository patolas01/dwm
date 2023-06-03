<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Página Principal da Formula 1</title>
    <link rel="stylesheet" href="css/alex.css">
    <style>
        .image-container {
            height: 350px;
            width: 100%;
            position: relative;
            display: inline-block;
        }

        .image {
            height: 350px;
            width: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            height: 350px;
            width: 100%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.3);

            text-align: center;
        }

        .title {
            font-family: "Titillium font";
            font-size: 100px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 10px;
        }

        .leaderboard {
            font-family: Arial, sans-serif;
            width: 60%;
            margin: 0 auto;
            margin-top: 25px;
        }

        .leaderboard-header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .leaderboard-item {
            width: 100%;
            list-style-type: none;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            display: flex;
            align-items: center;
        }

        .position {
            font-weight: bold;
            margin-right: 10px;
        }

        .driver {
            font-weight: bold;
            flex-grow: 1;
        }

        .points {
            font-weight: bold;
            margin-left: auto;

        }

        .podium {
            display: flex;
            justify-content: center;
        }


        .pilot img {
            border: solid black;
            margin-top: 50px;
            border-radius: 50%;
            width: 250px;
            height: 250px;
            object-fit: cover;
            margin: 10px;
        }

        .pilot1st img {
            border: solid black;
            margin-top: 50px;
            border-radius: 50%;
            width: 300px;
            height: 300px;
            object-fit: cover;
            margin: 10px;
        }

        .pilot,
        .pilot1st p {
            font-size: 15pt;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        .text p {
            font-size: 11pt;
        }

        .noticias {
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .card {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="image-container">
        <img src="img/img_alex/imgtitulo.jpg" alt="Your Image" style="height: 350px; width: 100%; ">
        <div class="overlay">
            <h1 class="title">Formula 1 </h1>
        </div>
    </div>



    <div class="container noticias">
        <div class="card" style="width: 17rem;">
            <img src="img/img_alex/noticias3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Equipas de F1</h5>
                <p class="card-text">As equipas de F1 aprovaram um novo regulamento que permitirá o uso de motores
                    movidos a
                    combustão... </p>
                <a href="#" class="btn btn-primary">Ver Mais</a>
            </div>
        </div>

        <div class="card" style="width: 17rem;">
            <img src="img/img_alex/noticias3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Equipas de F1</h5>
                <p class="card-text">As equipas de F1 aprovaram um novo regulamento que permitirá o uso de motores
                    movidos a
                    combustão... </p>
                <a href="#" class="btn btn-primary">Ver Mais</a>
            </div>
        </div>

        <div class="card" style="width: 17rem;">
            <img src="img/img_alex/noticias3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Equipas de F1</h5>
                <p class="card-text">As equipas de F1 aprovaram um novo regulamento que permitirá o uso de motores
                    movidos a
                    combustão... </p>
                <a href="#" class="btn btn-primary">Ver Mais</a>
            </div>
        </div>

        <div class="card" style="width: 17rem;">
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
            <li class="leaderboard-item">
                <span class="position">1</span>
                <div>
                    <span class="team">Red Bull Racing - </span>
                    <span class="driver">Verstappen / Perez</span>
                </div>
                <span class="points">249 PTS</span>
            </li>
            <li class="leaderboard-item">
                <span class="position">2</span>
                <div>
                    <span class="team">Aston Martin - </span>
                    <span class="driver">Alonso / Stroll</span>
                </div>
                <span class="points">120 PTS</span>
            </li>
            <li class="leaderboard-item">
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