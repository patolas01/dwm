<!DOCTYPE html>
<html lang="pt-pt">

<head>

        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
        <?php include('bootstrapInc.php'); ?>
        <link rel="stylesheet" href="css/luissilva.css">
        <title>Carros Admin</title>
</head>

<body>
        <?php
        include 'navbar.php';
        include '../sqli/conn.php';




        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $marca_carro = $_POST['marca_carro'];
                $modelo_carro = $_POST['modelo_carro'];
                $ano_carro = $_POST['ano_carro'];
                $trac_carro = $_POST['trac_carro'];
                $caixa_carro = $_POST['caixa_carro'];
                $comb_carro = $_POST['comb_carro'];
                $cilind_carro = $_POST['cilind_carro'];
                $hp_carro = $_POST['hp_carro'];
                $desc_carro = $_POST['desc_carro'];
                $idcarrofoto = $_POST['idcarrofoto'];
                // Obter os valores dos outros campos do formulário

                // Consulta SQL para inserir os dados na tabela
                $sql = "insert into carro (marca_carro, modelo_carro, ano_carro, trac_carro, caixa_carro, comb_carro, cilind_carro, hp_carro, desc_carro, idcarrofoto)
        values ('$marca_carro', '$modelo_carro', '$ano_carro', '$trac_carro', '$caixa_carro', '$comb_carro', '$cilind_carro', '$hp_carro', '$desc_carro', '')";

                // Executa a consulta e verifica se foi bem-sucedida
                if ($conn->query($sql) === TRUE) {
                        echo "Dados inseridos com sucesso!";
                } else {
                        echo "Erro ao inserir os dados: " . $conn->error;
                }
        }
        ?>

        <div class="container mt-3">
                <!-- Formulário de inserção de dados -->
                <h2>Inserir Carro</h2>
                <form id="insert-form" method="POST">
                        <div class="form-group">
                                <label for="id_carro">ID:</label>
                                <input type="text" class="form-control" id="id_carro" name="id_carro">
                        </div>
                        <div class="form-group">
                                <label for="marca_carro">Marca:</label>
                                <input type="text" class="form-control" id="marca_carro" name="marca_carro" maxlength="50" required>
                        </div>
                        <div class="form-group">
                                <label for="modelo_carro">Modelo:</label>
                                <input type="text" class="form-control" id="modelo_carro" name="modelo_carro" maxlength="60" required>
                        </div>
                        <div class="form-group">
                                <label for="ano_carro">Ano:</label>
                                <input type="number" class="form-control" id="ano_carro" name="ano_carro" required>
                        </div><?php
                                $sql_enum_values = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'carro' AND COLUMN_NAME IN ('trac_carro', 'caixa_carro', 'comb_carro')";
                                $result_enum_values = $conn->query($sql_enum_values);

                                $enum_values = array();

                                while ($row = $result_enum_values->fetch_assoc()) {
                                        $enum_values[] = $row['COLUMN_TYPE'];
                                }

                                // Extrai os valores ENUM de cada campo
                                $trac_carro_enum = extract_enum_values($enum_values[0]);
                                $caixa_carro_enum = extract_enum_values($enum_values[1]);
                                $comb_carro_enum = extract_enum_values($enum_values[2]);

                                function extract_enum_values($enum_definition)
                                {
                                        preg_match("/^enum\(\'(.*)\'\)$/", $enum_definition, $matches);
                                        $enum_values = explode("','", $matches[1]);
                                        return $enum_values;
                                }
                                ?>
                        <div class="form-group">
                                <label for="trac_carro">Tipo de Tração:</label>
                                <select class="form-control" id="trac_carro" name="trac_carro">
                                        <option value="">Nenhum</option>
                                        <?php
                                        foreach ($trac_carro_enum as $option) {
                                                echo "<option value='$option'>$option</option>";
                                        }
                                        ?>
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="caixa_carro">Tipo de Caixa:</label>
                                <select class="form-control" id="caixa_carro" name="caixa_carro">
                                        <option value="">Nenhum</option>
                                        <?php
                                        foreach ($caixa_carro_enum as $option) {
                                                echo "<option value='$option'>$option</option>";
                                        }
                                        ?>
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="comb_carro">Tipo de Combustível:</label>
                                <select class="form-control" id="comb_carro" name="comb_carro">
                                        <option value="">Nenhum</option>
                                        <?php
                                        foreach ($comb_carro_enum as $option) {
                                                echo "<option value='$option'>$option</option>";
                                        }
                                        ?>
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="cilind_carro">Cilindrada:</label>
                                <input type="number" step="any" class="form-control" id="cilind_carro" name="cilind_carro">
                        </div>
                        <div class="form-group">
                                <label for="hp_carro">Potência:</label>
                                <input type="number" class="form-control" id="hp_carro" name="hp_carro">
                        </div>
                        <div class="form-group">
                                <label for="desc_carro">Descrição:</label>
                                <input type="text" class="form-control" id="desc_carro" name="desc_carro" required>
                        </div>
                        <div class="form-group">
                                <label for="idcarrofoto">Id foto carro:</label>
                                <input type="text" class="form-control" id="idcarrofoto" name="idcarrofoto">
                        </div>
                        <!-- Adicione os outros campos do formulário aqui -->

                        <button type="submit" id="insert-button" class="btn btn-primary">Inserir</button>
                </form>

                <!-- Tabela de visualização dos dados -->
                <h2 class="mt-3">Carros</h2>
                <input type="text" class="form-control mt-3" id="search" placeholder="Pesquisar por ID, Marca ou Modelo">
                <table class="table table-striped mt-3">
                        <thead>
                                <tr>
                                        <th>ID</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Ano</th>
                                        <th>Trac</th>
                                        <th>Caixa</th>
                                        <th>Comb</th>
                                        <th>Cilindros</th>
                                        <th>hp</th>
                                        <th>desc</th>
                                        <th>Id foto carro</th>
                                        <th>Ações</th>
                                </tr>
                        </thead>
                        <tbody id="table-body">
                                <?php
                                // Consulta para obter os dados da tabela
                                $sql_select = "SELECT * FROM carro";
                                $result = $conn->query($sql_select);

                                // Exibir os dados na tabela
                                if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["id_carro"] . "</td>";
                                                echo "<td>" . $row["marca_carro"] . "</td>";
                                                echo "<td>" . $row["modelo_carro"] . "</td>";
                                                echo "<td>" . $row["ano_carro"] . "</td>";
                                                echo "<td>" . $row["trac_carro"] . "</td>";
                                                echo "<td>" . $row["caixa_carro"] . "</td>";
                                                echo "<td>" . $row["comb_carro"] . "</td>";
                                                echo "<td>" . $row["cilind_carro"] . "</td>";
                                                echo "<td>" . $row["hp_carro"] . "</td>";
                                                echo "<td>" . $row["desc_carro"] . "</td>";
                                                echo "<td>" . $row["idcarrofoto"] . "</td>";
                                                echo "<td><button class='btn btn-danger btn-delete'>Excluir</button> <button class='btn btn-primary btn-edit'>Editar</button></td>";
                                                echo "</tr>";
                                        }
                                } else {
                                        echo "<tr><td colspan='12'>Nenhum resultado encontrado.</td></tr>";
                                }
                                ?>
                        </tbody>
                </table>
        </div>
        <?php
        include 'footer.php';
        ?>
