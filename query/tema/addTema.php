
<?php
include '../../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y validar los datos del formulario
    $id_unidad = filter_input(INPUT_POST, 'unidad', FILTER_SANITIZE_NUMBER_INT);
    $materia = filter_input(INPUT_POST, 'id_materia', FILTER_SANITIZE_NUMBER_INT); // Ajustar según el tipo de dato
    $nombre = filter_input(INPUT_POST, 'nombre_tema', FILTER_SANITIZE_STRING);

    try {
        // Validar que los datos no estén vacíos
        if (empty($id_unidad) || empty($materia) || empty($nombre)) {
            throw new Exception('Todos los campos son obligatorios.');
        }

        // Preparar la consulta SQL para insertar datos en la tabla
        $sql = "INSERT INTO TEMA (id_unidad, materia, nombre) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute([$id_unidad, $materia, $nombre]);

        echo "Tema añadido correctamente";
    } catch (PDOException $e) {
        // Enviar un mensaje genérico en caso de error de base de datos
        echo "Error al añadir el tema. Por favor, inténtelo de nuevo más tarde.";
    } catch (Exception $e) {
        // Enviar un mensaje genérico en caso de error de validación
        echo "Error al procesar la solicitud. Por favor, inténtelo de nuevo más tarde.";
    } finally {
        // Cerrar la conexión a la base de datos
        $conn = null;
    }
} else {
    // Enviar un mensaje genérico si el método no es permitido
    echo "Error en la solicitud. Por favor, inténtelo de nuevo más tarde.";
}
?>
