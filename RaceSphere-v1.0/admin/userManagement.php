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
        //Tabela Admins e Pressman
        ?>
        <div id="botaoAddUsers">
            <a href="addUsers.php"><button class="btn btn-primary btn-lg">Adicionar Users</button></a>
        </div>
        <div id="tabelasListagemUsers">

            <?php
            //Tabela Users
            $query = "select * from utilizador where cargo_user!='' order by cargo_user, nome_user";
            $result_set = $conn->query($query);
            if ($result_set) {
                ?>
                <h1>Admin/Pressman</h1>
                <table class="table table-success table-striped-columns">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Cargo</th>
                        <th>Editar contas</th>
                        <th>Eliminar contas</th>
                    </tr>
                    <?php
                    while ($row = $result_set->fetch_assoc()) {
                        $id_user = $row['id_user'];
                        ?>
                        <tr>
                            <td>
                                <?php
                                echo $row['id_user'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['nome_user'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['email_user'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['telefone_user'];
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($row['cargo_user'] == "press") {
                                    $row['cargo_user'] .= "man";
                                } else {
                                    $row['cargo_user'] .= "istrador";
                                }
                                $cargo_user = ucfirst($row['cargo_user']);
                                echo $cargo_user;

                                ?>
                            </td>
                            <td>
                                <form action="editUsers.php" method="POST"><button><a
                                            href="editAdminPress.php?id=<?= $id_user ?>">Editar</a></button></form>
                            </td>
                            <td>
                                <form action="userManagement.php" method="POST"><button name="eliminaruser" type="submit"
                                        value="<?php echo $id_user ?>" onclick='this.form.submit()'>Eliminar</button></form>
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
            //Tabela Users
            $query = "select * from utilizador where cargo_user IS NULL order by nome_user";
            $result_set = $conn->query($query);
            if ($result_set) {
                ?>
                <h1>Utilizadores</h1>
                <table class="table table-success table-striped-columns">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Editar contas</th>
                        <th>Eliminar contas</th>
                    </tr>
                    <?php
                    while ($row = $result_set->fetch_assoc()) {
                        $id_user = $row['id_user'];
                        ?>
                        <tr>
                            <td>
                                <?php
                                echo $row['id_user'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['nome_user'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['email_user'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['telefone_user'];
                                ?>
                            </td>
                            <td>
                                <form action="editAdminPress.php" method="POST"><button><a
                                            href="editAdminPress.php?id=<?= $id_user ?>">Editar</a></button></form>
                            </td>
                            <td>
                                <form action="userManagement.php" method="POST"><button name="eliminaruser" type="submit"
                                        value="<?php echo $id_user ?>" onclick='this.form.submit()'>Eliminar</button></form>
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

            if (isset($_POST['eliminaruser'])) {
                $eliminar = $_POST['eliminaruser'];
                $delete = "DELETE FROM utilizador where id_user='$eliminar'";
                $result_set = $conn->query($delete);
                if ($result_set) {
                    ?>
                    <script>
                        window.setTimeout(function () {
                            location.href = "userManagement.php";
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