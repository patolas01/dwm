<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <?php include('bootstrapInc.php'); ?>
    <title>Gerir Equipas</title>
    <link rel="stylesheet" href="../css/alex.css">

</head>

<body>
    <?php
    include('navbar.php');
    ?>

    <div class="container my-5"
        style="height: auto; width: 50%; align-items: center;margin-left: auto; margin-right: auto;">
        <h2>Lista de Equipas:</h2>
        <a class="btn btn-primary" href="equipasCreate.php" role="button" style="margin-bottom: 15px;">Nova Equipa</a>
        <br>

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
                <tr>
                  <td>$row[id_equipa]</td>
                   <td>$row[nome_equipa]</td>
                   <td>$row[nac_equipa]</td>
                   <td>$row[cat_equipa]</td>
                  <td>
                      <a class='btn btn-primary btn-sm' href='equipasEdit.php?id_equipa={$row['id_equipa']}'>Editar</a>
                      <a class='btn btn-danger btn-sm' href='equipasDelete.php?id=$row[id_equipa]'>Apagar</a>
                  </td>
               </tr>
                ";
                }
                ?>
            </tbody>
        </table>
    </div>


    <?php include('footer.php'); ?>
</body>

</html>