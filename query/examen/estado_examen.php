<?php
include '../../conn.php';

// Verificar si se recibió el ID del examen y el nuevo estado
if (isset($_POST['id']) && isset($_POST['estado'])) {
    // Obtener el ID del examen desde la solicitud POST
    $examenId = $_POST['id'];
    
    // Obtener el nuevo estado desde la solicitud POST (true o false)
    $nuevoEstado = $_POST['estado'];

    try {
        // Actualizar el estado en la base de datos
        $stmt = $conn->prepare("UPDATE examenes SET activo = ? WHERE id_examen = ?");
        $stmt->execute([$nuevoEstado, $examenId]);

        // Devolver una respuesta de éxito
        echo 'success';
    } catch (PDOException $e) {
        // Manejar cualquier error de la base de datos
        echo 'error';
    }
} else {
    // Si no se proporcionó el ID del examen o el nuevo estado, devolver una respuesta de error
    echo 'error';
}
?>
