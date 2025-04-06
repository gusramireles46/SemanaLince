<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">

<main class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="glass-card p-4" style="width: 100%; max-width: 500px;">
        <div class="text-center mb-4">
            <img src="assets/logo/NASA.png" alt="Logo" style="width: 60px;">
            <h2 class="mt-3">Crear cuenta</h2>
            <p class="mb-0">Explorador Espacial</p>
        </div>

        <form action="login.controller.php?action=REGISTER" method="POST" class="needs-validation" novalidate>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                <label for="nombre">Nombre</label>
                <div class="invalid-feedback">Ingrese su nombre.</div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                <label for="apellidos">Apellidos</label>
                <div class="invalid-feedback">Ingrese sus apellidos.</div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
                <label for="username">Nombre de usuario</label>
                <div class="invalid-feedback">Ingrese un nombre de usuario único.</div>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electrónico" required>
                <label for="correo">Correo electrónico</label>
                <div class="invalid-feedback">Ingrese un correo válido.</div>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                <label for="password">Contraseña</label>
                <div class="invalid-feedback">Ingrese una contraseña.</div>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-custom">Registrarme</button>
            </div>

            <div class="text-center">
                <small>¿Ya tienes cuenta? <a href="login.php" class="link-light">Inicia sesión</a></small>
            </div>
        </form>
    </div>
</main>

<script>
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
