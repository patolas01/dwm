<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="Ficha4Ex1.php" method="POST">
        <input name="nome" placeholder="nome">
        <input name="idade" placeholder="idade">
        <input type="submit">
    </form>
    <?php
    echo "Nome: ".$_POST["nome"]."<br> Idade:".$_POST["idade"]." anos";
    ?>
</body>

</html>