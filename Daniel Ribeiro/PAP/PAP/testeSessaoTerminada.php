<?php session_start(); ?>
<html>
    <head>
    <title>MangaEngrish session terminated</title>
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
        body{background-color: black; color:#ffc119;}
            a{text-decoration: none;}
            a:link{color:#ffc119}
            a:visited{color: #ffc119;}
            a:active{color: #ffc119;}
            a:hover{color: #f3f3f3;text-decoration: none;}
            h2{color:rgb(0, 0, 184)}
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


            ul.items{
                margin-top: 20px;
                
            }

            ul.items li {
                display: inline-block;
                overflow: hidden; 
                width: 164px;
                height: 232px;
                border-right: none;
                float: left;
                position: relative;
                padding: 0;
                text-align: center;
                list-style: none;
                margin-bottom: 20px;
                vertical-align: top;
            }

            ul.items li .img {
                display: block;
                position: absolute;
                width: 100%;
                max-width: 100%;
                height: auto;          
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
            <div style="float: left; padding-left: 16px; width: 100%;">
            <?php
session_destroy();
?>
<center><?php echo "Your session was terminated";
//header("Refresh:3; url=homepag.php");?>

<script>
window.setTimeout(function (){
    location.href="testePaginaInicial.php";
},3000);
</script>
<br>
<img src="https://img1.ak.crunchyroll.com/i/spire3/03262008/a/0/b/7/a0b70c295e7c30_full.png"></center>
                </div>
            </div>
            <div style="background-color:black; float: right; width:10%">
        </div>
    </body>
    </html>