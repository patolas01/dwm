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
                        <form action="addUsers.php" action="POST" id="form" class="requires-validation">

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="name" placeholder="Nome" required>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="telefone" placeholder="Telefone" required pattern="/^([9][1236\s])[0-9\s]*$/">
                            </div>

                            <div class="col-md-12">
                                <select name="cargo" class="form-select mt-3" required>
                                    <option selected disabled value="">Cargo</option>
                                    <option value="admin">Administrador</option>
                                    <option value="press">Pressman</option>
                                    <option value="NULL">Utilizador</option>
                                </select>
                            </div>


                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" placeholder="Password"
                                    required pattern="^[a-zA-Z]\w{3,16}$">
                            </div>

                            <div class="form-button mt-3">
                                <button name="enviar" type="submit" class="btn btn-primary">Registar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../footer.php';
    if(isset($_POST["enviar"])){
        $emailNovoUser=$_POST["email"];
        $nomeNovoUser=$_POST["nome"];
        $cargoNovoUser=$_POST["cargo"];
        $telefoneNovoUser=$_POST["telefone"];
        $passwordNovoUserNaoEncriptada=$_POST["password"];
        $passwordNovoUser = hash('sha512', $passwordNovoUserNaoEncriptada);
        $query="INSERT INTO utilizador (id_user , nome_user , email_user , password_user , telefone_user , cargo_user) VALUES (NULL, $nomeNovoUser, $emailNovoUser, $passwordNovoUser, $telefoneNovoUser, )";
    }
    ?>
</body>

</html>