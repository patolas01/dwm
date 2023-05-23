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
    include '../sqli/conn.php';
    $editar = $_GET["id"];
    ?>
    <form action="editUsers.php?id=<?=$editar?>" method="POST">
        <center><br>
            <input type="text" name="email" placeholder="Email"><br><br>
            <input type="text" name="nome" placeholder="Nome"><br><br>
            <select name="cargo">
                <option value="admin">Administrador</option>
                <option value="pressman">Pressman</option>
            </select><br><br>
            <input type="submit" name="editar2">
        </center>
    </form>
    <?php
    if (isset($_POST["editar2"])) {
        $emailnovo = $_POST["email"];
        $nomenovo = $_POST["nome"];
        $cargonovo = $_POST["cargo"];
        $query = "select email_admin, cargo_admin, nome_admin from administrador where id_admin='" . $editar . "'";
        $result_set = $conn->query($query);
        if ($result_set) {
            while ($row = $result_set->fetch_assoc()) {

                $nome = $row['nome_admin'];
                $email = $row['email_admin'];
                $pass = $row['cargo_admin'];
            }
            if ($emailnovo == "") {
                $emailnovo = $email;
            }
            if ($nomenovo == "") {
                $nomenovo = $nome;
            }
            $edit = "UPDATE administrador SET email_admin = '" . $emailnovo . "', nome_admin = '" . $nomenovo . "' , cargo_admin = '" . $cargonovo . "' WHERE administrador.id_admin ='" . $editar . "'";
            $result_set = $conn->query($edit);
            if ($result_set) {
                ?>
                <script>
                    window.setTimeout(function () {
                        location.href = "userManagement.php";
                    }, 0);
                </script>
                <?php
            } else {
                echo "Query update mal feita";
            }
        } else {
            echo "Query select feita";
        }

    }

    include '../footer.php';
    ?>
</body>

</html>