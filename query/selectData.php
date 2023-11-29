<?php
$docenteId = $_SESSION['admin']['correo_electronico']; // Obtener el id del docente de la sesión

$selDocenteData = $conn->query("SELECT * FROM docentes WHERE correo_electronico = '$docenteId'")->fetch(PDO::FETCH_ASSOC); // Seleccionar todos los registros de la tabla usuarioc donde la claveuser sea igual al id del docente de la sesión
?>