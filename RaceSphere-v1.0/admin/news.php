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
                //foreach select table noticia
            ?>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <?php include('footer.php'); ?>
</body>

</html>