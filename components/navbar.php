<link rel="stylesheet" href="css/main.css">
<nav class="navbar navbar-expand-md navbar-dark fixed-top glass-navbar">
    <div class="container-fluid">
        <a href="inicio.php">
            <img src="assets/logo/NASA.png" alt="NASA" style="max-width: 50px; max-height: 50px;">
        </a>
        <a class="navbar-brand" href="./">Explorador Espacial</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($vistaActiva === 'inicio') ? 'active' : '' ?>"
                        <?= ($vistaActiva === 'inicio') ? 'aria-current="page"' : '' ?>
                       href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($vistaActiva === 'apod') ? 'active' : '' ?>"
                        <?= ($vistaActiva === 'apod') ? 'aria-current="page"' : '' ?>
                       href="apod.php">Imagen Astronómica del Día (APOD)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($vistaActiva === 'fecha') ? 'active' : '' ?>"
                        <?= ($vistaActiva === 'fecha') ? 'aria-current="page"' : '' ?>
                       href="imagen_fecha.php">Imagen por fecha</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
