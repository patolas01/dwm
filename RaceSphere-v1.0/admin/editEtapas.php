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
                        <h3><?php echo "Editar etapa número ".$numero?></h3>
                        <p>Preencha o formulário</p>
                        <form action="editEtapas.php?id=<?= $editar ?>" action="POST" class="requires-validation" novalidate>
                        <div class="col-md-12">
                                Ronda etapa:
                                <input class="form-control" type="text" name="ronda" value=<?php echo "'" . $numero . "'" ?>>
                            </div>
                            <h5></h5>
                            <div class="col-md-12">
                                Dia Etapa:
                                <input class="form-control" onfocus="(this.type='date')" type="text" name="dia" value=<?php echo "'" . $dia . "'" ?>>
                            </div>
                            <div class="col-md-12">
                                Inicio Etapa:
                                <input class="form-control" onfocus="(this.type='tyme')" type="text" name="inicio" value=<?php echo "'" . $inicio . "'" ?>>
                            </div>
                            <div class="col-md-12">
                                Fim Etapa:
                                <input class="form-control" onfocus="(this.type='tyme')" type="text" name="fim" value=<?php echo "'" . $fim . "'" ?>>
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
        }else if($rondanovo==$numero){
            ?><script>$(document).ready(function () {
                $("#nomeCheck").hide();
            })</script><?php
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