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
            .divCarrossel{
                width:100%;
                height:fit-content;
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
            <form>
                <Fieldset>
                    <legend align="left"> <font face="arial" size="4" color="#ffc119">Popular Movies</font>
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
                $sql = "SELECT * FROM animes where tipo = 'movie' limit 15";
                $result = $conn->query($sql);
                $numerolinha=1;
        
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        // Outputting HTML and the data from the DB. Change to $row['the name of the field you want']
                        if ($numerolinha==1)
                        {
                            ?><div class="anime1div"><a href="testePaginaAnime.php?id=<?=$row["idAnime"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?></a></div><?php
                        }
                        if ($numerolinha==2)
                        {
                            ?><div class="anime2div"><a href="testePaginaAnime.php?id=<?=$row["idAnime"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?></a></div><?php
                        }
                        if ($numerolinha==3)
                        {
                            ?><div class="anime3div"><a href="testePaginaAnime.php?id=<?=$row["idAnime"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?></a></div><?php
                        }
                        if ($numerolinha==4)
                        {
                            ?><div class="anime4div"><a href="testePaginaAnime.php?id=<?=$row["idAnime"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?></a></div><?php
                        }
                        if($numerolinha == 5)
                        {
                            ?><div class="anime5div"><a href="testePaginaAnime.php?id=<?=$row["idAnime"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?></a></div><?php
                            $numerolinha=1;
                            echo "<br>";
                        }
                        else
                        {
                            $numerolinha+=1;
                        }
                    }
                } else {
                    echo "Não há registos";
                }
                $conn->close();
            ?>
            </fieldset>
            <div class="divCarrossel">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <br>
                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                  <li data-target="#demo" data-slide-to="3"></li>
                  <li data-target="#demo" data-slide-to="4"></li>
                </ul>
              
                <!-- The slideshow -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <a href="testePaginaAnime.php?id=6"><img src="https://farofafa.com.br/wp-content/uploads/2021/05/Demon-Slayer-2.jpg" alt="Kimetsu no Yaiba: Mugen Ressha-hen"></a>
                    <div class="carousel-caption">
                        <a href="testePaginaAnime.php?id=6"><h2>Kimetsu no Yaiba: Mugen Ressha-hen</h2></a>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <a href="testePaginaAnime.php?id=20"><img src="https://quintacapa.com.br/wp-content/uploads/2020/10/The-God-high-School-destaque-quinta-capa.png" alt="The God of High School"></a>
                    <div class="carousel-caption">
                        <a href="testePaginaAnime.php?id=20"><h2>The God of High School</h2></a>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <a href="testePaginaAnime.php?id=11"><img src="https://i1.wp.com/www.otakupt.com/wp-content/uploads/2021/06/Mushoku-Tensei-Jobless-Reincarnation-vol-24-2.jpg?fit=1280%2C720&ssl=1" alt="Mushoku Tensei: Isekai Ittara Honki Dasu"></a>
                    <div class="carousel-caption">
                        <a href="testePaginaAnime.php?id=11"><h2>Mushoku Tensei: Isekai Ittara Honki Dasu</h2></a>
                    </div>                    
                  </div>
                  <div class="carousel-item">
                    <a href="testePaginaAnime.php?id=13"><img src="https://occ-0-1723-1722.1.nflxso.net/dnm/api/v6/E8vDc_W8CLv7-yMQu8KMEC7Rrr8/AAAABfrkA5DcdDxc0nIkmE_tFD8gN2pPmyiYBdUbJxHKOegrl3tyGLd2dBkoVeGiGeyuKDDAZ2Su7G5aXC5BCSrlPXN3wisJ.jpg?r=f71" alt="Fate/stay night: Unlimited Blade Works"></a>
                    <div class="carousel-caption">
                        <a href="testePaginaAnime.php?id=13"><h2>Fate/stay night: Unlimited Blade Works</h2></a>
                    </div>                    
                  </div>
                  <div class="carousel-item">
                    <a href="testePaginaAnime.php?id=22"><img src="https://comunidadeculturaearte.com/wp-content/uploads/2021/06/maxresdefault1-1-1.jpg" alt="Yakusoku no Neverland"></a>
                    <div class="carousel-caption">
                        <a href="testePaginaAnime.php?id=22"><h2>Yakusoku no Neverland</h2></a>
                    </div>                    
                  </div>
                </div>
              
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              
              </div>
              </div>
              <br>
              <!--Anime por season-->
                <Fieldset>
                    <legend align="left"> <font face="arial" size="4" color="#ffc119">Recently Added Movies</font>
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
                $sql = "SELECT episodios.idEpisodio,animes.idAnime,animes.keyvisual,animes.nomeAnime FROM episodios inner join animes on episodios.idAnime=animes.idAnime where animes.tipo='movie' order by episodios.idEpisodio DESC limit 15";
                $result = $conn->query($sql);
                $numerolinha=1;
        
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        // Outputting HTML and the data from the DB. Change to $row['the name of the field you want']
                        if ($numerolinha==1)
                        {
                            ?><div class="anime1div"><a href="testePaginaAnime.php?id=<?=$row["idAnime"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?></a></div><?php
                        }
                        if ($numerolinha==2)
                        {
                            ?><div class="anime2div"><a href="testePaginaAnime.php?id=<?=$row["idAnime"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?></a></div><?php
                        }
                        if ($numerolinha==3)
                        {
                            ?><div class="anime3div"><a href="testePaginaAnime.php?id=<?=$row["idAnime"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?></a></div><?php
                        }
                        if ($numerolinha==4)
                        {
                            ?><div class="anime4div"><a href="testePaginaAnime.php?id=<?=$row["idAnime"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?></a></div><?php
                        }
                        if($numerolinha == 5)
                        {
                            ?><div class="anime5div"><a href="testePaginaAnime.php?id=<?=$row["idAnime"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?></a></div><?php
                            $numerolinha=1;
                            echo "<br>";
                        }
                        else
                        {
                            $numerolinha+=1;
                        }
                    }
                } else {
                    echo "Não há registos";
                }
                $conn->close();
            ?>
            </fielset>
        </div>
        <div style="background-color:black; float: right; width:10%">
        </div>
    </body>
</html>