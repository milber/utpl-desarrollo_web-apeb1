# Sistema de Gestión de Usuarios - Proyecto Académico UTPL

Este es un proyecto académico desarrollado para la materia de **Desarrollo Web** en la carrera de **Tecnologías de la Información**. La aplicación consiste en un sistema integral de gestión de perfiles de usuario, con un enfoque principal en la seguridad y la correcta arquitectura de software.

## 🎯 Objetivos del Proyecto
* Implementar un sistema de autenticación seguro (Login/Logout).
* Permitir el registro de nuevos usuarios con validación de datos.
* Facilitar la gestión de perfil (actualización de nombre, correo y seguimiento de fechas de modificación).
* Implementar un módulo de cambio de contraseña con validación de credenciales actuales.
* **Seguridad:** Garantizar que todas las contraseñas se almacenen de forma segura mediante encriptación de una sola vía en la base de datos.

## 🛠️ Stack Tecnológico
* **Lenguaje:** PHP 8.x
* **Base de Datos:** MySQL 8.0
* **Frontend:** HTML5, CSS3, JavaScript (ES6+)
* **Framework CSS:** Bootstrap 5.3 (Estilos modernos y responsivos)
* **Iconografía:** Bootstrap Icons

## 📋 Requerimientos Técnicos
1.  **Servidor Web:** Apache (recomendado a través de XAMPP, WAMP o Laragon).
2.  **PHP:** Versión 7.4 o superior (Compatible con PHP 8).
3.  **Gestor de BD:** MySQL / MariaDB.
4.  **Extensión MySQLi:** Habilitada en PHP para la conexión a la base de datos.

## 🔒 Seguridad de Contraseñas
El sistema no almacena contraseñas en texto plano. Se utiliza la función nativa de PHP `password_hash()` con el algoritmo **PASSWORD_DEFAULT**, lo que genera una cadena encriptada única. Para la verificación en el acceso, se emplea `password_verify()`, garantizando la integridad de la información incluso ante posibles accesos no autorizados a la base de datos.

## 🚀 Configuración e Instalación

### 1. Clona el proyecto
https://github.com/milber/utpl-desarrollo-web-macb


### 2. Preparación de la Base de Datos
Debes ejecutar el script de SQL proporcionado en https://github.com/milber/utpl-desarrollo-web-macb/blob/master/design/create_db_schema.sql para configurar el entorno. El script realiza lo siguiente:

* Crea el esquema `macb_dw`.
* Crea la tabla `usuarios` con restricciones de unicidad para Cédula y Correo.
* Crea un usuario de base de datos específico (`macb_app`) con permisos restringidos por seguridad.
* Inserta un usuario **Administrador** por defecto.

**Pasos:**
1. Abre MySQL Workbench ,phpMyAdmin o cualquier cliente de base de datos que permita acceso a MySQL.
2. Coneectate con un usuario con los privilegios para crear un schema
3. Copia y pega el contenido del archivo de creación de base de datos.
4. Ejecuta el script completo.

**Credenciales de Administrador por defecto:**
* **Usuario:** `admin@admin.com`
* **Contraseña:** `Pa55word`

### 3. Funcionamiento en ambiente de desarrollo
1. Asegúrate de que el archivo de conexión (`connection_db.php`) tenga las credenciales del usuario `macb_app` creadas en el script SQL.
2. Inicia los módulos de Apache y MySQL, puedes usar el tu panel de control (XAMPP).
3. Abre tu navegador y accede a `http://localhost:8080/`. Nota, el puerto puede cambiar de acuerdo a tu configuració local.

## 📂 Estructura del Proyecto
* `index.php`: Carátula académica y redirección inicial.
* `login.php` / `register.php`: Formularios de acceso y creación de cuenta.
* `create_session.php`: Crea la sessión.
* `perfil.php`: Visualización de datos del usuario.
* `edit_perfil.php` / `edit_password.php`: Interfaces de actualización.
* `update_user.php` / `update_password.php`: Lógica de procesamiento en el servidor.
* `alerts.php`: Componente centralizado de mensajes y notificaciones.

---
**Autor:** Milber Champutiz Burbano  
**Institución:** Universidad Técnica Particular de Loja (UTPL)  
**Materia:** Desarrollo Web  
**Ubicación:** Quito, Ecuador  
**Año:** 2026