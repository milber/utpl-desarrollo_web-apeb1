<?php
    require_once 'create_session.php';
    protect_page();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Sistema</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Reutilizamos el menú lateral -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 rounded-4 p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php"><i class="bi bi-person-circle me-2"></i> Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-light rounded-3" href="#"><i class="bi bi-pencil-square me-2"></i> Editar Datos</a>
                    </li>
                    <hr class="text-muted">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Formulario de Edición -->
        <div class="col-md-7">
            <?php include 'alerts.php'; ?>
            <div class="card shadow-lg border-0 rounded-4 p-4">
                <h3 class="fw-bold mb-4">Actualizar Información</h3>
                
                <form action="update_user.php" method="POST" class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label text-secondary small fw-bold">NOMBRE COMPLETO</label>
                            <input type="text"
                                name="nombre"
                                class="form-control"
                                id="inputNombre"
                                value="<?php echo htmlspecialchars($_SESSION['user_nombre'] ?? ''); ?>" 
                                required>
                            <div class="invalid-feedback">
                                El nombre completo no puede quedar en blanco.
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-secondary small fw-bold">CÉDULA (Solo lectura)</label>
                            <input type="text" class="form-control bg-light" 
                                   value="<?php echo htmlspecialchars($_SESSION['user_cedula'] ?? ''); ?>" readonly>
                            <div class="form-text" style="font-size: 0.75rem;">La cédula no se puede modificar.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-secondary small fw-bold">CORREO ELECTRÓNICO</label>
                            <div class="input-group has-validation">
                                <input type="email"
                                    name="correo"
                                    class="form-control"
                                    id="inputCorreo"
                                    value="<?php echo htmlspecialchars($_SESSION['user_correo'] ?? ''); ?>" 
                                    required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa un formato de correo válido (ejemplo@correo.com).
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="perfil.php" class="btn btn-outline-secondary px-4 rounded-3 shadow-sm border-0">
                                    <i class="bi bi-x-circle me-1"></i> Cancelar cambios
                                </a>
                                <button type="submit" class="btn btn-primary px-5 rounded-3 shadow-sm">
                                    Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script>
    // Validación de Bootstrap 
    (() => {
      'use strict'
      const forms = document.querySelectorAll('.needs-validation')
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    })()
</script>
</body>
</html>