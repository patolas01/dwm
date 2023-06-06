<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Gerir Pilotos</title>
    <link rel="stylesheet" href="../css/paulograca.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    <h1 class="tit">Editar piloto</h1>
    <?php
    include '../sqli/conn.php';

    $id_piloto = "";
    $nome_piloto = "";
    $nac_piloto = "";
    $cat_piloto = "";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["id_piloto"])) {
            header("piloto.php");
            exit;
        }
        $id_piloto = $_GET["id_piloto"];
        $sql = "SELECT * FROM piloto WHERE id_piloto = $id_piloto";
        $result = $conn->query($sql);
        if ($result === false) {
            die("Error: " . $conn->error);
        }
        $row = $result->fetch_assoc();
        if (!$row) {
            header("piloto.php");
            exit;
        }
        $nome_piloto = $row["nome_piloto"];
        $nac_piloto = $row["nac_piloto"];
        $cat_piloto = $row["cat_piloto"];
    } else {
        $id_piloto = $_POST["id_piloto"];
        $nome_piloto = $_POST["nome_piloto"];
        $nac_piloto = $_POST["nac_piloto"];
        $cat_piloto = $_POST["cat_piloto"];

        do {
            if (
                empty($id_piloto) || empty($nome_piloto) || empty($nac_piloto) || empty($cat_piloto)
            ) {
                echo '<div class="erro">Todos os campos devem estar preenchidos corretamente!</div>';
                break;
            }
            if (!preg_match("/^[a-zA-Z\s]*$/", $nome_piloto)) {
                $errorMessage = "O nome da piloto só pode conter letras e espaços.";
                break;
            }
            if (!preg_match("/^[a-zA-Z\s]*$/", $nac_piloto)) {
                $errorMessage = "A nacionalidade da piloto só pode conter letras e espaços.";
                break;
            }
            $stmt = $conn->prepare("UPDATE piloto SET nome_piloto = ?, nac_piloto = ?, cat_piloto = ? WHERE id_piloto = ?");
            $stmt->bind_param("sssi", $nome_piloto, $nac_piloto, $cat_piloto, $id_piloto);

            if (!$stmt->execute()) {
                $errorMessage = "Erro ao atualizar a piloto: " . $stmt->error;
                break;
            }
            header("Location: piloto.php");
            exit;
        } while (false);
    } ?>
    <div class="container my-5">
        <form method="post">
            <input type="hidden" name="id_piloto" value="<?php echo $id_piloto; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome do piloto</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome_piloto" value="<?php echo $nome_piloto; ?>">
                    <span id="nome_piloto_error" class="text-danger"></span>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nacionalidade do piloto</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nac_piloto" value="<?php echo $nac_piloto; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Categoria do piloto</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cat_piloto" value="<?php echo $cat_piloto; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-1 d-grid">
                    <a class="btn btn-danger" href="piloto.php" role="button">Cancelar</a>
                </div>
        </form>
    </div>
</body>
<?php include "footer.php"; ?>

</html>