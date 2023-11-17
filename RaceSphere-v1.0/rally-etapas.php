<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaceSphere Rally</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/buscarResultadoAjax.js"></script>
</head>

<body id="rally-resultados">
    <?php
    $id_prova=$_GET['id'];
    include 'navbar.php';
    include 'sqli/conn.php';
    $query = "SELECT * from prova where id_prova= '$id_prova'";
    $result_set = $conn->query($query);
    if ($result_set) {
        while ($row = $result_set->fetch_assoc()) {
            echo "<h1 class='middleTextTitle'>".$row['nome_prova']."</h1>";
            $inicio = strtotime($row['inicio_prova']);
            $inicioProva = date("d-m-Y", $inicio);
            $fim = strtotime($row['fim_prova']);
            $fimProva = date("d-m-Y", $fim);
            echo "<h2 class='middleTextTitle'>De ".$inicioProva." a ".$fimProva." em ".$row['local']."</h2>";
            ?><div id="logoResultados"><img src="img/bd-img/logos/<?php echo $row['logo_prova'] ?>"></div><br><br> <?php
            
        }
    }

    $query = "SELECT * from etapa where id_prova= '$id_prova' order by num_etapa";
    $result_set = $conn->query($query); ?>
    <form class="form-content"><select name="selectEtapas" onchange="showEtapas(this.value)">
            <option value="">Selecione uma etapa</option>
            <?php
            if ($result_set) {
                while ($row = $result_set->fetch_assoc()) {
                    $id_etapa = $row['id_etapa'];
                    $ronda_etapa = $row['num_etapa'];
                    ?>
                    <option value="<?php echo $id_etapa ?>"><?php echo "Ronda ".$ronda_etapa ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </form><br>
    <div id="resultadoEtapa"><b>Resultados Etapa</b></div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>