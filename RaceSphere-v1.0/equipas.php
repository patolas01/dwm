<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Equipas</title>
    <link rel="stylesheet" href="css/alex.css">
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <div class="title-container">
            <h1>Equipas</h1>
        </div>
        
        <div class="search-bar">
            <input class="search-input form-control" type="text" id="searchInput" placeholder="Procurar por equipa ou categoria">
            <button class="filter-button btn btn-primary" data-category="all">All</button>
            <button class="filter-button btn btn-primary" data-category="f1">F1</button>
            <button class="filter-button btn btn-primary" data-category="wrc">WRC</button>
            <button class="filter-button btn btn-primary" data-category="wec">WEC</button>
        </div>

        <div class="team-grid">

            <?php
            include('sqli/conn.php');

            // Retrieve data from the database
            $sql = "SELECT id_equipa, nome_equipa, nac_equipa, cat_equipa, logo_equipa FROM equipa ORDER BY id_equipa";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    $id_equipa = $row["id_equipa"];
                    $nome_equipa = $row["nome_equipa"];
                    $nac_equipa = $row["nac_equipa"];
                    $cat_equipa = $row["cat_equipa"];
                    $logo_equipa = $row["logo_equipa"];

                    // Display the team information
                    echo '<div class="team-card ' . strtolower($cat_equipa) . '" data-category="' . $cat_equipa . '">';
                    echo '<a href="team.php?id=' . $id_equipa . '">';
                    echo '<img src="img/' . $logo_equipa . '" alt="' . $nome_equipa . '">';
                    echo '</a>';
                    echo '<h3>' . $nome_equipa . '</h3>';
                    echo '<p><strong>Nacionalidade:</strong> ' . $nac_equipa . '</p>';
                    echo '<p><strong>Categoria:</strong> ' . $cat_equipa . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No teams found.</p>';
            }

            $conn->close();
            ?>

        </div>

    </div>

    <?php include('footer.php'); ?>
    
    <script>
        // Filter teams based on category
        function filterTeams(category) {
            const teamCards = document.querySelectorAll('.team-card');
            teamCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Search teams by team name or category
        function searchTeams() {
            const searchInput = document.getElementById('searchInput');
            const filterValue = searchInput.value.toLowerCase();
            const teamCards = document.querySelectorAll('.team-card');
            teamCards.forEach(card => {
                const teamName = card.querySelector('h3').textContent.toLowerCase();
                const category = card.getAttribute('data-category').toLowerCase();
                if (teamName.includes(filterValue) || category.includes(filterValue)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Event listeners for filter buttons and search input
        const filterButtons = document.querySelectorAll('.filter-button');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                filterTeams(category);
            });
        });
        
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('keyup', searchTeams);
    </script>
</body>

</html>