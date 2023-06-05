<?php
include '../sqli/conn.php';

$idequipa = $_POST['idequipa'];

$sql = "DELETE FROM equipa WHERE id_equipa = '$id_equipa'";

if ($conn->query($sql) == TRUE) {
    header('location: equipas.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

?>