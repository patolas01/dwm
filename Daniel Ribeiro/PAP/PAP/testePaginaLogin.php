<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    ?>
<html>
    <head>
        <title>AnimEngrish</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
        /* Make the image fully responsive */
        .carousel-inner img {
          width: 100%;
          height: 73%;
        }
        </style>
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
            input[type=password] {
            width: 20%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
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
            <!-- Primeira fila -->
            <Fieldset>
                    <legend align="left"> <font face="arial" size="4" color="#ffc119">Login</font>
                    </legend>
            <!-- Primeira fila -->
            <div style="float: left; padding: 0 16px; width: 100%;">
            <center>
        <h2>Login</h2>
        <form action=" " method="POST">
            <p> <input style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" type="text" placeholder="User" name="user" required> </p>
            <p> <input type="password" placeholder="Password" name="password" required> </p>
            <p>
            <button name="enviar" type="submit" class="btn btn-success btn-lg">Login</button>&nbsp;&nbsp;
            <button type="reset" class="btn btn-danger btn-lg">Clean</button>&nbsp;&nbsp;
            <a style="text-decoration: none" href="testePaginaRegisto.php"><button type="button" class="btn btn-info btn-lg">Sign Up</button></a>
            </p>
        </form>
        
        <?php
            if(isset($_POST['enviar']))
            {
                $us=$_POST["user"];
                $ps=$_POST["password"];
                include('ligaBD.php');
                $existe="Select * from utilizadores where login='".$us."'";
                $faz_existe=mysqli_query($ligaBD,$existe);
                $num_registos=mysqli_num_rows($faz_existe);
                if($num_registos==0)
                {
                echo "User was not registered";
                echo "<a href='testePaginaRegisto.php'><font color='red'> Sign up here</font>";
                exit;
                }
                $existe="Select * from utilizadores where login='".$us."' and senha='".$ps."'";
                $faz_existe=mysqli_query($ligaBD,$existe);
                $registos_user=mysqli_fetch_array($faz_existe);
                $num_registos=mysqli_num_rows($faz_existe);
                if($num_registos==1)
                {
                $_SESSION = array();
                $_SESSION["user"]=$_POST["user"];
                $_SESSION["nome"]=$registos_user["nome"];
                $_SESSION["id"]=$registos_user["id"];
                echo "Welcome ". $_SESSION["nome"];?>
                <script>
                    window.setTimeout(function (){
                        location.href="testePaginaInicial.php";
                    },3000);
                </script>
                <?php
                }
                else
                {
                echo "Autentication error";
                echo "<br>";
                echo '<a href="testePaginaLogin.php">Try again</a>';
                }
            }
        ?></center>
        </div>
        <div style="background-color:black; float: right; width:10%">
        </div>
    </body>
</html>