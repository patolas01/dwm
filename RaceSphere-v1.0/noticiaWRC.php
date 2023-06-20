<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias WRC</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="noticiasWRC">
    <?php
    include 'navbar.php';
    include 'sqli/conn.php';
    $id_noticia = $_GET["id"];
    ?>
    <div id="centradoAoMeio">
        <?php
        $query = "SELECT * FROM noticias where noticias.id_noticia = '$id_noticia'";
        $result_set = $conn->query($query);
        if ($result_set) {
            while ($row = $result_set->fetch_assoc()) {
                $titulo = $row["titulo_noticia"];
                $descricao = $row["desc_noticia"];
                $thumbnail = $row["thumb_noticia"];
                $data = $row["data_noticia"];
            }
            $data2 = strtotime($data);
            $dataFormatoPortugal = date("d-m-Y", $data2);
            ?>
            <h2 class="middleTextTitle">
                <?php echo $titulo; ?>
            </h2>
            <h4 class="middleTextTitle">
                <?php echo "Noticia publicada a " . $dataFormatoPortugal; ?>
            </h4><br><img id="thumbnail_notica_wrc" src=<?php echo "'img/bd-img/news/$thumbnail'"; ?>
                alt="Thumbnail da Noticia">
            <div id="descricaoNoticia">
                <?php echo $descricao; ?>
            </div>
            <?php
        } else {
            ?>
            <h1>Ocurreu um erro tente de novo</h1>
            <?php
        }
        $query2 = "SELECT * FROM noticias_imagem where noticias_imagem.id_noticia = '$id_noticia'";
        $result_set2 = $conn->query($query2);
        if ($result_set2) {
            while ($row = $result_set2->fetch_assoc()) {
                $imagensNoticia = $row["img_nimg"];
                $altImagensNoticia = $row["alt_nimg"];
                ?>
                <div id="divImagensNoticia">
                    <img class="imagensDaNoticia" src=<?php echo "'img/bd-img/news/$imagensNoticia'"; ?>
                        alt="<?php echo $altImagensNoticia ?>"><?php echo $altImagensNoticia ?>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <h2 class="middleTextTitle">
        Mais noticias
    </h2>
    <div class="container">
        <div class="row">
            <?php
            $query3 = "SELECT * FROM noticias where cat_noticia = 'wrc' ORDER BY id_noticia DESC limit 4";
            $result_set3 = $conn->query($query3);
            if ($result_set3) {
                while ($row = $result_set3->fetch_assoc()) {
                    $imagemcarta = $row['thumb_noticia']
                        ?>
                    <div class="col-sm-3">
                        <div class="card" style="width: 18rem;">
                            <img src=<?php echo "'img/bd-img/news/$imagemcarta'"; ?> class="card-img-top" alt="fotoNoticia">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $row["titulo_noticia"]; ?>
                                </h5>
                                <p class="card-text ">
                                    <?php echo $row["desc_noticia"]; ?>
                                </p>
                            </div>
                            <div class="card-body">
                                <a href="noticiaWRC.php?id=<?php echo $row["id_noticia"]; ?>" class="btn btn-primary">Ver
                                    Noticia</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <div id="footerBranco">
        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>