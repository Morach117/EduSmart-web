<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <div class="page-tittle col">
                        <h2 class="page-tittle-text">Lista de alumnos</h2>
                    </div>
                    <div class="text-end col">
                        <button data-bs-toggle="modal" data-bs-target="#modal-equipos"
                            class="btn btn-primary">Administrar equipos</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="example">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Nombre</th>
                                <th>Equipo</th>
                                <th class="text-center">Número de integrantes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selAlumno = $conn->query("SELECT
                            a.matricula,
                            a.nombre,
                            e.nombre_equipo,
                            e.numero_integrantes
                            FROM alumnos a
                            INNER JOIN equipoxalumno ea ON a.id_alumno = ea.id_alumno
                            INNER JOIN equipos e ON ea.id_equipo = e.id_equipo
                            ORDER BY a.id_alumno ASC");
                            if ($selAlumno->rowCount() > 0) {
                                $i = 1;
                                while ($selAlumnoRow = $selAlumno->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $selAlumnoRow['matricula']; ?>
                                        </td>
                                        <td>
                                            <?php echo $selAlumnoRow['nombre']; ?>
                                        </td>
                                        <td>
                                            <?php echo $selAlumnoRow['nombre_equipo']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $selAlumnoRow['numero_integrantes']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td>No hay datos disponibles</td>
                                    <td>No hay datos disponibles</td>
                                    <td>No hay datos disponibles</td>
                                    <td>No hay datos disponibles</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#equipos-table').DataTable();

        // Captura el evento de envío del formulario
        $('#equipo-form').on('submit', function (e) {
            e.preventDefault();

            // Recopila los checkboxes marcados en un array
            var alumnosSeleccionados = [];
            $('input[name="alumnos_seleccionados[]"]:checked').each(function () {
                alumnosSeleccionados.push($(this).val());
            });

            // Establece el valor del campo oculto con los IDs de los alumnos seleccionados
            $('#alumnosSeleccionados').val(JSON.stringify(alumnosSeleccionados));

            // Recopila otros datos del formulario si es necesario
            var nombreEquipo = $('#nombre-equipo').val();
            var integrantesEquipo = $('#integrantes').val();

            // Realiza una solicitud AJAX para guardar los datos
            $.ajax({
                type: 'POST',
                url: "./query/equipos/guardar_equipo.php",
                data: {
                    nombreEquipo: nombreEquipo,
                    integrantesEquipo: integrantesEquipo,
                    alumnosSeleccionados: alumnosSeleccionados
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Éxito',
                            text: response.message,
                            icon: 'success',
                        }).then(function () {
                            // Realiza acciones adicionales después de guardar el equipo (si es necesario)
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $(document).ready(function () {
            $('#alumnos-table').DataTable();
        });
    });
</script>






<script>
    new DataTable('#example');
</script>
</body>

</html>