<html>
    <head>
    <meta charset="utf-8">
    </head>
<?php
Session_start();
if(!isset($_SESSION["user"]))
{
echo "<br>";
echo "<br>";
echo "Não tem sessão ativa. Faça login<br>";
echo "<br>";
echo "<br>";
echo "<center><img src='https://pbs.twimg.com/media/EoGryrMXEAAC74v.jpg'>";
exit;
}
?>
</html>