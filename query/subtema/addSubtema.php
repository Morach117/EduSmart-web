<?php
include '../../conn.php';

// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id_tema = $_POST['id_tema'];
    $nombre_subtema = $_POST['nuevoSubtema'];

    try {
        // Preparar la consulta SQL para insertar datos en la tabla de subtemas
        $sql = "INSERT INTO subtemas (id_tema, nombre) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute([$id_tema, $nombre_subtema]);

        // Enviar una respuesta en formato JSON
        echo json_encode(array('success' => true, 'message' => 'Subtema añadido correctamente'));
    } catch (PDOException $e) {
        // Enviar una respuesta en formato JSON en caso de error
        echo json_encode(array('success' => false, 'message' => 'Error al añadir el subtema: ' . $e->getMessage()));
    }
} else {
    // Enviar una respuesta en formato JSON si el método no es permitido
    echo json_encode(array('success' => false, 'message' => 'Método no permitido'));
}
?>

