<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Resultados</title>
    <link rel="stylesheet" href="../css/pauloLeal.css">
</head>

<body>
    <?php
    include('navbar.php');
    include '../bootstrap/modals/modalDelete2.php';

    include '../sqli/conn.php';
    ?>

    <h1>Adicionar Resultado</h1>
    <br>

    <form id="resultado" method="post" action="resultsAdd.php">
        <div class="grid-container" id="resultsDiv">
            <div class="grid-item">
                <label for="categorySelect">Categoria:</label>
                <select name="categorySelect" id="categorySelect" class="form-control">
                    <option value="f1">F1</option>
                    <option value="wec">WEC</option>
                    <option value="wrc">WRC</option>
                </select>
            </div>

            <div class="grid-item">
                <label for="provaSelect">Prova:</label>
                <select name="provaSelect" id="provaSelect" class="form-control">
                    <?php
                    $provas = "SELECT id_prova, nome_prova FROM prova";

                    $result = $conn->query($provas);

                    if ($result && $result->num_rows > 0) {
                        // Fetch all rows and store the names in an array
                        $prova_names = [];
                        while ($row = $result->fetch_assoc()) {
                            $prova_names[] = $row['nome_prova'];
                        }
                    }

                    foreach ($prova_names as $prova_name):
                        echo "<option value=" . $row['id_prova'] . ">$prova_name</option>";
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="grid-item">
                <label for="sessao">Sessão:</label>
                <select name="sessao" id="sessao" class="form-control">
                    <?php
                    $sessao = "SELECT id_sessao, tipo_sessao FROM sessao";

                    $result = $conn->query($sessao);

                    if ($result && $result->num_rows > 0) {
                        // Fetch all rows and store the names in an array
                        $sessao_tipo = [];
                        while ($row = $result->fetch_assoc()) {
                            $sessao_tipo[] = $row['tipo_sessao'];
                        }
                    }

                    foreach ($sessao_tipo as $sessao_tipo):
                        echo "<option value=" . $row['id_sessao'] . ">$sessao_tipo</option>";
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="grid-item">
                <label for="etapa">Etapa:</label>
                <select name="etapa" id="etapa" class="form-control">
                    <?php
                    $etapa = "SELECT id_etapa, num_etapa FROM etapa";

                    $result = $conn->query($etapa);

                    if ($result && $result->num_rows > 0) {
                        // Fetch all rows and store the names in an array
                        $etapa_numero = [];
                        while ($row = $result->fetch_assoc()) {
                            $etapa_numero[] = $row['num_etapa'];
                        }
                    }

                    foreach ($etapa_numero as $etapa_numero):
                        echo "<option value=" . $row['id_etapa'] . ">$etapa_numero</option>";
                    endforeach;
                    ?>
                </select>
            </div>
        </div>

        <div class="table-container resultContainer">
            <table id="editableTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Piloto</th>
                        <th>Laptime</th>
                        <th>DNF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../sqli/conn.php';
                    // Query to retrieve driver IDs and names from the database
                    $query = "SELECT id_piloto, nome_piloto FROM piloto";

                    // Execute the query
                    $result = $conn->query($query);

                    // Check if there are any results
                    if ($result->num_rows > 0) {
                        $options = '';

                        // Loop through the results and generate the options
                        while ($row = $result->fetch_assoc()) {
                            $driverId = $row['id_piloto'];
                            $driverName = $row['nome_piloto'];
                            $options .= "<option value='$driverId'>$driverName</option>";
                        }

                        // Loop through the table rows
                        for ($i = 1; $i <= 20; $i++) {
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><select class='driverSelect form-control' onchange='updateDriverSelection(this)'><option value=''>Escolha o piloto...</option>$options</select></td>";
                            echo "<td><input class='inputLaptime' type='time' step='0.001' placeholder='--:--:---'></td>";
                            echo "<td><input type='checkbox'></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Nenhum piloto encontrado</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="tableRows" id="tableRowsInput">
        <button name="adicionar" class="btn btn-primary" type="submit">Adicionar</button>
    </form>

    <?php
    if (isset($_POST['adicionar'])) {
        // Retrieve the form data
        $category = $_POST['categorySelect'];
        $idetapa = null;
        $idsessao = null;
        if(isset($_POST['sessao'])){
            $idsessao = $_POST['sessao'];
        }
        if (isset($_POST['etapa'])) {
            $idetapa = $_POST['etapa'];
        }
        

        // Prepare the values for the multiple rows insertion
        $positions = $_POST['position'];
        $driverIds = $_POST['driverId'];
        $laptimes = $_POST['laptime'];
        $dnfs = $_POST['dnf'];

        $insertQuery = "INSERT INTO resultado (categoria, id_sessao, id_etapa, posicao_res, id_piloto, laptime_res, dnf) VALUES ";

        $values = array();

        foreach ($positions as $index => $position) {
            $driverId = $driverIds[$index];
            $laptime = $laptimes[$index];
            $dnf = $dnfs[$index];

            /*echo $driverId;
            echo $laptime;
            echo $dnf;*/

            // Check if all columns have values
            if (!empty($driverId) && !empty($laptime) && !empty($dnf) && $driverId != null) {
                // Convert empty driverId to NULL
                if (empty($driverId)) {
                    $driverId = NULL;
                }

                // Add the values for each non-empty row to the values array
                $values[] = "('$category', $idsessao, $idetapa, $position, $driverId, '$laptime, '$dnf')";
            }
        }

        // Check if there are non-empty values to insert
        if (!empty($values)) {
            $insertQuery .= implode(',', $values);

            // Insert the data into your SQL table
            include '../sqli/conn.php';

            if ($conn->query($insertQuery) === TRUE) {
                // Query executed successfully
                echo "Resultado inserido com sucesso!";
            } else {
                // Error occurred during the query execution
                echo "Error: " . $conn->error;
            }

            $conn->close();
        } else {
            echo "No non-empty rows to insert.";
        }
    }


    ?>


    <?php include('footer.php'); ?>
</body>

</html>