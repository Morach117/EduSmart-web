<?php
session_start(); // Iniciar sesión
if (!isset($_SESSION['admin']['adminnakalogin']) == true)
    header("location:index.php"); // Si no existe una sesión iniciada, redireccionar a index.php

?>
<?php
define('INCLUDED_FROM_MAIN', true); // Definir una constante para evitar que se acceda a este archivo directamente

include('conn.php'); // Incluir archivo de conexión a la base de datos
include('includes/navbar.php'); // Incluir archivo de barra de navegación
include('includes/footer.php');

$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home'; // Obtener la página a la que se quiere acceder

$pages = array(
    // Definir las páginas disponibles}
    'home',
    'multimedia',
    'unidades',
    'equipos',
    'examen1',
    'examen2',
    'materias'

);

if (in_array($page, $pages)) { // Si la página a la que se quiere acceder está en el array de páginas disponibles, incluir el archivo de la página
    require(__DIR__ . "/pages/$page.php"); // __DIR__ es una constante mágica que devuelve la ruta del directorio actual
} else {
    require(__DIR__ . "/pages/home.php"); // Si la página a la que se quiere acceder no está en el array de páginas disponibles, incluir el archivo de la página de inicio
}
?>
<script src="./assets/dist/js/demo-theme.min.js?1684106062"></script>