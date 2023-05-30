<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    $q = $_GET['q'];

    $con = mysqli_connect('localhost', 'root', '');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "pws");
    $sql = "SELECT * FROM utilizador WHERE email = '" . $q . "'";
    $result = mysqli_query($con, $sql);

    echo "<table>
<tr>
<th>Email</th>
<th>Nome</th>
<th>Foto</th>
</tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td> <img src='upload_img/" . $row['foto'] . "'> </td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);
    ?>
</body>

</html>