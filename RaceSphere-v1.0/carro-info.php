<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <?php include('bootstrapInc.php'); ?>
    <link rel="stylesheet" href="css/luissilva.css">
    <title>Carro info</title>
</head>

<body>
    <?php
    include 'navbar.php';
    include 'sqli/conn.php';
    // Verifica se foi fornecido um ID de carro
    $idCarro = $_GET['id'];
    // Obtém os dados do carro pelo ID
    $sql_select = "SELECT * FROM carro WHERE id_carro = '$idCarro'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $marca = $row["marca_carro"];
        $modelo = $row["modelo_carro"];
        $ano = $row["ano_carro"];
        $trac = $row["trac_carro"];
        $caixa = $row["caixa_carro"];
        $comb = $row["comb_carro"];
        $cilind = $row["cilind_carro"];
        $hp = $row["hp_carro"];
        $descricao = $row["desc_carro"];
        $fotocarro = $row["fotocarro"];
    } else {
        echo "Carro não encontrado.";
        exit;
    }
    ?>

    <div class="showroom">
        <div class="car-info">
            <div class="car-image">
                <?php $fotocarro = $row["fotocarro"]; ?>
                <img src="img/bd-img/carrosimg/<?php echo $fotocarro; ?>" alt="<?php echo $marca . ' ' . $modelo; ?>">
            </div>
            <div class="car-details">
                <h2><?php echo $marca . ' ' . $modelo; ?></h2>
                <div class="row">
                    <div class="col-sm-6">
                        <p>Ano: <?php echo $ano; ?></p>
                        <p>Tracção: <?php echo $trac; ?></p>
                        <p>Caixa: <?php echo $caixa; ?></p>
                    </div>
                    <div class="col-sm-6">
                        <p>Combustível: <?php echo $comb; ?></p>
                        <p>Cilindrada: <?php echo $cilind; ?></p>
                        <p>Potência: <?php echo $hp; ?></p>
                    </div>
                </div>
                <div id="desc">
                    <h5>Descrição:</h5>
                    <p class="col-md-10"><?php echo $descricao; ?></p>
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