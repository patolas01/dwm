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
        <title>Equipamentos-Admin</title>
</head>

<body>
        <?php
        include 'navbar.php';
        include '../sqli/conn.php';
        ?>
        <div class="container mt-3">
                <div class="container mt-3">
                        <h2 class="mt-5">Lista de equipamentos:</h2>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                        <div class="col-md-7">
                                <input type="text" class="form-control mt-3" id="search" placeholder="Pesquisar por ...">
                        </div>
                        <a href="equipamentos-admin-insert.php" class="btn btn-primary ml-3">Inserir</a>
                </div>
                <div class="container mt-3">
                        <div class="row">
                                <div class="col-12 co-md-8">
                                        <div class="table-responsive">
                                                <table class="table table-striped mt-3">
                                                        <thead>
                                                                <tr>
                                                                        <th class="col-1">ID</th>
                                                                        <th class="col-2">Nome</th>
                                                                        <th class="col-5">Descrição</th>
                                                                        <th class="col-2">foto equipamento</th>
                                                                        <th >Ações</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody id="table-body">
                                                                <?php
                                                                $sql_select = "SELECT * FROM equipamento ORDER BY id_equipamento ASC";
                                                                $result = $conn->query($sql_select);
                                                                if ($_SERVER["REQUEST_METHOD"] == "DELETE" && isset($_GET['id'])) {
                                                                        $idEquipamento = $_GET['id'];
                                                                        $sqlEleminarEquipamento = "DELETE FROM equipamento WHERE id_equipamento = '$idEquipamento'";

                                                                        if ($conn->query($sqlEleminarEquipamento) === TRUE) {
                                                                                http_response_code(200);
                                                                        } else {
                                                                                http_response_code(500);
                                                                        }
                                                                }
                                                                if ($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                                echo "<tr>";
                                                                                echo "<td>" . $row["id_equipamento"] . "</td>";
                                                                                echo "<td>" . $row["nome_equipamento"] . "</td>";
                                                                                echo "<td>" . $row["desc_equipamento"] . "</td>";
                                                                                echo "<td>" . $row["img_equipamento"] . "</td>";
                                                                                echo "<td>";
                                                                                echo "<button class='btn btn-danger btn-delete' data-id='" . $row["id_equipamento"] . "'>Eliminar</button>";
                                                                                echo " <a href=\"equipamentos-admin-edit.php?id_equipamento=" . $row["id_equipamento"] . "&nome_equipamento=" . $row["nome_equipamento"] .
                                                                                        "&desc_equipamento=" . $row["desc_equipamento"] . "&img_equipamento=" . $row["img_equipamento"] . "\" class=\"btn btn-primary btn-edit\">Editar</a>";
                                                                                echo "</td>";
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
        <?php
        include 'footer.php';
        ?>
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

        function eleminarEquipamento(idEquipamento) {
                var confirmarEleminar = confirm("Tem certeza que deseja eleminar estes dados?");
                if (confirmarEleminar) {
                        fetch(`equipamentos-admin.php?id=${idEquipamento}`, {
                                        method: "DELETE"
                                })
                                .then(function(response) {
                                        if (response.ok) {
                                                exibirMensagem("dados eliminados com sucesso!", "green");
                                                removerLinhaTabela(idEquipamento);
                                        } else {
                                                exibirMensagem("Erro, os dados não foram eliminados!", "red");
                                        }
                                })
                                .catch(function(error) {
                                        exibirMensagem(error.message, "red");
                                        ini_set('display_errors', 1);
                                        error_reporting(E_ALL);
                                });
                }
        }

        document.addEventListener("click", function(event) {
                if (event.target.classList.contains("btn-delete")) {
                        var idEquipamento = event.target.getAttribute("data-id");
                        eleminarEquipamento(idEquipamento);
                }
        });

        function removerLinhaTabela(idEquipamento) {
                var tabela = document.getElementById("table-body");
                var linhas = tabela.getElementsByTagName("tr");

                for (var i = 0; i < linhas.length; i++) {
                        var colunaID = linhas[i].getElementsByTagName("td")[0];
                        if (colunaID.innerText == idEquipamento) {
                                tabela.removeChild(linhas[i]);
                                break;
                        }
                }
        }

        $("#search").keyup(function() {
                var searchText = $(this).val().toLowerCase();

                $("#table-body tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1)
                });
        });
</script>

</html>