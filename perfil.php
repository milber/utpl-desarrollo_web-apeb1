<?php
    require_once 'create_session.php';
    // verficar si existe sessión activa
    protect_page();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Sistema</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Iconos de Bootstrap para el menú -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .nav-link { color: #6c757d; font-weight: 500; }
        .nav-link.active { color: #0d6efd; background-color: #f8f9fa; border-radius: 8px; }
        .nav-link:hover { color: #0d6efd; }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Columna del Menú -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 rounded-4 p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="bi bi-person-circle me-2"></i> Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit_perfil.php"><i class="bi bi-pencil-square me-2"></i> Editar Datos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit_password.php"><i class="bi bi-shield-lock me-2"></i> Seguridad</a>
                    </li>
                    <hr class="text-muted">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Columna de Información -->
        <div class="col-md-7">
            <div class="card shadow-lg border-0 rounded-4 p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 24px;">
                        <?php echo strtoupper(substr($_SESSION['user_nombre'], 0, 1)); ?>
                    </div>
                    <div class="ms-3">
                        <h3 class="mb-0 fw-bold">Bienvenido, <?php echo htmlspecialchars($_SESSION['user_nombre']); ?></h3>
                        <p class="text-muted small mb-0">Gestiona tu información personal</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label class="form-label text-secondary small fw-bold">NOMBRE COMPLETO</label>
                        <p class="border-bottom pb-2"><?php echo htmlspecialchars($_SESSION['user_nombre']); ?></p>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label text-secondary small fw-bold">CÉDULA</label>
                        <p class="border-bottom pb-2"><?php echo htmlspecialchars($_SESSION['user_cedula']); ?></p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-secondary small fw-bold">CORREO ELECTRÓNICO</label>
                        <p class="border-bottom pb-2"><?php echo htmlspecialchars($_SESSION['user_correo']); ?></p>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-secondary small fw-bold">FECHA DE REGISTRO</label>
                        <p class="text-muted small"><?php echo $_SESSION['user_fecha_registro'] ?? 'No disponible'; ?></p>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="edit_perfil.php" class="btn btn-primary px-4 rounded-3 shadow-sm">
                        <i class="bi bi-pencil me-2"></i> Editar Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>