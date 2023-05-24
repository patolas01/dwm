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
                $sql = "INSERT INTO carro (marca_carro, modelo_carro, ano_carro, trac_carro, caixa_carro, comb_carro, cilind_carro, hp_carro, desc_carro)
        VALUES ('$marca_carro', '$modelo_carro', '$ano_carro', '$trac_carro', '$caixa_carro', '$comb_carro', '$cilind_carro', '$hp_carro', '$desc_carro')";
                // Executa a consulta e verifica se foi bem-sucedida
                if ($conn->query($sql) === TRUE) {
                        // Dados inseridos com sucesso
                        $mensagem = "Dados inseridos com sucesso!";
                        $corDeFundo = "green";
                } else {
                        // Ocorreu um erro ao inserir os dados
                        $mensagem = "Erro ao inserir os dados: " . $conn->error;
                        $corDeFundo = "red";
                }

                ini_set('display_errors', 1);
                error_reporting(E_ALL);
        }
        ?>

        <div class="container mt-3">
                <!-- Formulário de inserção de dados -->
                <h2>Inserir Carro</h2>
                <form id="insert-form" method="POST">
                        <div class="form-group col-md-6">
                                <label for="id_carro">ID:</label>
                                <input type="text" class="form-control" id="id_carro" name="id_carro">
                        </div>
                        <div class="form-group col-md-6">
                                <label for="marca_carro">Marca:</label>
                                <input type="text" class="form-control" id="marca_carro" name="marca_carro" maxlength="50" required>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="modelo_carro">Modelo:</label>
                                <input type="text" class="form-control" id="modelo_carro" name="modelo_carro" maxlength="60" required>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="ano_carro">Ano:</label>
                                <input type="number" class="form-control" id="ano_carro" name="ano_carro" required>
                        </div>
                        <?php
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

                        // Configura a codificação UTF-8 para a conexão com o banco de dados
                        $conn->set_charset("utf8");
                        ?>
                        <div class="form-group col-md-6">
                                <label for="trac_carro">Tipo de Tração:</label>
                                <select class="form-control" id="trac_carro" name="trac_carro">
                                        <?php
                                        foreach ($trac_carro_enum as $option) {
                                                echo "<option value='$option'>$option</option>";
                                        }
                                        ?>
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="caixa_carro">Tipo de Caixa:</label>
                                <select class="form-control" id="caixa_carro" name="caixa_carro">
                                        <?php
                                        foreach ($caixa_carro_enum as $option) {
                                                echo "<option value='$option'>$option</option>";
                                        }
                                        ?>
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="comb_carro">Tipo de Combustível:</label>
                                <select class="form-control" id="comb_carro" name="comb_carro">
                                        <?php
                                        foreach ($comb_carro_enum as $option) {
                                                echo "<option value='$option'>$option</option>";
                                        }
                                        ?>
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="cilind_carro">Cilindrada:</label>
                                <input type="number" class="form-control" id="cilind_carro" name="cilind_carro">
                        </div>
                        <div class="form-group col-md-6">
                                <label for="hp_carro">Potência:</label>
                                <input type="number" class="form-control" id="hp_carro" name="hp_carro">
                        </div>
                        <div class="form-group col-md-6">
                                <label for="desc_carro">Descrição:</label>
                                <input type="text" class="form-control" id="desc_carro" name="desc_carro" required>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="idcarrofoto">Id foto carro:</label>
                                <input type="text" class="form-control" id="idcarrofoto" name="idcarrofoto">
                        </div>
                        <!-- Adicione os outros campos do formulário aqui -->

                        <button type="submit" id="insert-button" class="btn btn-primary">Inserir</button>
                </form>

                <!-- Tabela de visualização dos dados -->
                <h2 class="mt-5">Carros</h2>
                <input type="text" class="form-control mt-3" id="search" placeholder="Pesquisar por ...">
                <div class="container mt-3">
                        <div class="row">
                                <div class="co-md-8">
                                        <table class="table table-striped mt-3">
                                                <thead>
                                                        <tr>
                                                                <th>ID</th>
                                                                <th>Marca</th>
                                                                <th>Modelo</th>
                                                                <th>Ano</th>
                                                                <th>Tração</th>
                                                                <th>Caixa</th>
                                                                <th class="col-1">Combustivel</th>
                                                                <th>Cilindros</th>
                                                                <th class="col-1">Potência</th>
                                                                <th class="col-1">Descrição</th>
                                                                <th>Id foto</th>
                                                                <th class="col-2">Ações</th>
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
                                                                        echo "<td><button class='btn btn-danger btn-delete'>Eliminar</button> <button class='btn btn-primary btn-edit'>Editar</button></td>";
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
        <?php
        include 'footer.php';
        ?>
</body>
<script src="js/carros-admin.js"></script>
<script>
        var mensagem = "<?php echo $mensagem; ?>";
        var corDeFundo = "<?php echo $corDeFundo; ?>";

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
        }, 5000); // 5 segundos (em milissegundos)
</script>

</html>