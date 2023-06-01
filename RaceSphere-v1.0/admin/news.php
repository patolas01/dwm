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
    <?php
    include('navbar.php');
    include '../bootstrap/modals/modalDelete.php';
    ?>


    <h1>Gerir Notícias</h1>
    <br>

    <div class="newsTooltip">
        <a href="newsAdd.php" class="btn btn-success">Adicionar Noticia</a>
        <form id="searchForm" class="form-inline mt-3">
            <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Pesquisar"
                aria-label="Search">
        </form>
    </div>

    <table class="table table-striped table-bordered" id="newsManage">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Data</th>
                <th scope="col">Titulo</th>
                <th scope="col">Categoria</th>
                <th scope="col"></th>
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
                    $color = '';
                    if ($row['cat_noticia'] == 'f1') {
                        $color = 'red';
                    } elseif ($row['cat_noticia'] == 'wec') {
                        $color = 'green';
                    } elseif ($row['cat_noticia'] == 'wrc') {
                        $color = 'blue';
                    }

                    echo "<tr>";
                    echo "<td class='idCell cat-" . $row['cat_noticia'] . "'>";
                    echo $row['id_noticia'];
                    echo "</td>";
                    echo "<td>" . $row['data_noticia'] . "</td>";
                    echo "<td>" . $row['titulo_noticia'] . "</td>";
                    echo "<td>" . strtoupper($row['cat_noticia']) . "</td>";
                    echo "<td><a href='#' class='btn btn-secondary' value=" . $row['id_noticia'] . ">Editar</a> <a href='' data-toggle='modal' data-target='#deleteModal' data-id=" . $row['id_noticia'] . " class='btn btn-danger'><img src='../img/icons8-delete-50.png'></a></td>";
                    echo "</tr>";
                }
            } else {
                echo "No records found.";
            }

            // Closing the database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
    <script src="../jquery/modals.js"></script>
    <?php include('footer.php'); ?>
</body>

</html>