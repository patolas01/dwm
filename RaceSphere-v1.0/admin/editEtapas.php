<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de etapas</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="../css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'navbar.php';
    include '../sqli/conn.php';
    $editar = $_GET["id"];
    $query = "select * from etapa where id_etapa='" . $editar . "'";
    $result_set = $conn->query($query);
    if ($result_set) {
        while ($row = $result_set->fetch_assoc()) {
            $dia = $row['dia_etapa'];
            $inicio = $row['inicio_etapa'];
            $fim = $row['fim_etapa'];
            $numero = $row['num_etapa'];
            $id_prova = $row['id_prova'];
        }
    }
    ?>
     <form action="editEtapas.php?id=<?= $editar ?>" method="POST">
    <div class="form-body1">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Nova Etapa</h3>
                        <p>Preencha o formulário</p>
                        <form action="editEtapas.php?id=<?= $editar ?>" action="POST" class="requires-validation" novalidate>

                            <div class="col-md-12">
                                Dia Etapa:
                                <input class="form-control" type="date" name="dia" placeholder=<?php echo "'" . $dia . "'" ?>>
                            </div>
                            <div class="col-md-12">
                                Inicio Etapa:
                                <input class="form-control" type="time" name="inicio" placeholder=<?php echo "'" . $inicio . "'" ?>>
                            </div>
                            <div class="col-md-12">
                                Fim Etapa:
                                <input class="form-control" type="time" name="fim" placeholder=<?php echo "'" . $fim . "'" ?>>
                            </div>

        <br>
                            <div class="col-md-12">
                                <input type="submit" value="Atualizar" name="editar2">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    </form>
    <?php
    if (isset($_POST["editar2"])) {
        $dianovo = $_POST["dia"];
        $inicionovo = $_POST["inicio"];
        $fimnovo = $_POST["fim"];
        if ($dianovo == "") {
            $dianovo = $dia;
        }
        if ($inicionovo == "") {
            $inicionovo = $inicio;
        }
        if ($fimnovo == "") {
            $fimnovo = $fim;
        }
        $edit = "UPDATE etapa SET dia_etapa = '" . $dianovo . "' , inicio_etapa = '" . $inicionovo . "' , fim_etapa = '" . $fimnovo . "' WHERE etapa.id_etapa ='" . $editar . "'";
        $result_set = $conn->query($edit);
        if ($result_set) {
            ?>
            <script>
                var id_prova =<?php echo $id_prova; ?>;
                window.setTimeout(function () {
                    location.href = "etapasManagement.php?id="+ id_prova;
                }, 0);
            </script>
            <?php
        } else {
            echo "Query update mal feita";
        }
    }
    include '../footer.php';
    ?>
</body>

</html>