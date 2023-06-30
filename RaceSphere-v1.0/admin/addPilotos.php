<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Adicionar Pilotos</title>
    <link rel="stylesheet" href="../css/paulograca.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php include('navbar.php');
    include '../sqli/conn.php';
    if (isset($_SESSION['cargo_user'])) {
        if ($_SESSION['cargo_user'] == "admin") { ?>
            <div class="form">
                <form action="#" method="post">
                    <h2>Novo piloto</h2>
                    <label for="numero">Nome do piloto</label>
                    <input type="text" name="name" id="name"><br>
                    <label for="numero">Nacionalidade</label>
                    <input type="text" name="nacionalidade" id="nacionalidade"><br>
                    <label for="numero">Número do piloto (entre 1 e 99)</label>
                    <input type="number" id="numero" name="numero" min="1" max="99"><br>
                    <label for="equipa">Equipa do piloto</label>
                    <select id="equipa" name="equipa">
                        <?php
                        $sql = "SELECT id_equipa, nome_equipa, nac_equipa,cat_equipa FROM equipa ORDER BY id_equipa";
                        $result = $conn->query($sql);
                        if (!$result) {
                            die("Invalid Query: " . $conn->error);
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo ' <option value="' . $row["id_equipa"] . '" selected>' . $row["nome_equipa"] . '</option>';
                        }
                        ?>
                    </select><br>
                    <label for="categoria">Categoria do piloto</label>
                    <select id="categoria" name="categoria">
                        <option value="1" selected>Todas as categorias</option>
                        <option value="f1">Formula 1</option>
                        <option value="wec">World Endurace Championship</option>
                        <option value="wrc">Rally</option>
                    </select><br>
                    <label for="foto">Foto do piloto</label>
                    <input type="file" name="foto" id="foto"><br>
                    <input type="submit" value="Submeter" name="submit">
                </form>
            </div>
            <?php
            include '../footer.php';
            if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $nacionalidade = $_POST["nacionalidade"];
                $numero = $_POST["numero"];
                $categoria = $_POST["categoria"];
                $equipa = $_POST["equipa"];
                $foto = $_POST["foto"];
                $existe = "SELECT * from piloto where nome_piloto='" . $name . "';";
                $result_set = $conn->query($existe);
                $jaexiste = mysqli_num_rows($result_set);
                if ($jaexiste == 0) {
                    $insert = "INSERT INTO piloto (	id_piloto,nome_piloto,numero_piloto,nac_piloto,cat_piloto,id_equipa,foto_piloto) VALUES (NULL, '$name', '$numero', '$nacionalidade', '$categoria', '$equipa','$foto' )";
                    $result_set = $conn->query($insert);
                    if ($result_set) {
                        ?>
                        <script>
                            window.setTimeout(function () {
                                location.href = "../piloto.php";
                            }, 0);
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <script>
                        $(document).ready(function () {
                            $('#userExists').text("Este piloto já existe");
                        })
                    </script>
                    <?php
                }

            }
        }
    } else
        echo "<div class='erro'>Não tem cargo para adicionar sessões!</div>";
    ?>
</body>

</html>