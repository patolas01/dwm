<!DOCTYPE html>
<html lang="pt-pt">

<head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
        <?php include('bootstrapInc.php'); ?>
        <link rel="stylesheet" href="css/luissilva.css">
        <title>Showroom</title>
</head>

<body>
        <?php
        include 'navbar.php';
        ?>

        <div class="container-fluid">
                <div class="row">
                        <div class="col-md bar">
                                <div class="bar-wrapper">
                                        <h1 class="title">CARROS</h1>
                                        <p class="descr">Uma secção especialmente feita para voltar atrás no tempo e
                                                revisitar
                                                memórias antigas
                                                ou então explorar toda a tecnologia moderna e evolução do mundo
                                                automóvel</p>
                                </div>
                                <div class="bar-img" id="leftBar">

                                </div>
                        </div>
                        <div class="col-md bar">
                                <div class="bar-wrapper">
                                        <h1 class="title">EQUIPAMENTOS</h1>
                                        <p class="descr">Segurança em primeiro lugar, o conforto vem muito depois.
                                                Observe
                                                alguns dos equipamentos usados em diversas categorias. Desde Fatos,
                                                Luvas,
                                                Capacetes e Sapatos</p>
                                </div>

                                <div class="bar-img" id="rightBar">

                                </div>
                        </div>
                </div>
        </div>


        <?php
        include 'footer.php';
        ?>
</body>
<script src="jquery/jquery-3.6.4.min.js"></script>
<script>
        // jQuery(document).ready(function ($) {
        //         alert("Clik numa das imagens para ir para a página respetiva");
        // });
</script>

</html>