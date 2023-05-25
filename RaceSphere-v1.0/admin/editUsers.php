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
    $query = "select nome_user, email_user, telefone_user from utilizador where id_user='" . $editar . "'";
    $result_set = $conn->query($query);
    if ($result_set) {
        while ($row = $result_set->fetch_assoc()) {
            $telefone = $row['telefone_user'];
            $nome = $row['nome_user'];
            $email = $row['email_user'];
        }
    }
    ?>
    <form action="editUsers.php?id=<?= $editar ?>" method="POST">
        <center><br>
            <input type="text" name="nome" placeholder=<?php echo "'".$nome."'"?>><br><br>
            <input type="text" name="telefone" placeholder=<?php echo "'".$telefone."'"?>><br><br>
            <input type="submit" name="editar2">
        </center>
    </form>
    <?php
    if (isset($_POST["editar2"])) {
        $nomenovo = $_POST["nome"];
        $telefonenovo = $_POST["telefone"];
        if ($telefonenovo == "") {
            $telefonenovo = $telefone;
        }
        if ($nomenovo == "") {
            $nomenovo = $nome;
        }
        $edit = "UPDATE utilizador SET nome_user = '" . $nomenovo . "' , telefone_user = '" . $telefonenovo . "' WHERE utilizador.id_user ='" . $editar . "'";
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
    }
    include '../footer.php';
    ?>
</body>

</html>