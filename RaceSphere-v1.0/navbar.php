<?php
session_start();
if (isset($_SESSION["cargo"]) && ($_SESSION["cargo"] == "admin" || $_SESSION["cargo"] == "press")) {
    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-md-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-brand"><img src="img/logo.svg" alt="RaceSphere" height="60" width="60"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="index.php"><img src="img/logoExt.svg" alt="RaceSphere" height="30"
                                                              class="d-inline-block align-top"></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="news.php">Notícias</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="f1-index.php">F1</a>
                            <a class="dropdown-item" href="rally-index.php">WRC</a>
                            <a class="dropdown-item" href="wec-index.php">WEC</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showroom.php">Showroom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="equipas.php">Equipas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="piloto.php">Pilotos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="circuitos.php">Circuitos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/index.php">Admin</a>
                    </li>
                </ul>
            </div>
            <form class="form-inline">
                <button class="btn" onclick="confirmLogout();"><?php echo $_SESSION["nome"]; ?>
                    <img src="https://img.icons8.com/?size=22&id=61022&format=png" alt="logout">
                </button>
            </form>
        </div>
    </nav>
    <?php
} else {
    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-md-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-brand"><img src="img/logo.svg" alt="RaceSphere" height="60" width="60"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="index.php"><img src="img/logoExt.svg" alt="RaceSphere" height="30"
                                                              class="d-inline-block align-top"></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="news.php">Notícias</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="f1-index.php">F1</a>
                            <a class="dropdown-item" href="rally-index.php">WRC</a>
                            <a class="dropdown-item" href="wec-index.php">WEC</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showroom.php">Showroom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="equipas.php">Equipas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="piloto.php">Pilotos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="circuitos.php">Circuitos</a>
                    </li>
                </ul>
            </div>
            <form class="form-inline">
                <a href="login.php" class="btn btn-dark my-2 my-sm-0">Login</a>
            </form>
        </div>
    </nav>
    <?php
}
?>
