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
                
                float:left;
                margin-left:55px;
                text-align:center;
                min-height: 260px;
                height:fit-content;
            }
            .anime2div{
                width:164px;
                background-color:#1b1b1b;
                
                float:left;
                margin-left:55px;
                text-align:center;
                min-height: 260px;
                height:fit-content;
            }
            .anime3div{
                width:164px;
                background-color:#1b1b1b;
                
                float:left;
                margin-left:55px;
                text-align:center;
                min-height: 260px;
                height:fit-content;
            }
            .anime4div{
                width:164px;
                background-color:#1b1b1b;
                
                float:left;
                margin-left:55px;
                text-align:center;
                min-height: 260px;
                height:fit-content;
            }
            .anime5div{
                width:164px;
                background-color:#1b1b1b;
                
                float:left;
                margin-left:55px;
                text-align:center;
                min-height: 260px;
                height:fit-content;
            }
            .divCarrossel{
                width:100%;
                height:fit-content;
            }
            .divLinha{
                width:fit-content;
                min-height: 306px;
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
                    <legend align="left"> <font face="arial" size="4" color="#ffc119">Popular Anime</font>
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
                $sql = "SELECT * FROM animes where idAnime > 7 limit 15";
                $result = $conn->query($sql);
                $numerolinha=1;
        
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        // Outputting HTML and the data from the DB. Change to $row['the name of the field you want']
                        
                        if ($numerolinha==1)
                        {?><div class="divLinha"><?php
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
                            echo "<br>";?></div><?php
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
                    <a href="testePaginaAnime.php?id=49"><img src="https://www.animeunited.com.br/oomtumtu/2020/12/pjimage-43.jpg" alt="Gintama: The Final"></a>
                    <div class="carousel-caption">
                        <a href="testePaginaAnime.php?id=49"><h2>Gintama: The Final</h2></a>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <a href="testePaginaAnime.php?id=48"><img src="https://occ-0-2794-2219.1.nflxso.net/dnm/api/v6/E8vDc_W8CLv7-yMQu8KMEC7Rrr8/AAAABVLiPuoO_PFtw0JXn6DHpnt1GuN-j0e-sImXG_CLviu1OfCdJt1YzpMdthbOmfI6d2bO74t0zqDj_f4zOha_wy2ZGsMN.jpg?r=0e0" alt="Sword Art Online Movie: Ordinal Scale"></a>
                    <div class="carousel-caption">
                        <a href="testePaginaAnime.php?id=48"><h2>Sword Art Online Movie: Ordinal Scale</h2></a>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <a href="testePaginaAnime.php?id=25"><img src="https://blogs.opovo.com.br/tomodachinerds/wp-content/uploads/sites/102/2019/10/maxresdefault-2.jpg" alt="Fate/stay night Movie: Heaven's Feel - III. Spring Song"></a>
                    <div class="carousel-caption">
                        <a href="testePaginaAnime.php?id=25"><h2>Fate/stay night Movie: Heaven's Feel - III. Spring Songe</h2></a>
                    </div>                    
                  </div>
                  <div class="carousel-item">
                    <a href="testePaginaAnime.php?id=28"><img src="https://m.media-amazon.com/images/M/MV5BZDBhOTNkNWMtYjM3ZS00YTIzLTllNjAtZWUzODZkYjliMWM4XkEyXkFqcGdeQXVyMzYzMTAxOTc@._V1_.jpg" alt="Berserk: Ougon Jidai-hen III - Kourin"></a>
                    <div class="carousel-caption">
                        <a href="testePaginaAnime.php?id=28"><h2>Berserk: Ougon Jidai-hen III - Kourin</h2></a>
                    </div>                    
                  </div>
                  <div class="carousel-item">
                    <a href="testePaginaAnime.php?id=39"><img src="https://i0.wp.com/i.ytimg.com/vi/dSe6Y2LIwoY/maxresdefault.jpg" alt="Nanatsu no Taizai Movie 1: Tenkuu no Torawarebito"></a>
                    <div class="carousel-caption">
                        <a href="testePaginaAnime.php?id=39"><h2>Nanatsu no Taizai Movie 1: Tenkuu no Torawarebito</h2></a>
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
                    <legend align="left"> <font face="arial" size="4" color="#ffc119">Recently Updated Anime</font>
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
                $sql = "SELECT episodios.idEpisodio,episodios.numeroEpisodio,animes.idAnime,animes.keyvisual,animes.nomeAnime FROM episodios inner join animes on episodios.idAnime=animes.idAnime where animes.tipo='anime' order by episodios.idEpisodio DESC limit 15";
                $result = $conn->query($sql);
                $numerolinha=1;
        
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        // Outputting HTML and the data from the DB. Change to $row['the name of the field you want']
                        if ($numerolinha==1)
                        {
                            ?><div class="anime1div"><a href="testePaginaEpisodio.php?id=<?=$row["idEpisodio"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?> episode <?php echo $row['numeroEpisodio'];?></a></div><?php
                        }
                        if ($numerolinha==2)
                        {
                            ?><div class="anime2div"><a href="testePaginaEpisodio.php?id=<?=$row["idEpisodio"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?> episode <?php echo $row['numeroEpisodio'];?></a></div><?php
                        }
                        if ($numerolinha==3)
                        {
                            ?><div class="anime3div"><a href="testePaginaEpisodio.php?id=<?=$row["idEpisodio"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?> episode <?php echo $row['numeroEpisodio'];?></a></div><?php
                        }
                        if ($numerolinha==4)
                        {
                            ?><div class="anime4div"><a href="testePaginaEpisodio.php?id=<?=$row["idEpisodio"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?> episode <?php echo $row['numeroEpisodio'];?></a></div><?php
                        }
                        if($numerolinha == 5)
                        {
                            ?><div class="anime5div"><a href="testePaginaEpisodio.php?id=<?=$row["idEpisodio"]?>"><img  class="image" src="<?php echo $row['keyvisual'];?>"><br><?php echo $row['nomeAnime'];?> episode <?php echo $row['numeroEpisodio'];?></a></div><?php
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