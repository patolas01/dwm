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
            h2{color:#f3f3f3;}
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
            .divAnterior{
                width:50%;
                background-color:#1b1b1b;
                float:left;
                text-align:left;
            }
            .divSeguinte{
                width:50%;
                background-color:#1b1b1b;
                float:right;
                text-align:right;
            }
            .image{
            width:164px;
            height:232px;
            }
            .divbutton{
                float:right;
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
                    <legend align="left"> <font face="arial" size="4" color="#ffc119">Edit <?php echo $_SESSION["nome"] ?>'s profile</font>
                    </legend>
                    <center>
                    <h2>Change username</h2>
        <form action=" " method="POST">
            <p> <input name="novonome" style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" type="text" placeholder="New Username" required> </p>
            <p>
            <button name="btnome" type="submit" class="btn btn-success btn-lg">Submit</button>&nbsp;&nbsp;
            </p>
        </form>
        <br><br><br>
        <h2>Change Profile Picture</h2>
        <form action=" " method="POST">
            <p> <input name="foto" style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" type="text" placeholder="Url Link" required> </p>
            <p>
            <button name="btnfoto" type="submit" class="btn btn-success btn-lg">Submit</button>&nbsp;&nbsp;
            </p>
        </form>
        <br><br><br>
        <h2>About You</h2>
        <form action=" " method="POST">
            <p> <textarea name="descricao" style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;"></textarea></p>
            <p>
            <button name="btnsobre" type="submit" class="btn btn-success btn-lg">Submit</button>&nbsp;&nbsp;
            </p>
        </form>
        <br><br><br>
        <h2>Change Gender</h2>
        <form action=" " method="POST">
            <p> <select style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="genero">
                <option value="Undefined">Undefined</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
                 </p>
            <p>
            <button name="btngenero" type="submit" class="btn btn-success btn-lg">Submit</button>&nbsp;&nbsp;
            </p>
        </form>
        <br><br><br>
        <h2>Change Birthday</h2>
        <form action=" " method="POST">
            <p> <input name="anos" style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" type="date" required> </p>
            <p>
            <button name="btnanos" type="submit" class="btn btn-success btn-lg">Submit</button>&nbsp;&nbsp;
            </p>
        </form>
        <br><br><br>
        <h2>Change Email</h2>
        <form action=" " method="POST">
            <p> <input name="novoemail" style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" type="email" placeholder="Email" required> </p>
            <p>
            <button name="btnemail" type="submit" class="btn btn-success btn-lg">Submit</button>&nbsp;&nbsp;
            </p>
        </form>
            </center>
            <?php
                                    if(isset($_POST["btnome"])){
                                        $name=$_POST["novonome"];
                                        $dbhost = "localhost";
                                        $dbuser = "root";
                                        $dbpass = "";
                                        $dbname = "animengrish";
                                        $_SESSION["nome"]=$name;
                                        
                                        
                                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                                        {
                                            die("failed to connect into database!");
                                        }
                                        $update="UPDATE utilizadores set nome='$name' where id='$_SESSION[id]'";
                                        mysqli_query($con, $update);                                    
                                    }
                                    if(isset($_POST["btnfoto"])){
                                        $name=$_POST["foto"];
                                        $dbhost = "localhost";
                                        $dbuser = "root";
                                        $dbpass = "";
                                        $dbname = "animengrish";
                                        
                                        
                                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                                        {
                                            die("failed to connect into database!");
                                        }
                                        $update="UPDATE perfil set imagem='$name' where id='$_SESSION[id]'";
                                        mysqli_query($con, $update);                                    
                                    }
                                    if(isset($_POST["btnsobre"])){
                                        $name=$_POST["descricao"];
                                        $dbhost = "localhost";
                                        $dbuser = "root";
                                        $dbpass = "";
                                        $dbname = "animengrish";
                                        
                                        
                                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                                        {
                                            die("failed to connect into database!");
                                        }
                                        $update="UPDATE perfil set descricao='$name' where id='$_SESSION[id]'";
                                        mysqli_query($con, $update);                                    
                                    }
                                    if(isset($_POST["btngenero"])){
                                        $name=$_POST["genero"];
                                        $dbhost = "localhost";
                                        $dbuser = "root";
                                        $dbpass = "";
                                        $dbname = "animengrish";
                                        
                                        
                                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                                        {
                                            die("failed to connect into database!");
                                        }
                                        $update="UPDATE perfil set genero='$name' where id='$_SESSION[id]'";
                                        mysqli_query($con, $update);                                    
                                    }
                                    if(isset($_POST["btnanos"])){
                                        $name=$_POST["anos"];
                                        $dbhost = "localhost";
                                        $dbuser = "root";
                                        $dbpass = "";
                                        $dbname = "animengrish";
                                        
                                        
                                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                                        {
                                            die("failed to connect into database!");
                                        }
                                        $update="UPDATE perfil set data='$name' where id='$_SESSION[id]'";
                                        mysqli_query($con, $update);                                    
                                    }
                                    if(isset($_POST["btnemail"])){
                                        $name=$_POST["novoemail"];
                                        $dbhost = "localhost";
                                        $dbuser = "root";
                                        $dbpass = "";
                                        $dbname = "animengrish";
                                        
                                        
                                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                                        {
                                            die("failed to connect into database!");
                                        }
                                        $update="UPDATE utilizadores set e_mail='$name' where id='$_SESSION[id]'";
                                        mysqli_query($con, $update);                                    
                                    }
                                    ?>
            </Fieldset>
        </div>
        <div style="background-color:black; float: right; width:10%">
        </div>
    </body>
</html>