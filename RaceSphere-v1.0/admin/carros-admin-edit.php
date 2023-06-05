<?php
include '../sqli/conn.php';
if (isset($_GET['id_carro'])) {
    $id_carro = $_GET['id_carro'];
    $sql = "SELECT * FROM carro WHERE id_carro = '$id_carro'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $marca_carro = $row['marca_carro'];
        $modelo_carro = $row['modelo_carro'];
        $ano_carro = $row['ano_carro'];
        $trac_carro = $row['trac_carro'];
        $caixa_carro = $row['caixa_carro'];
        $comb_carro = $row['comb_carro'];
        $cilind_carro = $row['cilind_carro'];
        $hp_carro = $row['hp_carro'];
        $desc_carro = $row['desc_carro'];
        $fotocarro = $row['fotocarro'];
    } else {
        echo "Carro não encontrado.";
        exit;
    }
} else {
    echo "ID do carro não especificado.";
    exit;
}

$mensagem = "";
$corDeFundo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca_carro = $_POST['marca_carro'];
    $modelo_carro = $_POST['modelo_carro'];
    $ano_carro = $_POST['ano_carro'];
    $trac_carro = $_POST['trac_carro'];
    $caixa_carro = $_POST['caixa_carro'];
    $comb_carro = $_POST['comb_carro'];
    $cilind_carro = $_POST['cilind_carro'];
    $hp_carro = $_POST['hp_carro'];
    $desc_carro = $_POST['desc_carro'];
    $fotocarro = $_POST['fotocarro'];

    $sql = "UPDATE carro SET marca_carro='$marca_carro', modelo_carro='$modelo_carro', ano_carro='$ano_carro', trac_carro='$trac_carro', caixa_carro='$caixa_carro', comb_carro='$comb_carro', cilind_carro='$cilind_carro', hp_carro='$hp_carro', desc_carro='$desc_carro', fotocarro='$fotocarro' WHERE id_carro='$id_carro'";

    if ($conn->query($sql) === TRUE) {
        header("Location: carros-admin.php");
        exit;
    } else {
        $mensagem = "Erro ao atualizar os dados: " . $conn->error;
        $corDeFundo = "red";
    }
}
?>
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
    <link rel="stylesheet" href="../css/luissilva.css">
    <title>Carros-Admin-Edit</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container mt-3">
        <div class="container mt-3">
            <h2 class="mt-5">
                Atualizar Carro:
                <a href="carros-admin.php" class="btn btn-primary ml-3">Lista</a>
            </h2>
        </div>
        <form id="insert-form" method="POST">
            <div class="form-group col-md-10">
                <label for="id_carro">ID:</label>
                <input type="text" class="form-control" id="id_carro" name="id_carro" value="<?php echo $id_carro; ?>" readonly disabled>
            </div>
            <div class="form-group col-md-10">
                <label for="marca_carro">Marca:</label>
                <input type="text" class="form-control" id="marca_carro" name="marca_carro" maxlength="50" required value="<?php echo $marca_carro; ?>">
            </div>
            <div class="form-group col-md-10">
                <label for="modelo_carro">Modelo:</label>
                <input type="text" class="form-control" id="modelo_carro" name="modelo_carro" maxlength="60" required value="<?php echo $modelo_carro; ?>">
            </div>
            <div class="form-group col-md-10">
                <label for="ano_carro">Ano:</label>
                <input type="number" class="form-control" id="ano_carro" name="ano_carro" required value="<?php echo $ano_carro; ?>">
            </div>
            <?php
            $sql_enum_values = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'carro' AND COLUMN_NAME IN ('trac_carro', 'caixa_carro', 'comb_carro')";
            $result_enum_values = $conn->query($sql_enum_values);
            $enum_values = array();

            while ($row = $result_enum_values->fetch_assoc()) {
                $enum_values[] = $row['COLUMN_TYPE'];
            }

            $trac_carro_enum = extract_enum_values($enum_values[0]);
            $caixa_carro_enum = extract_enum_values($enum_values[1]);
            $comb_carro_enum = extract_enum_values($enum_values[2]);

            function extract_enum_values($enum_definition)
            {
                preg_match("/^enum\(\'(.*)\'\)$/", $enum_definition, $matches);
                $enum_values = explode("','", $matches[1]);
                return $enum_values;
            }
            ?>
            <div class="form-group col-md-10">
                <label for="trac_carro">Tipo de Tração:</label>
                <select class="form-control" id="trac_carro" name="trac_carro">
                    <?php
                    foreach ($trac_carro_enum as $option) {
                        echo "<option value='$option' " . ($trac_carro == $option ? "selected" : "") . ">$option</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-10">
                <label for="caixa_carro">Tipo de Caixa:</label>
                <select class="form-control" id="caixa_carro" name="caixa_carro">
                    <?php
                    foreach ($caixa_carro_enum as $option) {
                        echo "<option value='$option' " . ($caixa_carro == $option ? "selected" : "") . ">$option</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-10">
                <label for="comb_carro">Tipo de Combustível:</label>
                <select class="form-control" id="comb_carro" name="comb_carro">
                    <?php
                    foreach ($comb_carro_enum as $option) {
                        echo "<option value='$option' " . ($comb_carro == $option ? "selected" : "") . ">$option</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-10">
                <label for="cilind_carro">Cilindrada:</label>
                <input type="number" class="form-control" id="cilind_carro" name="cilind_carro" value="<?php echo $cilind_carro; ?>">
            </div>
            <div class="form-group col-md-10">
                <label for="hp_carro">Potência:</label>
                <input type="number" class="form-control" id="hp_carro" name="hp_carro" value="<?php echo $hp_carro; ?>">
            </div>
            <div class="form-group col-md-10">
                <label for="desc_carro">Descrição:</label>
                <input type="text" class="form-control" id="desc_carro" name="desc_carro" required value="<?php echo $desc_carro; ?>">
            </div>
            <div class="form-group col-md-10">
                <label for="fotocarro">Id foto carro:</label>
                <input type="text" class="form-control" id="fotocarro" name="fotocarro" value="<?php echo $fotocarro ; ?>">
            </div>
            <button type="submit" id="update-button" class="btn btn-primary">Atualizar</button>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $marca_carro = $_POST['marca_carro'];
                $modelo_carro = $_POST['modelo_carro'];
                $ano_carro = $_POST['ano_carro'];
                $trac_carro = $_POST['trac_carro'];
                $caixa_carro = $_POST['caixa_carro'];
                $comb_carro = $_POST['comb_carro'];
                $cilind_carro = $_POST['cilind_carro'];
                $hp_carro = $_POST['hp_carro'];
                $desc_carro = $_POST['desc_carro'];
                $fotocarro = $row["fotocarro"];

                $sql = "UPDATE carro SET marca_carro='$marca_carro', modelo_carro='$modelo_carro', ano_carro='$ano_carro', trac_carro='$trac_carro', caixa_carro='$caixa_carro', comb_carro='$comb_carro', cilind_carro='$cilind_carro', hp_carro='$hp_carro', desc_carro='$desc_carro', fotocarro='$fotocarro' WHERE id_carro='$id_carro'";

                if ($conn->query($sql) === TRUE) {
                    $mensagem = "Dados atualizados com sucesso.";
                    $corDeFundo = "green";
                    header("Location: carros-admin.php");
                    exit;
                } else {
                    $mensagem = "Erro ao atualizar os dados: " . $conn->error;
                    $corDeFundo = "red";
                }
            }
            ?>
        </form>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
<script src="js/carros-admin.js"></script>
<script>
    var mensagem = "<?php echo $mensagem; ?>";
    var corDeFundo = "<?php echo $corDeFundo; ?>";
    var mensagemElement = document.createElement("div");
    mensagemElement.textContent = mensagem;
    mensagemElement.style.backgroundColor = corDeFundo;
    mensagemElement.style.color = "white";
    mensagemElement.style.position = "fixed";
    mensagemElement.style.top = "60px";
    mensagemElement.style.right = "10px";
    mensagemElement.style.padding = "10px";
    mensagemElement.style.borderRadius = "5px";
    document.body.appendChild(mensagemElement);

    setTimeout(function() {
        mensagemElement.parentNode.removeChild(mensagemElement);
    }, 5000);
</script>

</html>