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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <?php
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "animengrish";
                $id=$_GET["id"];
                $numeroEpisodios=0;
                if(isset($_SESSION["id"]))
                {
                if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                {
                    die("failed to connect into database!");
                }

                $sql = "SELECT episodiosvistos.idEpisodio,episodiosvistos.id,episodiosvistos.idAnime,episodios.numeroEpisodio,animes.nomeAnime FROM episodiosvistos INNER JOIN episodios ON episodiosvistos.idEpisodio=episodios.idEpisodio INNER JOIN animes ON episodiosvistos.idAnime=animes.idAnime WHERE episodiosvistos.idEpisodio='$id' AND episodiosvistos.id='$_SESSION[id]'";
                $store_data=mysqli_query($con, $sql);
                
                if($store_data)
                {
                    
                    if($store_data && mysqli_num_rows($store_data) > 0)
                    {
                        $condicao=1;
                    }
                    else
                    {
                        $condicao=0;
                    }
                }
                }
                else
                {
                    $condicao=0;
                }
                if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                {
                    die("failed to connect into database!");
                }

                $sql = "SELECT animes.idAnime, animes.keyvisual, animes.nomeAnime, episodios.idAnime, episodios.numeroEpisodio, episodios.linkEpisodio from animes INNER JOIN episodios ON animes.idAnime=episodios.idAnime WHERE episodios.idEpisodio='$id' limit 1";
                $store_data=mysqli_query($con, $sql);
                
                if($store_data)
                {
                    
                    if($store_data && mysqli_num_rows($store_data) > 0)
                    {
                        foreach($store_data as $row){
                    ?>
                    <Fieldset>
                    <legend align="left"> <font face="arial" size="4" color="#ffc119"><?php echo $row['nomeAnime']?>&nbsp;episode&nbsp;<?php echo $row['numeroEpisodio']?></font>
                    </legend>
                    <form method="post">
                    <button name="addEpisode" type="submit" class="btn btn-light"><?php if($condicao==0){?><i class="fa fa-bookmark"></i><?php } else{?> <i class="fa fa-bookmark-o" aria-hidden="true"></i> <?php } ?></button></form>
                    <iframe src="<?php echo $row['linkEpisodio'] ?>" width="100%" height="625px"  allowfullscreen="true" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
                             
                <?php
                    $episodioAnterior=$row['numeroEpisodio']-1;
                    $episodioSeguinte=$row['numeroEpisodio']+1;
                     $idAnime=$row['idAnime'];
                        }
                    }
                }
            ?>
            <?php
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "animengrish";
                
                if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                {
                    die("failed to connect into database!");
                }

                $sql = "SELECT animes.idAnime, episodios.idAnime, episodios.numeroEpisodio from animes INNER JOIN episodios ON animes.idAnime=episodios.idAnime WHERE animes.idAnime='$idAnime'";
                $store_data=mysqli_query($con, $sql);
                
                if($store_data)
                {
                    
                    if($store_data && mysqli_num_rows($store_data) > 0)
                    {
                        foreach($store_data as $row){
                            $numeroEpisodios+=1;
                    ?>

                <?php
                        }
                    }
                }
                if($episodioAnterior<>0)
                {
                    $dbhost = "localhost";
                    $dbuser = "root";
                    $dbpass = "";
                    $dbname = "animengrish";
                    
                    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                    {
                        die("failed to connect into database!");
                    }
    
                    $sql = "SELECT animes.idAnime, episodios.idAnime, episodios.numeroEpisodio, episodios.idEpisodio from animes INNER JOIN episodios ON animes.idAnime=episodios.idAnime WHERE animes.idAnime='$idAnime' AND episodios.numeroEpisodio='$episodioAnterior'";
                    $store_data=mysqli_query($con, $sql);
                    
                    if($store_data)
                    {
                        
                        if($store_data && mysqli_num_rows($store_data) > 0)
                        {
                            foreach($store_data as $row){
                        ?>
                        <div class="divAnterior">
                            <a href="testePaginaEpisodio.php?id=<?=$row["idEpisodio"]?>"><-Episode <?php echo $row['numeroEpisodio'];?></a>
                        </div>
                    <?php
                            }
                        }
                    }
                }
                if($episodioSeguinte<=$numeroEpisodios)
                {
                    $dbhost = "localhost";
                    $dbuser = "root";
                    $dbpass = "";
                    $dbname = "animengrish";
                    
                    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                    {
                        die("failed to connect into database!");
                    }
    
                    $sql = "SELECT animes.idAnime, episodios.idAnime, episodios.numeroEpisodio, episodios.idEpisodio from animes INNER JOIN episodios ON animes.idAnime=episodios.idAnime WHERE animes.idAnime='$idAnime' AND episodios.numeroEpisodio='$episodioSeguinte'";
                    $store_data=mysqli_query($con, $sql);
                    
                    if($store_data)
                    {
                        
                        if($store_data && mysqli_num_rows($store_data) > 0)
                        {
                            foreach($store_data as $row){
                        ?>
                        <div class="divSeguinte">
                            <a href="testePaginaEpisodio.php?id=<?=$row["idEpisodio"]?>">Episode <?php echo $row['numeroEpisodio'];?>-></a>
                        </div>
                    <?php
                            }
                        }
                    }
                }
            ?>
            <br><br><br><br>
            <hr color="#ffc119"><font face="arial" size="4" color="#ffc119">Related Episode<br><br></font>
                    <?php
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "animengrish";
        
                
                if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                {
                    die("failed to connect into database!");
                }

                $sql = "SELECT animes.idAnime, episodios.idEpisodio, episodios.idAnime, episodios.numeroEpisodio from animes INNER JOIN episodios ON animes.idAnime=episodios.idAnime WHERE animes.idAnime='$idAnime'";
                $store_data=mysqli_query($con, $sql);
                
                if($store_data)
                {
                    
                    if($store_data && mysqli_num_rows($store_data) > 0)
                    {
                        foreach($store_data as $row){
                    ?>
                    <a href="testePaginaEpisodio.php?id=<?=$row["idEpisodio"]?>"><button type="button" class="btn btn-warning">EP <?php echo $row['numeroEpisodio'];?></button></a>&nbsp;
                        <?php
                        }
                    }
                }
            if(isset($_POST["addEpisode"])){
                if(isset($_SESSION["id"])){
                    if($condicao==0){
                        $dbhost = "localhost";
                        $dbuser = "root";
                        $dbpass = "";
                        $dbname = "animengrish";
                        
                        
                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                        {
                            die("failed to connect into database!");
                        }
                        $add = "INSERT INTO episodiosvistos (idVisto, idEpisodio, id, idAnime) VALUES(NULL, '$id', '$_SESSION[id]', '$row[idAnime]')";
                        mysqli_query($con, $add);
                        ?><script>alert("Marked as seen")</script><?php
                    }
                    else{
                        $dbhost = "localhost";
                        $dbuser = "root";
                        $dbpass = "";
                        $dbname = "animengrish";
                        
                        
                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                        {
                            die("failed to connect into database!");
                        }
        
                        $delete="DELETE FROM episodiosvistos where idEpisodio='$id' AND id='$_SESSION[id]'";
                        mysqli_query($con, $delete);
                        ?><script>alert("Unmarked as seen")</script><?php
                    }
                }
                else{
                ?><script>
                    window.setTimeout(function (){
                    location.href="testePaginaLogin.php";
                    },0);
                    </script><?php
                    }
            
            }?>
            
            </fielset>  
        </div>
        <div style="background-color:black; float: right; width:10%">
        </div>
    </body>
</html>