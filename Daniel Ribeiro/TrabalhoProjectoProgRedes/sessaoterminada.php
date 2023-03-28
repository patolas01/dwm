<?php session_start(); ?>
<html>
    <head>
    <title>MangaEngrish session terminated</title>
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
            </style>
    </head>
    <body>
    <div class="wrapper" style="background-color:#1b1b1b;">
            <?php
                include ("menu.php");
            ?>      
            <!-- Primeira fila -->
            <div style="float: left; padding-left: 16px; width: 100%;">
            <?php
session_destroy();
?>
<center><?php echo "Your session was terminated";
//header("Refresh:3; url=homepag.php");?>

<script>
window.setTimeout(function (){
    location.href="homepag.php";
},3000);
</script>
<br>
<img src="https://img1.ak.crunchyroll.com/i/spire3/03262008/a/0/b/7/a0b70c295e7c30_full.png"></center>
                </div>
            </div>
    </body>
    </html>