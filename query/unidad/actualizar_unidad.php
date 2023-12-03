<?php
include '../../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Función para limpiar y validar los datos
    function cleanInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    // Limpiar y validar los datos recibidos
    $unidadId = cleanInput($_POST['unidadId']);
    $nombreUnidad = cleanInput($_POST['editNombreUnidad']);
    // Agrega más variables según tus necesidades para los demás campos

    try {
        $stmt = $conn->prepare("UPDATE unidades_tematicas SET nombre_unidad = :nombreUnidad WHERE id_unidad = :id");
        $stmt->bindParam(':id', $unidadId);
        $stmt->bindParam(':nombreUnidad', $nombreUnidad);
        // Agrega más bindParam según tus necesidades para los demás campos

        $stmt->execute();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
}
?>
