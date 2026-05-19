<?php
    require_once 'create_session.php';
    protect_page();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguridad - Actualizar Contraseña</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 rounded-4 p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="perfil.php"><i class="bi bi-person-circle me-2"></i> Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-light rounded-3" href="#"><i class="bi bi-shield-lock me-2"></i> Seguridad</a>
                    </li>
                    <hr class="text-muted">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-7">
            <?php include 'alerts.php'; ?>

            <div class="card shadow-lg border-0 rounded-4 p-4">
                <h3 class="fw-bold mb-4">Cambiar Contraseña</h3>

                <form action="update_password.php" method="POST" class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label text-secondary small fw-bold">CONTRASEÑA ACTUAL</label>
                            <input type="password" name="current_password" class="form-control" required>
                            <div class="invalid-feedback">Debes ingresar tu contraseña actual.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-secondary small fw-bold">NUEVA CONTRASEÑA</label>
                            <input type="password"
                                    id="new_password"
                                    name="new_password"
                                    class="form-control"
                                    required
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                                <!-- Mensaje formato de la cedula -->
                                <div id="password-help" class="form-text text-info mt-2 fw-medium" style="font-size: 0.85rem;">
                                    La contraseña debe tener al menos 6 caracteres, incluyendo una mayúscula, una minúscula y un número.
                                </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-secondary small fw-bold">CONFIRMAR NUEVA CLAVE</label>
                            <input type="password" name="conf_new_password" id="conf_new_password" class="form-control" required>
                            <div class="invalid-feedback">Las contraseñas no coinciden.</div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <a href="perfil.php" class="text-decoration-none text-muted small">Cancelar</a>
                                <button type="submit" class="btn btn-primary px-5 rounded-3 shadow-sm">
                                    Actualizar Contraseña
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Validación y comparación de claves
    (() => {
      'use strict'
      const form = document.querySelector('.needs-validation');
      const pass = document.getElementById('new_password');
      const confirm = document.getElementById('conf_new_password');

      form.addEventListener('submit', event => {
        if (!form.checkValidity() || pass.value !== confirm.value) {
          if(pass.value !== confirm.value) confirm.setCustomValidity('No coinciden');
          else confirm.setCustomValidity('');

          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    })()
</script>
</body>
</html>
