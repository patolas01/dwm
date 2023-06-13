<?php
include '../sqli/conn.php';

$id_equipa = "";
$nome_equipa = "";
$nac_equipa = "";
$cat_equipa = "";
$logo_equipa = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id_equipa"])) {
        header("equipas.php");
        exit;
    }

    $id_equipa = $_GET["id_equipa"];

    $sql = "SELECT id_equipa, nome_equipa, nac_equipa, cat_equipa, logo_equipa FROM equipa WHERE id_equipa = $id_equipa";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    $row = $result->fetch_assoc();

    if (!$row) {
        header("equipas.php");
        exit;
    }

    $nome_equipa = $row["nome_equipa"];
    $nac_equipa = $row["nac_equipa"];
    $cat_equipa = $row["cat_equipa"];
    $logo_equipa = $row["logo_equipa"];
} else {
    $id_equipa = $_POST["id_equipa"];
    $nome_equipa = $_POST["nome_equipa"];
    $nac_equipa = $_POST["nac_equipa"];
    $cat_equipa = $_POST["cat_equipa"];
    $logo_equipa = $_FILES["logo_equipa"]["tmp_name"];


    do {
        if (empty($id_equipa) || empty($nome_equipa) || empty($nac_equipa) || empty($cat_equipa) || empty($logo_equipa)) {
            $errorMessage = "Todos os campos precisam de estar preenchidos!";
            break;
        }


        // Validate nome_equipa field
        if (!preg_match("/^[a-zA-Z\s]*$/", $nome_equipa)) {
            $errorMessage = "O nome da equipa só pode conter letras e espaços.";
            break;
        }

        // Validate nac_equipa field
        if (!preg_match("/^[a-zA-Z\s]*$/", $nac_equipa)) {
            $errorMessage = "A nacionalidade da equipa só pode conter letras e espaços.";
            break;
        }

            $stmt = $conn->prepare("UPDATE equipa SET nome_equipa = ?, nac_equipa = ?, cat_equipa = ? WHERE id_equipa = ?");
            $stmt->bind_param("sssi", $nome_equipa, $nac_equipa, $cat_equipa, $id_equipa);
        
            if (!$stmt->execute()) {
                $errorMessage = "Erro ao atualizar a equipa: " . $stmt->error;
                break;
            }

        $successMessage = "Equipa atualizada com sucesso!";
        header("Location: equipas.php");
        exit;
    
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <div class="container my-5">
        <h2>Atualizar Equipa</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
                <div class= 'alert alert-warning alert-dismissible fade show' role='alert'>
                 <strong>$errorMessage</strong>
                 <button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button> 
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>            
            ";

        }
        ?>

        <form method="post">
            <input type="hidden" name="id_equipa" value="<?php echo $id_equipa; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome Equipa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome_equipa" value="<?php echo $nome_equipa; ?>">
                    <span id="nome_equipa_error" class="text-danger"></span>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nacionalidade Equipa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nac_equipa" value="<?php echo $nac_equipa; ?>">
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
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="logo_equipa" class="custom-file-input" id="file-picker"
                                accept="image/*">
                            <label class="custom-file-label" for="file-picker" id="file-name">
                                <?php echo $logo_equipa; ?>
                            </label>
                        </div>
                    </div>
                </div>
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
                    "; // botao da versao 5 do bootstrap
        }
        ?>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="equipas.php" role="button">Cancelar</a>
            </div>
        </div>
        </form>
    </div>

</body>

</html>