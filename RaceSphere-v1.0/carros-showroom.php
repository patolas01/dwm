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
    <title>Carros-Showroom</title>
</head>

<body>
    <?php
    include 'navbar.php';
    include 'sqli/conn.php';
    // Verifica se foi fornecido um ID de carro
    if (isset($_GET['idCarro'])) {
        $idCarro = $_GET['idCarro'];
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
        } else {
            echo "Carro não encontrado.";
            exit;
        }
    } else {
        // Obtém o primeiro carro da tabela
        $sql_select = "SELECT * FROM carro ORDER BY id_carro ASC LIMIT 1";
        $result = $conn->query($sql_select);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $idCarro = $row["id_carro"];
            $marca = $row["marca_carro"];
            $modelo = $row["modelo_carro"];
            $ano = $row["ano_carro"];
            $trac = $row["trac_carro"];
            $caixa = $row["caixa_carro"];
            $comb = $row["comb_carro"];
            $cilind = $row["cilind_carro"];
            $hp = $row["hp_carro"];
            $descricao = $row["desc_carro"];
        } else {
            echo "Não há carros disponíveis.";
            exit;
        }
    }
    ?>

    <div class="showroom">
        <div class="car-info">
            <div class="sidebar">
                <?php
                // Verifica se existe um carro anterior
                $sql_anterior = "SELECT * FROM carro WHERE id_carro < '$idCarro' ORDER BY id_carro DESC LIMIT 1";
                $result_anterior = $conn->query($sql_anterior);
                if ($result_anterior->num_rows > 0) {
                    $row_anterior = $result_anterior->fetch_assoc();
                    $idCarroAnterior = $row_anterior["id_carro"];
                    echo '<a href="?idCarro=' . $idCarroAnterior . '" class="btn">Anterior</a>';
                } else {
                    // Não há carro anterior, redireciona para o último carro
                    $sql_ultimo = "SELECT * FROM carro ORDER BY id_carro DESC LIMIT 1";
                    $result_ultimo = $conn->query($sql_ultimo);
                    $row_ultimo = $result_ultimo->fetch_assoc();
                    $idCarroUltimo = $row_ultimo["id_carro"];
                    echo '<a href="?idCarro=' . $idCarroUltimo . '" class="btn">Anterior</a>';
                }
                ?>

                <?php
                // Verifica se existe um próximo carro
                $sql_proximo = "SELECT * FROM carro WHERE id_carro > '$idCarro' ORDER BY id_carro ASC LIMIT 1";
                $result_proximo = $conn->query($sql_proximo);
                if ($result_proximo->num_rows > 0) {
                    $row_proximo = $result_proximo->fetch_assoc();
                    $idCarroProximo = $row_proximo["id_carro"];
                    echo '<a href="?idCarro=' . $idCarroProximo . '" class="btn">Próximo</a>';
                } else {
                    // Não há próximo carro, redireciona para o primeiro carro
                    $sql_primeiro = "SELECT * FROM carro ORDER BY id_carro ASC LIMIT 1";
                    $result_primeiro = $conn->query($sql_primeiro);
                    $row_primeiro = $result_primeiro->fetch_assoc();
                    $idCarroPrimeiro = $row_primeiro["id_carro"];
                    echo '<a href="?idCarro=' . $idCarroPrimeiro . '" class="btn">Próximo</a>';
                }
                ?>
            </div>
            <table>
                <tr>
                    <td colspan="2" class="car-details">
                        <h2><?php echo $marca . ' ' . $modelo; ?></h2>
                        <p>Ano: <?php echo $ano; ?></p>
                        <p>Tracção: <?php echo $trac; ?></p>
                        <p>Caixa: <?php echo $caixa; ?></p>
                        <p>Combustível: <?php echo $comb; ?></p>
                        <p>Cilindrada: <?php echo $cilind; ?></p>
                        <p>Potência: <?php echo $hp; ?></p>
                        <p>Descrição: <?php echo $descricao; ?></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    include 'footer.php';
    $conn->close();
    ?>
</body>

</html>