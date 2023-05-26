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
                <option value="1" selected="selected">Todas as categorias</option>
                <option value="f1">Formula 1</option>
                <option value="wec">World Endurace Championship</option>
                <option value="wrc">Rally</option>
            </select>
            <input type="submit" value="Submeter" name="submit">
        </form>
    </div>
    <hr>
    <script>
        $("#categoria").on("change", function () {
            console.log($('#categoria').find(":selected").val());
        })
    </script>
    <script src="jquery/main.js"></script>
    <?php
    include 'sqli/conn.php';
    if (isset($_POST['submit'])) {
        
        $categoria = $_POST["categoria"];
            if ($categoria == "1")
                $query = 'select * from racesphere.piloto;';
            else
                $query = 'select * from racesphere.piloto where cat_piloto ="' . $categoria . '";';
            $result_set = $conn->query($query);
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result_set->fetch_assoc()) {
                echo '<div class="' . $row["cat_piloto"] . '">';
                echo '<div class="nomePiloto"><h3>' . $row['nome_piloto'] . '</h3></div>';
                echo '<div class="fotoPiloto">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['foto_piloto']) . '"/>';
                echo '</div>';
                $row['cat_piloto'] = strtoupper($row['cat_piloto']);
                echo '<div class="categoriaPiloto"><h3>'.$row['cat_piloto'].'</h3></div>';
                echo '</div>';
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
    ?>
    <?php include "footer.php"; ?>
</body>

</html>