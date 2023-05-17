<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Piloto</title>
    <link rel="stylesheet" href="css/paulograca.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div id="categoria">
        <label for="categoria">Escolha a categoria dos pilotos</label>
        <select id="categoria">
            <option value="all" selected="selected">Todas as categorias</option>
            <option value="f1" >Formula 1</option>
            <option value="wec">World Endurace Championship</option>
            <option value="rally">Rally</option>
        </select>
    </div>
    <script>
        $("#categoria").on("change", function () {
            console.log($("#categoria option:selected").text());
        })
    </script>
    <script src="jquery/main.js"></script>
    <?php include "footer.php"; ?>
</body>

</html>