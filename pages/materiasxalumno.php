<?php
$docenteId = $selDocenteData['id_docente'];
?>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form class="form-fieldset">
                    <div class="mb-3">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>Matricula</th>
                                    <th>Nombre</th>
                                    <th>Nombre</th>
                                    <th>Materia Asignada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $consulta = $conn->query("SELECT alumnos.nombre, alumnos.matricula, alumnos.id_alumno, materias.nombre_materia
                                        FROM alumnos
                                        LEFT JOIN materiaxalumno ON alumnos.id_alumno = materiaxalumno.id_alumno
                                        LEFT JOIN materias ON materiaxalumno.id_materia = materias.id_materia
                                        WHERE materiaxalumno.id_alumno IS NULL");

                                if ($consulta->rowCount() > 0) {
                                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $fila['matricula']; ?>
                                            </td>
                                            <td>
                                                <?php echo $fila['id_alumno']; ?>
                                            </td>
                                            <td>
                                                <?php echo $fila['nombre']; ?>
                                            </td>
                                            <td>
                                                <select class="form-select form-select-sm" name="" id="">
                                                    <?php
                                                    $consulta2 = $conn->query("SELECT * FROM materias WHERE id_docente = '$docenteId'");
                                                    if ($consulta2->rowCount() > 0) {
                                                        while ($fila2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <option value="<?php echo $fila2['id_materia']; ?>">
                                                                <?php echo $fila2['nombre_materia']; ?>
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
                                        <td colspan="4">No hay alumnos sin materias asignadas</td>
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
```
<script>
    new DataTable('#example');

    //no se q
    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>