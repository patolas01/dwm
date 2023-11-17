<?php
include '../sqli/conn.php';

$nome_circuito = "";
$cidade_circuito = "";
$nac_circuito = "";
$layout_circuito = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $nome_circuito = $_POST["nome_circuito"];
    $cidade_circuito = $_POST["cidade_circuito"];
    $nac_circuito = $_POST["nac_circuito"];

    $layout_circuito = $_FILES["foto"]["name"];
    $targetDir = "../img/";
    $targetFile = $targetDir . basename($_FILES["foto"]["name"]);

    do {
        if (empty($nome_circuito) || empty($cidade_circuito) || empty($nac_circuito)) {
            $errorMessage = "Todos os campos precisam de estar preenchidos!";
            break;
        }

        if (!preg_match("/^[a-zA-Z\s]*$/", $nome_circuito)) {
            $errorMessage = "O nome do circuito só pode conter letras e espaços.";
            break;
        }

        if (!preg_match("/^[a-zA-Z\s]*$/", $cidade_circuito)) {
            $errorMessage = "A cidade do circuito só pode conter letras e espaços.";
            break;
        }

        if (!preg_match("/^[a-zA-Z\s]*$/", $nac_circuito)) {
            $errorMessage = "O pais do circuito só pode conter letras e espaços.";
            break;
        }
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
            // adicionar circuito a bd
            $sql = "INSERT INTO circuito(nome_circuito, layout_circuito,cidade_circuito, nac_circuito) VALUES ('$nome_circuito', '$layout_circuito','$cidade_circuito','$nac_circuito')";
            $result = $conn->query($sql);
            if (!$result) {
                $errorMessage = "Invalid query: " . $conn->error;
            } else {
                $successMessage = "Circuito adicionado!";
                header("location: circuitos.php");
                exit;
            }
        } else {

            $errorMessage = "Falha no upload do ficheiro.";
        }
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Circuitos</title>
    <?php include('bootstrapInc.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../alex.css">
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <div class="container my-5">
        <h2>Novo Circuito</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
               <div class= 'alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
               </div>            
         ";
        }
        ?>

        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome_circuito" value="<?php echo $nome_circuito ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Cidade</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cidade_circuito"
                        value="<?php echo $cidade_circuito ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Pais</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nac_circuito" value="<?php echo $nac_circuito ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="file-picker" class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-6">
                    <input type="file" name="foto" class="custom-file-input" id="file-picker" accept="image/*" required>
                    <label class="custom-file-label" for="file-picker" id="file-name">Escolher a foto...</label>
                </div>
                <div id="image-preview" class="col-sm-3"></div>
            </div>

            <script>
                var fileInput = document.getElementById("file-picker");
                var fileLabel = document.getElementById("file-name");
                var imagePreview = document.getElementById("image-preview");

                fileInput.addEventListener("change", function () {
                    var file = fileInput.files[0];

                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var imageUrl = e.target.result;
                            fileLabel.textContent = file.name;
                            imagePreview.innerHTML = '<img src="' + imageUrl + '" class="img-fluid">';
                        };
                        reader.readAsDataURL(file);
                    }
                });
            </script>



            <?php
            if (!empty($successMessage)) {
                echo "
                        <div class= 'row mb-3'>
                            <div class= 'offset-sm-3 col-sm-6'>
                             <div class= 'alert alert-success alert-dismissible fade show' role='alert'>
                              <strong>$successMessage</strong>
                              <button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button> 
                              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                             </div>
                            </div>
                        </div>
                    ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-1 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="equipas.php" role="button">Cancelar</a>
                </div>
        </form>
    </div>

</body>

</html>