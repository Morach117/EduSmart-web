<?php

include '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['id_equipo'])) {
        $idEquipo = $_POST['id_equipo'];

        // Realiza una consulta para obtener los integrantes del equipo
        $stmt = $conn->prepare("SELECT a.matricula, a.nombre, a.app, a.apm FROM alumnos a INNER JOIN equipoxalumno ea ON a.id_alumno = ea.id_alumno WHERE ea.id_equipo = ?");
        $stmt->execute([$idEquipo]);

        // Muestra los integrantes en una lista
        if ($stmt->rowCount() > 0) {
            echo '<ul>';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<li>' . $row['nombre'] . ' ' . $row['app'] . ' ' . $row['apm'] . '</li>';
            }
            echo '</ul>';
        } else {
            echo 'No hay integrantes en este equipo.';
        }
    } else {
        echo 'Parámetros incorrectos.';
    }
} else {
    echo 'Método de solicitud incorrecto.';
}
?>
