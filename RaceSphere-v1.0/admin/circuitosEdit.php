<?php
include '../sqli/conn.php';

$id_circuito = "";
$nome_circuito = "";
$cidade_circuito = "";
$nac_circuito = "";
$layout_circuito = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id_circuito"])) {
        header("Location: circuitos.php");
        exit;
    }

    $id_circuito = $_GET["id_circuito"];

    $sql = "SELECT id_circuito, nome_circuito, cidade_circuito, nac_circuito, layout_circuito FROM circuito WHERE id_circuito = $id_circuito";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: circuitos.php");
        exit;
    }

    $nome_circuito = $row["nome_circuito"];
    $cidade_circuito = $row["cidade_circuito"];
    $nac_circuito = $row["nac_circuito"];
    $layout_circuito = $row["layout_circuito"];
} else {
    $id_circuito = $_POST["id_circuito"];
    $nome_circuito = $_POST["nome_circuito"];
    $cidade_circuito = $_POST["cidade_circuito"];
    $nac_circuito = $_POST["nac_circuito"];
    $layout_circuito = $_POST["current_layout"];

    do {
        if (empty($id_circuito) || empty($nome_circuito) || empty($cidade_circuito) || empty($nac_circuito) || empty($layout_circuito)) {
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

        $stmt = $conn->prepare("UPDATE circuito SET nome_circuito = ?, cidade_circuito = ?, nac_circuito = ?, layout_circuito = ? WHERE id_circuito = ?");
        $stmt->bind_param("ssssi", $nome_circuito, $cidade_circuito, $nac_circuito, $layout_circuito, $id_circuito);

        if (!$stmt->execute()) {
            $errorMessage = "Erro ao atualizar o circuito: " . $stmt->error;
            break;
        }

        $successMessage = "Circuito atualizado com sucesso!";
        header("Location: circuitos.php");
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
    <title>Editar Circuito</title>
    <?php include('bootstrapInc.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <div class="container my-5">
        <h2>Atualizar Circuito</h2>
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
            <input type="hidden" name="id_circuito" value="<?php echo $id_circuito; ?>">
            <input type="hidden" name="current_layout" value="<?php echo $layout_circuito; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome_circuito" value="<?php echo $nome_circuito; ?>">
                    <span id="nome_circuito_error" class="text-danger"></span>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Cidade</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cidade_circuito" value="<?php echo $cidade_circuito; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Pais</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nac_circuito" value="<?php echo $nac_circuito; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="file-picker" class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="layout_circuito" class="custom-file-input" id="file-picker"
                                accept="image/*">
                            <label class="custom-file-label" for="file-picker" id="file-name">
                                <?php echo $layout_circuito; ?>
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
                <a class="btn btn-outline-primary" href="circuitos.php" role="button">Cancelar</a>
            </div>
        </div>
        </form>
    </div>

</body>

</html>