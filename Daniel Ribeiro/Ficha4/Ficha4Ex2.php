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
        Nome<input name="nome" placeholder="Nome" required><br><br>
        Email<input name="email" placeholder="email"><br><br>
        Unidade Curricular:<br>
        <input type="radio" name="UC" value="PW">PW<br><br>
        <input type="radio" name="UC" value="CTI">CTI<br><br>
        <input type="radio" name="UC" value="PWS">PWS<br><br>
        Linguagem de programação:<br>
        <input type="radio" name="lingua" value="PHP">PHP<br><br>
        <input type="radio" name="lingua" value="C">C<br><br>
        <input type="radio" name="lingua" value="JAVASCRIPT">JAVASCRIPT<br><br>
        <input type="submit" name="submit">
    </form>
    <?php
    if(isset($_POST["submit"]))
    echo "O aluno ".$_POST["nome"]." com o email ".$_POST["email"].", dá a linguagem ".$_POST["lingua"]." na unidade curricular ".$_POST["UC"];
    ?>
</body>

</html>