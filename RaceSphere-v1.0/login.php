<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sessão</title>
    <?php include('bootstrapInc.php'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/alex.css">

</head>

<body>
    <form action = "login.php" method="post">
        <div class="container py-5 h-100 vh-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6 d-none d-md-block">
                                <img src="img/img_alex/loginIMG.jpg" alt="login form"
                                        class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>

                            <div class="col-md-4 col-lg-5 d-flex align-items-center">
                                <div class="card-body p-7 p-lg-6 text-black">

                                    <form>

                                        <div class="d-flex align-items-center">
                                           <a href="index.php"> <span class="navbar-brand"><img src="img/logoExt.svg" alt="RaceSphere" height="90" width="220"></span></a>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" class="form-control form-control-lg" name="email"/>
                                            
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form2Example27">Palavra Passe</label>
                                            <input type="password" id="form2Example27" class="form-control form-control-lg" name="pass" />
                                            
                                        </div>

                                        
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="button">Iniciar Sessão</button>
                                        </div>

                                        <p>Ainda não tem conta? <a href="register.php" style="color: #393f81;">Registe-se aqui</a></p>
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

        $conn = new mysqli($host, $user, $pass, $database);
        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn->connect_error;
            exit();
        } else {
            $email = $_POST['email'];
            $plaintext_password = $_POST['pass'];
            $password = hash('sha512', $plaintext_password);
            $query = "select email, pass from utilizador where email='" . $email . "' and pass='" . $password . "'";
            $result_set = $conn->query($query);

            if ($result_set) {
                if ($result_set->num_rows == 1) {
                    while ($row = $result_set->fetch_assoc()) {

                        $nome = $row['nome'];
                        $_SESSION = array();
                        $_SESSION["email"] = $email_user;
                        $_SESSION["nome"] = $nome;
                    }
                    if ($email == "admin@gmail.com") { ?>
                        <script>
                            window.setTimeout(function () {
                                location.href = "listUser.php";
                            }, 3000);
                        </script>
                        <?php
                    }
                    echo "Bem-Vindo " . $_SESSION["nome"];
                } else {
                    echo "Erro na autenticação, credenciais erradas tente de novo";
                }
            } else {
                $code = $conn->errno; // error code of the most recent operation
                $message = $conn->error; // error message of the most recent op.
                printf("<p>Query error: %d %s</p>", $code, $message);
            }
        }
    }
    ?>
</body>

</html>