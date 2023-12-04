<?php
include '../../conn.php';

// Función para limpiar y validar la entrada
function cleanInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el ID de la materia desde la URL
    $id_materia = cleanInput($_GET['id']);

    // Obtiene el nombre de la unidad desde el formulario
    $nombre_unidad = cleanInput($_POST['unidad']);

    // Validación básica (puedes agregar más validaciones según tus necesidades)
    if (empty($id_materia) || empty($nombre_unidad)) {
        echo json_encode(["success" => false, "message" => "Todos los campos son obligatorios"]);
        exit();
    }

    try {
        // Prepara la consulta SQL para insertar datos en la tabla
        $sql = "INSERT INTO unidades_tematicas (id_materia, nombre_unidad) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        // Ejecuta la consulta
        $stmt->execute([$id_materia, $nombre_unidad]);

        // Cierra la conexión a la base de datos
        $conn = null;

        // Envía una respuesta JSON con el resultado
        echo json_encode(["success" => true, "message" => "La unidad se ha añadido correctamente"]);
    } catch (PDOException $e) {
        // Envía una respuesta JSON con el mensaje de error
        echo json_encode(["success" => false, "message" => "Error al añadir la unidad: " . $e->getMessage()]);
    }
}
?>
