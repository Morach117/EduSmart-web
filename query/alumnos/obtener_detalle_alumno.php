<?php
// obtener_detalle_alumno.php

include '../../conn.php';

if (isset($_GET['id'])) {
    $alumnoId = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM alumnos WHERE id_alumno = :id");
    $stmt->bindParam(':id', $alumnoId);
    $stmt->execute();

    $alumnoDetalles = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devolver los detalles del alumno en formato JSON
    echo json_encode($alumnoDetalles);
} else {
    echo json_encode(['error' => 'ID de alumno no proporcionado']);
}
?>
