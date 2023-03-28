<html>
    <head>
        <title>MangaEngrish User Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            input[type=email] {
            width: 20%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
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
        </style>
    </head>
    <body>
    <div class="wrapper" style="background-color:#1b1b1b;">
            <?php
                include ("menu.php");
            ?>
            <br>
            
                <Fieldset>
                    <legend align="left"> <font face="arial" size="4" color="#d61212">Sign Up</font>
                    </legend>
            <!-- Primeira fila -->
            <div style="float: left; padding: 0 16px; width: 100%;">
        <center>
        <h2>User Sign up</h2>
        <form action="adicionar_registo.php" method="POST">
            <p> <input type="text" style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" placeholder="Name" name="nome" required> </p>
            <p> <input type="email" placeholder="E-mail" name="email" required> </p>
            <p> <input type="text" style="width: 20%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" placeholder="Username" name="user" required> </p>
            <p> <input type="password" placeholder="Password" name="password" required> </p>
            <p> <input type="password" placeholder="Confirm password" name="password1" required> </p>
            <p>
            <button name="enviar" type="submit" class="btn btn-success btn-lg">Sign Up</button>&nbsp;&nbsp;
            <button type="reset" class="btn btn-danger btn-lg">Clean</button>&nbsp;&nbsp;
            <a style="text-decoration: none" href="paginaLogin.php"><button type="button" class="btn btn-info btn-lg">Login</button></a>
            </p>
        </form>
        </center>
        </div>
        </div>
    </body>
<html>
