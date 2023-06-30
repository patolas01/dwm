<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Feedback</title>
    <link rel="stylesheet" href="../css/paulograca.css">
</head>

<body>
    <?php include('navbar.php');
    include '../sqli/conn.php'; ?>
    <h1 class="tit">Feedback</h1>
    <table class="result">
        <tbody>
            <?php
            $query = 'select * from racesphere.feedback;';
            $result_set = $conn->query($query);
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result_set->fetch_assoc()) {
                echo "
        <tr>
            <td>$row[id]</td>
            <td>$row[hora]</td>
            <td>$row[feedback]</td>
            <td>
                      <a class='btn btn-danger btn-sm' href='feedbackDelete.php?id=$row[id]'>Apagar</a>
                  </td>
        </tr> ";
            }
            if ($result_set) {
                if ($result_set->num_rows >= 1) {

                } else {
                    echo "Não existem pilotos nesta categoria!";
                }
            } else {
                $code = $conn->errno; // error code of the most recent operation
                $message = $conn->error; // error message of the most recent op.
                printf("<p>Query error: %d %s</p>", $code, $message);
            }
            ?>
        </tbody>
    </table>
    <?php include "footer.php"; ?>

</body>

</html>