</body>
<script>
        $(document).ready(function() {
                document.getElementById("insert-button").addEventListener("click", function(event) {
                        event.preventDefault();
                        document.getElementById("insert-form").submit();
                });



                // Ao enviar o formulário de inserção
                $("#insert-form").submit(function(event) {
                        event.preventDefault();

                        // Obter os valores dos campos
                        var id_carro = $("#id_carro").val();
                        var marca_carro = $("#marca_carro").val();
                        var modelo_carro = $("#modelo_carro").val();
                        var ano_carro = $("#ano_carro").val();
                        var trac_carro = $("#trac_carro").val();
                        var caixa_carro = $("#caixa_carro").val();
                        var comb_carro = $("#comb_carro").val();
                        var cilind_carro = $("#cilind_carro").val();
                        var hp_carro = $("#hp_carro").val();
                        var desc_carro = $("#desc_carro").val();
                        var idcarrofoto = $("#idcarrofoto").val();
                        // Obter os valores dos outros campos do formulário

                        // Inserir os dados na tabela
                        $("#table-body").append("<tr><td>" + id_carro + "</td><td>" + marca_carro + "</td><td>" + modelo_carro + "</td><td>" + ano_carro + "</td><td>" + trac_carro + "</td><td>" + caixa_carro + "</td><td>" +
                                comb_carro + "</td><td>" + cilind_carro + "</td><td>" + hp_carro + "</td><td>" + desc_carro + "</td><td>" + idcarrofoto + "</td><td><button class='btn btn-danger btn-delete'>Excluir</button> <button class='btn btn-primary btn-edit'>Editar</button></td></tr>");

                        // Limpar os campos do formulário
                        $("#id_carro").val("");
                        $("#marca_carro").val("");
                        $("#modelo_carro").val("");
                        $("#ano_carro").val("");
                        $("#trac_carro").val("");
                        $("#caixa_carro").val("");
                        $("#comb_carro").val("");
                        $("#cilind_carro").val("");
                        $("#hp_carro").val("");
                        $("#desc_carro").val("");
                        $("#idfotocarro").val("");
                        // Limpar os outros campos do formulário
                });





                // Ao clicar no botão de exclusão
                $("#table-body").on("click", ".btn-delete", function() {
                        $(this).closest("tr").remove();
                });

                // Ao clicar no botão de edição
                $("#table-body").on("click", ".btn-edit", function() {
                        var row = $(this).closest("tr");
                        var id_carro = row.find("td:nth-child(1)").text();
                        var marca_carro = row.find("td:nth-child(2)").text();
                        var modelo_carro = row.find("td:nth-child(3)").text();
                        // Obter os valores dos outros campos da linha

                        // Preencher o formulário de edição com os valores
                        $("#id_carro").val(id_carro);
                        $("#marca_carro").val(marca_carro);
                        $("#modelo_carro").val(modelo_carro);
                        // Preencher os outros campos do formulário de edição

                        // Remover a linha da tabela
                        row.remove();
                });

                // Ao pesquisar
                $("#search").keyup(function() {
                        var searchText = $(this).val().toLowerCase();

                        $("#table-body tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1)
                        });
                });
        });
</script>

</html>