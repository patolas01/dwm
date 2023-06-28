<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaceSphere Rally</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'navbar.php';
    include 'sqli/conn.php';
    ?>
    <h1>Calendário WRC 2023 </h1>
    <div id="imagemCalendario"><img src="img/img_daniel/WRC-calendar-2023-map_2.jpg"></div>
    <div class="container text-center">
        <?php
        $contador = 4;
        $query = "Select * from prova where categoria='wrc' order by inicio_prova";
        $result_set = $conn->query($query);
        if ($result_set) {
            while ($row = $result_set->fetch_assoc()) {
                if ($contador == 4) {
                    $contador = 1;
                    ?>
                    <div class="row">
                    <?php } ?>
                    <div class="col">
                        <div class="nomeDaProva">
                            <?php echo $row['nome_prova'] ?>
                        </div>
                        <div class="fotoDaProva">
                            <img src=<?php echo "'img/bd-img/logos/" . $row['logo_prova'] . "'"; ?>>
                        </div>
                        <div class="localDaProva"><a href="rally-etapas.php?id=<?php echo $row['id_prova'] ?>" class="orange-btn">Resultados<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <?php if ($contador == 3) {
                        ?>
                    </div>
                    <?php
                    }
                    $contador++;
            }
        }
        if ($contador != 3) {
            ?>
        </div>
        <?php
        }
        ?>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>