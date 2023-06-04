<?php
include '../sqli/conn.php';

$id_equipa = "";
$nome_equipa = "";
$nac_equipa = "";
$cat_equipa = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id_equipa"])) {
        header("equipas.php");
        exit;
    }

    $id_equipa = $_GET["id_equipa"];

    $sql = "SELECT id_equipa, nome_equipa, nac_equipa, cat_equipa FROM equipa WHERE id_equipa = $id_equipa";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("equipas.php");
        exit;
    }

    $id_equipa = $row["id_equipa"];
    $nome_equipa = $row["nome_equipa"];
    $nac_equipa = $row["nac_equipa"];
    $cat_equipa = $row["cat_equipa"];
} else {
    $id_equipa = $_POST["id_equipa"];
    $nome_equipa = $_POST["nome_equipa"];
    $nac_equipa = $_POST["nac_equipa"];
    $cat_equipa = $_POST["cat_equipa"];

    do {
        if (empty($id_equipa) || empty($nome_equipa) || empty($nac_equipa) || empty($cat_equipa)) {
            $errorMessage = "Todos os campos precisam de estar preenchidos!";
            break;
        }

        //atualizar equipa na bd
        $sql = "UPDATE equipa SET nome_equipa = '$nome_equipa' ,  nac_equipa = '$nac_equipa' , cat_equipa = '$cat_equipa' WHERE id_equipa = $id_equipa";
        $result = $conn->query($sql);

        if(!$result){
            $errorMessage = "Invalid query: " . $conn-> error;
            break;  
        }

        $successMessage = "Cliente atualizado com sucesso!";
        header("equipas.php");
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
            <input type="hidden" name="id_equipa" value="<?php echo $id_equipa ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome Equipa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome_equipa" value="<?php echo $nome_equipa ?>">
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
                    <input type="text" class="form-control" name="cat_equipa" value="<?php echo $cat_equipa ?>">
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