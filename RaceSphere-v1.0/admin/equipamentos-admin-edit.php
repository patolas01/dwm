<?php
include '../sqli/conn.php';
if (isset($_GET['id_equipamento'])) {
    $id_equipamento = $_GET['id_equipamento'];
    $sql = "SELECT * FROM equipamento WHERE id_equipamento = '$id_equipamento'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome_equipamento = $row['nome_equipamento'];
        $desc_equipamento = $row['desc_equipamento'];
        $img_equipamento = $row['img_equipamento'];
    } else {
        echo "Equipamento não encontrado.";
        exit;
    }
} else {
    echo "ID do equipamento não especificado.";
    exit;
}

$mensagem = "";
$corDeFundo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_equipamento = $_POST['nome_equipamento'];
    $desc_equipamento = $_POST['desc_equipamento'];
    $img_equipamento = $_POST['img_equipamento'];

    $sql = "UPDATE equipamento SET nome_equipamento='$nome_equipamento', desc_equipamento='$desc_equipamento', img_equipamento='$img_equipamento' WHERE id_equipamento='$id_equipamento'";

    if ($conn->query($sql) === TRUE) {
        header("Location: equipamentos-admin.php");
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
    <title>Equipamentos-Admin-Edit</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container mt-3">
        <div class="container mt-3">
            <h2 class="mt-5">
                Atualizar Equipamento:
                <a href="equipamentos-admin.php" class="btn btn-primary ml-3">Lista</a>
            </h2>
        </div>
        <form id="insert-form" method="POST">
            <div class="form-group col-md-10">
                <label for="id_equipamento">ID:</label>
                <input type="text" class="form-control" id="id_equipamento" name="id_equipamento" value="<?php echo $id_equipamento; ?>" readonly disabled>
            </div>
            <div class="form-group col-md-10">
                <label for="nome_equipamento">Nome:</label>
                <input type="text" class="form-control" id="nome_equipamento" name="nome_equipamento" maxlength="50" required value="<?php echo $nome_equipamento; ?>">
            </div>
            
            <div class="form-group col-md-10">
                <label for="desc_equipamento">Descrição:</label>
                <input type="text" class="form-control" id="desc_equipamento" name="desc_equipamento" required value="<?php echo $desc_equipamento; ?>">
            </div>
            <div class="form-group col-md-10">
                <label for="img_equipamento">Foto equipamento:</label>
                <input type="file" class="form-control" id="img_equipamento" name="img_equipamento" maxlength="255" value="<?php echo $img_equipamento; ?>">
            </div>
            <button type="submit" id="update-button" class="btn btn-primary">Atualizar</button>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome_equipamento = $_POST['nome_equipamento'];
                $desc_equipamento = $_POST['desc_equipamento'];

                if ($_FILES['img_equipamento']['name']) {
                    $targetDir = "../img/bd-img/equipamentosimg/"; // Substitua pelo diretório onde deseja salvar as imagens
                    $targetFile = $targetDir . basename($_FILES['img_equipamento']['name']);
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                    // Verificar o tipo de arquivo
                    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
                        $mensagem = "Apenas arquivos JPG, JPEG e PNG são permitidos.";
                        $corDeFundo = "red";
                    } else {
                        if (move_uploaded_file($_FILES['img_equipamento']['tmp_name'], $targetFile)) {
                            $img_equipamento = pathinfo($_FILES['img_equipamento']['name'], PATHINFO_BASENAME);
                        } else {
                            $mensagem = "Erro ao fazer o upload da imagem.";
                            $corDeFundo = "red";
                        }
                    }
                }


                $sql = "UPDATE equipamento SET nome_equipamento='$nome_equipamento',  desc_equipamento='$desc_equipamento', img_equipamento='$img_equipamento' WHERE id_equipamento='$id_equipamento'";

                if ($conn->query($sql) === TRUE) {
                    $mensagem = "Dados atualizados com sucesso.";
                    $corDeFundo = "green";
                    header("Location: equipamentos-admin.php");
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