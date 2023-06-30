<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adição de Etapas</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="../css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/editEtapas.js"></script>
</head>

<body>
    <?php
    include 'navbar.php';
    if ($_SESSION["cargo"] != "admin" || !isset($_SESSION["cargo"])) {
        ?>
        <script>
            window.setTimeout(function () {
                location.href = "../index.php";
            }, 0);
        </script>
        <?php
    } else {


        
        include '../sqli/conn.php';
        $id_prova = $_GET['id'];
        ?>
        <form action="addEtapas.php?id=<?php echo $id_prova ?>" method="POST">
            <div class="form-body1">
                <div class="row">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items">
                                <h3>Nova etapa</h3>
                                <p>Preencha o formulário</p>
                                <form action="addEtapas.php?id=<?php echo $id_prova ?>" action="POST"
                                    class="requires-validation" novalidate>
                                    <div class="col-md-12">
                                        Dia Etapa:
                                        <input class="form-control" id="diaEtapa" type="date" name="dia">
                                    </div>
                                    <h5 id="diaEtapaCheck"></h5>
                                    <div class="col-md-12">
                                        Inicio Etapa:
                                        <input class="form-control" type="time" name="inicio" id="horaInicio">
                                    </div>
                                    <h5 id="horaInicioCheck"></h5>
                                    <div class="col-md-12">
                                        Fim Etapa:
                                        <input class="form-control" type="time" name="fim" id="horaFim">
                                    </div>
                                    <h5 id="horaFimCheck"></h5>
                                    <br>
                                    <div class="col-md-12">
                                        <input type="submit" value="Inserir" name="editar2">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <?php
        include '../footer.php';
        if (isset($_POST["editar2"])) {

            $dianovo = $_POST["dia"];
            $inicionovo = $_POST["inicio"];
            $fimnovo = $_POST["fim"];

            $query = "SELECT * FROM etapa  where id_prova = '$id_prova' ORDER BY num_etapa DESC limit 1";

            $result_set = $conn->query($query);

            if ($result_set) {

                if ($result_set->num_rows == 0) {
                    $rondaSeguinte = 1;
                } else {
                    while ($row = $result_set->fetch_assoc()) {
                        $rondaSeguinte = $row['num_etapa'] + 1;
                    }
                }
            }
            $query = "INSERT INTO etapa (id_etapa, num_etapa, dia_etapa,inicio_etapa,fim_etapa,id_prova) VALUES (NULL, '$rondaSeguinte', '$dianovo', '$inicionovo','$fimnovo','$id_prova')";
            $result_set = $conn->query($query);
            if ($result_set) {
                ?>
                <script>
                    var id_prova = <?php echo $id_prova; ?>;
                    window.setTimeout(function () {
                        location.href = "etapasManagement.php?id=" + id_prova;
                    }, 0);
                </script>
                <?php
            }
        }
    } ?>
</body>

</html>