<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    ?>
<html>
    <head>
        <title>Artigo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
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
                float: left;
                width: auto;
                height:200px;
                position: relative;   
            }

            .info{
                width: 100%;
                height: 200px;
                float:left;
                top: 0;
                left: 0;
            }

            .infonome{
                width: 100%;
                height: 10%; 
            }

            .proddiv{
                padding-right: 10px;
                width: 80%;
                float: left;
                position: relative;
            }

            .buydiv{
                height: 20%;
                width: 19%;
                float: left;
                position: relative;
                border-left:1px solid #bbb;
                border-bottom: 1px solid #bbb;
            }

            .proddiv-content{
                position: absolute;
                bottom: 0;
                left: 0;
            }


            .innerbuy{
                position: absolute;
                width: 100%;
                height: 20%;
                bottom: 0;
            }

            .innerbuy button{
                background-color: #d61212;
                border: none;
                color: white;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                width: 100%;
                height: 100%;
                
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

            .imgcontainer{
                float: left;
                width: 18%;
                min-width: 134px;
                height: 100%;
            }

            .infcontainer{
                float: left;
                width: 82%;
                height: 100%;
                position: relative;
            }

            .artigonome{
                float: left;
                font-size: 25px;
                width: 80%;
            }

            .titleProd{
                float: left;
                width: 50%;
                min-height: inherit;
                left: 0;
            }

            .priceProd{
                float: left;
                width: 50%;
                min-height: inherit;
                position: relative;
            }

            .custom-select{
                position: absolute;
                left: 0;
                bottom: 0;  
            }

            .custom-select select{
                background-color: #f3f3f3;
                border: none;
                color: black;
                text-align: center;
            }

            #bottom {
                position:absolute;                 
                bottom:0;                         
                right:0;
                font-size: 1em;                        
            }

            #bottom button{
                background-color: #d61212;
                border: none;
                color: white;
                text-align: center;
                text-decoration: none;
                display: inline-block;              
            }

            #bottom button:hover{
                background-color: #f3f3f3;
                color: black;
            }

            .preco{
                float: left;
                width: 20%;
                position: absolute;                                         
                right: 0;
                text-align: right;  
            }

            .coisasemcima{
                width: 100%;
                min-height: 80px;
            }

            hr{
                float: left;
                width: 100%;
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
            <div style="float: left; width: 100%;">
            <?php
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "mangaengrish";

                (float)$price = 0;
        
        
                if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                {
                    die("failed to connect into database!");
                }

                $sql = "SELECT carrinho.carId, carrinho.id, carrinho.nomeartigo, carrinho.codvolume, carrinho.modelo, carrinho.fornecedor, carrinho.quantidade, carrinho.img1, carrinho.precovenda,volumes.numvolume,volumes.quantidadestock FROM carrinho inner join volumes on carrinho.codvolume=volumes.codvolume where carrinho.id ='$_SESSION[id]'";
                $store_data=mysqli_query($con, $sql);
                    ?>
                <div class="proddiv">
                    <div class="coisasemcima">
                        <div class="titleProd">
                            <h1>Shopping Cart</h1>
                        </div>
                        <div class="priceProd">
                            <div id="bottom">
                                Price
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                        if($store_data)
                        {
                            
                            if($store_data && mysqli_num_rows($store_data) > 0)
                            {
                                foreach($store_data as $row){
                                   
                                    
                    ?>
                    <div class="info">
                        <div class="imgcontainer">
                            <img class="image" src="<?php echo $row['img1'];?>">
                        </div>
                        <div class="infcontainer">
                            <div class="artigonome">
                                <b><?php echo $row['nomeartigo'];?>&nbsp;Vol.&nbsp;<?php echo $row["numvolume"];?></b>
                            </div>
                            <div class="preco">
                                <?php echo $row['precovenda'].'€';    
                                ?>
                            </div>
                            <div style="float: left; width: 100%;">
                                <br>
                                Type: <?php echo $row['modelo']; ?>
                            </div>
                            <div style="float: left; width: 100%;">
                                <br>
                                Publisher: <?php echo $row['fornecedor']; ?>
                            </div>
                            <div class="custom-select">
                                Quantity: <?php echo $row['quantidade']; ?>
                                <form method="post">
                                <?php $carId=$row['carId']?>
                                <select name="<?php echo $carId ?>" onchange='this.form.submit()'>
                                    <option value=""></option>
                                    <?php
                                        for($i = 1; $i <= $row['quantidadestock']; $i++){                                         
                                    ?>
                                        <option value="<?php echo $i ;?>"><?php echo $i ;?></option>
                                   <?php } ?>
                                </select>
                                </form>
                                <?php
                                    if(isset($_POST[$carId])){
                                        $quanti=$_POST[$carId];
                                        $dbhost = "localhost";
                                        $dbuser = "root";
                                        $dbpass = "";
                                        $dbname = "mangaengrish";
                                        
                                        
                                        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                                        {
                                            die("failed to connect into database!");
                                        }
                                        $update="UPDATE carrinho set quantidade='$quanti' where carId='$carId'";
                                        mysqli_query($con, $update);
                                        ?><script>
                                        window.setTimeout(function (){
                                            location.href="comprar.php";
                                        },0);
                                        </script><?php   
                                    }?>
                                   
                            </div>
                            <div id="bottom">
                                <form method="POST">
                                    <?php $remove=$row['carId'];?>
                                    <button name="remove" value="<?php echo $remove; ?>" onclick='this.form.submit()' type="submit">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
            }
            else
            {
                die("Your cart is empty try adding products");
            }
        }
        
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "mangaengrish";

                (float)$price = 0;
        
        
                if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                {
                    die("failed to connect into database!");
                }

                $sql = "SELECT carrinho.carId,carrinho.quantidade,carrinho.precovenda FROM carrinho inner join volumes on carrinho.codvolume=volumes.codvolume where carrinho.id ='$_SESSION[id]'";
                $store_data=mysqli_query($con, $sql);
                if($store_data)
                        {
                            
                            if($store_data && mysqli_num_rows($store_data) > 0)
                            {
                                foreach($store_data as $line){
                                     $price += (float)$line['precovenda']*(float)$line['quantidade'];
                                }
                            }
                        }
            ?>
                </div>
            
                <div class="buydiv">
                    <div style="text-align: center;">
                        <h2>Subtotal:</h2>
                    </div>
                    <div style="text-align: center; font-size: 20px">
                        <?php echo $price."€"; ?>
                    </div>
                    <div class="innerbuy">
                        <form method="POST">
                            <button name="comprar" type="submit">Buy</button>
                        </form>
                        <?php
                    if(isset($_POST["comprar"]))
                    {
                        $dbhost = "localhost";
                    $dbuser = "root";
                    $dbpass = "";
                    $dbname = "mangaengrish";
                    
                    
                    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                    {
                        die("failed to connect into database!");
                    }
    
                    $sql = "SELECT carrinho.carId,carrinho.quantidade,volumes.codvolume,volumes.quantidadestock FROM carrinho inner join volumes on carrinho.codvolume=volumes.codvolume where carrinho.id ='$_SESSION[id]'";
                    $store_data=mysqli_query($con, $sql);
                    
                    if($store_data)
                    {
                        
                        if($store_data && mysqli_num_rows($store_data) > 0)
                        {
                            foreach($store_data as $lines){
                                $dif=$lines["quantidadestock"]-$lines["quantidade"];
                                $codVol=$lines["codvolume"];
                                $update="UPDATE volumes set quantidadestock='$dif' where codvolume='$codVol'";
                                mysqli_query($con, $update); 
                            }
                        }
                    }
                    $del="DELETE from carrinho where carrinho.id ='$_SESSION[id]'";
                    mysqli_query($con, $del);
                    ?><center><?php echo "Thank you for your purchase";?></center>
                    <script>
                            window.setTimeout(function (){
                                location.href="homepag.php";
                            },5000);
                            </script><?php
                }
                    ?>
                     <?php
                    if(isset($_POST['remove']))
                    {
                    $fuckndie = $_POST['remove'];
                    $dbhost = "localhost";
                    $dbuser = "root";
                    $dbpass = "";
                    $dbname = "mangaengrish";
                    
                    
                    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                    {
                        die("failed to connect into database!");
                    }
    
                    $delete="DELETE FROM carrinho where carId='$fuckndie'";
                    mysqli_query($con, $delete); 
                    
                    ?>
                    <script>
                            window.setTimeout(function (){
                                location.href="comprar.php";
                            },0);
                            </script><?php
                }
                    ?>
                
                    </div>
                </div>
            </div>
    </body>
</html>