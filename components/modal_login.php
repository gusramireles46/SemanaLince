<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content glass-card border-0 p-3">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-semibold" id="loginModalLabel">Iniciar sesión</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <form action="login.controller.php?action=LOGIN" method="POST" class="needs-validation" novalidate>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Correo o usuario" required>
                        <label for="usuario">Correo o Usuario</label>
                        <div class="invalid-feedback">Ingrese su usuario o correo.</div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                        <label for="password">Contraseña</label>
                        <div class="invalid-feedback">Ingrese su contraseña.</div>
                    </div>

                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-custom">Entrar</button>
                    </div>

                    <div class="text-center">
                        <small>¿No tienes cuenta? <a href="registro.php" class="link-light">Regístrate</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
