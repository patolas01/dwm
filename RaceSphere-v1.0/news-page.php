<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <?php

    include('sqli/conn.php');

    $id_noticia = $_GET['id'];

    $query = "SELECT * FROM noticias WHERE id_noticia = '$id_noticia'";

    $result = mysqli_query($conn, $query);

    $title = "";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['titulo_noticia'];
            $desc = $row['desc_noticia'];
            $thumb = $row['thumb_noticia'];
            $data = $row['data_noticia']; 
        }
    }

    ?>
    <title>Notícia
        <?php if($title!=""){echo ' - '. $title;} ?>
    </title>
    <link rel="stylesheet" href="css/pauloLeal.css">
</head>

<body>
    <?php include('navbar.php'); ?>


    <div class="newsPage">
        <h1 class="newsPageTitle"><?php echo $title; ?></h1>
        <h6 class=""></h6>
        <img class="newsPageImage" src="img/bd-img/news/<?php echo $thumb; ?>" alt="imagem da noticia">
        <div class="desc">
            <?php
                echo $desc;
            ?>
        </div>
    </div>


    <?php include('footer.php'); ?>
</body>

</html>