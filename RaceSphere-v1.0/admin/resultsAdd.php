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
                </select>
            </div>

            <div class="grid-item">
                <label for="sessao">Número de Sessão:</label>
                <select name="sessao" id="sessao" class="form-control">
                    <option value="1">P1 - ID Prova</option>
                    <option value="2">P2 - ID Prova</option>
                    <option value="3">P3 - ID Prova</option>
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
        $session = $_POST['sessao'];

        // Prepare the values for the multiple rows insertion
        $positions = $_POST['position'];
        $driverIds = $_POST['driverId'];
        $laptimes = $_POST['laptime'];
        $dnfs = $_POST['dnf'];

        $insertQuery = "INSERT INTO resultado (categoria, id_sessao, posicao_res, id_piloto, laptime_res, dnf) VALUES ";

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
                    $driverId = "1";
                }

                // Add the values for each non-empty row to the values array
                $values[] = "('$category', '$session', '$position', $driverId, '$laptime', '$dnf')";
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
                echo "Error: " /*. $conn->error*/;
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