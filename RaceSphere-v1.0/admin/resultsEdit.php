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

    <h1>Editar Resultado</h1>
    <br>

    <?php

    include '../sqli/conn.php';

    $idResult = $_GET['id'];

    $query = "SELECT * from resultado WHERE id_resultado = $idResult";
    $result = $conn->query($query);
    $row = mysqli_fetch_assoc($result);

    $category = $row['categoria'];
    $session = $row['id_sessao'];

    $query2 = "SELECT id_piloto, nome_piloto FROM piloto";

    // Execute the query
    $result2 = $conn->query($query2);

    // Check if there are any results
    if ($result2->num_rows > 0) {
        $options = '';

        // Loop through the results and generate the options
        while ($row = $result2->fetch_assoc()) {
            $driverId = $row['id_piloto'];
            $driverName = $row['nome_piloto'];
            $options .= "<option value='$driverId'>$driverName</option>";
        }
    }

    ?>

    <form id="resultado" method="post" action="resultsEdit.php?id=<?php echo $idResult; ?>">
        <div class="grid-container" id="resultsDiv">
            <div class="grid-item">
                <label for="categorySelect">Categoria:</label>
                <select name="categorySelect" id="categorySelect" class="form-control">
                    <option value="f1" <?php if ($category == 'f1')
                        echo 'selected'; ?>>F1</option>
                    <option value="wec" <?php if ($category == 'wec')
                        echo 'selected'; ?>>WEC</option>
                </select>
            </div>

            <div class="grid-item">
                <label for="sessao">Número de Sessão:</label>
                <select name="sessao" id="sessao" class="form-control">
                    <option value="1" <?php if ($session == 1)
                        echo 'selected'; ?>>P1 - ID Prova</option>
                    <option value="2" <?php if ($session == 2)
                        echo 'selected'; ?>>P2 - ID Prova</option>
                    <option value="3" <?php if ($session == 3)
                        echo 'selected'; ?>>P3 - ID Prova</option>
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
                    <?php for ($i = 1; $i <= 20; $i++) { ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <select class="driverSelect form-control" onchange="updateDriverSelection(this)">
                                    <option value="">Escolha o piloto...</option>
                                    <?php echo $options; ?>
                                </select>
                            </td>
                            <td><input class="inputLaptime" type="time" step="0.001" placeholder="--:--:---" value=""></td>
                            <td><input type="checkbox"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="tableRows" id="tableRowsInput">
        <button name="atualizar" class="btn btn-primary" type="submit">Atualizar</button>
    </form>

    <?php
    if (isset($_POST['atualizar'])) {
        $category = $_POST['categorySelect'];
        $session = $_POST['sessao'];

        // Prepare the values for the update operation
        $positions = $_POST['position'];
        $driverIds = $_POST['driverId'];
        $laptimes = $_POST['laptime'];
        $dnfs = $_POST['dnf'];

        $updateQuery = "UPDATE resultado SET categoria = '$category', id_sessao = '$session', laptime_res = CASE ";

        foreach ($positions as $index => $position) {
            $driverId = $driverIds[$index];
            $laptime = $laptimes[$index];
            $dnf = $dnfs[$index];

            // Check if all columns have values
            if (!empty($driverId) && !empty($laptime) && !empty($dnf) && $driverId != null) {
                // Convert empty driverId to NULL
                if (empty($driverId)) {
                    $driverId = "1";
                }

                // Add the CASE statement for each non-empty row
                $updateQuery .= "WHEN posicao_res = '$position' THEN '$laptime' ";
            }
        }

        $updateQuery .= "END, dnf = CASE ";

        foreach ($positions as $index => $position) {
            $driverId = $driverIds[$index];
            $laptime = $laptimes[$index];
            $dnf = $dnfs[$index];

            // Check if all columns have values
            if (!empty($driverId) && !empty($laptime) && !empty($dnf) && $driverId != null) {
                // Convert empty driverId to NULL
                if (empty($driverId)) {
                    $driverId = "1";
                }

                // Add the CASE statement for each non-empty row
                $updateQuery .= "WHEN posicao_res = '$position' THEN '$dnf' ";
            }
        }

        $updateQuery .= "END WHERE id_resultado = '$idResult'";

        include '../sqli/conn.php';

        if ($conn->query($updateQuery) === TRUE) {
            echo "Resultado atualizado com sucesso!";
        } else {
            echo "Error: " /* $conn->error*/;
        }

        $conn->close();

    }
    ?>

    <?php include('footer.php'); ?>
</body>

</html>