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
                    <legend align="left"> <font face="arial" size="4" color="#ffc119">Anime Info</font>
                    </legend>
            <!-- Primeira fila -->
            <?php
            if(isset($_SESSION["id"])){
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "animengrish";
                $id=$_GET["id"];
        
                
                if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                {
                    die("failed to connect into database!");
                }

                $sql = "SELECT * from status WHERE id='$_SESSION[id]' AND idAnime=$id";
                $store_data=mysqli_query($con, $sql);
                
                if($store_data)
                {
                    
                    if($store_data && mysqli_num_rows($store_data) > 0)
                    {
                        foreach($store_data as $row){
                            $status=$row['status'];
                        }
                    }
                    else{
                        $status="nope";
                    }
                }
            }    
            ?>
            <?php
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "animengrish";
                $id=$_GET["id"];
        
                
                if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                {
                    die("failed to connect into database!");
                }

                $sql = "SELECT animes.idAnime, animes.keyvisual, animes.nomeAnime, animes.temporada, animes.Sinopse, animes.genero, episodios.idEpisodio, episodios.idAnime, episodios.numeroEpisodio from animes INNER JOIN episodios ON animes.idAnime=episodios.idAnime WHERE animes.idAnime='$id' limit 1";
                $store_data=mysqli_query($con, $sql);
                
                if($store_data)
                {
                    
                    if($store_data && mysqli_num_rows($store_data) > 0)
                    {
                        foreach($store_data as $row){
                    ?>
            <table border="0">
                <tr>
                    <td width="305px" height="450px" rowspan="1"><img src="<?php echo $row['keyvisual'];?>" width="305px" height="460px"></td>
                    <td width="900px" height="60px"><font face="arial" size="3" color="green">Name:</font><?php echo $row['nomeAnime'];?><br><br><font face="arial" size="3" color="green">Season:</font><?php echo $row['temporada'];?><br><font face="arial" size="3" color="green"><br>Plot Summary:</font><?php echo $row['Sinopse'];?><?php
                    $generos="";
                    
                    $array = str_split($row['genero']);
                    foreach ($array as $char)
                    {
                        $generos.=$char;
                        if($char==','){
                            $generos.=' ';
                        }
                    }
                    ?>
                        <br><font face="arial" size="3" color="green"><br>Genre:</font><?php echo $generos; ?></td>
                </tr>
                <?php
                        }
                    }
                }
            ?>
                <tr>
                <?php
                if(!isset($_SESSION["id"]) || $status=="nope"){           
                    ?>
                <form action=" " method="POST" onchange='this.form.submit()'>
            <p> <select style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="estado" onchange='this.form.submit()'>
                <option value="0" selected>-</option>
                <option value="Watching">Watching</option>
                <option value="Completed">Completed</option>
                <option value="On-Hold">On-Hold</option>
                <option value="Dropped">Dropped</option>
                <option value="Plan to Watch">Plan to Watch</option>
            </select>
                </p>
                <?php
                }
                if(isset($status)){
                if($status=="Watching"){
                               
                            ?>
                <form action=" " method="POST" onchange='this.form.submit()'>
            <p> <select style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="estado" onchange='this.form.submit()'>
                <option value="0">-</option>
                <option value="Watching" selected>Watching</option>
                <option value="Completed">Completed</option>
                <option value="On-Hold">On-Hold</option>
                <option value="Dropped">Dropped</option>
                <option value="Plan to Watch">Plan to Watch</option>
            </select>
                 </p>
                 <?php
                }
                if($status=="Completed"){
                               
                    ?>
                <form action=" " method="POST">
            <p> <select style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="estado" onchange='this.form.submit()'>
                <option value="0">-</option>
                <option value="Watching" >Watching</option>
                <option value="Completed"selected>Completed</option>
                <option value="On-Hold">On-Hold</option>
                <option value="Dropped">Dropped</option>
                <option value="Plan to Watch">Plan to Watch</option>
            </select>
                </p>
                <?php
                }
                if($status=="On-Hold"){
                                    
                    ?>
                <form action=" " method="POST">
                <p> <select style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="estado" onchange='this.form.submit()'>
                <option value="0">-</option>
                <option value="Watching" >Watching</option>
                <option value="Completed">Completed</option>
                <option value="On-Hold"selected>On-Hold</option>
                <option value="Dropped">Dropped</option>
                <option value="Plan to Watch">Plan to Watch</option>
                </select>
                </p>
                <?php
                }
                if($status=="Dropped"){
                                    
                    ?>
                <form action=" " method="POST">
                <p> <select style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="estado" onchange='this.form.submit()'>
                <option value="0">-</option>
                <option value="Watching" >Watching</option>
                <option value="Completed">Completed</option>
                <option value="On-Hold">On-Hold</option>
                <option value="Dropped"selected>Dropped</option>
                <option value="Plan to Watch">Plan to Watch</option>
                </select>
                </p>
                <?php
                }
                if($status=="Plan to Watch"){
                                    
                    ?>
                <form action=" " method="POST">
                <p> <select style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" name="estado" onchange='this.form.submit()'>
                <option value="0">-</option>
                <option value="Watching" >Watching</option>
                <option value="Completed">Completed</option>
                <option value="On-Hold">On-Hold</option>
                <option value="Dropped">Dropped</option>
                <option value="Plan to Watch"selected>Plan to Watch</option>
                </select>
                </p>
                <?php
                }
            }
                ?>
                    <td width="600px" height="50px" colspan="2"><hr color="#ffc119"><font face="arial" size="4" color="#ffc119">Episode List<br><br></font>
                    <?php
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "animengrish";
        
                
                if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                {
                    die("failed to connect into database!");
                }

                $sql = "SELECT animes.idAnime, episodios.idEpisodio, episodios.idAnime, episodios.numeroEpisodio from animes INNER JOIN episodios ON animes.idAnime=episodios.idAnime WHERE animes.idAnime='$id'";
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
            ?>
                    </td>
                </tr>
            </table>
            </fielset>
            <?php
                if(isset($_POST["estado"])){
                    if(isset($_SESSION["id"])){
                        if($status=="nope"){
                            
                                /*
                    Se não existe um estado entao insere na base de dados
                    */
                        $estado=$_POST["estado"];
                        $dbhost = "localhost";
                        $dbuser = "root";
                        $dbpass = "";
                        $dbname = "animengrish";
                        
                        
                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                        {
                            die("failed to connect into database!");
                        }
                        $add = "INSERT INTO status (idStatus, idAnime, id, status) VALUES(NULL, '$id', '$_SESSION[id]', '$estado')";
                        mysqli_query($con, $add);
                        }
                        else{
                            /*
                    Se existe um estado entao vai muda lo ou apaga lo
                    */
                            if($_POST["estado"]=="0"){
                                 /*
                    Se o novo estado for nada entao apago-o
                    */
                                $dbhost = "localhost";
                                $dbuser = "root";
                                $dbpass = "";
                                $dbname = "animengrish";
                        
                        
                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                        {
                            die("failed to connect into database!");
                        }
        
                        $delete="DELETE FROM status where idAnime='$id' AND id='$_SESSION[id]'";
                        mysqli_query($con, $delete);
                            }
                            else{
                                /*Se o novo estado for valido entao mudifico-o*/ 
                                        $estado=$_POST["estado"];
                                        $dbhost = "localhost";
                                        $dbuser = "root";
                                        $dbpass = "";
                                        $dbname = "animengrish";
                                        
                                        
                                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                                        {
                                            die("failed to connect into database!");
                                        }
                                        $update="UPDATE status set status='$estado' where idAnime='$id' AND id='$_SESSION[id]'";
                                        mysqli_query($con, $update);
                            }
                        }
                    }
                    else{
                        ?><script>
                        window.setTimeout(function (){
                        location.href="testePaginaLogin.php";
                        },0);
                        </script><?php
                        }
                }
                
            ?>
        </div>
        <div style="background-color:black; float: right; width:10%">
        </div>
    </body>
</html>