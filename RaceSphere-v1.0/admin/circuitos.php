<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <?php include('bootstrapInc.php'); ?>
    <title>Gerir Circuitos</title>
    <link rel="stylesheet" href="css/alex.css">
</head>

<body>
    <?php
    include('navbar.php');
    ?>

    <div class="container my-5">
        <h2>Lista de Circuitos:</h2>
        <a class="btn btn-primary" href="circuitosCreate.php" role="button" style="margin-bottom: 15px;">Novo Circuito</a>
        <br>

        <div class="search-bar">
            <input class="search-input form-control" type="text" id="searchInput" placeholder="Procurar por circuito ou pais">
        </div>

        <div class="table-responsive"> <!-- Wrap the table in a div with the class 'table-responsive' -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome Circuito</th>
                        <th scope="col">Cidade Circuito</th>
                        <th scope="col">Pais Circuito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../sqli/conn.php';

                    $sql = "SELECT id_circuito, nome_circuito, cidade_circuito, nac_circuito FROM circuito ORDER BY id_circuito";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid Query: " . $conn->error);
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                    <tr>
                        <td>{$row['id_circuito']}</td>
                        <td>{$row['nome_circuito']}</td>
                        <td>{$row['cidade_circuito']}</td>
                        <td>{$row['nac_circuito']}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='circuitosEdit.php?id_circuito={$row['id_circuito']}'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='circuitosDelete.php?id={$row['id_circuito']}' onclick=\"return confirm('Tem a certeza que deseja apagar esta linha?')\">Apagar</a>
                        </td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        //Pesquisa
        function searchCircuits() {
            const searchInput = document.getElementById('searchInput');
            const filterValue = searchInput.value.toLowerCase();
            const circuitRows = document.querySelectorAll('.table tbody tr');
            circuitRows.forEach(row => {
                const circuitName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const circuitCity = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                const circuitCountry = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                if (circuitName.includes(filterValue) || circuitCity.includes(filterValue) || circuitCountry.includes(filterValue)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        }
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', searchCircuits);
    </script>

    <?php include('footer.php'); ?>
</body>

</html>