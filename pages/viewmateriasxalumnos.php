<?php
$docenteId = $selDocenteData['id_docente'];
?>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form class="form-fieldset">
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
                                // Modificación: Agregar una cláusula WHERE para filtrar por ID de docente
                                $consulta = $conn->prepare("SELECT alumnos.nombre, alumnos.matricula, materias.nombre_materia
                                        FROM alumnos
                                        INNER JOIN materiaxalumno ON alumnos.id_alumno = materiaxalumno.id_alumno
                                        INNER JOIN materias ON materiaxalumno.id_materia = materias.id_materia
                                        WHERE alumnos.id_docente = :docenteId");
                                $consulta->bindParam(':docenteId', $docenteId, PDO::PARAM_INT);
                                $consulta->execute();

                                if ($consulta->rowCount() > 0) {
                                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $fila['matricula']; ?>
                                            </td>
                                            <td>
                                                <?php echo $fila['nombre']; ?>
                                            </td>
                                            <td>
                                                <?php echo $fila['nombre_materia']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="3">No hay alumnos asignados con materias</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col mt-5">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Aceptar</button>
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

    //no se q
    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>