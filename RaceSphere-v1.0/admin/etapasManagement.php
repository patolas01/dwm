<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de utilizadores</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="../css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'navbar.php';
    if ($_SESSION["cargo"] != "admin" || !isset($_SESSION["cargo"])) {
        ?>
        <script>
            window.setTimeout(function () {
                location.href = "../index.php";
            }, 0);
        </script>
        <?php
    } else {
        //tudo
    

        include '../sqli/conn.php';
        $editar = $_GET["id"]; ?>
        <div id="botaoAddUsers">
            <a href="addEtapas.php?id=<?php echo $editar; ?>"><button class="btn btn-primary btn-lg">Adicionar
                    Etapas</button></a>
        </div>
        <div id="tabelasListagemUsers">
            <?php
            $query = "select * from etapa where id_prova='" . $editar . "' order by num_etapa";
            $result_set = $conn->query($query);
            if ($result_set) {
                ?>
                <h1>Etapas</h1>
                <table class="table table-success table-striped-columns">
                    <tr>
                        <th>Id</th>
                        <th>Ronda</th>
                        <th>Dia</th>
                        <th>Inicio</th>
                        <th>Fim</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php
                    while ($row = $result_set->fetch_assoc()) {
                        $id_etapa = $row['id_etapa'];
                        ?>
                        <tr>
                            <td>
                                <?php
                                echo $row['id_etapa'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['num_etapa'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['dia_etapa'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['inicio_etapa'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['fim_etapa'];
                                ?>
                            </td>
                            <td>
                                <form action="editEtapas.php" method="POST"><button><a
                                            href="editEtapas.php?id=<?= $id_etapa ?>">Editar</a></button></form>
                            </td>
                            <td>
                                <form action="etapasManagement.php?id=<?= $id_etapa ?>" method="POST"><button name="eliminar"
                                        type="submit" value="<?php echo $id_etapa ?>" onclick='this.form.submit()'>Eliminar</button>
                                </form>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                </table>
                <?php
            } else {
                $code = $conn->errno; // error code of the most recent operation
                $message = $conn->error; // error message of the most recent op.
                printf("<p>Query error: %d %s</p>", $code, $message);
            }

            if (isset($_POST['eliminar'])) {
                $eliminar = $_POST['eliminar'];
                $delete = "DELETE FROM etapa where id_etapa='$eliminar'";
                $result_set = $conn->query($delete);
                if ($result_set) {
                    ?>
                    <script>
                        let id_prova = <?php echo $editar ?>
                        alert(id_prova);
                        window.setTimeout(function () {
                            location.href = "etapasManagement.php?id=" + id_prova;
                        }, 0);
                    </script>
                    <?php
                }
            }
            ?>
        </div>
        <?php
        include '../footer.php';
    } ?>
</body>

</html>