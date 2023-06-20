<?php
include '../sqli/conn.php';

$id_sessao = $_GET['id'];

$sql = "DELETE FROM sessao WHERE id_sessao = '$id_sessao'";

if ($conn->query($sql) === TRUE) {
    header('location: sessao.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
?>