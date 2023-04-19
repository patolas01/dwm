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

        <div class="container">
                <h1 class="titulo">Showroom</h1>
                <div class="row align-items-center">
                        <div class="col-md-5 ">
                                <h3>Carros</h3>
                                <a href="carros.php">
                                        <div class="img-1">

                                        </div>
                                </a>
                        </div>

                        <div class="col-md-5 offset-md-2">
                                <h3>Equipamentos</h3>
                                <a href="equipamentos.php">
                                        <div class="img-2">

                                        </div>
                                </a>
                        </div>
                </div>
        </div>
        <?php
        include 'footer.php';
        ?>
</body>
<script src="jquery/jquery-3.6.4.min.js"></script>
<script>
        jQuery(document).ready(function($) {
                alert("Clik numa das imagens para ir para a página respetiva");
        });
</script>

</html>