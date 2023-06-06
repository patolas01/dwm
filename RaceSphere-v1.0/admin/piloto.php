<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <?php include('bootstrapInc.php'); ?>
    <title>Gerir Pilotos</title>
    <link rel="stylesheet" href="../css/paulograca.css">

</head>

<body>
    <?php
    include('navbar.php');
    ?>

    <div class="container my-5"
        style="height: auto; width: 50%; align-items: center;margin-left: auto; margin-right: auto;">
        <h1 class="tit">Lista de Pilotos</h1>
        <br>

        <table class="table">
            <tbody>
                <?php
                include '../sqli/conn.php';

                $sql = "SELECT * FROM piloto";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid Query: " . $conn->error);
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    $row['cat_piloto'] = strtoupper($row['cat_piloto']);
                    echo "
                <tr>
                  <td>$row[nome_piloto]</td>
                   <td>$row[numero_piloto]</td>
                   <td>$row[nac_piloto]</td>
                   <td>$row[cat_piloto]</td>
                  <td>
                      <a class='btn btn-primary btn-sm' href='pilotoEdit.php?id_piloto={$row['id_piloto']}'>Editar</a>
                      <a class='btn btn-danger btn-sm' href='pilotoDelete.php?id=$row[id_piloto]'>Apagar</a>
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