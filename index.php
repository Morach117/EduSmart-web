<?php
session_start();

if(isset($_SESSION['admin']['adminnakalogin']) == true) header("location:direcciones.php"); // si el usuario ya inicio sesion, lo redirige a la pagina principal
?>

<?php

include("pages/login.php");

?>

<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
</head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/login.js"></script> <!-- importa el archivo ajax --> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
