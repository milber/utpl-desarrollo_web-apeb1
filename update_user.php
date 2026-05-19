<?php
    require_once 'create_session.php';
    protect_page();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // obtener datos del formulario
        $nuevo_nombre           = htmlspecialchars(trim($_POST['nombre']));
        $nuevo_correo           = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $id_usuario             = $_SESSION['user_id'];
        $fecha_actualizacion    = date("Y-m-d H:i:s");;

        // Validación de campos vacíos
        if (empty($nuevo_nombre) || empty($nuevo_correo)) {
            header("Location: edit_perfil.php?error=campos_vacios");
            exit();
        }

        try {
            // Preparamos la actualización en la base de datos
            $sql = "UPDATE usuarios SET nombre = ?, correo = ?, fecha_actualizacion = ? WHERE id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $nuevo_nombre, $nuevo_correo, $fecha_actualizacion, $id_usuario);

            if ($stmt->execute()) {
                //Actualizar las variables de sesión
                $_SESSION['user_nombre'] = $nuevo_nombre;
                $_SESSION['user_correo'] = $nuevo_correo;

                // Redirige al perfil
                header("Location: perfil.php?status=update_success");
                exit();
            } else {
                throw new Exception("Error al ejecutar la actualización");
            }

        } catch (mysqli_sql_exception $e) {
            // Manejo de correos duplicados (Error 1062 en MySQL)
            if ($e->getCode() === 1062) {
                header("Location: edit_perfil.php?error=correo_duplicado");
            } else {
                header("Location: edit_perfil.php?error=reg_error");
            }
            exit();
        } catch (Exception $e) {
            header("Location: edit_perfil.php?error=reg_error");
            exit();
        }
    } else {
        header("Location: perfil.php");
        exit();
    }
?>
