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
    /*//se nao for admin
    if($_SESSION["cargo"]!="admin"){
        ?>
        <script>
                window.setTimeout(function () {
                    location.href = "index.php";
                }, 0);
            </script><?php
    }
    else{
        //tudo
    }*/
    include 'navbar.php';
    include '../sqli/conn.php';
    $editar = $_GET["id"];
    $query = "select * from utilizador where id_user='" . $editar . "'";
    $result_set = $conn->query($query);
    if ($result_set) {
        while ($row = $result_set->fetch_assoc()) {
            $cargo = $row['cargo_user'];
            $nome = $row['nome_user'];
            $telefone = $row['telefone_user'];
        }
    }
    ?>
    <form action="editAdminPress.php?id=<?= $editar ?>" method="POST">
        <div class="form-body1">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h3>Editar
                                <?php
                                $cargo = ucfirst($cargo);
                                echo " " . $cargo . " " . $nome;
                                $cargo = lcfirst($cargo); ?>
                            </h3>
                            <p>Preencha o formulário</p>
                            <form action="editAdminPress.php?id=<?= $editar ?>" action="POST"
                                class="requires-validation" novalidate>

                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="nome" placeholder=<?php echo "'" . $nome . "'" ?>>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="telefone" placeholder=<?php echo "'" . $telefone . "'" ?>>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                    if ($cargo == "admin") { ?>
                                        <select name="cargo" class="form-select mt-3">
                                            <option value="admin" selected>Administrador</option>
                                            <option value="press">Pressman</option>
                                            <option value="">User</option>
                                        </select><br><br>
                                        <?php
                                    } elseif ($cargo == "press") {
                                        ?>
                                        <select name="cargo" class="form-select mt-3">
                                            <option value="admin">Administrador</option>
                                            <option value="press" selected>Pressman</option>
                                            <option value="">User</option>
                                        </select><br><br>
                                        <?php
                                    } else {
                                        ?>
                                        <select name="cargo" class="form-select mt-3">
                                            <option value="admin">Administrador</option>
                                            <option value="press">Pressman</option>
                                            <option value="" selected>User</option>
                                        </select><br><br>
                                        <?php
                                    }
                                    ?>
                                </div><br>
                                <div class="col-md-12">
                                    <input type="submit" value="Atualizar" name="editar2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <?php
    if (isset($_POST["editar2"])) {
        $telefonenovo = $_POST["telefone"];
        $nomenovo = $_POST["nome"];
        $cargonovo = $_POST["cargo"];
        if ($telefonenovo == "") {
            $telefonenovo = $telefone;
        }
        if ($nomenovo == "") {
            $nomenovo = $nome;
        }
        if ($cargonovo == "") {
            $edit = "UPDATE utilizador SET nome_user = '$nomenovo' , telefone_user = '$telefonenovo', cargo_user = NULL WHERE utilizador.id_user = '$editar'";
        } else {
            $edit = "UPDATE utilizador SET nome_user = '$nomenovo' , telefone_user = '$telefonenovo', cargo_user = '$cargonovo' WHERE utilizador.id_user = '$editar'";
        }
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

<!--
   
-->