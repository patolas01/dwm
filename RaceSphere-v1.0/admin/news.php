<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css"/>
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <?php include('bootstrapInc.php'); ?>
    <title>Document</title>
    <link rel="stylesheet" href="../css/pauloLeal.css">

</head>

<body>
    <?php include('navbar.php'); ?>

    <h1>Gerir Notícias</h1>
    
    <h3>Artigo da Notícia</h3>
    <div id="div_editor1">
    
    </div>

    <script>
        var editor1 = new RichTextEditor("#div_editor1");
    </script>



    <?php include('footer.php'); ?>
</body>

</html>