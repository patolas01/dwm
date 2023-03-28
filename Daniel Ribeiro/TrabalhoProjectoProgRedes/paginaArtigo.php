<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
?>
<html>
    <head>
        <title>MangaEngrish Artigo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
        <?php    
                function addToCart($id)
                {
               
                    $dbhost = "localhost";
                    $dbuser = "root";
                    $dbpass = "";
                    $dbname = "mangaengrish";
                    
                    
                    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                    {
                        die("failed to connect into database!");
                    }
    
                    $sql = "SELECT artigos.nomeartigo, artigos.modelo, artigos.genero, artigos.codartigo, volumes.codvolume, volumes.codartigo, volumes.numvolume, volumes.img1, volumes.precovenda, volumes.quantidadestock, volumes.sinopse, nomeforn FROM volumes inner join artigos on artigos.codartigo=volumes.codartigo inner join forneceartigos on forneceartigos.codartigo=artigos.codartigo inner join fornecedores on fornecedores.codforn=forneceartigos.codforn where volumes.codvolume='$id'";
                    $store_data=mysqli_query($con, $sql);
                    
                    if($store_data)
                    {
                        
                        if($store_data && mysqli_num_rows($store_data) > 0)
                        {
                            foreach($store_data as $row){
                            }
                        }
                    }
                    $add = "INSERT INTO carrinho (id, nomeartigo, codvolume, modelo, fornecedor, quantidade, img1, codartigo, precovenda) VALUES('$_SESSION[id]','$row[nomeartigo]','$row[codvolume]','$row[modelo]','$row[nomeforn]','1','$row[img1]','$row[codartigo]','$row[precovenda]')";
                    mysqli_query($con, $add);
                    ?><script>alert("Item successfuly added to your cart")</script><?php
                }
            ?>
        <style>
        /* Make the image fully responsive */
        .carousel-inner img {
          width: 100%;
          height: 73%;
        }
        </style>
	    <style>
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

        .mainimage{
            width:280px;
            height:400px;     
        }

        .maindiv{
            width:300px;
            background-color:#1b1b1b;
            height:451px;
            float:left;
            text-align:center;
        }

        .info{
            height: 400px;
            width: 500px;
            margin-left: 20px;
            float:left;
            word-wrap: break-word;
            
            text-overflow: ellipsis;
        }

        .buydiv{
            margin-left: 10px;
            height: 400px;
            width: 274px;
            padding-right: 16px;
            float: left;
            position: relative;
        }

        .buydiv-content{
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .innerbuy button{
            background-color: #d61212;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .innerbuy button:hover{
            background-color: #f3f3f3;
            color: black;
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
        .nomeartigodiv{
            width:100%;
            height:70px;
        }
        .modelodiv{
            width:100%;
            height:30px;
        }
        .generodiv{
            width:100%;
            height:121px;
        }
        .informacaodiv{
            width:100%;
        }
	    </style>
    </head>
    <body>
        <div class="wrapper" style="background-color:#1b1b1b;">
            <?php
                include ("menu.php");
            ?>
            <br>
                <Fieldset>
                    <br>
                    
            <!-- Primeira fila -->
            <div style="float: left; padding-left: 16px; width: 100%;">
            <?php
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "mangaengrish";
                $id=$_GET["id"];
        
                
                if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                {
                    die("failed to connect into database!");
                }

                $sql = "SELECT artigos.nomeartigo, artigos.modelo, artigos.genero, artigos.codartigo, volumes.codvolume, volumes.codartigo, volumes.numvolume, volumes.img1, volumes.precovenda, volumes.quantidadestock, volumes.sinopse, nomeforn  FROM volumes inner join artigos on artigos.codartigo=volumes.codartigo inner join forneceartigos on forneceartigos.codartigo=artigos.codartigo inner join fornecedores on fornecedores.codforn=forneceartigos.codforn where volumes.codvolume='$id'";
                $store_data=mysqli_query($con, $sql);
                
                if($store_data)
                {
                    
                    if($store_data && mysqli_num_rows($store_data) > 0)
                    {
                        foreach($store_data as $row){
                    ?><div class="maindiv"><img  class="mainimage" src="<?php echo $row['img1'];?>"></div><?php
                    $stock=$row['quantidadestock'];
                
            ?>
                <div class="info">
                    <div class="nomeartigodiv">
                    <h1><?php echo $row['nomeartigo'];?>&nbsp;Vol.&nbsp;<?php echo $row["numvolume"];?></h1>
                    </div>
                    <div class="modelodiv">
                    <h2>Type: <?php echo $row['modelo'];?></h2>
                    <?php
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
                    </div>
                    <div class="generodiv">
                    <h2>Genre: <?php echo $generos; ?></h2>
                    </div>
                    <div class="informacaodiv">
                    <b>Synopsis:</b>
                    </div>
                    <div style="height: 100px; width:100%; overflow: scroll; overflow-x: hidden; text-align: justify; text-justify: inter-word;">
                        <?php echo $row['sinopse'];?>
                    </div>
                </div>
                <div class="buydiv">
                    <div class="buydiv-content">
                        <h2>Publisher:<br><?php echo $row['nomeforn'];?></h2>
                        <br>
                        <h2>Price: <?php echo $row['precovenda'].'€'; ?></h2>
                        <br>
                        <div class="innerbuy">
                        <form method="post">
                            <button name="enviar" type="submit">Add to Cart</button>
                        </form>
                        </div>
                    </div>  
                </div>
                <div style="float: left; width: 100%; margin:-16px">
                    <hr>
                </div>
                <?php
                    }
                }
            }
            $idartigo=$row['codartigo'];
            $sql = "SELECT artigos.codartigo, artigos.nomeartigo, volumes.img1, volumes.numvolume, volumes.codvolume FROM artigos inner join volumes on artigos.codartigo=volumes.codartigo where volumes.codartigo='$idartigo' order by volumes.codvolume DESC limit 1";
            $store_data=mysqli_query($con, $sql);
                    $numerodelinhas=1;
                    if($store_data)
                    {
                        
                        if($store_data && mysqli_num_rows($store_data) > 0)
                        {
                            foreach($store_data as $row){
                                $numvolume=$row["numvolume"];
                                $codvolume=$row["codvolume"];
                    }
                }
            }
                ?>
                <div style="float: left; width: 100%;">
                    <h2>Related products</h2>
                    <?php   
                    if($id==$codvolume)
                    {
                        $newid=$numvolume-6;
                        $sql = "SELECT artigos.codartigo, artigos.nomeartigo, volumes.img1, volumes.numvolume, volumes.codvolume FROM artigos inner join volumes on artigos.codartigo=volumes.codartigo where volumes.codartigo='$idartigo' and volumes.numvolume>'$newid' order by volumes.codvolume asc limit 5";   
                    }
                    else
                    {
                        $sql = "SELECT artigos.codartigo, artigos.nomeartigo, volumes.img1, volumes.numvolume, volumes.codvolume FROM artigos inner join volumes on artigos.codartigo=volumes.codartigo where volumes.codartigo='$idartigo' and volumes.codvolume>'$id' limit 5";
                    }  
                    
                    $store_data=mysqli_query($con, $sql);
                    $numerolinha=1;
                    if($store_data)
                    { 
                        if($store_data && mysqli_num_rows($store_data) > 0)
                        {
                            foreach($store_data as $row){
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
                                }
                                else
                                {
                                    $numerolinha+=1;
                                }
                    }
                }
            }           
        ?>
                <?php
                    if(isset($_POST["enviar"]))
                    {
                        if(isset($_SESSION["user"]))
                        {
                            $car="Select * from carrinho where carrinho.codvolume='$id' and carrinho.id='$_SESSION[id]'";
                            $store_data=mysqli_query($con, $car);
                            if($store_data)
                            {
                                
                                if(($store_data && mysqli_num_rows($store_data) > 0))
                                {
                                    ?><script>alert("This item was already added to your cart")</script><?php
                                }
                                else
                                {
                                    if($stock==0)
                                    {
                                        ?><script>alert("This item is currently out of stock")</script><?php
                                    }
                                    else
                                    {
                                    addToCart($id);
                                    }
                                }
                            }
                        }
                        else
                        {?>
                            <script>
                            window.setTimeout(function (){
                                location.href="paginaLogin.php";
                            },1000);
                            </script><?php
                        }
                    }
                ?>
                </div>
                
            </div>
    </body>
</html>