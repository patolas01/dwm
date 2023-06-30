<?php
include '../sqli/conn.php';

$nome_equipa = "";
$logo_equipa = "";
$nac_equipa = "";
$cat_equipa = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $nome_equipa = $_POST["nome_equipa"];
    $nac_equipa = $_POST["nac_equipa"];
    $cat_equipa = $_POST["cat_equipa"];

    $logo_equipa = $_FILES["foto"]["name"];
    $targetDir = "../img/";
    $targetFile = $targetDir . basename($_FILES["foto"]["name"]);

    do {
        if (empty($nome_equipa) || empty($nac_equipa) || empty($cat_equipa)) {
            $errorMessage = "Todos os campos precisam de estar preenchidos!";
            break;
        }

        // Validar nome_equipa field
        if (!preg_match("/^[a-zA-Z\s]*$/", $nome_equipa)) {
            $errorMessage = "O nome da equipa só pode conter letras e espaços.";
            break;
        }

        // Validar nac_equipa field
        if (!preg_match("/^[a-zA-Z\s]*$/", $nac_equipa)) {
            $errorMessage = "A nacionalidade da equipa só pode conter letras e espaços.";
            break;
        }
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
            // adicionar equipa a bd
            $sql = "INSERT INTO equipa(nome_equipa, logo_equipa,nac_equipa, cat_equipa) VALUES ('$nome_equipa', '$logo_equipa','$nac_equipa','$cat_equipa')";
            $result = $conn->query($sql);
            if (!$result) {
                $errorMessage = "Invalid query: " . $conn->error;
            } else {
                $successMessage = "Equipa adicionada!";
                header("location: equipas.php");
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
    <title>Criar Equipas</title>
    <?php include('bootstrapInc.php'); ?>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <div class="container my-5">
        <h2>Nova Equipa</h2>
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
                <label class="col-sm-3 col-form-label">Nome Equipa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome_equipa"
                        value="<?php echo $nome_equipa ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nacionalidade Equipa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nac_equipa" value="<?php echo $nac_equipa ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Categoria Equipa</label>
                <div class="col-sm-6">
                    <select id="categoria" name="cat_equipa" class="form-control">
                        <option value="">Escolher...</option>
                        <option value="f1" <?php if ($cat_equipa === "f1")
                            echo "selected"; ?>>F1</option>
                        <option value="wrc" <?php if ($cat_equipa === "wrc")
                            echo "selected"; ?>>WRC</option>
                        <option value="wec" <?php if ($cat_equipa === "wec")
                            echo "selected"; ?>>WEC</option>
                    </select>
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