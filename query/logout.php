<?php
session_start(); // Iniciar sesión

session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión

header("location:../"); // Redireccionar a index.php
?>