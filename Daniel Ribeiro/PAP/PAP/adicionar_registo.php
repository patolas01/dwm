<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    ?>
<html>
    <head>
        <title>MangaEngrish User Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
         body{background-color: black; color:#ffc119;}
            a{text-decoration: none;}
            a:link{color:#ffc119}
            a:visited{color: #ffc119;}
            a:active{color: #ffc119;}
            a:hover{color: #f3f3f3;text-decoration: none;}
            h2{color:#ffc119}
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
            .login a{
                color:black;
            }
            .login a:hover{
                color:white;
            }
        </style>
    </head>
    <body>
    <div style="background-color:black; float: left; width:10%">
            <img src="preto.png">
        </div>
        <div style="background-color:#1b1b1b; float: left; width:80% ">
            <center><img src="large.png"></center><br>
	        <h3 align="center"><a href="testePaginaInicial.php">HOME</a>&nbsp;&nbsp;&nbsp;<a href="testePaginaListaCompleta.php">ANIME LIST</a>&nbsp;&nbsp;&nbsp;<a href="testePaginaMovies.php">MOVIES</a>&nbsp;&nbsp;&nbsp;<a href="testePaginaGeneros.php">GENRES</a></h3>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
                <form class="form-inline" action="testePaginaPesquisa.php">
                  <input name="search" class="form-control mr-sm-2" type="text" placeholder="Search">
                  <button class="btn btn-success" type="submit">Search</button>
                </form>
                <?php
                if(isset($_SESSION["id"])){
                ?>
                    <button style="margin-left: 500px" class="btn btn-info login"><a href="testePaginaPerfil.php"><?php echo $_SESSION["nome"] ?></a></button>
                    <button style="margin-left: 20px" class="btn btn-warning login"><a href="testePaginaRegisto.php">Sign up</a></button>
                <?php
                }
                else
                {
                ?>
                  <button style="margin-left: 600px" class="btn btn-info login"><a href="testePaginaLogin.php">Login</a></button>
                  <button style="margin-left: 20px" class="btn btn-warning login"><a href="testePaginaRegisto.php">Sign up</a></button>
                <?php
                }
                ?>
            </nav>
            <br>
            
                <Fieldset>
                    <legend align="left"> <font face="arial" size="4" color="#ffc119">After Sign up</font>
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
    <p><button type="button"> <a style="text-decoration: none" href="testePaginaRegisto.php">Change</button></p>
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
<?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "animengrish";
        
        
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
        
                // SELECT (whatever rows you want) FROM (your table name)
                $sql = "SELECT * FROM utilizadores WHERE utilizadores.login='$us'";
                $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        // Outputting HTML and the data from the DB. Change to $row['the name of the field you want']
                        $idUser=$row['id'];
                    }
                } else {
                    echo "Não há registos";
                }
                $add = "INSERT INTO perfil (id, imagem, descricao, genero, data) VALUES('$idUser','https://cdn.myanimelist.net/images/userimages/10361655.jpg?t=1653139200',NULL,'Undefined','')";
                mysqli_query($ligaBD, $add);
                $conn->close();
            ?>
<center>
<br>
<div style="width:400px">
<h1>User successfully created</h1>
<script>
window.setTimeout(function (){
    location.href="testePaginaInicial.php";
},10000);
</script>
<p>
<a style="text-decoration: none" href="testePaginaLogin.php"><button type="button" class="btn btn-info btn-lg">Login</button></a>

<a style="text-decoration: none" href="testePaginaRegisto.php"><button type="button" class="btn btn-success btn-lg">New Sign Up</button></a>

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
<p><a style="text-decoration: none" href="testePaginaLogin.php"><button class="btn btn-info btn-lg" >Login</button></a></p>
<br>
</div>
<?php
}
?>
</div>
</div>
<div style="background-color:black; float: right; width:10%">
        </div>
</body>
</html>