<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/danielribeiro.css">
</head>

<body>

    <?php
    include 'sqli/conn.php';
    $idEtapa = $_GET['id'];

    $query = "SELECT `etapa`.*, `resultado`.*, `piloto`.*, `equipa`.*
    FROM `etapa`
        LEFT JOIN `resultado` ON `resultado`.`id_etapa` = `etapa`.`id_etapa`
        LEFT JOIN `piloto` ON `resultado`.`id_piloto` = `piloto`.`id_piloto` LEFT JOIN `equipa` ON `equipa`.`id_equipa` = `piloto`.`id_equipa` where resultado.id_etapa = '$idEtapa' order by posicao_res";
    $result_set = $conn->query($query);
    echo "<table id='tabelaResultados'>";
echo "<tr>";
echo "<th>Posição</th>";
echo "<th>Tempo</th>";
echo "<th>Dnf</th>";
echo "<th>Piloto</th>";
echo "<th>Nacionalidade</th>";
echo "<th>Equipa</th>";
echo "</tr>";
    if ($result_set) {
        while ($row = $result_set->fetch_assoc()) {
        
        echo "<tr>";
        echo "<td>" . $row['posicao_res'] . "</td>";
        echo "<td>" . $row['laptime_res'] . "</td>";
        echo "<td>" . $row['dnf'] . "</td>";
        echo "<td>" . $row['nome_piloto'] . "</td>";
        echo "<td>" . $row['nac_piloto'] . "</td>";
        echo "<td>" . $row['nome_equipa'] . "</td>";
        echo "</tr>";}
    }
    echo "</table>"?>
    
</body>

</html>