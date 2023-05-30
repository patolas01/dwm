<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Gerir Pilotos</title>
    <link rel="stylesheet" href="css/paulograca.css">
</head>

<body>
    <?php include('navbar.php');
    include '../sqli/conn.php';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    if ($_SESSION['cargo_user'] == "admin") {
        $query = 'select * from racesphere.piloto;';
        $result_set = $conn->query($query);
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result_set->fetch_assoc()) {
            echo '<form action="post">';
            echo '<div class="pilotoAdmin"><label for="nome">Nome do piloto</label>';
            echo '<input type="text" name="nome" class="nomePilotoAdmin" value="' . $row['nome_piloto'] . '">';
            echo '<div class="fotoPiloto"><img src="../img/bd-img/pilotos/' . $row["foto_piloto"] . '"></div>';
            echo '<select id="categoria" name="categoria">';
            switch ($row['cat_piloto']) {
                case 'f1':
                    echo '<option value="f1" selected>Formula 1</option>
                <option value="wec" >World Endurace Championship</option>
                <option value="wrc">Rally</option>';
                    break;
                case 'wrc':
                    echo '<option value="f1" selected>Formula 1</option>
                <option value="wec" >World Endurace Championship</option>
                <option value="wrc"  selected>Rally</option>';
                    break;
                case 'wec':
                    echo '<option value="f1">Formula 1</option>
                <option value="wec" selected >World Endurace Championship</option>
                <option value="wrc">Rally</option>';
                    break;
            }
            echo '</select>';
            echo '</div></form>';
        }
        if ($result_set) {
            if ($result_set->num_rows >= 1) {

            } else {
                echo "Erro na query";
            }
        } else {
            $code = $conn->errno; // error code of the most recent operation
            $message = $conn->error; // error message of the most recent op.
            printf("<p>Query error: %d %s</p>", $code, $message);
        }
    }
    include "footer.php"; ?>
</body>
</html>