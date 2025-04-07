<?php
include __DIR__ . "/models/usuarios.class.php";
$vista = (isset($_GET['view']) && $_GET['view'] === 'register') ? 'register' : 'login';
$titulo = ($vista === 'login') ? 'Iniciar Sesión' : 'Registro';
if (isset($_GET['registro'])) {
    if ($_GET['registro'] === 'ok') {
        Usuario::alert("success", "¡Registro exitoso! 🎉 Ya puedes iniciar sesión.");
    } elseif ($_GET['registro'] === 'error') {
        Usuario::alert("danger", "Ocurrió un error al registrar. Intenta de nuevo.");
    }
}

if (isset($_GET['login'])) {
    if ($_GET['login'] === 'error') {
        Usuario::alert("danger", "Correo o contraseña mal. Intenta de nuevo.");
    }
}

include "components/header.php";

if ($vista === 'login') {
    include "views/login.php";
} else {
    include "views/register.php";
}

include "components/footer.php";
