<html>
    <head>
        <title>MangaEngrish Search by Genres</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
        <style>
        /* Make the image fully responsive */
        .carousel-inner img {
          width: 100%;
          height: 73%;
        }
	        body{background-color: black; color:#d61212;}
            a{text-decoration: none;}
            a:link{color:#d61212;}
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
            .image{
            width:200px;
            height:300px;
            }
            .manga1div{
                width:200px;
                background-color:#1b1b1b;
                height:351px;
                float:left;
                text-align:center;
            }
            .manga2div{
                width:200px;
                background-color:#1b1b1b;
                height:351px;
                float:left;
                margin-left:25px;
                text-align:center;
            }
            .manga3div{
                width:200px;
                background-color:#1b1b1b;
                height:351px;
                float:left;
                margin-left:25px;
                text-align:center;
            }
            .manga4div{
                width:200px;
                background-color:#1b1b1b;
                height:351px;
                float:left;
                margin-left:25px;
                text-align:center;
            }
            .manga5div{
                width:200px;
                background-color:#1b1b1b;
                height:351px;
                float:left;
                margin-left:25px;
                text-align:center;
            }
	    </style>
    </head>
    <body>
        <div class="wrapper" style="background-color:#1b1b1b;">
            <?php
                include ("menu.php");
                $genero = $_GET["id"];
            ?>
            <br>
            <form>
                <Fieldset>
                    <legend align="left"> <font face="arial" size="4" color="#d61212"><?php echo $genero ?> Mangas and Light Novels</font>
                    </legend>
            <!-- Primeira fila -->
            <div style="float: left; padding: 0 16px; width: 100%;">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "mangaengrish";
                
        
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
        
                // SELECT (whatever rows you want) FROM (your table name)
                $sql = "SELECT artigos.codartigo, artigos.nomeartigo, volumes.img1, volumes.precovenda,volumes.numvolume, volumes.codvolume FROM artigos inner join volumes on artigos.codartigo=volumes.codartigo where genero LIKE '%$genero%' order by numvolume";
                $result = $conn->query($sql);
                $numerolinha=1;
        
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        // Outputting HTML and the data from the DB. Change to $row['the name of the field you want']
                        if ($numerolinha==1)
                        {
                            ?><div class="manga1div"><a href="paginaArtigo.php?id=<?=$row["codvolume"]?>"><img  class="image" src="<?php echo $row['img1'];?>"><br><?php echo $row['nomeartigo'];?>&nbsp;Vol.&nbsp;<?php echo $row["numvolume"];?></a></div><?php
                        }
                        if ($numerolinha==2)
                        {
                            ?><div class="manga2div"><a href="paginaArtigo.php?id=<?=$row["codvolume"]?>"><img  class="image" src="<?php echo $row['img1'];?>"><br><?php echo $row['nomeartigo'];?>&nbsp;Vol.&nbsp;<?php echo $row["numvolume"];?></a></div><?php
                        }
                        if ($numerolinha==3)
                        {
                            ?><div class="manga3div"><a href="paginaArtigo.php?id=<?=$row["codvolume"]?>"><img  class="image" src="<?php echo $row['img1'];?>"><br><?php echo $row['nomeartigo'];?>&nbsp;Vol.&nbsp;<?php echo $row["numvolume"];?></a></div><?php
                        }
                        if ($numerolinha==4)
                        {
                            ?><div class="manga4div"><a href="paginaArtigo.php?id=<?=$row["codvolume"]?>"><img  class="image" src="<?php echo $row['img1'];?>"><br><?php echo $row['nomeartigo'];?>&nbsp;Vol.&nbsp;<?php echo $row["numvolume"];?></a></div><?php
                        }
                        if($numerolinha == 5)
                        {
                            ?><div class="manga5div"><a href="paginaArtigo.php?id=<?=$row["codvolume"]?>"><img  class="image" src="<?php echo $row['img1'];?>"><br><?php echo $row['nomeartigo'];?>&nbsp;Vol.&nbsp;<?php echo $row["numvolume"];?></a></div><?php
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
            </div>
    </body>
</html>