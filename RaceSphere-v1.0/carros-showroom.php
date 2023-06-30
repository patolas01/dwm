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
    <title>Carros</title>
</head>

<body>
    <?php
    include 'navbar.php';
    include 'sqli/conn.php';

    // Obter marcas de carro distintas
    $queryMarcas = "SELECT DISTINCT marca_carro FROM carro";
    $resultadoMarcas = $conn->query($queryMarcas);
    $marcas = [];
    if ($resultadoMarcas->num_rows > 0) {
        while ($row = $resultadoMarcas->fetch_assoc()) {
            $marcas[] = $row["marca_carro"];
        }
    }
    ?>

    <div class="container">
    <h1 class="titulo">Carros</h1>
        <div class="row">
            <div id="pesquisa" class="col-12 col-md-4">
                <form action="" method="GET">
                    <div class="form-group">
                        <label for="marcaSelect">Marca:</label>
                        <select class="form-control" id="marcaSelect" name="marca">
                            <option value="">Todas as marcas</option>
                            <?php
                            foreach ($marcas as $marca) {
                                echo '<option value="' . $marca . '">' . $marca . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>
            <div class="col-12 col-md-8">
                <div class="card-container">
                    <div class="row">
                        <?php
                        // Construir a consulta SQL com base na marca selecionada (se houver)
                        $sql = "SELECT * FROM carro";
                        if (isset($_GET['marca']) && !empty($_GET['marca'])) {
                            $marcaSelecionada = $_GET['marca'];
                            $sql .= " WHERE marca_carro = '$marcaSelecionada'";
                        }

                        $resultado = $conn->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                $idCarro = $row["id_carro"];
                                $marca = $row["marca_carro"];
                                $modelo = $row["modelo_carro"];
                                $fotoCarro = $row["fotocarro"];
                                ?>

                                <div class="col-12 col-sm-4 col-md-4 mb-4">
                                    <div class="card card-sm">
                                        <img class="card-img-top card-image" src="img/bd-img/carrosimg/<?php echo $fotoCarro; ?>" alt="<?php echo $marca . ' ' . $modelo; ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $marca; ?></h5>
                                            <p class="card-text"><?php echo $modelo; ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="carro-info.php?id=<?php echo $idCarro; ?>">Ver mais informações</a>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        } else {
                            echo "Nenhum carro encontrado na base de dados.";
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