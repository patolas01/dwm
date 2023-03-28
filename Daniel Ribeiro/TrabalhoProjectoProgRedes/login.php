<html>
    <body>
    <center>
        <h2>Login</h2>
        <form action=" " method="POST">
            <p> <input type="text" placeholder="Utilizador" name="user" required> </p>
            <p> <input type="password" placeholder="Password" name="password" required> </p>
            <p>
            <button name="enviar" type="submit" class="btn btn-success btn-lg">Login</button>&nbsp;&nbsp;
            <button type="reset" class="btn btn-danger btn-lg">Limpar</button>&nbsp;&nbsp;
            <button type="button" class="btn btn-info btn-lg"><a style="text-decoration: none" href="registo.php">Registar</a></button>
            </p>
        </form>
        </center>
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
                echo "Utilizador não registado ";
                echo "<a href='registo.php'>Registe-se aqui";
                exit;
                }
                $existe="Select * from utilizadores where login='".$us."' and senha='".$ps."'";
                $faz_existe=mysqli_query($ligaBD,$existe);
                $registos_user=mysqli_fetch_array($faz_existe);
                $num_registos=mysqli_num_rows($faz_existe);
                if($num_registos==1)
                {
                session_start();
                $_SESSION = array();
                $_SESSION["user"]=$_POST["user"];
                $_SESSION["nome"]=$registos_user["nome"];
                $_SESSION["id"]=$registos_user["id"];
                echo "Welcome $_SESSION[nome]";
                header("Refresh:3; url=homepag.php");
                }
                else
                {
                echo "Autentication error";
                echo "<br>";
                echo '<a href="login.php">Voltar</a>';
                }
            }
        ?>
    </body>
</html>