<?php
require_once 'create_session.php';
protect_page();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario         = $_SESSION['user_id'];
    $current_password   = $_POST['current_password'] ?? '';
    $new_password       = $_POST['new_password'] ?? '';
    $conf_new_password  = $_POST['conf_new_password'] ?? '';
    $updated_date       = date("Y-m-d H:i:s");;

    // Validaciones
    if (empty($current_password) || empty($new_password) || $new_password !== $conf_new_password) {
        header("Location: edit_password.php?error=campos_invalidos");
        exit();
    }

    // Obtener la clave actual de la DB para comparar
    $sql = "SELECT clave_segura FROM usuarios WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verificar si la clave actual coincide
    if ($user && password_verify($current_password, $user['clave_segura'])) {
        
        // Encriptar nueva clave y actualizar
        $new_secure_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_date  = date("Y-m-d H:i:s");

        $update_sql = "UPDATE usuarios SET clave_segura = ?, fecha_actualizacion = ? WHERE id_usuario = ?";
        $upd_stmt = $conn->prepare($update_sql);
        $upd_stmt->bind_param("ssi", $new_secure_password, $updated_date, $id_usuario);

        if ($upd_stmt->execute()) {
            header("Location: edit_password.php?status=password_success");
        } else {
            header("Location: edit_password.php?error=db_error");
        }
    } else {
        // Clave actual incorrecta
        header("Location: edit_password.php?error=clave_actual_incorrecta");
    }
    exit();
}
