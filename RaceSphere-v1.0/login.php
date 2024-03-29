<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sessão</title>
    <?php include('bootstrapInc.php');
    include('sqli/conn.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/alex.css">

</head>

<body>
    <form id="form" action="login.php" method="post">
        <div class="container py-5 h-100 vh-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6 d-none d-md-block">
                                <img src="img/img_alex/loginIMG.jpg" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>

                            <div class="col-md-6 col-lg-6 d-flex align-items-center">
                                <div class="card-body p-7 p-lg-6 text-black">

                                    <form>

                                        <div class="d-flex align-items-center">
                                            <a href="index.php"> <span class="navbar-brand"><img src="img/logoExt.svg"
                                                        alt="RaceSphere" height="90" width="220"></span></a>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" class="form-control form-control-lg"
                                                name="email" required>

                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form2Example27">Palavra Passe</label>
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" name="pass" required
                                                 />
                                        </div>


                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit"
                                                name="submit">Iniciar
                                                Sessão</button>
                                        </div>

                                        <p>Ainda não tem conta? <a href="registoUser.php"
                                                style="color: #393f81;">Registe-se aqui</a></p>
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
        $plaintext_password = $_POST['pass'];
        $password = hash('sha512', $plaintext_password);
        $query = "select email_user, password_user, nome_user, cargo_user from utilizador where email_user='" . $email . "' and password_user='" . $password . "'";

        $result_set = $conn->query($query);

        if ($result_set) {
            if ($result_set->num_rows == 1) {
                while ($row = $result_set->fetch_assoc()) {
                    $cargo_user = $row['cargo_user'];
                    $nome = $row['nome_user'];
                    $_SESSION = array();
                    $_SESSION["nome"] = $nome;
                    $_SESSION["cargo"] = $cargo_user;
                }
                if($cargo_user=="admin"){
                ?>
                <script>
                    window.setTimeout(function () {
                        location.href = "admin/userManagement.php";
                    }, 0);
                </script>
                <?php
                }else if($cargo_user=="press"){
                    ?>
                    <script>
                        window.setTimeout(function () {
                            location.href = "admin/news.php";
                        }, 0);
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        window.setTimeout(function () {
                            location.href = "index.php";
                        }, 0);
                    </script>
                    <?php
                }


            }
        } else {
            $code = $conn->error; // error code of the most recent operation
            $message = $conn->error; // error message of the most recent op.
            printf("<p>Query error: %d %s</p>", $code, $message);
        }
    }
    ?>
</body>

</html>