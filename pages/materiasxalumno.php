<?php
$docenteId = $selDocenteData['id_docente'];
?>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form class="form-fieldset">
                    <div class="mb-3">
                        <label for="" class="form-label">Materia</label>
                        <select class="form-select form-select-lg" name="materia" id="materia">
                            <option selected>Abrir menu</option>
                            <!-- obtiene las materias del profesor de la base de datos -->
                            <?php
                            $consulta = $conn->query("SELECT * FROM materias WHERE id_docente = '$docenteId'");
                            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <option value="<?php echo $fila['id_materia']; ?>">
                                    <?php echo $fila['nombre_materia']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
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
                                                <?php echo 'Sin asignar'; ?>
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
</script>