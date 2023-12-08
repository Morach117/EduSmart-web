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
                                <th>Equipo</th>
                                <th>Integrantes</th>
                                <th>Acciones</th> <!-- Agregamos una nueva columna para el botón de acción -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selEquipos = $conn->query("SELECT * FROM equipos WHERE id_docente = $docenteId ORDER BY id_equipo");
                            if ($selEquipos->rowCount() > 0) {
                                while ($selEquipoRow = $selEquipos->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $selEquipoRow['nombre_equipo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $selEquipoRow['numero_integrantes']; ?>
                                        </td>
                                        <td>
                                            <!-- Agregamos un botón que activa el modal interno -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#integrantesModal"
                                                data-id-equipo="<?php echo $selEquipoRow['id_equipo']; ?>">
                                                Ver Integrantes
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='3'>No hay equipos registrados.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para manejar la apertura del modal -->
    <script>
        // Reemplaza el evento de clic en el botón para abrir el modal
        $('table').on('click', 'button', function () {
            var idEquipo = $(this).data('id-equipo');

            $.ajax({
                type: "POST",
                url: "./query/equipos/obtener_integrantes.php",
                data: { id_equipo: idEquipo },
                success: function (response) {
                    $('#integrantesModalBody').html(response);
                    $('#integrantesModal').modal('show');
                },
                error: function (error) {
                    console.error('Error al obtener los integrantes del equipo: ' + error.responseText);
                }
            });
        });

        // Agrega un evento para mostrar el modal interno al cargar la página
        $(document).ready(function () {
            $('#modal-interno').modal('show');
        });
    </script>

    <!-- Script para manejar el botón de submit -->
    <script>
        $(document).ready(function () {
            $("#submit-btn").on("click", function () {
                var maxIntegrantes = parseInt($("#integrantes").val());
                var alumnosSeleccionados = $("input[name='alumnos_seleccionados[]']:checked").length;

                if (alumnosSeleccionados > maxIntegrantes) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Seleccionaste más alumnos de los permitidos.',
                    });
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "./query/equipos/guardar_equipo.php",
                    data: $("#equipo-form").serialize(),
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Equipo creado correctamente!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al crear el equipo.',
                            text: error.responseText
                        });
                    }
                });
            });
        });
    </script>
    </body>

    </html>