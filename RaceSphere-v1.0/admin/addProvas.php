<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de utilizadores</title>
    <?php
    include 'bootstrapInc.php';
    ?>
    <link rel="stylesheet" href="../css/danielribeiro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/daniel.js"></script>
</head>

<body>
    <?php
    include 'navbar.php';
    include '../sqli/conn.php';
    ?>
    <form action="addProvas.php" method="POST" enctype="multipart/form-data">
        <div class="form-body1">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h3>Inserir nova prova
                            </h3>
                            <p>Preencha o formulário</p>
                            <form action="addProvas.php" action="POST"
                                class="requires-validation" novalidate>

                                <div class="col-md-12">
                                    <input class="form-control" type="text" id="nome_prova" name="nome" placeholder="Nome da Prova">
                                    <h5 id="NomeCheck">
                                        
                                    </h5>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="date" name="inicio"
                                        id="data_inicio_AddProvas" placeholder="Data de inicio da prova">
                                        <h5 id="datainiciocheck">
                                        
                                    </h5>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="date" name="fim"
                                        id="data_fim_AddProvas" placeholder="Data de fim da prova">
                                    <h5 id="datafimcheck">
                                        
                                    </h5>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="local" id="local_prova" placeholder="Local da prova">
                                    <h5 id="LocalCheck">
                                        
                                    </h5>
                                </div>
                                <div class="col-md-12">
                                <label for="file-picker">Foto</label>
                                    <!--input file-->
                                    <div class="custom-file">
                                        <input type="file" name="fotoprova" class="custom-file-input" id="file-picker"
                                            accept="image/*">
                                        <label class="custom-file-label" for="file-picker">Escolher a foto...</label>
                                    </div>
                                </div>
                                <div class="col-md-12"> 
                                        <select name="categoria" class="form-select mt-3" id="selectCategoria">
                                            <option value="" disabled>Selecione uma categoria</option>
                                            <option value="f1">Formula 1</option>
                                            <option value="wrc">World Rally Championship</option>
                                            <option value="wec">World Endurance Championship</option>
                                        </select><br>       
                                </div>
                                <div class="col-md-12" id="id_circuitos">
                                    <select name="id_circuito" class="form-select mt-3">
                                        <option value="" disabled>Selecione um circuito</option>
                                        <?php
                                        $query = "select * from circuito";
                                        $result_set = $conn->query($query);
                                        if ($result_set) {
                                            while ($row = $result_set->fetch_assoc()) {
                                                $nome_circuito = $row['nome_circuito'];
                                                $id_circuito_tabela_circuitos = $row['id_circuito'];
                                                    ?>
                                                    <option value=<?php echo "'" . $id_circuito_tabela_circuitos . "'"; ?>> <?php echo $nome_circuito; ?></option>
                                                    <?php
                                            }
                                        }
                                        ?>
                                    </select><br><br>
                                </div><br>
                                <div class="col-md-12">
                                    <input type="submit" id="botaoeditar2" value="Inserir" name="editar2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <?php
    if (isset($_POST["editar2"])) {
        $nomenovo = $_POST["nome"];
        $inicionovo = $_POST["inicio"];
        $fimnovo = $_POST["fim"];
        $localnovo = $_POST["local"];
        $categorianovo = $_POST["categoria"];
        $id_circuitonovo = $_POST['id_circuito'];
        if (isset($_FILES['fotoprova']) && $_FILES['fotoprova']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['fotoprova'];
            // Especifique o caminho para a pasta onde deseja guardar as imagens
            $uploadDirectory = '../img/bd-img/logos/';
            // Gera um nome único para o arquivo
            $fileName = uniqid();
            $destination = $uploadDirectory . $fileName;
            //echo 'PATH:: ' . $destination;
            // Verifica se o tipo de arquivo é uma imagem
            if (exif_imagetype($file['tmp_name'])) {
                // Move o arquivo para a pasta de destino
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    if ($categorianovo == "wrc") {
                        $edit = "INSERT INTO prova (id_prova, nome_prova, inicio_prova, fim_prova, local, categoria, logo_prova, id_circuito) VALUES (NULL,'$nomenovo','$inicionovo','$fimnovo','$localnovo','$categorianovo','$fileName',NULL) ";
                    } else {
                        $edit = "INSERT INTO prova (id_prova, nome_prova, inicio_prova, fim_prova, local, categoria, logo_prova, id_circuito) VALUES (NULL,'$nomenovo','$inicionovo','$fimnovo','$localnovo','$categorianovo','$fileName','$id_circuitonovo') ";
                    }
                    //prompt msg a dizer q a imagem foi guardada
                } else {
                    echo 'Ocorreu um erro ao guardar a imagem.';
                }
            } else {
                echo 'O ficheiro enviado não é uma imagem válida.';
            }
        } else {
            if ($categorianovo == "wrc") {
                $edit = "INSERT INTO prova (id_prova, nome_prova, inicio_prova, fim_prova, local, categoria, logo_prova, id_circuito) VALUES (NULL,'$nomenovo','$inicionovo','$fimnovo','$localnovo','$categorianovo','',NULL) ";
            } else {
                $edit = "INSERT INTO prova (id_prova, nome_prova, inicio_prova, fim_prova, local, categoria, logo_prova, id_circuito) VALUES (NULL,'$nomenovo','$inicionovo','$fimnovo','$localnovo','$categorianovo','','$id_circuitonovo') ";
            }
        }
        
        $result_set = $conn->query($edit);
        if ($result_set) {
            ?>
            <script>
                window.setTimeout(function () {
                    location.href = "provaManagement.php";
                }, 0);
            </script>
            <?php
        } else {
            echo "Query update mal feita";
        }
    }
    include '../footer.php';
    ?>
</body>

</html>