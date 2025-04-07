<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">
<main class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="glass-card p-4" style="width: 100%; max-width: 500px;">
        <div class="text-center mb-4">
            <img src="assets/logo/NASA.png" alt="Logo" style="width: 60px;">
            <h2 class="mt-3">Iniciar sesión</h2>
            <p class="mb-0">Explorador Espacial</p>
        </div>

        <form action="controllers/auth.controller.php?action=LOGIN" method="POST" class="needs-validation" novalidate>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Correo o Usuario" required>
                <label for="usuario">Correo o Usuario</label>
                <div class="invalid-feedback">Ingrese su correo o nombre de usuario.</div>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                <label for="password">Contraseña</label>
                <div class="invalid-feedback">Ingrese su contraseña.</div>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-custom">Entrar</button>
            </div>

            <div class="text-center">
                <small>¿No tienes cuenta? <a href="?view=register" class="link-light">Regístrate</a></small>
                <br>
                <small>Regresar a la página de <a href="index.php" class="link-light">inicio</a></small>
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
