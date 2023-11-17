<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="POST">
        Linhas<input name="linha" placeholder="Número Inteiro" required><br><br>
        Colunas<input name="colunas" placeholder="Número Inteiro"><br><br>
        <input type="submit" name="submit">
    </form>
    <?php
    if(isset($_POST["submit"]))
        ?><table><?php
        for($i=1;$i<=$_POST["linhas"];$i++){
            ?><tr><?php
        }
    ?>
    </table>
</body>

</html>