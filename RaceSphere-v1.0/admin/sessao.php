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
    <?php
    include('navbar.php');
    ?>

    <div id="sessao">
        <p>Escolha o tipo de sessão</p>
        <form id="sessao" action="#" method="post">
            <select id="sessao" name="sessao">
                <?php switch ($_POST["sessao"]) {
                    case 'P1':
                        echo '
                <option value="1">Todos os tipos</option>
                <option value="P1" selected>P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="W">W</option>';
                        break;
                    case 'P2':
                        echo '
                <option value="1">Todos os tipos</option>
                <option value="P1">P1</option>
                <option value="P2" selected>P2</option>
                <option value="P3">P3</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="W">W</option>';
                        break;
                    case 'P3':
                        echo '
                <option value="1">Todos os tipos</option>
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3" selected>P3</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="W">W</option>';
                        break;
                    case 'Q':
                        echo '
                <option value="1">Todos os tipos</option>
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="Q" selected>Q</option>
                <option value="R">R</option>
                <option value="W">W</option>';
                        break;
                    case 'R':
                        echo '
                <option value="1">Todos os tipos</option>
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="Q">Q</option>
                <option value="R" selected>R</option>
                <option value="W">W</option>';
                        break;
                    case 'W':
                        echo '
                <option value="1">Todos os tipos</option>
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="W" selected>W</option>';
                        break;
                    default:
                        echo '
                <option value="1" selected>Todos os tipos</option>
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="W">W</option>';
                } ?>
            </select>
            <input type="submit" value="Submeter" name="submit">
        </form>
    </div>
    <hr>

    <table class="sessaoTable">
        <tbody>
            <?php
            include '../sqli/conn.php';
            if (isset($_POST['submit'])) {
                $tipo = $_POST["sessao"];
                switch ($tipo) {
                    case "P1":
                        $query = 'select * from sessao where tipo_sessao = "P1";';
                        break;
                    case "P2":
                        $query = 'select * from sessao where tipo_sessao = "P2";';
                        break;
                    case "P3":
                        $query = 'select * from sessao where tipo_sessao = "P3";';
                        break;
                    case "Q":
                        $query = 'select * from sessao where tipo_sessao = "Q";';
                        break;
                    case "R":
                        $query = 'select * from sessao where tipo_sessao = "R";';
                        break;
                    case "W":
                        $query = 'select * from sessao where tipo_sessao = "W";';
                        break;
                    default:
                        $query = 'select * from sessao;';
                        break;
                }
                ;
                $result_set = $conn->query($query);
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = mysqli_fetch_assoc($result)) {
                    $row['categoria'] = strtoupper($row['categoria']);
                    echo "
                <tr>
                  <td>$row[tipo_sessao]</td>
                  <td>$row[categoria]</td>
                   <td>$row[dia_sessao]</td>
                   <td>$row[inicio_sessao]</td>
                   <td>$row[fim_sessao]</td>
                   <td>
                      <a class='btn btn-primary btn-sm' href='sessaoEdit.php?id_sessao={$row['id_sessao']}'>Editar</a>
                      <a class='btn btn-danger btn-sm' href='sessaoDelete.php?id=$row[id_sessao]'>Apagar</a>
                  </td>
               </tr>
                ";
                }
                if ($result_set) {
                    if ($result_set->num_rows == 0) {
                        echo '<div class="erro">Este tipo de sessão não tem dados!</div>';
                    }
                } else {
                    $query = 'select * from sessao;';
                    $result_set = $conn->query($query);
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result_set->fetch_assoc()) {
                        $row['categoria'] = strtoupper($row['categoria']);
                        echo "
                <tr>
                  <td>$row[tipo_sessao]</td>
                  <td>$row[categoria]</td>
                   <td>$row[dia_sessao]</td>
                   <td>$row[inicio_sessao]</td>
                   <td>$row[fim_sessao]</td>
                   <td>
                      <a class='btn btn-primary btn-sm' href='sessaoEdit.php?id_sessao={$row['id_sessao']}'>Editar</a>
                      <a class='btn btn-danger btn-sm' href='sessaoDelete.php?id=$row[id_sessao]'>Apagar</a>
                  </td>
               </tr>
                ";
                    }
                }
            } else {
                $query = 'select * from sessao;';
                $result_set = $conn->query($query);
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result_set->fetch_assoc()) {
                    $row['categoria'] = strtoupper($row['categoria']);
                    echo "
                <tr>
                  <td>$row[tipo_sessao]</td>
                  <td>$row[categoria]</td>
                   <td>$row[dia_sessao]</td>
                   <td>$row[inicio_sessao]</td>
                   <td>$row[fim_sessao]</td>
                   <td>
                      <a class='btn btn-primary btn-sm' href='sessaoEdit.php?id_sessao={$row['id_sessao']}'>Editar</a>
                      <a class='btn btn-danger btn-sm' href='sessaoDelete.php?id=$row[id_sessao]'>Apagar</a>
                  </td>
               </tr>
                ";
                }
            }
            ?>
        </tbody>
        </div>
</body>

</html>