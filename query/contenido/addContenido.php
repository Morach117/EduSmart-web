<?php

include '../../conn.php';

function limpiarInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recuperar datos del formulario
        $id_subtema = isset($_POST['id_subtema']) ? limpiarInput($_POST['id_subtema']) : '';
        $tipo_contenido = isset($_POST['tipo_contenido']) ? limpiarInput($_POST['tipo_contenido']) : '';
        $titulo = isset($_POST['titulo']) ? limpiarInput($_POST['titulo']) : '';
        $descripcion = isset($_POST['descripcion']) ? limpiarInput($_POST['descripcion']) : '';

        // Definir el nombre del archivo y su ruta por defecto
        $nombre_archivo = null;
        $ruta_destino_archivo = null;

        // Verificar el tipo de contenido y procesar según sea necesario
        if ($tipo_contenido === 'video') {
            // Lógica para insertar datos de video en la base de datos
            $nombre_archivo = isset($_POST['multimedia_link']) ? limpiarInput($_POST['multimedia_link']) : null;

            // Preparar la consulta
            $query = "INSERT INTO contenido_tematico (id_subtema, tipo, nombre_archivo, titulo, descripcion) VALUES (:id_subtema, :tipo_contenido, :nombre_archivo, :titulo, :descripcion)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id_subtema', $id_subtema);
            $stmt->bindParam(':tipo_contenido', $tipo_contenido);
            $stmt->bindParam(':nombre_archivo', $nombre_archivo);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descripcion', $descripcion);

            // Ejecutar la consulta
            if (!$stmt->execute()) {
                echo json_encode(['success' => false, 'message' => 'Error al ejecutar la consulta: ' . $stmt->errorInfo()]);
                exit();
            }

            // Responder con éxito
            echo json_encode(['success' => true]);
            exit();

        } elseif ($tipo_contenido === 'infografia') {
            // Lógica para insertar datos de infografía en la base de datos
            $nombre_archivo_original = isset($_FILES['nombre_archivo']['name']) ? limpiarInput($_FILES['nombre_archivo']['name']) : null;
            $nombre_archivo = agregarTimestamp($nombre_archivo_original);
            $ruta_destino_archivo = isset($_FILES['nombre_archivo']['tmp_name']) ? $_FILES['nombre_archivo']['tmp_name'] : null;

            // Mover el archivo a una ubicación deseada
            if ($nombre_archivo && $ruta_destino_archivo) {
                $ruta_destino_final = '../../files/uploads/' . $nombre_archivo;
                move_uploaded_file($ruta_destino_archivo, $ruta_destino_final);

                // Si la operación de mover el archivo fue exitosa, actualizar la respuesta
                if (file_exists($ruta_destino_final)) {
                    // Preparar la consulta
                    $query = "INSERT INTO contenido_tematico (id_subtema, tipo, nombre_archivo, titulo, descripcion) VALUES (:id_subtema, :tipo_contenido, :nombre_archivo, :titulo, :descripcion)";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':id_subtema', $id_subtema);
                    $stmt->bindParam(':tipo_contenido', $tipo_contenido);
                    $stmt->bindParam(':nombre_archivo', $nombre_archivo);
                    $stmt->bindParam(':titulo', $titulo);
                    $stmt->bindParam(':descripcion', $descripcion);

                    // Ejecutar la consulta
                    if (!$stmt->execute()) {
                        echo json_encode(['success' => false, 'message' => 'Error al ejecutar la consulta: ' . $stmt->errorInfo()]);
                        exit();
                    }

                    // Responder con éxito
                    echo json_encode(['success' => true]);
                    exit();
                }
            }
        }
    } catch (Exception $e) {
        // Capturar cualquier excepción y responder con el mensaje de error
        echo json_encode(['success' => false, 'message' => 'Error al procesar la solicitud: ' . $e->getMessage()]);
        exit();
    }
} else {
    // Si el método no es permitido, responder con el mensaje de error
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit();
}

// Función para agregar un timestamp al nombre del archivo
function agregarTimestamp($nombre_archivo) {
    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
    $nombre_sin_extension = pathinfo($nombre_archivo, PATHINFO_FILENAME);
    $timestamp = time();
    return $nombre_sin_extension . '_' . $timestamp . '.' . $extension;
}
?>
