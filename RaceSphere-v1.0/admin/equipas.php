<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <?php include('bootstrapInc.php'); ?>
    <title>Gerir Equipas</title>
    <link rel="stylesheet" href="css/alex.css">
</head>

<body>
    <?php
    include('navbar.php');
    ?>

    <div class="container my-5">
        <h2>Lista de Equipas:</h2>
        <a class="btn btn-primary" href="equipasCreate.php" role="button" style="margin-bottom: 15px;">Nova Equipa</a>
        <br>

        <div class="search-bar">
            <input class="search-input form-control" type="text" id="searchInput"
                placeholder="Procurar por equipa ou categoria">
        </div>

        <div class="table-responsive"> <!--Scroll para o lado em baixa resolution-->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome Equipa</th>
                        <th scope="col">Nacionalidade Equipa</th>
                        <th scope="col">Categoria Equipa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../sqli/conn.php';

                    $sql = "SELECT id_equipa, nome_equipa, nac_equipa,cat_equipa FROM equipa ORDER BY id_equipa";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid Query: " . $conn->error);
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                    <tr class='team-card' data-category='{$row['cat_equipa']}' data-nationality='{$row['nac_equipa']}'>
                        <td>{$row['id_equipa']}</td>
                        <td>{$row['nome_equipa']}</td>
                        <td>{$row['nac_equipa']}</td>
                        <td>{$row['cat_equipa']}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='equipasEdit.php?id_equipa={$row['id_equipa']}'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='equipasDelete.php?id={$row['id_equipa']}' onclick=\"return confirm('Tem a certeza que deseja apagar esta linha?')\">Apagar</a>
                        </td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function searchTeams() {
            const searchInput = document.getElementById('searchInput');
            const filterValue = searchInput.value.toLowerCase();
            const teamCards = document.querySelectorAll('.team-card');
            teamCards.forEach(card => {
                const teamName = card.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const category = card.querySelector('td:nth-child(4)').textContent.toLowerCase();
                const nationality = card.querySelector('td:nth-child(3)').textContent.toLowerCase();
                if (teamName.includes(filterValue) || category.includes(filterValue) || nationality.includes(filterValue)) {
                    card.style.display = 'table-row';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', searchTeams);
    </script>

    <?php include('footer.php'); ?>
</body>

</html>