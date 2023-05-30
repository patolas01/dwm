<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Account Page</title>
</head>

<body>
    <form action="insertUser.php" method="POST" enctype="multipart/form-data">
        <center><br>
            <input type="text" name="email" placeholder="Email"><br><br>
            <input type="text" name="nome" placeholder="nome"><br><br>
            <input type="file" name="foto"accept="image/*"><br><br>
            <input type="text" name="pass" placeholder="Password"><br><br>
            <input type="submit" name="submit">
        </center>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $plaintext_password = $_POST['pass'];
        $password = hash('sha512', $plaintext_password); 
        $host = "localhost";
        $database = "pws";
        $user = "root";
        $pass = "";
        $conn = new mysqli($host, $user, $pass, $database);
        
        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn->connect_error;
            exit();
        } else {
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['foto'];
                // Especifique o caminho para a pasta onde deseja guardadar as imagens
                $uploadDirectory = 'upload_img/';
                // Gera um nome único para o arquivo
                $fileName = uniqid() . '_' . $file['name'];
                $destination = $uploadDirectory . $fileName;
                // Verifica se o tipo de arquivo é uma imagem
                if (exif_imagetype($file['tmp_name'])) {
                    // Move o arquivo para a pasta de destino
                    if (move_uploaded_file($file['tmp_name'], $destination)) {
    
                        $query = "INSERT INTO utilizador (email, nome, pass, foto) VALUES ('$email','$nome','$password','$fileName');";
                        $conn->query($query);
                        //prompt msg a dizer q a imagem foi guardada
                    } else {
                        echo 'Ocorreu um erro ao guardar a imagem.';
                    }
                } else {
                    echo 'O ficheiro enviado não é uma imagem válida.';
                }
            } else {
                echo 'Nenhum ficheiro foi enviado.';
            }
        }
    }
    ?>
</body>

</html>