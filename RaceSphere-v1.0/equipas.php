<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Equipas</title>
    <link rel="stylesheet" href="css/alex.css">
    <style>
        .team-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            margin-top: 20px;
        }

        .team-card {
            text-align: center;
        }

        .team-card img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        .team-card h3 {
            margin-top: 10px;
        }
        
        .title-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <div class="title-container">
            <h1>Equipas</h1>
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
                    echo '<div class="team-card">';
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
</body>

</html>