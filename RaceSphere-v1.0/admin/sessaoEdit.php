<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <?php include('bootstrapInc.php'); ?>
    <title>Gerir Sessões</title>
    <link rel="stylesheet" href="../css/paulograca.css">

</head>

<body>
    <?php include('navbar.php'); ?>
    <h1 class="tit">Editar sessão</h1>
    <?php
    include '../sqli/conn.php';

    $id_sessao = "";
    $tipo_sessao = "";
    $dia_sessao = "";
    $inicio_sessao = "";
    $fim_sessao = "";
    $categoria = "";
    $cat = "";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["id_sessao"])) {
            header("sessao.php");
            exit;
        }
        $id_sessao = $_GET["id_sessao"];
        $sql = "SELECT * FROM sessao WHERE id_sessao = $id_sessao";
        $result = $conn->query($sql);
        if ($result === false) {
            die("Error: " . $conn->error);
        }
        $row = $result->fetch_assoc();
        if (!$row) {
            header("sessao.php");
            exit;
        }
        $tipo_sessao = $row["tipo_sessao"];
        $dia_sessao = $row["dia_sessao"];
        $inicio_sessao = $row["inicio_sessao"];
        $fim_sessao = $row["fim_sessao"];
        $categoria = $row["categoria"];
        $cat = strtoupper($categoria);
    } else {
        $id_sessao = $_POST["id_sessao"];
        $tipo_sessao = $_POST["tipo_sessao"];
        $dia_sessao = $_POST["dia_sessao"];
        $inicio_sessao = $_POST["inicio_sessao"];
        $fim_sessao = $_POST["fim_sessao"];
        $categoria = $_POST["categoria"];
        $cat = strtoupper($categoria);
        do {
            if (empty($id_sessao) || empty($tipo_sessao) || empty($dia_sessao) || empty($inicio_sessao) || empty($fim_sessao) || empty($categoria)) {
                echo '<div class="erro">Todos os campos devem estar preenchidos!</div>';
                break;
            }
            if ($fim_sessao <= $inicio_sessao) {
                echo '<div class="erro">A hora de fim tem de ser depois do inicio da sessão!</div>';
                break;
            }
            $query = 'UPDATE sessao set tipo_sessao = "'.$tipo_sessao.'", dia_sessao = "'.$dia_sessao.'", inicio_sessao = "'.$inicio_sessao.'", fim_sessao = "'.$fim_sessao.'" , categoria = "'.$categoria.'" where id_sessao = "'.$id_sessao.'";';
            echo $query;
            $result_set = $conn->query($query);
            if ($result_set) {
                header("Location: sessao.php");
                exit;
            } else {
                echo 'Algo de errado nao esta certo!';
            }
        } while (false);
    }
    ?>
    <div class="container my-5">
        <form method="post">
            <input type="hidden" name="id_sessao" value="<?php echo $id_sessao; ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Categoria</label>
                <div class="col-sm-6">
                    <select id="categoriaSessao" name="categoria">
                        <?php switch ($_POST[$categoria]) {
                            case 'f1':
                                echo '
                <option value="f1" selected>Formula 1</option>
                <option value="wec">World Endurace Championship</option>
                <option value="wrc">Rally</option>';
                                break;
                            case 'wrc':
                                echo '
                <option value="f1">Formula 1</option>
                <option value="wec">World Endurace Championship</option>
                <option value="wrc" selected>Rally</option>';
                                break;
                            case 'wec':
                                echo '
                <option value="f1">Formula 1</option>
                <option value="wec" selected >World Endurace Championship</option>
                <option value="wrc">Rally</option>';
                                break;
                            default:
                                echo '
                <option value="f1">Formula 1</option>
                <option value="wec">World Endurace Championship</option>
                <option value="wrc">Rally</option>';
                        } ?>
                    </select>
                    <span id="tipo_sessao_error" class="text-danger"></span>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Dia da sessão</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="dia_sessao" value="<?php echo $dia_sessao; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Inicio da sessão</label>
                <div class="col-sm-6">
                    <input type="time" class="form-control" name="inicio_sessao" value="<?php echo $inicio_sessao; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Fim da sessão</label>
                <div class="col-sm-6">
                    <input type="time" class="form-control" name="fim_sessao" value="<?php echo $fim_sessao; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tipo da sessao</label>
                <select id="tipo_sessao" name="tipo_sessao" class="form-select">
                    <?php switch ($tipo_sessao) {
                        case 'P1':
                            echo '
                <option value="P1" selected>P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="W">W</option>';
                            break;
                        case 'P2':
                            echo '
                <option value="P1">P1</option>
                <option value="P2" selected>P2</option>
                <option value="P3">P3</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="W">W</option>';
                            break;
                        case 'P3':
                            echo '
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3" selected>P3</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="W">W</option>';
                            break;
                        case 'Q':
                            echo '
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="Q" selected>Q</option>
                <option value="R">R</option>
                <option value="W">W</option>';
                            break;
                        case 'R':
                            echo '
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="Q">Q</option>
                <option value="R" selected>R</option>
                <option value="W">W</option>';
                            break;
                        case 'W':
                            echo '
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="W" selected>W</option>';
                            break;
                        default:
                            echo '
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="W">W</option>';
                    } ?>
                </select>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-1 d-grid">
                    <a class="btn btn-danger" href="sessao.php" role="button">Cancelar</a>
                </div>
        </form>
    </div>
</body>
<?php include "footer.php"; ?>

</html>