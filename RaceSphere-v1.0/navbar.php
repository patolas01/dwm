<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-md-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-brand"><img src="img/logo.svg" alt="RaceSphere" height="60" width="60"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand " href="index.php"><img src="img/logoExt.svg" alt="RaceSphere" height="30"
                    class="d-inline-block align-top"></a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="f1-index.php">F1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rally-index.php">WRC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="wec-index.php">WEC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="showroom.php">Showroom</a>
                </li>
            </ul>


        </div>
        <?php
        session_start();
        if (!isset($_SESSION["nome"])) {
            echo ' <form class="form-inline"><a href="login.php" class="btn btn-dark my-2 my-sm-0">Login</a></form>';
        } else {
            echo ' <form class="form-inline"><button class="btn" onclick="confirmLogout();">' . $_SESSION["nome"] . ' <img src="https://img.icons8.com/?size=22&id=61022&format=png" alt="logout"></button></form>';
        }

        ?>
    </div>
</nav>