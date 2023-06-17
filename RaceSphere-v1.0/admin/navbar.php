<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-md-top" id="admin">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-brand"><img src="../img/logo.svg" alt="RaceSphere" height="60" width="60"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand " href="../index.php"><img src="../img/logoExt.svg" alt="RaceSphere" height="30"
                    class="d-inline-block align-top"></a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="userManagement.php">Utilizadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news.php">Noticias</a>
                </li>
                <!--Dropdown para pilotos, equipas, circuitos, etc.-->
                <li class="nav-item">
                    <a class="nav-link disabled" href="categorias.php">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carros-admin.php">Carros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="piloto.php">Pilotos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="equipas.php">Equipas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="provaManagement.php">Provas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="circuitos.php">Circuitos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="equipamentos-admin.php">Equipamentos</a>
                </li>
            </ul>

        </div>
        <?php
        session_start();
        if (!isset($_SESSION["nome"])) {
            echo '<form class="form-inline"><a href="../login.php" class="btn btn-dark my-2 my-sm-0">Login</a></form>';
        } else {
            echo '<form class="form-inline"><button class="btn" onclick="confirmLogoutAdmin();">' . $_SESSION["nome"] . ' <img width="22" height="22" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/logout-rounded--v1.png" alt="logout"/></button></form>';
        }

        ?>
    </div>
</nav>