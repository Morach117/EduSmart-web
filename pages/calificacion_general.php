<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Calificaciones</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>
<body>

<?php
// Supongamos que ya tienes la información del usuario y su id_docente
$id_docente_usuario = $selDocenteData['id_docente']; // Reemplaza con la variable que contenga el id_docente del usuario actual

// Consulta SQL para obtener datos de la base de datos
$query = "SELECT g.puntaje, g.id_examen, a.id_alumno
          FROM gamificacion g
          INNER JOIN alumnos a ON g.id_alumno = a.id_alumno
          INNER JOIN materias m ON g.id_materia = m.id_materia
          WHERE m.id_docente = :id_docente_usuario";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id_docente_usuario', $id_docente_usuario);
$stmt->execute();
$result = $stmt->fetchAll();
?>

<div class="container mt-5">
    <h1 class="text-center">Tabla de Calificaciones</h1>
    <?php if (empty($result)) : ?>
        <p class="text-center">No hay calificaciones disponibles.</p>
    <?php else : ?>
        <table class="table table-striped table-hover" id="calificacionesTable">
            <thead>
                <tr>
                    <th scope="col">Nombre del Alumno</th>
                    <th scope="col">Calificación</th>
                    <th scope="col">Unidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Iterar sobre los resultados y mostrar cada fila en la tabla
                foreach ($result as $row) {
                    // Obtener información del alumno mediante consultas adicionales
                    $alumno_id = $row['id_alumno'];
                    $alumno_query = "SELECT nombre, app, apm FROM alumnos WHERE id_alumno = :alumno_id";
                    $alumno_stmt = $conn->prepare($alumno_query);
                    $alumno_stmt->bindParam(':alumno_id', $alumno_id);
                    $alumno_stmt->execute();
                    $alumno_result = $alumno_stmt->fetch(PDO::FETCH_ASSOC);

                    // Obtener el nombre de la unidad mediante consultas adicionales
                    $examen_id = $row['id_examen'];
                    $examen_query = "SELECT id_unidad FROM examenes WHERE id_examen = :examen_id";
                    $examen_stmt = $conn->prepare($examen_query);
                    $examen_stmt->bindParam(':examen_id', $examen_id);
                    $examen_stmt->execute();
                    $examen_result = $examen_stmt->fetch(PDO::FETCH_ASSOC);

                    // Consulta para obtener el nombre de la unidad desde la tabla de unidades
                    $unidad_id = $examen_result['id_unidad'];
                    $unidad_query = "SELECT nombre_unidad FROM unidades_tematicas WHERE id_unidad = :unidad_id";
                    $unidad_stmt = $conn->prepare($unidad_query);
                    $unidad_stmt->bindParam(':unidad_id', $unidad_id);
                    $unidad_stmt->execute();
                    $unidad_result = $unidad_stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <tr>
                        <td><?php echo $alumno_result['nombre'] . ' ' . $alumno_result['app'] . ' ' . $alumno_result['apm']; ?></td>
                        <td><?php echo $row['puntaje']; ?></td>
                        <td><?php echo $unidad_result['nombre_unidad']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#calificacionesTable').DataTable({
            "order": [], // Deshabilitar el ordenamiento inicial
            "paging": true, // Habilitar paginación
            "searching": true, // Habilitar búsqueda
            
        });
    });
</script>

<!-- Agrega aquí cualquier otro script adicional que necesites -->

</body>
</html>
