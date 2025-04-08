<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="css/main.css">

<nav id="navbar" class="navbar navbar-expand-md fixed-top glass-navbar navbar-dark">
    <div class="container-fluid">
        <a href="inicio.php">
            <img src="assets/logo/NASA.png" alt="NASA" style="max-width: 50px; max-height: 50px;">
        </a>
        <a class="navbar-brand " href="./">Explorador Espacial</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($vistaActiva === 'inicio') ? 'active' : '' ?> " <?= ($vistaActiva === 'inicio') ? 'aria-current="page"' : '' ?> href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($vistaActiva === 'apod') ? 'active' : '' ?> " <?= ($vistaActiva === 'apod') ? 'aria-current="page"' : '' ?> href="apod.php">Imagen Astronómica del Día (APOD)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($vistaActiva === 'fecha') ? 'active' : '' ?> " <?= ($vistaActiva === 'fecha') ? 'aria-current="page"' : '' ?> href="imagen_fecha.php">Imagen por fecha</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($vistaActiva === 'gallery') ? 'active' : '' ?>"
                        <?= ($vistaActiva === 'gallery') ? 'aria-current="page"' : '' ?>
                        href="gallery.php?action=gallery">Galería</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3 navbar-nav">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <span class="nav-link">
                        Hola, <?= htmlspecialchars($_SESSION['usuario']->nombre) ?> 👋
                    </span>
                    <a href="login.controller.php?action=LOGOUT" class="nav-link">Cerrar sesión</a>
                <?php else: ?>
                    <a href="auth.php" class="nav-link">Iniciar sesión</a>
                <?php endif; ?>
                <button id="themeToggle" class="btn btn-toggle-theme" title="Cambiar tema">🌙</button>
            </div>
        </div>
    </div>
</nav>
<?php include_once "components/modal_login.php"; ?>