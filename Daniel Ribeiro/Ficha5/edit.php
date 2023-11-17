<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Account Page</title>
</head>

<body>
    <?php
    if (isset($_POST['editar'])) {
        $editar = $_POST['editar']; ?>
        <form action="edit.php" method="POST">
            <center><br>
                <input type="text" name="email" placeholder="Email"><br><br>
                <input type="text" name="nome" placeholder="Nome"><br><br>
                <input type="submit" name="submit">
            </center>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $emailnovo = $_POST["email"];
            $nomenovo = $_POST["nome"];
            $host = "localhost";
            $database = "pws";
            $user = "root";
            $pass = "";
            $conn = new mysqli($host, $user, $pass, $database);
            if ($conn->connect_errno) {
                echo "Failed to connect to MySQL: " . $conn->connect_error;
                exit();
            } else {
                $query = "select email, pass, nome from utilizador where email='" . $editar . "'";
                $result_set = $conn->query($query);
                if ($result_set) {
                    while ($row = $result_set->fetch_assoc()) {

                        $nome = $row['nome'];
                        $email = $row['email'];
                        $pass = $row['pass'];
                    }
                    if ($email != "admin@gmail.com") {
                        echo "Não tem acesso a esta página"; ?>
                        <script>
                            window.setTimeout(function () {
                                location.href = "login.php";
                            }, 3000);
                        </script>
                        <?php
                    } else {
                        if ($emailnovo == "") {
                            $emailnovo = $email;
                        }
                        if ($nomenovo == "") {
                            $nomenovo = $nome;
                        }
                        $edit = "UPDATE utilizador SET email = '$emailnovo', nome = '$nomenovo' WHERE utilizador.email = '$editar'";
                        $result_set = $conn->query($edit);
                        if ($result_set) {
                            ?>
                            <script>
                                window.setTimeout(function () {
                                    location.href = "listUser.php";
                                }, 0);
                            </script>
                            <?php
                        }
                    }

                }
            }
        }
    }
    ?>
</body>

</html>