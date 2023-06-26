<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include('bootstrapInc.php'); ?>
    <title>Circuitos</title>
    <link rel="stylesheet" href="css/alex.css">

</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <div class="title-container text-center mt-5">
            <h1>Circuitos</h1>
        </div>

        <div class="row mt-5">
            <?php
            include('sqli/conn.php');

            // Retrieve data from the database
            $sql = "SELECT id_circuito, nome_circuito, cidade_circuito, nac_circuito, layout_circuito FROM circuito ORDER BY id_circuito";
            $result = $conn->query($sql);

            // Check if there are any circuits in the database
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id_circuito'];
                    $nome = $row['nome_circuito'];
                    $cidade = $row['cidade_circuito'];
                    $nacionalidade = $row['nac_circuito'];
                    $layout = $row['layout_circuito'];

                    // Display circuit information
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="img/img_alex/' . $layout . '" class="card-img-top" alt="Layout">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $nome . '</h5>';
                    echo '<p class="card-text">Cidade: ' . $cidade . '</p>';
                    echo '<p class="card-text">Pais: ' . $nacionalidade . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center mt-5">No circuits found.</p>';
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>

    </div>

    <!-- Image Pop-up Container -->
    <div class="image-popup">
        <img src="" alt="Large Image">
    </div>

    <?php include('footer.php'); ?>

    <script>
        // JavaScript code to handle the image pop-up functionality
        document.addEventListener('DOMContentLoaded', function () {
            var images = document.querySelectorAll('.card-img-top');
            var imagePopup = document.querySelector('.image-popup');
            var imagePopupImg = document.querySelector('.image-popup img');

            // Add event listeners to each image
            images.forEach(function (image) {
                image.addEventListener('click', function () {
                    var imageUrl = image.getAttribute('src');
                    imagePopupImg.setAttribute('src', imageUrl);
                    imagePopup.style.display = 'block';
                });
            });

            // Close the image pop-up when clicked outside the image
            imagePopup.addEventListener('click', function (event) {
                if (event.target === imagePopup) {
                    imagePopup.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>