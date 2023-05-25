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
    <script src="js/danielAdmin.js"></script>
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
                        <form action="addUsers.php" action="POST" class="requires-validation" novalidate>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="name" placeholder="Nome" required>
                                <div class="valid-feedback">O campo nome é válido!</div>
                                <div class="invalid-feedback">O campo nome não pode estar a branco!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail" required>
                                <div class="valid-feedback">O Email é valido!</div>
                                <div class="invalid-feedback">O campo de Email não pode estar em branco!</div>
                            </div>

                            <div class="col-md-12">
                                <select name="cargo" class="form-select mt-3" required>
                                    <option selected disabled value="">Cargo</option>
                                    <option value="admin">Administrador</option>
                                    <option value="press">Pressman</option>
                                </select>
                                <div class="valid-feedback">Cargo selecionado</div>
                                <div class="invalid-feedback">Por favor selecione um cargo</div>
                            </div>


                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" placeholder="Password"
                                    required>
                                <div class="valid-feedback">Password é válida!</div>
                                <div class="invalid-feedback">O campo de password não pode estar em branco!</div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label">Eu confirmo que todas os campos estão preenchidos
                                    corretamente</label>
                                <div class="invalid-feedback">Por favor confirme que todos os dados estão corretos</div>
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
        $emailNovoAdminPressman=$_POST["email_admin"];
        $nomeNovoAdminPressman=$_POST["email_admin"];
        $cargoNovoAdminPressman=$_POST["email_admin"];
        $passwordNovoAdminPressmanNaoEncriptada=$_POST["email_admin"];
    }
    ?>
</body>

</html>