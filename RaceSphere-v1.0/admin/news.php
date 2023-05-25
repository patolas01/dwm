<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <?php include('bootstrapInc.php'); ?>
    <title>Gerir Noticias</title>
    <link rel="stylesheet" href="../css/pauloLeal.css">

</head>

<body>
    <?php include('navbar.php'); ?>

    <h1>Gerir Notícias</h1>
    <br>
    <a href="newsAdd.php" class="btn btn-success">Adicionar Noticia</a>
    <table class="table" id="newsManage">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Data</th>
                <th scope="col">Titulo</th>
                <th scope="col">Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../sqli/conn.php';
            $query = "SELECT id_noticia, titulo_noticia, cat_noticia, data_noticia FROM noticias";
            $result = mysqli_query($conn, $query);

            // Creating an HTML table
            if (mysqli_num_rows($result) > 0) {

                // Fetching and displaying each row of data
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_noticia'] . "</td>";
                    echo "<td>" . $row['data_noticia'] . "</td>";
                    echo "<td>" . $row['titulo_noticia'] . "</td>";
                    echo "<td>" . $row['cat_noticia'] . "</td>";
                    echo "<td><a href='#' class='btn btn-secondary' value=" . $row['id_noticia'] . ">Editar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No records found.";
            }

            // Closing the database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
    <?php include('footer.php'); ?>
</body>

</html>