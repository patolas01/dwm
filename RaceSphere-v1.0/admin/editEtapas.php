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
    <script src="js/editEtapas.js"></script>
</head>

<body>
    <?php
    /*//se nao for admin
    if($_SESSION["cargo"]!="admin"){
        ?>
        <script>
                window.setTimeout(function () {
                    location.href = "index.php";
                }, 0);
            </script><?php
    }
    else{
        //tudo
    }*/
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
                            <h3>
                                <?php echo "Editar etapa número " . $numero ?>
                            </h3>
                            <p>Preencha o formulário</p>
                            <form action="editEtapas.php?id=<?= $editar ?>" action="POST" class="requires-validation"
                                novalidate>
                                <div class="col-md-12">
                                    Ronda etapa:
                                    <input class="form-control" type="text" name="ronda" value=<?php echo "'" . $numero . "'" ?>>
                                </div>
                                <div class="col-md-12">
                                    Dia Etapa:
                                    <input class="form-control" id="diaEtapa" onfocus="(this.type='date')" type="text"
                                        name="dia" value=<?php echo "'" . $dia . "'" ?>>
                                </div>
                                <h5 id="diaEtapaCheck"></h5>
                                <div class="col-md-12">
                                    Inicio Etapa:
                                    <input class="form-control" onfocus="(this.type='time')" type="text" name="inicio"
                                        id="horaInicio" value=<?php echo "'" . $inicio . "'" ?>>
                                </div>
                                <h5 id="horaInicioCheck"></h5>
                                <div class="col-md-12">
                                    Fim Etapa:
                                    <input class="form-control" onfocus="(this.type='time')" type="text" name="fim"
                                        id="horaFim" value=<?php echo "'" . $fim . "'" ?>>
                                </div>
                                <h5 id="horaFimCheck"></h5>
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
        $rondanovo = $_POST["ronda"];
        if ($dianovo == "") {
            $dianovo = $dia;
        }
        if ($inicionovo == "") {
            $inicionovo = $inicio;
        }
        if ($fimnovo == "") {
            $fimnovo = $fim;
        }
        if ($rondanovo == "") {
            $rondanovo = $numero;
        }
        // buscar datas das rondas anterior e seguinte
        $antes = $rondanovo - 1;
        $depois = $rondanovo + 1;
        $query1 = "SELECT etapa.*,inicio_prova FROM etapa left join prova on etapa.id_prova=prova.id_prova where num_etapa='$antes' and etapa.id_prova='$id_prova'";
        $result_set1 = $conn->query($query1);
        if ($result_set1) {
            if ($result_set1->num_rows == 0) {
                $dataAnterior = $row1['inicio_prova'];
            } else {
                while ($row1 = $result_set1->fetch_assoc()) {
                    $dataAnterior = $row1['dia_etapa'];

                }
            }
        }
        $query2 = "SELECT etapa.*,prova.fim_prova FROM etapa left join prova on etapa.id_prova=prova.id_prova where num_etapa='$depois' and etapa.id_prova='$id_prova'";
        $result_set2 = $conn->query($query2);
        if ($result_set2) {
            if ($result_set2->num_rows == 0) {
                while ($row2 = $result_set2->fetch_assoc()) {
                    $dataSeguinte = $row2['fim_prova'];
                }
            } else {
                while ($row2 = $result_set2->fetch_assoc()) {
                    $dataSeguinte = $row2['dia_etapa'];
                }
            }
        }
        $query = "SELECT * FROM etapa where num_etapa='$rondanovo' and id_prova='$id_prova'";
        $result_set = $conn->query($query);
        if ($result_set) {
            //$jaexiste = mysqli_num_rows($result_set); tentar isto
            if ($result_set->num_rows == 1 && $rondanovo != $numero) {
                ?>
                <script>alert("Esta ronda já existe");</script>
                <?php
            } elseif ($dianovo < $dataAnterior || $dianovo > $dataSeguinte) {
                ?>
                <script>alert("Data deve estar entre <?php echo $dataAnterior ?> e <?php echo $dataSeguinte ?>");</script>
                <?php

            } else {
                ?>
                <script>alert("Data minima-><?php echo $dataAnterior ?> Data manima-> <?php echo $dataSeguinte ?>Data inserida-> <?php echo $dataSeguinte ?>");</script>
                <?php
                $edit = "UPDATE etapa SET num_etapa='$rondanovo' , dia_etapa = '" . $dianovo . "' , inicio_etapa = '" . $inicionovo . "' , fim_etapa = '" . $fimnovo . "' WHERE etapa.id_etapa ='" . $editar . "'";
                $result_set = $conn->query($edit);
                if ($result_set) {
                    ?>
                    <script>
                        var id_prova = <?php echo $id_prova; ?>;
                        window.setTimeout(function () {
                            location.href = "etapasManagement.php?id=" + id_prova;
                        }, 0);
                    </script>
                    <?php
                } else {
                    echo "Query update mal feita";
                }
            }
        }

    }
    include '../footer.php';
    ?>
</body>

</html>