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
    <title>Carros-Admin-Insert</title>
</head>

<body>
    <?php
    ob_start();
    include 'navbar.php';
    include '../sqli/conn.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar se a imagem foi enviada corretamente
        if (isset($_FILES['fotocarro'])) {
            $fotoNome = $_FILES['fotocarro']['name']; // Nome do arquivo enviado
            $fotoTipo = $_FILES['fotocarro']['type']; // Tipo do arquivo enviado
            $fotoTemp = $_FILES['fotocarro']['tmp_name']; // Localização temporária do arquivo

            // Verifica se o arquivo é uma imagem
            if ($fotoTipo == "image/jpeg" || $fotoTipo == "image/png" || $fotoTipo == "image/jpg") {
                // Define o diretório onde a imagem será armazenada
                $diretorio = "../img/bd-img/carrosimg/";

                // Gera um nome único para a imagem, por exemplo, usando um timestamp
                $fotocarro = time() . '_' . $fotoNome;

                // Move a imagem para o diretório desejado
                if (move_uploaded_file($fotoTemp, $diretorio . $fotocarro)) {

                    // Agora podemos inserir os dados no banco de dados
                    $marca_carro = $_POST['marca_carro'];
                    $modelo_carro = $_POST['modelo_carro'];
                    $ano_carro = $_POST['ano_carro'];
                    $trac_carro = $_POST['trac_carro'];
                    $caixa_carro = $_POST['caixa_carro'];
                    $comb_carro = $_POST['comb_carro'];
                    $cilind_carro = $_POST['cilind_carro'];
                    $hp_carro = $_POST['hp_carro'];
                    $desc_carro = $_POST['desc_carro'];

                    // Insere os dados no banco de dados
                    $sql = "INSERT INTO carro (marca_carro, modelo_carro, ano_carro, trac_carro, caixa_carro, comb_carro, cilind_carro, hp_carro, desc_carro, fotocarro)
                            VALUES ('$marca_carro', '$modelo_carro', '$ano_carro', '$trac_carro', '$caixa_carro', '$comb_carro', '$cilind_carro', '$hp_carro', '$desc_carro', '$fotocarro')";

                    if ($conn->query($sql) === TRUE) {
                        $mensagem = "Dados inseridos com sucesso!";
                        $corDeFundo = "green";
                        header("Location: carros-admin.php");
                    } else {
                        $mensagem = "Erro ao inserir os dados: " . $conn->error;
                        $corDeFundo = "red";
                    }
                } else {
                    $mensagem = "Erro ao salvar a imagem: " . $conn->error;
                    $corDeFundo = "red";
                }
            } else {
                $mensagem = "Arquivo não é uma imagem: " . $conn->error;
                $corDeFundo = "red";
            }
        } else {
            $mensagem = "Imagem não inserida: " . $conn->error;
            $corDeFundo = "red";
        }
    }
    ?>

    <div class="container mt-3">
        <div class="container mt-3">
            <h2 class="mt-5">
                Inserir Carro:
                <a href="carros-admin.php" class="btn btn-primary ml-3">Lista</a>
            </h2>
        </div>
        <form id="insert-form" method="POST" enctype="multipart/form-data">
            <div class="form-group col-md-10">
                <label for="marca_carro">Marca:</label>
                <input type="text" class="form-control" id="marca_carro" name="marca_carro" maxlength="50" required>
            </div>
            <div class="form-group col-md-10">
                <label for="modelo_carro">Modelo:</label>
                <input type="text" class="form-control" id="modelo_carro" name="modelo_carro" maxlength="60" required>
            </div>
            <div class="form-group col-md-10">
                <label for="ano_carro">Ano:</label>
                <input type="number" class="form-control" id="ano_carro" name="ano_carro" min="1900" max="2030" required>
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
                        echo "<option value='$option'>$option</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-10">
                <label for="caixa_carro">Tipo de Caixa:</label>
                <select class="form-control" id="caixa_carro" name="caixa_carro">
                    <?php
                    foreach ($caixa_carro_enum as $option) {
                        echo "<option value='$option'>$option</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-10">
                <label for="comb_carro">Tipo de Combustível:</label>
                <select class="form-control" id="comb_carro" name="comb_carro">
                    <?php
                    foreach ($comb_carro_enum as $option) {
                        echo "<option value='$option'>$option</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-10">
                <label for="cilind_carro">Cilindrada:</label>
                <input type="number" class="form-control" id="cilind_carro" name="cilind_carro" maxlength="4">
            </div>
            <div class="form-group col-md-10">
                <label for="hp_carro">Potência:</label>
                <input type="number" class="form-control" id="hp_carro" name="hp_carro" maxlength="4">
            </div>
            <div class="form-group col-md-10">
                <label for="desc_carro">Descrição:</label>
                <input type="text" class="form-control" id="desc_carro" name="desc_carro" required>
            </div>
            <div class="form-group col-md-10">
                <label for="fotocarro">Foto carro:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fotocarro" name="fotocarro" maxlength="255">
                    <label class="custom-file-label" for="fotocarro">Escolher arquivo</label>
                </div>
            </div>
            <button type="submit" id="insert-button" class="btn btn-primary">Inserir</button>
        </form>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
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