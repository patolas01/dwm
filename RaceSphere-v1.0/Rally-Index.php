<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaceSphere Rally</title>
    <?php
        include 'bootstrapInc.php';
        include 'jquery/main.js'
    ?>
    <link rel="stylesheet" href="css/danielribeiro.css">
</head>
<body>
    <?php
        include 'navbar.php';
     ?>
    <div id="rightinfo">
        <script>
            var start = new Date;

setInterval(function() {
    $('.Timer').text((new Date - start) / 1000 + " Seconds");
}, 1000);
        </script>
        <p class="Timer"></p>
    </div>
    <div id="divteste">

    </div>
</body>
</html>