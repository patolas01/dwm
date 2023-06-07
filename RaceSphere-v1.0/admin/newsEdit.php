<!DOCTYPE html>
<html lang="pt">

<head>

    <?php include('bootstrapInc.php'); ?>
    <title>Editar Notícia</title>
    <link rel="stylesheet" href="../css/pauloLeal.css">
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>

</head>

<body>
    <?php include('navbar.php'); ?>

    <?php
    include "../sqli/conn.php";

    $idnoticia = $_GET['id'];

    $getPlace = "SELECT * FROM noticias WHERE id_noticia = $idnoticia";
    $result = $conn->query($getPlace);
    $row2 = mysqli_fetch_assoc($result);
?>
    <h1>Gerir Notícias</h1>
    <form id="news" action="newsEdit.php?id=<?php echo $idnoticia; ?>" method="post" enctype="multipart/form-data">
        <div class="grid-container">
            <div class="grid-item join">
                <div class="form-group">
                    <label for="file-picker">Foto</label>
                    <!--input file-->
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="file-picker" accept="image/*">
                        <label class="custom-file-label" for="file-picker">Escolher a foto...</label>
                    </div>
                    <div id="image-preview"></div>
                </div>
            </div>
            <div class="grid-item">
                <label for="titulo-noticia">Titulo</label>
                <input name="titulo-noticia" class="form-control" type="text"
                    value="<?php echo $row2['titulo_noticia']; ?>" required>
            </div>
            <div class="grid-item">
                <label for="categoria">Categoria</label>
                <select name="categoria" class="form-control" required>
                    <?php
                    if ($row2['cat_noticia'] == "f1") { ?>
                        <option value="f1" selected>F1</option>
                        <option value="wrc">WRC</option>
                        <option value="wec">WEC</option>
                        <?php
                    }
                    if ($row2['cat_noticia'] == "wrc") {
                        ?>
                        <option value="f1">F1</option>
                        <option value="wrc" selected>WRC</option>
                        <option value="wec">WEC</option>
                        <?php
                    } else { ?>
                        <option value="f1">F1</option>
                        <option value="wrc">WRC</option>
                        <option value="wec" selected>WEC</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="descEditor">Descrição</label>
            <div id="descEditor" name="descEditor">
                <p></p>
            </div>
        </div>
        <button name="guardar" type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <script>
        window.addEventListener("load", (event) => {
            // Get the file picker input element
            var e = '../img/bd-img/news/';
            var imagePreview = document.getElementById('image-preview');
            imagePreview.style.backgroundImage = 'url(' + e + '<?php echo $row2['thumb_noticia'] ?>)';
            //alert(imagePreview.style.backgroundImage);
        });

        var editor1 = new RichTextEditor("#descEditor");

        // onclick submit
        editor1.attachEvent("change", function () {
            var variable = editor1.getHTMLCode();

            var xmlhttp = new XMLHttpRequest();
            var url = "newsAdd.php";

            xmlhttp.open("POST", url, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    // Action to be taken after successful submission
                    console.log(xmlhttp.responseText); // Example: display the response from PHP
                }
            };

            var params = "desc=" + encodeURIComponent(variable); // Parameter to be sent
            xmlhttp.send(params);
        });





        //foto-preview
        window.onload = function () {
            var xmlhttp = new XMLHttpRequest();
            var url = "newsAdd.php";

            var filePicker = document.getElementById('file-picker');
            var imagePreview = document.getElementById('image-preview');

            filePicker.addEventListener('change', function (e) {
                var file = e.target.files[0];
                var reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.style.backgroundImage = 'url(' + e.target.result + ')';
                };

                reader.readAsDataURL(file);
            });
        };


    </script>


    <?php




    if (isset($_POST['guardar'])) {
        $desc = 'teste de descrição'; //$_POST['desc'];
        $titulo = $_POST['titulo-noticia'];
        $categoria = $_POST['categoria'];
        $id_noticia = $_GET['id'];

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['foto'];
            // Especifique o caminho para a pasta onde deseja guardadar as imagens
            $uploadDirectory = '../img/bd-img/news/';
            // Gera um nome único para o arquivo
            $fileName = uniqid();
            $destination = $uploadDirectory . $fileName;
            //echo 'PATH:: ' . $destination;
            // Verifica se o tipo de arquivo é uma imagem
            if (exif_imagetype($file['tmp_name'])) {
                // Move o arquivo para a pasta de destino
                if (move_uploaded_file($file['tmp_name'], $destination)) {

                    $query = "UPDATE noticias SET titulo_noticia = '$titulo', desc_noticia = '$desc', thumb_noticia = '$fileName', cat_noticia = '$categoria' WHERE id_noticia = $id_noticia";
                    $conn->query($query);
                    //prompt msg a dizer q a imagem foi guardada
                } else {
                    echo 'Ocorreu um erro ao guardar a imagem.';
                }
            } else {
                echo 'O ficheiro enviado não é uma imagem válida.';
            }
        } else {
            $query = "UPDATE noticias SET titulo_noticia = '$titulo', desc_noticia = '$desc', cat_noticia = '$categoria' WHERE id_noticia = $id_noticia";
            $conn->query($query);
        }
        include('../bootstrap/modals/alertSuccess.php');
        sleep(3);
        ?>
        <script>
            window.location.href = "news.php";
        </script>
        <?php
        exit;
        //echo ' - ' . $desc . ' - ' . $titulo . ' - ' . $categoria;
    }


    ?>


    <?php include('footer.php'); ?>
</body>

</html>