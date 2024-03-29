<!DOCTYPE html>
<html lang="pt-pt">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
        <?php include('bootstrapInc.php'); ?>
        <link rel="stylesheet" href="../css/luissilva.css">
        <title>Carros-Admin</title>
</head>

<body>
        <?php
        include 'navbar.php';
        include '../sqli/conn.php';
        if ($_SESSION["cargo"] != "admin" || !isset($_SESSION["cargo"])) {
                ?>
                <script>
                    window.setTimeout(function () {
                        location.href = "../index.php";
                    }, 0);
                </script>
                <?php
            }
        ?>
        <div class="container">
                <div class="container">
                        <h2 class="mt-5">Lista de carros:</h2>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                        <div class="col-md-7">
                                <input type="text" class="form-control" id="search" placeholder="Pesquisar por ...">
                        </div>
                        <a href="carros-admin-insert.php" class="btn btn-primary ml-3">Inserir</a>
                </div>
                <div class="container mt-3">
                        <div class="row">
                                <div class="col-12">
                                        <div class="table-responsive">
                                                <div class="table-container">
                                                        <table class="table table-striped mt-3">
                                                                <thead>
                                                                        <tr>
                                                                                <th>ID</th>
                                                                                <th>Marca</th>
                                                                                <th>Modelo</th>
                                                                                <th class="d-none d-md-table-cell">Ano</th>
                                                                                <th class="d-none d-md-table-cell">Tração</th>
                                                                                <th class="d-none d-md-table-cell">Caixa</th>
                                                                                <th class="d-none d-md-table-cell d-lg-table-cell">Combust</th>
                                                                                <th class="d-none d-md-table-cell d-lg-table-cell">Cilin</th>
                                                                                <th class="d-none d-md-table-cell d-lg-table-cell">Potên</th>
                                                                                <th class="d-none d-md-table-cell d-lg-table-cell">Descr</th>
                                                                                <th class="d-none d-md-table-cell d-lg-table-cell">foto</th>
                                                                                <th class="col-6 col-md-3">Ações</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody id="table-body">
                                                                        <?php
                                                                        $sql_select = "SELECT * FROM carro ORDER BY id_carro ASC";
                                                                        $result = $conn->query($sql_select);
                                                                        if ($_SERVER["REQUEST_METHOD"] == "DELETE" && isset($_GET['id'])) {
                                                                                $idCarro = $_GET['id'];
                                                                                $sqlEleminarCarro = "DELETE FROM carro WHERE id_carro = '$idCarro'";

                                                                                if ($conn->query($sqlEleminarCarro) === TRUE) {
                                                                                        http_response_code(200);
                                                                                } else {
                                                                                        http_response_code(500);
                                                                                }
                                                                        }
                                                                        if ($result->num_rows > 0) {
                                                                                while ($row = $result->fetch_assoc()) {
                                                                                        echo "<tr>";
                                                                                        echo "<td>" . $row["id_carro"] . "</td>";
                                                                                        echo "<td>" . $row["marca_carro"] . "</td>";
                                                                                        echo "<td>" . $row["modelo_carro"] . "</td>";
                                                                                        echo "<td class=\"d-none d-md-table-cell\">" . $row["ano_carro"] . "</td>";
                                                                                        echo "<td class=\"d-none d-md-table-cell\">" . $row["trac_carro"] . "</td>";
                                                                                        echo "<td class=\"d-none d-md-table-cell\">" . $row["caixa_carro"] . "</td>";
                                                                                        echo "<td class=\"d-none d-md-table-cell d-lg-table-cell\">" . $row["comb_carro"] . "</td>";
                                                                                        echo "<td class=\"d-none d-md-table-cell d-lg-table-cell\">" . $row["cilind_carro"] . "</td>";
                                                                                        echo "<td class=\"d-none d-md-table-cell d-lg-table-cell\">" . $row["hp_carro"] . "</td>";
                                                                                        echo "<td class=\"d-none d-md-table-cell d-lg-table-cell\">" . $row["desc_carro"] . "</td>";
                                                                                        echo "<td class=\"d-none d-md-table-cell d-lg-table-cell\">" . $row["fotocarro"] . "</td>";
                                                                                        echo "<td>";
                                                                                        echo "<a href=\"carros-admin-edit.php?id_carro=" . $row["id_carro"] . "&marca_carro=" . $row["marca_carro"] . "&modelo_carro=" . $row["modelo_carro"] . "&ano_carro=" . $row["ano_carro"] .
                                                                                                "&trac_carro=" . $row["trac_carro"] . "&caixa_carro=" . $row["caixa_carro"] . "&comb_carro=" . $row["comb_carro"] . "&cilind_carro=" . $row["cilind_carro"] . "&hp_carro=" . $row["hp_carro"] .
                                                                                                "&desc_carro=" . $row["desc_carro"] . "&fotocarro=" . $row["fotocarro"] . "\" class=\"btn btn-primary btn-edit\">Editar</a>";
                                                                                        echo " ";
                                                                                        echo "<button class='btn btn-danger btn-delete' data-id='" . $row["id_carro"] . "'>Eliminar</button>";
                                                                                        echo "</tr>";
                                                                                }
                                                                        } else {
                                                                                echo "<tr><td colspan='12'>Nenhum resultado encontrado.</td></tr>";
                                                                        }
                                                                        ?>
                                                                </tbody>
                                                        </table>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <?php
        include 'footer.php';
        ?>
        <script src="js/carros-admin.js"></script>
</body>

<script>
        function exibirMensagem(mensagem, corDeFundo) {
                var mensagemElement = document.createElement("div");
                mensagemElement.textContent = mensagem;
                mensagemElement.style.backgroundColor = corDeFundo;
                mensagemElement.style.color = "white";
                mensagemElement.style.position = "fixed";
                mensagemElement.style.top = "60px";
                mensagemElement.style.right = "10px";
                mensagemElement.style.padding = "10px";
                mensagemElement.style.borderRadius = "5px";
                document.body.appendChild(mensagemElement);

                setTimeout(function() {
                        mensagemElement.parentNode.removeChild(mensagemElement);
                }, 5000);
        }
</script>

</html>