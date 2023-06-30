<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Resultados</title>
    <link rel="stylesheet" href="../css/pauloLeal.css">
</head>

<body>
    <?php
    include('navbar.php');
    include '../bootstrap/modals/modalDelete2.php';
    ?>

    <h1>Resultados</h1>
    <div class="newsTooltip">
        <a href="resultsAdd.php" class="btn btn-success"><img id="addBtn" src="../img/icons8-add-30.png"> Adicionar
            Resultado</a>
        <form id="searchForm" class="form-inline mt-3">
            <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Pesquisar"
                aria-label="Search">
        </form>
    </div>

    <div class="table-container">
        <table class="table table-striped table-bordered" id="newsManage">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Prova</th>
                    <th scope="col">Etapa/Resultado</th>
                    <th scope="col">Categoria</th>
                    <th scope="col" id="buttons">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../sqli/conn.php';
                //$query = "SELECT id_resultado, COALESCE(id_etapa, id_sessao) AS id_etapa_ou_sessao, categoria FROM resultado WHERE id_etapa IS NOT NULL OR id_sessao IS NOT NULL GROUP BY id_etapa_ou_sessao;";
                $query = "SELECT r.id_resultado, COALESCE(r.id_etapa, (SELECT tipo_sessao FROM sessao WHERE id_sessao = r.id_sessao) ) AS id_etapa_ou_tipo_sessao, r.categoria, p.nome_prova FROM resultado r LEFT JOIN etapa e ON r.id_etapa = e.id_etapa LEFT JOIN prova p ON COALESCE(e.id_prova, (SELECT id_prova FROM sessao WHERE id_sessao = r.id_sessao) ) = p.id_prova WHERE r.id_etapa IS NOT NULL OR r.id_sessao IS NOT NULL GROUP BY id_etapa_ou_tipo_sessao";
                $result = mysqli_query($conn, $query);


                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $color = '';
                        if ($row['categoria'] == 'f1') {
                            $color = 'red';
                        } elseif ($row['categoria'] == 'wec') {
                            $color = 'green';
                        } elseif ($row['categoria'] == 'wrc') {
                            $color = 'blue';
                        }

                        echo "<tr>";
                        echo "<td class='idCell cat-" . $row['categoria'] . "'>";
                        echo $row['id_resultado'];
                        echo "</td>";
                        echo "<td>" . $row['nome_prova'] . "</td>";
                        echo "<td>" . $row['id_etapa_ou_tipo_sessao'] . "</td>";
                        echo "<td>" . strtoupper($row['categoria']) . "</td>";
                        echo "<td><a href='resultsEdit.php?id=" . $row['id_resultado'] . "' class='btn btn-secondary' value=" . $row['id_resultado'] . ">Editar</a> <a href='' data-toggle='modal' data-target='#deleteModal' data-id=" . $row['id_resultado'] . " class='btn btn-danger'><img src='../img/icons8-delete-50.png'></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Nenhum resultado encontrado";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script src="../jquery/modals.js"></script>

    <?php include('footer.php'); ?>
</body>

</html>