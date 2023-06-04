<?php
include '../sqli/conn.php';

$nome_equipa = "";
$cat_equipa = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $nome_equipa = $_POST["nome_equipa"];
    $cat_equipa = $_POST["cat_equipa"];

    do {
        if (empty($nome_equipa) || empty($cat_equipa)) {
            $errorMessage = "Todos os campos precisam de estar preenchidos!";
            break;
        }

        // adicionar equipa a bd
        $sql = "INSERT INTO equipa(nome_equipa, cat_equipa) VALUES ('$nome_equipa', '$cat_equipa')";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $nome_equipa = "";
        $cat_equipa = "";

        $successMessage = "Equipa adicionada!!";

        header("location: equipas.php");
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
        <h2>Nova Equipa</h2>
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome Equipa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nomeEquipa" value="<?php echo $nome_equipa ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Categoria Equipa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="catEquipa" value="<?php echo $cat_equipa ?>">
                </div>
            </div>

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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="equipas.php" role="button">Cancelar</a>
                </div>
        </form>
    </div>

</body>

</html>