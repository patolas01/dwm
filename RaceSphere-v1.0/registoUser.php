<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registo</title>
    <?php include('bootstrapInc.php');
    include('sqli/conn.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/alex.css">
    <script src="js/registoUser.js"></script>
</head>

<body>

    <a href="admin/index.php" class="btn btn-secondary" id="admin-button">Admin</a>


    <form id="form" action="registoUser.php" method="post">
        <div class="container py-5 h-100 vh-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6 d-none d-md-block">
                                <img src="img/img_alex/loginIMG.jpg" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem; height: 100%; object-fit: cover;" />
                            </div>

                            <div class="col-md-6 col-lg-6 d-flex align-items-center">
                                <div class="card-body p-7 p-lg-6 text-black">

                                    <form>

                                        <div class="d-flex align-items-center">
                                            <a href="index.php"> <span class="navbar-brand"><img src="img/logoExt.svg"
                                                        alt="RaceSphere" height="90" width="220"></span></a>
                                        </div>
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="usernames">Nome</label>
                                            <input type="text" id="usernames" class="form-control form-control-lg"
                                                name="nome" required>
                                            <h5 id="usercheck">
                                                Por favor insira o nome
                                            </h5>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" class="form-control form-control-lg"
                                                name="email" required>

                                        </div>
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="telefone">Telefone</label>
                                            <input type="text" id="telefone" class="form-control form-control-lg"
                                                name="telefone" required>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="password">Palavra Passe</label>
                                            <input type="password" id="password" class="form-control form-control-lg"
                                                name="password" required>
                                        </div>
                                        <h5 id="passcheck">
                                            Por favor a palavra passe
                                        </h5>
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="confirmPassword">Confirme Palavra
                                                Passe</label>
                                            <input type="password" id="confirmPassword"
                                                class="form-control form-control-lg" name="confirmPassword" required>
                                        </div>
                                        <h5 id="confirmPasscheck">
                                            Palavra-passe deve coincidir
                                        </h5>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit"
                                                id="botaoRegisto" name="submit">Registar-se</button>
                                        </div>
                                        <p id="contaexiste">Este email já foi utilizado por favor use outro email para
                                            registo ou faça login com este email</p>
                                        <p>Já tem conta? <a href="login.php" style="color: #393f81;">Então entre na sua
                                                conta aqui</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $plaintext_password = $_POST['password'];
        $password = hash('sha512', $plaintext_password);
        $query = "SELECT * FROM utilizador where email_user = '$email'";

        $result_set = $conn->query($query);

        if ($result_set) {
            if ($result_set->num_rows != 1) {
                $queryRegisto = "INSERT INTO utilizador (id_user, nome_user, email_user, password_user, telefone_user, cargo_user) VALUES (NULL, '$nome', '$email', '$password', '$telefone', NULL)";
                $result_set2 = $conn->query($queryRegisto);
                if ($result_set2) {
                    $cargo_user = "utilizador";
                    $_SESSION = array();
                    $_SESSION["nome"] = $nome;
                    $_SESSION["cargo_user"] = $cargo_user;
                    ?>
                    <script>
                        window.setTimeout(function () {
                            location.href = "index.php";
                        }, 0);
                    </script>
                    <?php
                }
            } else {
                include('js/emailExiste.js');
            }
        } else {
            $code = $conn->error; // error code of the most recent operation
            $message = $conn->error; // error message of the most recent op.
            printf("<p>Query error: %d %s</p>", $code, $message);
        }
    }
    ?>
</body>