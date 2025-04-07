<?php
$vista = (isset($_GET['view']) && $_GET['view'] === 'register') ? 'register' : 'login';
$titulo = ($vista === 'login') ? 'Iniciar Sesión' : 'Registro';
if (isset($_GET['registro'])) {
    if ($_GET['registro'] === 'ok') {
        $alert = (object)[
            'type' => 'success',
            'message' => '¡Registro exitoso! 🎉 Ya puedes iniciar sesión.'
        ];
    } elseif ($_GET['registro'] === 'error') {
        $alert = (object)[
            'type' => 'danger',
            'message' => 'Ocurrió un error al registrar. Intenta de nuevo.'
        ];
    }
}

include "components/header.php";

if ($vista === 'login') {
    include "views/login.php";
} else {
    include "views/register.php";
}

include "components/footer.php";
