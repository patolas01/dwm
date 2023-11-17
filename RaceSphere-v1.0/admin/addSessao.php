<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Adicionar sessão</title>
    <link rel="stylesheet" href="../css/paulograca.css">
</head>

<body>
    <?php include('navbar.php');
    include '../sqli/conn.php';
    if (isset($_SESSION['cargo_user'])) {
        if ($_SESSION['cargo_user'] == "admin") { ?>
            <div class="form">
                <form action="#" method="post">
                    <h2>Nova sessão</h2>
                    <label for="tipo_sessao">Tipo de sessão</label>
                    <select name="tipo_sessao" id="tipoSessao">
                        <option value="P1">P1</option>
                        <option value="P2">P2</option>
                        <option value="P3">P3</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="W">W</option>
                    </select><br>
                    <label for="dia_sessao">Dia da sessão</label>
                    <input type="date" name="dia_sessao"><br>
                    <label for="inicio_sessao">Inicio da sessão</label>
                    <input type="time" name="inicio_sessao" value="00:00:00"><br>
                    <label for="fim_sessao">Fim da sessão</label>
                    <input type="time" name="fim_sessao" value="00:00:00"><br>
                    <label for="categoria">Categoria</label>
                    <select id="categoriaSessao2" name="categoria">
                        <option value="f1" selected>Formula 1</option>
                        <option value="wec">World Endurace Championship</option>
                        <option value="wrc">Rally</option>
                    </select><br>
                    <input type="submit" value="Submeter" name="submit">
                </form>
            </div>
            <?php
            include '../footer.php';
            if (isset($_POST["submit"])) {
                $tipo = $_POST["tipo_sessao"];
                $dia_sessao = $_POST["dia_sessao"];
                $inicio_sessao = $_POST["inicio_sessao"];
                $categoria = $_POST["categoria"];
                $fim_sessao = $_POST["fim_sessao"];
                $insert = "INSERT INTO `sessao` (`id_sessao`, `tipo_sessao`, `dia_sessao`, `inicio_sessao`, `fim_sessao`, `id_prova`, `categoria`) VALUES (null, '" . $tipo . "', '" . $dia_sessao . "', '" . $inicio_sessao . "', '" . $fim_sessao . "', null, '" . $categoria . "');";
                $result_set = $conn->query($insert);
                if ($result_set) {
                    ?>
                    <script>
                        window.setTimeout(function () {
                            location.href = "sessao.php";
                        }, 0);
                    </script>
                    <?php
                }
            }
        }

    } else
        echo "<div class='erro'>Não tem cargo para adicionar sessões!</div>";
    ?>
</body>

</html>