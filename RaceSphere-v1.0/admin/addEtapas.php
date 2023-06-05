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
    <script src="js/daniel.js"></script>
</head>

<body>
    <?php
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
                                <input class="form-control" type="date" name="dia" required>
                                <div class="valid-feedback">O campo dia é válido!</div>
                                <div class="invalid-feedback">O campo dia não pode estar a branco!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="time" name="inicio" required>
                                <div class="valid-feedback">A hora de inicio da etapa é valida!</div>
                                <div class="invalid-feedback">O campo de inicio de etapa não pode estar a branco!</div>
                            </div>

                            <div class="col-md-12">
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
                                            <option value=<?php echo "'".$row['id_prova']."'"?>><?php echo $row['nome_prova']; ?></option>
                                            <?php
                                        }
                                    } ?>
                                </select>
                                <div class="valid-feedback">Prova selecionado</div>
                                <div class="invalid-feedback">Por favor selecione uma prova</div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label">Eu confirmo que todas os campos estão preenchidos
                                    corretamente</label>
                                <div class="invalid-feedback">Por favor confirme que todos os dados estão corretos</div>
                            </div>


                            <div class="form-button mt-3">
                                <button name="enviar" type="submit" class="btn btn-primary">Registar</button>
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
        $emailNovoAdminPressman = $_POST["email_admin"];
        $nomeNovoAdminPressman = $_POST["email_admin"];
        $cargoNovoAdminPressman = $_POST["email_admin"];
        $passwordNovoAdminPressmanNaoEncriptada = $_POST["email_admin"];
    }
    ?>
</body>

</html>