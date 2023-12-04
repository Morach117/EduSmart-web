<?php
include '../../conn.php';

// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario y validarlos
    $id_tema = filter_input(INPUT_POST, 'id_tema', FILTER_SANITIZE_NUMBER_INT);
    $nombre_subtema = filter_input(INPUT_POST, 'nuevoSubtema', FILTER_SANITIZE_STRING);

    try {
        // Validar que los datos no estén vacíos
        if (empty($id_tema) || empty($nombre_subtema)) {
            throw new Exception('Todos los campos son obligatorios.');
        }

        // Preparar la consulta SQL para insertar datos en la tabla de subtemas
        $sql = "INSERT INTO subtemas (id_tema, nombre) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute([$id_tema, $nombre_subtema]);

        // Enviar una respuesta en formato JSON
        echo json_encode(['success' => true, 'message' => 'Subtema añadido correctamente']);
    } catch (PDOException $e) {
        // Enviar una respuesta en formato JSON en caso de error de base de datos
        echo json_encode(['success' => false, 'message' => 'Error de base de datos al añadir el subtema.']);
    } catch (Exception $e) {
        // Enviar una respuesta en formato JSON en caso de error de validación
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        // Cerrar la conexión a la base de datos
        $conn = null;
    }
} else {
    // Enviar una respuesta en formato JSON si el método no es permitido
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
