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
    <script src="js/addEtapas.js"></script>
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
    ?>
    <div class="form-body1">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Nova Etapa</h3>
                        <p>Preencha o formulário</p>
                        <form action="addEtapas.php" action="POST" class="requires-validation" novalidate>
                            <div class="col-md-12">
                                Data etapa:
                                <input class="form-control" type="date" name="dia" required>
                                <div class="valid-feedback">O campo dia é válido!</div>
                                <div class="invalid-feedback">O campo dia não pode estar a branco!</div>
                            </div>

                            <div class="col-md-12">
                                Hora inicio etapa:
                                <input class="form-control" type="time" name="inicio" required>
                                <div class="valid-feedback">A hora de inicio da etapa é valida!</div>
                                <div class="invalid-feedback">O campo de inicio de etapa não pode estar a branco!</div>
                            </div>

                            <div class="col-md-12">
                                Hora fim etapa:
                                <input class="form-control" type="time" name="fim" required>
                                <div class="valid-feedback">A hora de fim da etapa é valida!</div>
                                <div class="invalid-feedback">O campo de fim de etapa não pode estar a branco!</div>
                            </div>

                            <div class="col-md-12">
                                <select name="prova" class="form-select mt-3" required>
                                    <option selected disabled value="">Prova</option>
                                    <?php
                                    $query = "Select id_prova, nome_prova from prova GROUP BY prova.nome_prova;";
                                    $result_set = $conn->query($query);
                                    if ($result_set) {
                                        while ($row = $result_set->fetch_assoc()) { ?>
                                            <option value=<?php echo "'" . $row['id_prova'] . "'" ?>><?php echo $row['nome_prova']; ?></option>
                                            <?php
                                        }
                                    } ?>
                                </select>
                                <div class="valid-feedback">Prova selecionado</div>
                                <div class="invalid-feedback">Por favor selecione uma prova</div>
                            </div>

    
                            <div class="form-button mt-3">
                            <input type="submit" value="Inserir" name="enviar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../footer.php';
    if (isset($_POST["enviar"])) {
        echo "PUTA ISTO FUNCIONA OU NAO?";
        $dianovo = $_POST["dia"];
        $inicionovo = $_POST["inicio"];
        $fimnovo = $_POST["fim"];
        $provanovo = $_POST["prova"];
        ?>
            <script>
                alert("Prova-><?php echo $provanovo ?> ");
            </script>
            <?php
        $query = "SELECT * FROM etapa  where id_prova = '$provanovo' ORDER BY num_etapa DESC limit 1";
        $result_set = $conn->query($query);
        if ($result_set) {
            if ($result_set->num_rows == 0) {
                $rondaSeguinte = 1;
            } else {
                while ($row = $result_set2->fetch_assoc()) {
                    $rondaSeguinte = $row['num_etapa'] + 1;
                }
            }
        }
        
        $query = "INSERT INTO etapa (id_etapa, num_etapa, dia_etapa,inicio_etapa,fim_etapa,id_prova) VALUES (NULL, '$rondaSeguinte', '$dianovo', '$inicionovo','$fimnovo','$provanovo')";
        $result_set = $conn->query($query);
        if ($result_set) {
            ?>
            <script>
                var id_prova = <?php echo $provanovo; ?>;
                window.setTimeout(function () {
                    location.href = "etapasManagement.php?id=" + id_prova;
                }, 0);
            </script>
            <?php
        }
    }
    ?>
</body>

</html>