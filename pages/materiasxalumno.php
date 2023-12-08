<?php
$docenteId = $selDocenteData['id_docente'];
?>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form class="form-fieldset" id="materiasForm">
                    <div class="mb-3"></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>Matricula</th>
                                    <th>Nombre</th>
                                    <th>Materia Asignada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Consulta para obtener solo los alumnos del docente actual sin materias asignadas
                                $consulta = $conn->prepare("SELECT alumnos.nombre, alumnos.matricula, alumnos.id_alumno
                                        FROM alumnos
                                        WHERE alumnos.id_docente = :docenteId
                                        AND NOT EXISTS (
                                            SELECT 1
                                            FROM materiaxalumno
                                            WHERE materiaxalumno.id_alumno = alumnos.id_alumno
                                        )");
                                $consulta->bindParam(':docenteId', $docenteId, PDO::PARAM_INT);
                                $consulta->execute();

                                if ($consulta->rowCount() > 0) {
                                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $fila['matricula']; ?></td>
                                            <td><?php echo $fila['nombre']; ?></td>
                                            <td>
                                                <input type="hidden" name="id_docente" value="<?php echo $docenteId; ?>">
                                                <input type="hidden" name="id_alumno[]" value="<?php echo $fila['id_alumno']; ?>">
                                                <select class="form-select form-select-sm" name="materias[]">
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    <?php
                                                    // Consulta para obtener las materias del docente actual
                                                    $consultaMaterias = $conn->prepare("SELECT * FROM materias WHERE id_docente = :docenteId");
                                                    $consultaMaterias->bindParam(':docenteId', $docenteId, PDO::PARAM_INT);
                                                    $consultaMaterias->execute();

                                                    if ($consultaMaterias->rowCount() > 0) {
                                                        while ($filaMateria = $consultaMaterias->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <option value="<?php echo $filaMateria['id_materia']; ?>">
                                                                <?php echo $filaMateria['nombre_materia']; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <option value="">No hay materias asignadas</option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="3">No hay alumnos sin materias asignadas</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col mt-5">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" id="submit-btn">Aceptar</button>
                            <button type="reset" class="btn btn-danger ms-2">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    new DataTable('#example');

</script>

<script>
$(document).ready(function () {
    // Adjuntar el evento de clic al formulario
    $("#materiasForm").on("submit", function (event) {
        // Prevenir el envío del formulario por defecto
        event.preventDefault();

        // Filtrar las filas para obtener solo aquellas con materia seleccionada
        var filasSeleccionadas = $("select[name='materias[]']:not(:disabled)").closest("tr");

        // Validar si se ha seleccionado al menos una materia
        if (filasSeleccionadas.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes seleccionar al menos una materia.'
            });
            return;
        }

        // Realizar la petición Ajax al servidor
        $.ajax({
            type: "POST",
            url: "./query/asignacion/procesar_asignacion.php",
            data: filasSeleccionadas.find("input, select").serialize(),
            dataType: 'json',
            success: function (response) {
                // Mostrar SweetAlert según la respuesta del servidor
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: response.message
                    });

                    // Esperar un segundo antes de redireccionar
                    setTimeout(function () {
                        window.location.href = 'direcciones.php?page=viewmateriasxalumnos';
                    }, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function (error) {
                console.error('Error en la petición Ajax: ' + error.responseText);
            }
        });
    });
});
</script>

