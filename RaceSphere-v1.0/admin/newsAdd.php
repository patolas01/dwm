<!DOCTYPE html>
<html lang="pt">

<head>

    <?php include('bootstrapInc.php'); ?>
    <title>Nova Notícia</title>
    <link rel="stylesheet" href="../css/pauloLeal.css">
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.1/purify.min.js"></script>

</head>

<body>
    <?php include('navbar.php'); ?>

    <h1>Gerir Notícias</h1>
    <form id="news" action="newsAdd.php" method="post" enctype="multipart/form-data">
        <div class="grid-container">
            <div class="grid-item join">
                <div class="form-group">
                    <label for="file-picker">Foto</label>
                    <!--input file-->
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="file-picker" accept="image/*"
                            required>
                        <label class="custom-file-label" for="file-picker">Escolher a foto...</label>
                    </div>
                    <div id="image-preview"></div>
                </div>
            </div>
            <div class="grid-item">
                <label for="titulo-noticia">Titulo</label>
                <input id="titulo-noticia" name="titulo-noticia" class="form-control" type="text" required>
            </div>
            <div class="grid-item">
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" class="form-control">
                    <option value="">Escolher...</option>
                    <option value="f1">F1</option>
                    <option value="wrc">WRC</option>
                    <option value="wec">WEC</option>
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
        <input type="hidden" name="descFinal" id="descFinal">
        <button name="guardar" type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <script>
        var editor1 = new RichTextEditor("#descEditor");

        // onclick submit
        editor1.attachEvent("change", function () {
            var desc = editor1.getHTMLCode();
            var descFinal = DOMPurify.sanitize(desc);
            document.getElementById("descFinal").value = descFinal;
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
    include "../sqli/conn.php";



    if (isset($_POST['guardar'])) {
        $desc = $_POST['descFinal']; //$_POST['desc'];
        $titulo = $_POST['titulo-noticia'];
        $categoria = $_POST['categoria'];

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

                    $query = "INSERT INTO noticias (titulo_noticia, desc_noticia, thumb_noticia, cat_noticia) VALUES ('$titulo','$desc','$fileName','$categoria');";
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
        include('../bootstrap/modals/alertSuccess.php');
        //echo ' - ' . $desc . ' - ' . $titulo . ' - ' . $categoria;
    }


    ?>


    <?php include('footer.php'); ?>
</body>

</html>