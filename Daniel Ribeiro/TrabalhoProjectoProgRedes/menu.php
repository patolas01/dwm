<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    ?>
<html>
    <head>
    <meta charset="utf-8">
        <style>
            .topnav1{
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #d61212;
                position: sticky;
                top: 0;
                color: black;
                height: 6%; 
                width: 100%;
                z-index: 99;
            }

            ul {
                list-style-type: none;
                float: center; 
                height: 100%;
                margin: 0px;
                padding: 0px 0px 0px 0px;
            }

            li {
                margin-left: 0px;
                margin-top: 0px;
                float: left;
                border-right:1px solid #bbb;
                height: 100%;
                text-decoration: none;
                list-style-type: none;
            }

            .bdlog{
                border-right: none;
            }

            li a:link {
                display: inline-block;
                color: black;
                padding: 16px 16px;
                height: 100%;
                text-align: center;
                text-decoration: none;
            }

            li a:hover:not(.active){
                background-color: #f3f3f3;
            }
            /* Navbar container */
            .navbar1 {
            overflow: hidden;
            background-color: #333;
            font-family: Arial;
            }

            /* Links inside the navbar */
            .navbar1 a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 15px 16px;
            text-decoration: none;
            }

            /* The dropdown container */
            .dropdown {
            float: left;
            overflow: hidden;
            }

            /* Dropdown button */
            .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit; /* Important for vertical align on mobile phones */
            margin: 0; /* Important for vertical align on mobile phones */
            }

            /* Add a red background color to navbar links on hover */
            .navbar1 a:hover, .dropdown:hover .dropbtn {
            background-color: red;
            }

            /* Dropdown content (hidden by default) */
            .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            }

            /* Links inside the dropdown */
            .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
            }

            /* Add a grey background color to dropdown links on hover */
            .dropdown-content a:hover {
            background-color: red;
            color:white;
            }

            /* Show the dropdown menu on hover */
            .dropdown:hover .dropdown-content {
            display: block;
            }
            input[type=text]{
            width: 30%; /* Full width */
            margin-left:300px;
            border: 1px solid #ccc; /* Gray border */
            border-radius: 2px; /* Rounded borders */
            box-sizing: border-box; /* Make sure that padding and width stays in place */
            margin-top: 13px; /* Add a top margin */
            resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
            }

            /* Style the submit button with a specific background color etc */
            input[type=submit] {
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
            }

            /* When moving the mouse over the submit button, add a darker green color */
            input[type=submit]:hover {
            background-color: black;
            }
        </style>
    </head>
    <body>
    
            <div>
                <img src="Logo2.jpg" width="150px">
            </div>
            <div class="navbar1">
            <a href="homepag.php">Home</a>
            <a href="pagLightNovels.php">Light Novels</a>
            <?php
            if(!isset($_SESSION["id"])){
            ?>
            <a style="float:right;" href="paginaRegisto.php">Sign up</a>
            <a style="float:right;" href="paginaLogin.php">Login</a>
            <?php
            }
            else
            {
                ?><a style="float:right;" href="sessaoterminada.php"><?php echo $_SESSION["nome"] ?></a>
                <a style="float:right;" href="comprar.php">Cart</a><?php
            }?>
            <div class="dropdown">
                <button class="dropbtn">Genres
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a style="float:right; width:160px;" href="categoria.php?id=Comedy">Comedy</a>
                <a style="float:right; width:160px;" href="categoria.php?id=Adventure">Adventure</a>
                <a style="float:left; width:160px;" href="categoria.php?id=Action">Action</a>
                <br>
                <a style="float:right; width:160px;" href="categoria.php?id=Fantasy">Fantasy</a>
                <a style="float:right; width:160px;" href="categoria.php?id=Demons">Demons</a>
                <a style="float:left; width:160px;" href="categoria.php?id=Drama">Drama</a>
                <br>
                <a style="float:right; width:160px;" href="categoria.php?id=Military">Military</a>
                <a style="float:right; width:160px;" href="categoria.php?id=Horror">Horror</a>
                <a style="float:left; width:160px;" href="categoria.php?id=Historical">Historical</a>
                <br>
                <a style="float:right; width:160px;" href="categoria.php?id=Romance">Romance</a>
                <a style="float:right; width:160px;" href="categoria.php?id=Psychological">Psychological</a>
                <a style="float:left; width:160px;" href="categoria.php?id=Mystery">Mystery</a>
                <br>
                
                <a style="float:right; width:160px;" href="categoria.php?id=Seinen">Seinen</a>
                <a style="float:left; width:160px;" href="categoria.php?id=Sci-Fi">Sci-Fi</a>
                <a style="float:left; width:160px;" href="categoria.php?id=School">School</a>
                <br>
                
                <a style="float:right; width:160px;" href="categoria.php?id=Slice of Life">Slice of Life</a>
                <a style="float:left; width:160px;" href="categoria.php?id=Shounen">Shounen</a>
                <a style="float:right; width:160px;" href="categoria.php?id=Shoujo">Shoujo</a>
                <br>
                <a style="float:right; width:160px;" href="categoria.php?id=Vampire">Vampire</a>
                <a style="float:left; width:160px;"  href="categoria.php?id=Supernatural">Supernatural</a>
                <a style="float:right; width:160px;" href="categoria.php?id=Super Power">Super Power</a>
                </div>
            </div>
            <div float:right; class="container">
                <form name="search" method="GET" action="pesquisa.php">
                    <center><input type="text"  name="search" placeholder="Search">
                    <input type="submit" value="Submit"></center>
                </form>
            </div>
            </div>
    </body>
</html>