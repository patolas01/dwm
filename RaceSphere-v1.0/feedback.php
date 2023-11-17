<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('bootstrapInc.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/paulograca.css">
    <link rel="stylesheet" href="css/main.css">


    <title>Feedback</title>
</head>

<body>
    <?php include 'navbar.php';
    include 'sqli/conn.php'; ?>
    <div id="feedback">
        <h1 class="tit">Feedback</h2>
            <p class="center">Se está nesta página é porque existe algo neste website que não o esta a agradar. Só tem
                de nos dar a sua opinião preenchendo o nosso formulário!</p>
            <p class="center">Lembrando que é totalmente anónimo!</p>
            <form action="#" method="post" class="center">
                <label for="mensagem">Escreva a sua mensagem!</label><br>
                <textarea name="mensagem" placeholder="Acho que esta parte..."></textarea><br>
                <input type="submit" value="Submeter" name="submit">
                <input type="reset" value="Limpar" name="reset">
            </form>


            <?php
            if (isset($_POST["submit"])) {
                $feedback = $_POST["mensagem"];
                $time = date("Y-m-d H:i:s");
                $sql = "INSERT INTO `feedback` (`id`, `hora`, `feedback`) VALUES (NULL, CURRENT_TIMESTAMP, '$feedback');";
                $result_set = $conn->query($sql);
                if ($result_set) {
                    ?>
                    <script>
                        window.setTimeout(function () {
                            location.href = "index.php";
                        }, 0);
                    </script>
                    <?php
                } else
                    echo "<div class='erro'>Tente novamente mais tarde!</div>";
            }
            include 'footer.php';
            ?>
    </div>
</body>

</html>