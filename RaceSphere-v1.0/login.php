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

    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-12">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="img/img_alex/loginimg.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-7 p-lg-6 text-black">

                                    <form>

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="navbar-brand"><img src="img/logo.svg" alt="RaceSphere" height="50" width="50"></span>
                                            <span class="h1 fw-bold mb-0">RaceSphere</span>
                                        </div>

                                        <h5 class="fw-normal mb-1 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
    
                                        <div class="form-outline mb-3">
                                            <input type="email" id="form2Example17"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="button">Login</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="#!" style="color: #393f81;">Register here</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








    <?php
    if (isset($_POST['submit'])) {
        $host = "localhost";
        $database = "racesphere";
        $user = "root";
        $pass = "";
        $conn = new mysqli($host, $user, $pass, $database);
        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn->connect_error;
            exit();
        } else {
            $email = $_POST['email'];
            $plaintext_password = $_POST['pass'];
            $password = hash('sha512', $plaintext_password);
            $query = "select email, pass, nome from utilizador where email='" . $email . "' and pass='" . $password . "'";
            $result_set = $conn->query($query);
            if ($result_set) {
                if ($result_set->num_rows == 1) {
                    while ($row = $result_set->fetch_assoc()) {

                        $nome = $row['nome'];
                        $_SESSION = array();
                        $_SESSION["email"] = $email;
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