<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Pilotos</title>
    <link rel="stylesheet" href="css/paulograca.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div id="categoria">
        <p>Escolha a categoria dos pilotos</p>
        <form id="cat" action="#" method="post">
            <select id="categoria" name="categoria">
                <?php switch ($_POST["categoria"]) {
                    case 'f1':
                        echo '
                <option value="1">Todas as categorias</option>
                <option value="f1" selected>Formula 1</option>
                <option value="wec">World Endurace Championship</option>
                <option value="wrc">Rally</option>';
                        break;
                    case 'wrc':
                        echo '
                <option value="1" >Todas as categorias</option>
                <option value="f1">Formula 1</option>
                <option value="wec">World Endurace Championship</option>
                <option value="wrc" selected>Rally</option>';
                        break;
                    case 'wec':
                        echo '
                <option value="1" >Todas as categorias</option>
                <option value="f1">Formula 1</option>
                <option value="wec" selected >World Endurace Championship</option>
                <option value="wrc">Rally</option>';
                        break;
                    default:
                        echo '
                <option value="1" selected>Todas as categorias</option>
                <option value="f1">Formula 1</option>
                <option value="wec">World Endurace Championship</option>
                <option value="wrc">Rally</option>';
                } ?>
            </select>
            <input type="submit" value="Submeter" name="submit">
        </form>
    </div>
    <hr>
    <?php
    include 'sqli/conn.php';
    if (isset($_POST['submit'])) {
        $categoria = $_POST["categoria"];
        if ($categoria != "1")
            $query = 'select * from racesphere.piloto where cat_piloto ="' . $categoria . '";';
        else
            $query = 'select * from racesphere.piloto;';
        $result_set = $conn->query($query);
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result_set->fetch_assoc()) {
            echo '<div class="' . $row["cat_piloto"] . '">';
            echo '<div class="nomePiloto"><h3>' . $row['nome_piloto'] . '</h3></div>';
            echo '<div class="fotoPiloto">';
            echo '<img alt="' . $row["nome_piloto"] . '" src="img/bd-img/fotos_pilotos/'.$row["foto_piloto"].'">';
            echo '</div>';
            $row['cat_piloto'] = strtoupper($row['cat_piloto']);
            echo '<div class="categoriaPiloto"><h3>' . $row['cat_piloto'] . '</h3></div>';
            echo '</div>';
        }
        if ($result_set) {
            if ($result_set->num_rows >= 1) {

            } else {
                echo "Não existem pilotos nesta categoria!";
            }
        } else {
            $code = $conn->errno; // error code of the most recent operation
            $message = $conn->error; // error message of the most recent op.
            printf("<p>Query error: %d %s</p>", $code, $message);
        }
    } else {
        $query = 'select * from racesphere.piloto;';
        $result_set = $conn->query($query);
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result_set->fetch_assoc()) {
            echo '<div class="' . $row["cat_piloto"] . '">';
            echo '<div class="nomePiloto"><h3>' . $row['nome_piloto'] . '</h3></div>';
            echo '<div class="fotoPiloto">';
            echo '<img alt="' . $row["nome_piloto"] . '" src="img/bd-img/fotos_pilotos/' . $row["foto_piloto"] . '">';
            echo '</div>';
            $row['cat_piloto'] = strtoupper($row['cat_piloto']);
            echo '<div class="categoriaPiloto"><h3>' . $row['cat_piloto'] . '</h3></div>';
            echo '</div>';
        }
    }

    ?>
    <?php include "footer.php"; ?>
</body>

</html>