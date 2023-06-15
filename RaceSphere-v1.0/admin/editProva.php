<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de utilizadores</title>
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
    $editar = $_GET["id"];
    $query = "select * from prova where id_prova='" . $editar . "'";
    $result_set = $conn->query($query);
    if ($result_set) {
        while ($row = $result_set->fetch_assoc()) {
            $inicio = $row['inicio_prova'];
            $nome = $row['nome_prova'];
            $fim = $row['fim_prova'];
            $local = $row['local'];
            $categoria = $row['categoria'];
            $id_circuito = $row['id_circuito'];
        }
    }
    ?>
    <form action="editProva.php?id=<?= $editar ?>" method="POST">
        <div class="form-body1">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h3>Editar prova
                                <?php echo $nome ?>
                            </h3>
                            <p>Preencha o formulário</p>
                            <form action="editAdminPress.php?id=<?= $editar ?>" action="POST"
                                class="requires-validation" novalidate>

                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="nome" placeholder=<?php echo "'" . $nome . "'" ?>>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" onfocus="(this.type='date')" type="text" name="inicio"
                                        id="data_inicio" value=<?php echo "'" . $inicio . "'" ?>>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" onfocus="(this.type='date')" type="text" name="fim"
                                        id="data_fim" value=<?php echo "'" . $fim . "'" ?>>
                                    <h5 id="datafimcheck">
                                        
                                    </h5>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="local" placeholder=<?php echo "'" . $local . "'" ?>>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    if ($categoria == "f1") { ?>
                                        <select name="categoria" class="form-select mt-3" id="selectCategoria">
                                            <option value="f1" selected>Formula 1</option>
                                            <option value="wrc">World Rally Championship</option>
                                            <option value="wec">World Endurance Championship</option>
                                        </select><br>
                                        <?php
                                    } elseif ($categoria == "wrc") { ?>
                                        <select name="categoria" class="form-select mt-3" id="selectCategoria">
                                            <option value="f1">Formula 1</option>
                                            <option value="wrc" selected>World Rally Championship</option>
                                            <option value="wec">World Endurance Championship</option>
                                        </select><br>
                                        <?php
                                    } else {
                                        ?>
                                        <select name="categoria" class="form-select mt-3" id="selectCategoria">
                                            <option value="f1">Formula 1</option>
                                            <option value="wrc">World Rally Championship</option>
                                            <option value="wec" selected>World Endurance Championship</option>
                                        </select><br>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-12" id="id_circuitos">
                                    <select name="id_circuito" class="form-select mt-3">
                                        <?php
                                        $query = "select * from circuito";
                                        $result_set = $conn->query($query);
                                        if ($result_set) {
                                            while ($row = $result_set->fetch_assoc()) {
                                                $nome_circuito = $row['nome_circuito'];
                                                $id_circuito_tabela_circuitos = $row['id_circuito'];
                                                if ($id_circuito_tabela_circuitos == $id_circuito) {
                                                    ?>
                                                    <option value=<?php echo "'" . $id_circuito_tabela_circuitos . "'"; ?> selected>
                                                        <?php echo $nome_circuito; ?></option>
                                                <?php } else {
                                                    ?>
                                                    <option value=<?php echo "'" . $id_circuito_tabela_circuitos . "'"; ?>> <?php echo $nome_circuito; ?></option>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select><br><br>
                                </div><br>
                                <div class="col-md-12">
                                    <input type="submit" id="botaoeditar" value="Atualizar" name="editar2">
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
        $nomenovo = $_POST["nome"];
        $inicionovo = $_POST["inicio"];
        $fimnovo = $_POST["fim"];
        $localnovo = $_POST["local"];
        $categorianovo = $_POST["categoria"];
        $id_circuitonovo = $_POST['id_circuito'];
        if ($inicionovo == "") {
            $inicionovo = $inicio;
        }
        if ($localnovo == "") {
            $localnovo = $local;
        }
        if ($fimnovo == "") {
            $fimnovo = $fim;
        }
        if ($categorianovo == "") {
            $categorianovo = $categoria;
        }
        if ($nomenovo == "") {
            $nomenovo = $nome;
        }
        if ($nomenovo == "") {
            $nomenovo = $nome;
        }
        if ($id_circuitonovo == "") {
            $id_circuitonovo = $id_circuito;
        }
        if ($categorianovo == "wrc") {
            $edit = "UPDATE prova SET nome_prova = '$nomenovo' , inicio_prova = '$inicionovo', fim_prova = '$fimnovo', local = '$localnovo', categoria = '$categorianovo', id_circuito = NULL WHERE prova.id_prova = '$editar'";
        } else {
            $edit = "UPDATE prova SET nome_prova = '$nomenovo' , inicio_prova = '$inicionovo', fim_prova = '$fimnovo', local = '$localnovo', categoria = '$categorianovo', id_circuito = '$id_circuitonovo' WHERE prova.id_prova = '$editar'";
        }
        $result_set = $conn->query($edit);
        if ($result_set) {
            ?>
            <script>
                window.setTimeout(function () {
                    location.href = "provaManagement.php";
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