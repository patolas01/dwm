<?php
include '../sqli/conn.php';

$noticiaId = $_POST['noticiaID'];

$sql = "DELETE FROM noticias WHERE id_noticia = '$noticiaId'";

if ($conn->query($sql) === TRUE) {
    header('location: news.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

?>