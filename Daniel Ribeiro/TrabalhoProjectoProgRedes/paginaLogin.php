<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    ?>
<html>
    <head>
        <title>MangaEngrish Manga Shop</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        /* Make the image fully responsive */
        .carousel-inner img {
          width: 100%;
          height: 73%;
        }
	        body{background-color: black; color:#d61212;}
            a{text-decoration: none;}
            
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
            input[type=password] {
            width: 20%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            }
            .btn-group-lg>.btn, .btn-lg {
            padding: 0.5rem 1rem;
            font-size: 1.25rem;
            line-height: 1.5;
            border-radius: 0.3rem;
            }
            .btn-danger {
                color: #fff;
                background-color: #dc3545;
                border-color: #dc3545;
            }
            .btn {
                display: inline-block;
                font-weight: 400;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                user-select: none;
                border: 1px solid transparent;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
            .btn-success {
                color: #fff;
                background-color: #28a745;
                border-color: #28a745;
            }
            .btn-info {
                color: #fff !important;
                background-color: #17a2b8 !important;
                border-color: #17a2b8 !important;
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
                    <legend align="left"> <font face="arial" size="4" color="#d61212">Login</font>
                    </legend>
            <!-- Primeira fila -->
            <div style="float: left; padding: 0 16px; width: 100%;">
            <center>
        <h2>Login</h2>
        <form action=" " method="POST">
            <p> <input style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" type="text" placeholder="User" name="user" required> </p>
            <p> <input type="password" placeholder="Password" name="password" required> </p>
            <p>
            <button name="enviar" type="submit" class="btn btn-success btn-lg">Login</button>&nbsp;&nbsp;
            <button type="reset" class="btn btn-danger btn-lg">Clean</button>&nbsp;&nbsp;
            <a style="text-decoration: none" href="paginaRegisto.php"><button type="button" class="btn btn-info btn-lg">Sign Up</button></a>
            </p>
        </form>
        
        <?php
            if(isset($_POST['enviar']))
            {
                $us=$_POST["user"];
                $ps=$_POST["password"];
                include('ligaBD.php');
                $existe="Select * from utilizadores where login='".$us."'";
                $faz_existe=mysqli_query($ligaBD,$existe);
                $num_registos=mysqli_num_rows($faz_existe);
                if($num_registos==0)
                {
                echo "User was not registered";
                echo "<a href='paginaRegisto.php'><font color='red'> Sign up here</font>";
                exit;
                }
                $existe="Select * from utilizadores where login='".$us."' and senha='".$ps."'";
                $faz_existe=mysqli_query($ligaBD,$existe);
                $registos_user=mysqli_fetch_array($faz_existe);
                $num_registos=mysqli_num_rows($faz_existe);
                if($num_registos==1)
                {
                $_SESSION = array();
                $_SESSION["user"]=$_POST["user"];
                $_SESSION["nome"]=$registos_user["nome"];
                $_SESSION["id"]=$registos_user["id"];
                echo "Welcome ". $_SESSION["nome"];?>
                <script>
                    window.setTimeout(function (){
                        location.href="homepag.php";
                    },3000);
                </script>
                <?php
                }
                else
                {
                echo "Autentication error";
                echo "<br>";
                echo '<a href="paginaLogin.php">Try again</a>';
                }
            }
        ?></center>
            </div>
    </body>
</html>