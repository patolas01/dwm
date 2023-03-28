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
            table{
                margin-left:10px;
            }
            .image{
            width:164px;
            height:232px;
            }
            .anime1div{
                width:164px;
                background-color:#1b1b1b;
                height:283px;
                float:left;
                margin-left:55px;
                text-align:center;
            }
            .anime2div{
                width:164px;
                background-color:#1b1b1b;
                height:283px;
                float:left;
                margin-left:55px;
                text-align:center;
            }
            .anime3div{
                width:164px;
                background-color:#1b1b1b;
                height:283px;
                float:left;
                margin-left:55px;
                text-align:center;
            }
            .anime4div{
                width:164px;
                background-color:#1b1b1b;
                height:283px;
                float:left;
                margin-left:55px;
                text-align:center;
            }
            .anime5div{
                width:164px;
                background-color:#1b1b1b;
                height:283px;
                float:left;
                margin-left:55px;
                text-align:center;
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
            <?php
            $pesquisa = $_GET["search"];
            ?>
            <br>
                <Fieldset>
                    <legend align="left"> <font face="arial" size="4" color="#ffc119">Username searched <?php echo $pesquisa ?></font>
                    </legend>
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
                $sql = "SELECT utilizadores.id,utilizadores.nome,perfil.imagem FROM utilizadores INNER JOIN perfil ON utilizadores.id=perfil.id WHERE utilizadores.nome LIKE '%$pesquisa%' ORDER BY nome";
                $result = $conn->query($sql);
                $numerolinha=1;
        
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        // Outputting HTML and the data from the DB. Change to $row['the name of the field you want']
                        if ($numerolinha==1)
                        {
                            ?><div class="anime1div"><a href="testePerfilUtilizadorPesquisado.php?id=<?=$row["id"]?>"><img  class="image" src="<?php echo $row['imagem'];?>"><br><?php echo $row['nome'];?></a></div><?php
                        }
                        if ($numerolinha==2)
                        {
                            ?><div class="anime2div"><a href="testePerfilUtilizadorPesquisado.php?id=<?=$row["id"]?>"><img  class="image" src="<?php echo $row['imagem'];?>"><br><?php echo $row['nome'];?></a></div><?php
                        }
                        if ($numerolinha==3)
                        {
                            ?><div class="anime3div"><a href="testePerfilUtilizadorPesquisado.php?id=<?=$row["id"]?>"><img  class="image" src="<?php echo $row['imagem'];?>"><br><?php echo $row['nome'];?></a></div><?php
                        }
                        if ($numerolinha==4)
                        {
                            ?><div class="anime4div"><a href="testePerfilUtilizadorPesquisado.php?id=<?=$row["id"]?>"><img  class="image" src="<?php echo $row['imagem'];?>"><br><?php echo $row['nome'];?></a></div><?php
                        }
                        if($numerolinha == 5)
                        {
                            ?><div class="anime5div"><a href="testePerfilUtilizadorPesquisado.php?id=<?=$row["id"]?>"><img  class="image" src="<?php echo $row['imagem'];?>"><br><?php echo $row['nome'];?></a></div><?php
                            $numerolinha=1;
                            echo "<br>";
                        }
                        else
                        {
                            $numerolinha+=1;
                        }
                    }
                } else {
                    echo "We could not find what you were searching for please try again";
                }
                $conn->close();
            ?>
            </fieldset>
        </div>
        <div style="background-color:black; float: right; width:10%">
        </div>
    </body>
</html>