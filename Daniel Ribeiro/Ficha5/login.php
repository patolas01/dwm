<!DOCTYPE html>
<html>

<head>
    <title>Count Page Access</title>
</head>

<body>
    <form action="login.php" method="POST">
        <center><br>
            <input type="text" name="email" placeholder="Email"><br><br>
            <input type="text" name="pass" placeholder="Password"><br><br>
            <input type="submit" name="submit">
        </center>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $host = "localhost";
        $database = "pws";
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
                    echo "Bem-Vindo ".$_SESSION["nome"];
                } else {
                    echo "Erro na autenticação credenciais erradas tente de novo";
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