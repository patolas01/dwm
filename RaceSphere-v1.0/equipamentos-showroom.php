<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <?php include('bootstrapInc.php'); ?>
    <link rel="stylesheet" href="css/luissilva.css">
    <title>Equipamento</title>
</head>

<body>
    <?php
    include 'navbar.php';
    include 'sqli/conn.php';

    // Obter nome de equipamento distintas
    $queryNome = "SELECT DISTINCT nome_equipamento FROM equipamento";
    $resultadoNome = $conn->query($queryNome);
    $nome = [];
    if ($resultadoNome->num_rows > 0) {
        while ($row = $resultadoNome->fetch_assoc()) {
            $nome[] = $row["nome_equipamento"];
        }
    }
    ?>

    <div class="container">
        <div class="row">
            <div id="pesquisa" class="col-12 col-md-4 mb-4">
                <form action="" method="GET">
                    <div class="form-group">
                        <label for="nomeSelect">Nome:</label>
                        <select class="form-control" id="nomeSelect" name="nome">
                            <option value="">Todos os nomes</option>
                            <?php
                            foreach ($nome as $nome) {
                                echo '<option value="' . $nome . '">' . $nome . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>
            <div class="col-12 col-md-8">
                <h1 class="titulo">Equipamentos</h1>

                <div class="card-container">
                    <div class="row">
                        <?php
                        // Construir a consulta SQL com base na nome selecionada (se houver)
                        $sql = "SELECT * FROM equipamento";
                        if (isset($_GET['nome']) && !empty($_GET['nome'])) {
                            $nomeSelecionada = $_GET['nome'];
                            $sql .= " WHERE nome_equipamento = '$nomeSelecionada'";
                        }

                        $resultado = $conn->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                $idEquipamento = $row["id_equipamento"];
                                $nome = $row["nome_equipamento"];
                                $fotoequipamento = $row["img_equipamento"];
                                ?>

                                <div class="col-12 col-sm-4 col-md-4 mb-4">
                                    <div class="card card-sm">
                                        <img class="card-img-top card-image" src="img/bd-img/equipamentosimg/<?php echo $fotoequipamento; ?>" alt="<?php echo $nome; ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $nome; ?></h5>
                                        </div>
                                        <div class="card-footer">
                                            <a href="equipamento-info.php?id=<?php echo $idEquipamento; ?>">Ver mais informações</a>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        } else {
                            echo "Nenhum equipamento encontrado na base de dados.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    $conn->close();
    ?>
</body>

</html>