<?php
// obtener_detalle_unidad.php

include '../../conn.php';

if (isset($_GET['id'])) {
    $unidadId = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM unidades_tematicas WHERE id_unidad = :id");
    $stmt->bindParam(':id', $unidadId);
    $stmt->execute();

    $unidadDetalles = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devolver los detalles de la unidad en formato JSON
    echo json_encode($unidadDetalles);
} else {
    echo json_encode(['error' => 'ID de unidad no proporcionado']);
}
?>
