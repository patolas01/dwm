<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adição de utilizadores</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="../css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/addUsers.js"></script>
</head>

<body>
    <?php
    include 'navbar.php';
    include '../sqli/conn.php';
    ?>
    <div class="form-body1">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Novo Admin/Pressman</h3>
                        <p>Preencha o formulário</p>
                        <form action="addUsers.php" method="POST">

                            <div class="col-md-12">
                                <input class="form-control" type="text" id="usernames" name="name" placeholder="Nome">
                                <h5 id="usercheck">
                                    Por favor insira o nome
                                </h5>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" id="email" placeholder="E-mail"
                                    required>
                                <small id="emailvalid" class="form-text text-muted invalid-feedback">
                                    Email deve ser válido
                                </small>
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="telefone" id="telefone"
                                    placeholder="Telefone" required>
                                <small id="emailvalid" class="form-text text-muted invalid-feedback">
                                    Telefone deve ser válido
                                </small>
                            </div>

                            <div class="col-md-12">
                                <select name="cargo" class="form-select mt-3">
                                    <option value="admin" selected>Administrador</option>
                                    <option value="press">Pressman</option>
                                </select>
                            </div>


                            <div class="col-md-12">
                                <input class="form-control" type="password" id="password" name="password"
                                    placeholder="Password">
                                <h5 id="passcheck" style="color: red;">
                                    Por favor insira password
                                </h5>
                            </div>

                            <div class="form-button mt-3">
                                <button name="enviar" type="submit" id="submitbtn" class="btn btn-primary">Registar</button>
                            </div>
                            <div id="userExists"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../footer.php';
    if (isset($_POST["enviar"])) {
        $emailNovoUser = $_POST["email"];
        $nomeNovoUser = $_POST["name"];
        $cargoNovoUser = $_POST["cargo"];
        $telefoneNovoUser = $_POST["telefone"];
        $passwordNovoUserNaoEncriptada = $_POST["password"];
        $passwordNovoUser = hash('sha512', $passwordNovoUserNaoEncriptada);
        $existe = "SELECT * from utilizador where email_user='" . $emailNovoUser . "'";
        $result_set = $conn->query($existe);
        $jaexiste = mysqli_num_rows($result_set);
        if ($jaexiste == 0) {
            $insert = "INSERT INTO utilizador (id_user , nome_user , email_user , password_user , telefone_user , cargo_user) VALUES (NULL, '$nomeNovoUser', '$emailNovoUser', '$passwordNovoUser', '$telefoneNovoUser', '$cargoNovoUser' )";
            $result_set = $conn->query($insert);
            if ($result_set) {
                ?>
                <script>
                    window.setTimeout(function () {
                        location.href = "userManagement.php";
                    }, 0);
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                $(document).ready(function () {
                    $('#userExists').text("Este Admin/Pressman já existe");
                })
            </script>
            <?php
        }
    }
    ?>
</body>

</html>