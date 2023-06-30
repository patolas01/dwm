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
    <title>Equipamentos-Admin-Insert</title>
</head>

<body>
    <?php
    ob_start();
    include 'navbar.php';
    include '../sqli/conn.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar se a imagem foi enviada corretamente
        if (isset($_FILES['img_equipamento'])) {
            $fotoNome = $_FILES['img_equipamento']['name']; // Nome do arquivo enviado
            $fotoTipo = $_FILES['img_equipamento']['type']; // Tipo do arquivo enviado
            $fotoTemp = $_FILES['img_equipamento']['tmp_name']; // Localização temporária do arquivo

            // Verifica se o arquivo é uma imagem
            if ($fotoTipo == "image/jpeg" || $fotoTipo == "image/png" || $fotoTipo == "image/jpg") {
                // Define o diretório onde a imagem será armazenada
                $diretorio = "../img/bd-img/equipamentosimg/";

                // Gera um nome único para a imagem, por exemplo, usando um timestamp
                $img_equipamento = time() . '_' . $fotoNome;

                // Move a imagem para o diretório desejado
                if (move_uploaded_file($fotoTemp, $diretorio . $img_equipamento)) {

                    // Agora podemos inserir os dados no banco de dados
                    $nome_equipamento = $_POST['nome_equipamento'];
                    $desc_equipamento = $_POST['desc_equipamento'];

                    // Insere os dados no banco de dados
                    $sql = "INSERT INTO equipamento (nome_equipamento, desc_equipamento, img_equipamento)
                            VALUES ('$nome_equipamento', '$desc_equipamento', '$img_equipamento')";

                    if ($conn->query($sql) === TRUE) {
                        $mensagem = "Dados inseridos com sucesso!";
                        $corDeFundo = "green";
                        header("Location: equipamentos-admin.php");
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
                Inserir Equipamento:
                <a href="equipamentos-admin.php" class="btn btn-primary ml-3">Lista</a>
            </h2>
        </div>
        <form id="insert-form" method="POST" enctype="multipart/form-data">
            <div class="form-group col-md-10">
                <label for="nome_equipamento">Nome:</label>
                <input type="text" class="form-control" id="nome_equipamento" name="nome_equipamento" maxlength="50" required>
            </div>
            <div class="form-group col-md-10">
                <label for="desc_equipamento">Descrição:</label>
                <input type="text" class="form-control" id="desc_equipamento" name="desc_equipamento" required>
            </div>
            <div class="form-group col-md-10">
                <label for="img_equipamento">Foto equipamento:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fotocarro" name="img_equipamento" maxlength="255">
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