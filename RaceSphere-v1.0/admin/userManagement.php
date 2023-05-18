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
    <link rel="stylesheet" href="css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="rally-index">
    <?php
    include '../navbar.php';
    include '../sqli/conn.php';
    $query = "select * from administrador";
    $result_set = $conn->query($query);
    if ($result_set) {
        ?>
        <h1>Tabela Admins e Pressmans</h1>
        <table class="table table-success table-striped-columns">
            <tr><th>Id</th><th>Nome</th><th>Cargo</th><th>Email</th></tr>
            <?php
            while ($row = $result_set->fetch_assoc()) {
                $id_user=$row['id_admin'];
                ?>
                <tr>
                    <td>
                        <?php
                        echo $row['id_admin'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $row['nome_admin'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $row['cargo_admin'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $row['email_admin'];
                        ?>
                    </td>
                    <td>
                        <form action="userManagement.php" method="POST"><button name="eliminar" type="submit"
                                value="<?php echo $id_user ?>" onclick='this.form.submit()'>eliminar</button></form>
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
        $delete = "DELETE FROM administrador where id_admin='$eliminar'";
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
    include '../footer.php';
    ?>
</body>

</html>