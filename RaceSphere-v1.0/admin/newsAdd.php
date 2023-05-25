<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <?php include('bootstrapInc.php'); ?>
    <title>Document</title>
    <link rel="stylesheet" href="../css/pauloLeal.css">

</head>

<body>
    <?php include('navbar.php'); ?>

    <h1>Gerir Notícias</h1>
    <form id="news" action="newsAdd.php" method="post">
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
                <input name="titulo-noticia" class="form-control" type="text">
            </div>
            <div class="grid-item">
                <label for="categoria">Categoria</label>
                <select name="categoria" class="form-control">
                    <option>Escolher...</option>
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
            </div>
            <input type="text" name="descHTML" value="">
        </div>
        <button name="guardar" type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <script>
        var editor1 = new RichTextEditor("#descEditor");

        editor1.onchange

        //onclick submit
        editor1.attachEvent("change", function () {
            //console.log(editor1.getHTMLCode());
            //alert(document.getElementsByName('descHTML').value);
            document.getElementsByName('descHTML').value = editor1.getHTMLCode();
           // alert(document.getElementsByName('descHTML').value);
        });

        //foto-preview
        window.onload = function () {
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
        $titulo = $_POST['titulo-noticia'];
        //$foto = $_FILES['imageFile']['foto'];
        $categoria = $_POST['categoria'];
        $desc = $_POST['descHTML'];
        echo $desc.' - '.$titulo.' - '.$categoria;
    }
    ?>


    <?php include('footer.php'); ?>
</body>

</html>