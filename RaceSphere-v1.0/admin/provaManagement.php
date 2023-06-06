<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaceSphere Rally</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="../css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="rally-index">
    <?php
    include 'navbar.php';
    include '../sqli/conn.php';
    //Tabela Admins e Pressman
    ?>
    <div id="botaoAddUsers">
        <a href="addProvas.php"><button class="btn btn-primary btn-lg">Adicionar Provas</button></a>
    </div>
    <div id="tabelasListagemUsers">
        <?php
        $query = "select * from prova order by nome_prova";
        $result_set = $conn->query($query);
        if ($result_set) {
            ?>
            <h1>Provas</h1>
            <table class="table table-success table-striped-columns">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Inicio</th>
                    <th>Fim</th>
                    <th>Local</th>
                    <th>Categoria</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                while ($row = $result_set->fetch_assoc()) {
                    $id_prova = $row['id_prova'];
                    ?>
                    <tr>
                        <td>
                            <?php
                            echo $row['id_prova'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $row['nome_prova'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $row['inicio_prova'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $row['fim_prova'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $row['local'];
                            ?>
                        </td>
                        <td>
                            <?php
                            $row['categoria']=strtoupper($row['categoria']);
                            echo $row['categoria'];
                            $row['categoria']=strtolower($row['categoria']);
                            ?>
                        </td>
                        <td>
                            <form <?php if($row['categoria']=="wrc"){
                                echo "action='etapasManagement.php?id=".$id_prova."'";
                                }else{
                                    echo "action='sessaoManagement.php?id=".$id_prova."'"; 
                                } ?>  method="POST"><button><a
                                        <?php if($row['categoria']=="wrc"){
                                            ?> href="etapasManagement.php?id=<?= $id_prova ?>" <?php
                                        }else{  
                                            ?> href="sessaoManagement.php?id=<?= $id_prova ?>" <?php
                                        } ?>>Editar</a></button></form>
                        </td>
                        <td>
                            <form action="provaManagement.php" method="POST"><button name="eliminar" type="submit"
                                    value="<?php echo $id_prova ?>" onclick='this.form.submit()'>Eliminar</button></form>
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
            $delete = "DELETE FROM prova where id_prova='$eliminar'";
            $result_set = $conn->query($delete);
            if ($result_set) {
                ?>
                <script>
                    window.setTimeout(function () {
                        location.href = "provaManagement.php";
                    }, 0);
                </script>
                <?php
            }
        }
        ?>
    </div>
    <?php
    include '../footer.php';
    ?>
</body>

</html>