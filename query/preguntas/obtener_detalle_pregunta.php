<?php
// obtener_detalle_pregunta.php

include '../../conn.php';

if (isset($_GET['id'])) {
    $preguntaId = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM preguntas WHERE id_pregunta = :id");
    $stmt->bindParam(':id', $preguntaId);
    $stmt->execute();

    $preguntaDetalles = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devolver los detalles de la pregunta en formato JSON
    echo json_encode($preguntaDetalles);
} else {
    echo json_encode(['error' => 'ID de pregunta no proporcionado']);
}
?>
