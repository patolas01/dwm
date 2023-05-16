<!DOCTYPE html>
<html>

<head>
    <title>Count Page Access</title>
</head>

<body>
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
                    ?>
                    <table>
                        <tr>
                            <td>
                                <?php
                                echo $row['nome'];
                                ?>
                            </td>
                            <td></td>
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
        ?>
    </center>
</body>

</html>