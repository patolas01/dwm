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
    <title>Equipamento info</title>
</head>

<body>
    <?php
    include 'navbar.php';
    include 'sqli/conn.php';
    // Verifica se foi fornecido um ID de equipamento
    $idEquipamento = $_GET['id'];
    // Obtém os dados do equipamento pelo ID
    $sql_select = "SELECT * FROM equipamento WHERE id_equipamento = '$idEquipamento'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nome_equipamento"];
        $descricao = $row["desc_equipamento"];
        $img_equipamento = $row["img_equipamento"];
    } else {
        echo "Equipamento não encontrado.";
        exit;
    }
    ?>

    <div class="showroom">
        <div class="car-info">
            <div class="car-image">
                <?php
                $img_equipamento = $row["img_equipamento"];
                ?>
                <img src="img/bd-img/equipamentosimg/<?php echo $img_equipamento; ?>" alt="<?php echo $nome; ?>">
            </div>
            <div class="car-details">
                <h2><?php echo $nome ?></h2>
                <div id="desc">
                    <h5>Descrição:</h5>
                    <p class="col-md-5"><?php echo $descricao; ?></p>
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