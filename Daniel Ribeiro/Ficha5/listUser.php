<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Count Page Access</title>
</head>

<body>
    <?php if (isset($_SESSION)) {
        if ($_SESSION["email"] == "admin@gmail.com") {
            ?>
            <center>
                <?php
                $host = "localhost";
                $database = "pws";
                $user = "root";
                $pass = "";
                $conn = new mysqli($host, $user, $pass, $database);
                if ($conn->connect_errno) {
                    echo "Failed to connect to MySQL: " . $conn->connect_error;
                    exit();
                } else {
                    $query = "select * from utilizador";
                    $result_set = $conn->query($query);
                    if ($result_set) {
                        while ($row = $result_set->fetch_assoc()) {
                            $email = $row['email'];
                            ?>
                            <table border="1">
                                <tr>
                                    <td>
                                        <?php
                                        echo $row['nome'];
                                        ?>
                                    </td>
                                    <td>
                                        <form action="edit.php" method="POST"><button name="editar" type="submit"
                                                value="<?php echo $email ?>" onclick='this.form.submit()'>editar</button></form>
                                    </td>
                                    <td>
                                        <form action="listUser.php" method="POST"><button name="eliminar" type="submit"
                                                value="<?php echo $email ?>" onclick='this.form.submit()'>eliminar</button></form>
                                    </td>
                                </tr>
                            </table>
                            <?php
                        }
                    } else {
                        $code = $conn->errno; // error code of the most recent operation
                        $message = $conn->error; // error message of the most recent op.
                        printf("<p>Query error: %d %s</p>", $code, $message);
                    }
                }
                if (isset($_POST['eliminar'])) {
                    $eliminar = $_POST['eliminar'];
                    $delete = "DELETE FROM utilizador where email='$eliminar'";
                    $result_set = $conn->query($delete);
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
                ?>
            </center>
        <?php } else {
            echo "you do not have acess to this page because you are not an admin";
        }
    } else {
        echo "you are not logged in";
        ?>
        <script>
            window.setTimeout(function () {
                location.href = "login.php";
            }, 3000);
        </script>
        <?php
    } ?>
</body>

</html>