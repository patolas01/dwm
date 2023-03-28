<html>
    <head>
        <title>MangaEngrish User Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body{background-color: black; color:#d61212;}
            a{text-decoration: none;}
            a:visited{color: #d61212;}
            a:active{color: #d61212;}
            a:hover{color: #f3f3f3;}
            h2{color:#d61212}
            fieldset{
            display: block;
            margin-left: 2px;
            margin-right: 2px;
            padding-top: 0.35em;
            padding-bottom: 0.625em;
            padding-left: 0.75em;
            padding-right: 0.75em;
            border: 2px groove (internal value);
            }
            .wrapper {
                margin-right: auto; /* 1 */
                margin-left: auto; /* 1 */
                max-width:1160px; /* 2 */
                padding-right: 10px; /* 3 */
                padding-left: 10px; /* 3 */
            }
            .btn-group-lg>.btn, .btn-lg {
            padding: 0.5rem 1rem;
            font-size: 1.25rem;
            line-height: 1.5;
            border-radius: 0.3rem;
            }
            .btn-danger {
                color: #fff;
                background-color: #dc3545;
                border-color: #dc3545;
            }
            .btn {
                display: inline-block;
                font-weight: 400;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                user-select: none;
                border: 1px solid transparent;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
            .btn-success {
                color: #fff;
                background-color: #28a745;
                border-color: #28a745;
            }
            .btn-info {
                color: #fff !important;
                background-color: #17a2b8 !important;
                border-color: #17a2b8 !important;
            }
        </style>
    </head>
    <body>
    <div class="wrapper" style="background-color:#1b1b1b;">
            <?php
                include ("menu.php");
            ?>
            <br>
            
                <Fieldset>
                    <legend align="left"> <font face="arial" size="4" color="#d61212">After Sign up</font>
                    </legend>
            <!-- Primeira fila -->
            <div style="float: left; padding: 0 16px; width: 100%;">
<?php
        $nome=$_POST["nome"];
        $us=$_POST["user"];
        $ps=$_POST["password"];
        $ps1=$_POST["password1"];
        $email=$_POST["email"];
        $tipo=2; 
        if ($_POST["password"]<>$_POST["password1"])
        {
?>
        <center>
    <div style="width:400px">
    <h1>Password must match</h1>
    <p><button type="button"> <a style="text-decoration: none" href="paginaRegisto.php">Change</button></p>
    </div>
<?php
    exit;
    }
    include('ligaBD.php');
$existe="select * from utilizadores where login='".$us."'";
$faz_existe=mysqli_query($ligaBD, $existe);
$jaexiste=mysqli_num_rows($faz_existe);
if ($jaexiste==0)
{
$sql="INSERT INTO utilizadores (nome, senha, e_mail, login, tipo) VALUES('$nome','$ps','$email','$us','$tipo')";
if (!mysqli_query($ligaBD,$sql))
{
die('Erro: '. mysqli_error($ligaBD));
}
?>
<center>
<br>
<div style="width:400px">
<h1>User successfully created</h1>
<script>
window.setTimeout(function (){
    location.href="homepag.php";
},10000);
</script>
<p>
<a style="text-decoration: none" href="paginaLogin.php"><button type="button" class="btn btn-info btn-lg">Login</button></a>

<a style="text-decoration: none" href="paginaRegisto.php"><button type="button" class="btn btn-success btn-lg">New Sign Up</button></a>

</p>
<br>
</div>
<?php
mysqli_close($ligaBD);
}
else
{
?>
<center>
<br>
<div style="width:400px">
<h1>User already exists</h1>
<p><a style="text-decoration: none" href="paginaLogin.php"><button class="btn btn-info btn-lg" >Login</button></a></p>
<br>
</div>
<?php
}
?>
</div>
</div>
</body>
</html>