<?php
include '../../conn.php';

if (isset($_GET['id'])) {
    $unidadId = $_GET['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM unidades_tematicas WHERE id_unidad = :id");
        $stmt->bindParam(':id', $unidadId);
        $stmt->execute();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID de unidad no proporcionado']);
}
?>
