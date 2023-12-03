<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <div class="page-tittle col">
                        <h2 class="page-tittle-text">Lista de alumnos</h2>
                    </div>
                    <div class="text-end col">
                        <button data-bs-toggle="modal" data-bs-target="#modal-alumnos" class="btn btn-primary">Subir
                            nueva lista</button>
                        <a href="index.php?page=ExportStudents" class="btn btn-primary">Exportar CSV</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="example">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selAlumno = $conn->query("SELECT * FROM alumnos ORDER BY id_alumno ASC");
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
                                            <?php echo $selAlumnoRow['app'] . " " . $selAlumnoRow['apm']; ?>
                                        </td>
                                        <td>
                                            <?php echo $selAlumnoRow['telefono']; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalVerAlumno<?php echo $selAlumnoRow['id_alumno']; ?>">
                                                Ver
                                            </button>
                                            <button type="button" class="btn btn-primary btn-sm btn-editar"
                                                data-bs-toggle="modal" data-bs-target="#modalEditarAlumno"
                                                data-id="<?php echo $selAlumnoRow['id_alumno']; ?>">
                                                Editar
                                            </button>

                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    $selAlumno = $conn->query("SELECT * FROM alumnos ORDER BY id_alumno ASC");
    if ($selAlumno->rowCount() > 0) {
        while ($selAlumnoRow = $selAlumno->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="modal fade" id="modalVerAlumno<?php echo $selAlumnoRow['id_alumno']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalles del alumno</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Matrícula:</strong>
                                <?php echo $selAlumnoRow['matricula']; ?>
                            </p>
                            <p><strong>Nombre:</strong>
                                <?php echo $selAlumnoRow['nombre']; ?>
                            </p>
                            <p><strong>Apellidos:</strong>
                                <?php echo $selAlumnoRow['app'] . " " . $selAlumnoRow['apm']; ?>
                            </p>
                            <p><strong>Correo:</strong>
                                <?php echo $selAlumnoRow['correo']; ?>
                            </p>
                            <p><strong>Teléfono:</strong>
                                <?php echo $selAlumnoRow['telefono']; ?>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>

    <div class="modal fade" id="modalEditarAlumno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar detalles del alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarAlumno">
                        <input type="hidden" id="alumnoId" name="alumnoId" value="">
                        <div class="mb-3">
                            <label for="editNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editNombre" name="editNombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="editApp" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="editApp" name="editApp" required>
                        </div>
                        <div class="mb-3">
                            <label for="editApm" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="editApm" name="editApm" required>
                        </div>
                        <div class="mb-3">
                            <label for="editTelefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="editTelefono" name="editTelefono" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Asignar el evento a un contenedor existente (el cuerpo de la tabla)
            var tableBody = document.getElementById('example').getElementsByTagName('tbody')[0];

            // Usar un selector para filtrar los clics a los botones de edición
            tableBody.addEventListener('click', function (event) {
                if (event.target.classList.contains('btn-editar')) {
                    var alumnoId = event.target.getAttribute('data-id');

                    // Realizar una llamada AJAX para obtener los detalles del alumno
                    fetch('./query/alumnos/obtener_detalle_alumno.php?id=' + alumnoId)
                        .then(function (response) {
                            return response.json();
                        })
                        .then(function (data) {
                            // Llenar el formulario de edición con los datos obtenidos
                            document.getElementById('editNombre').value = data.nombre;
                            document.getElementById('editApp').value = data.app;
                            document.getElementById('editApm').value = data.apm;
                            document.getElementById('editTelefono').value = data.telefono;
                            document.getElementById('alumnoId').value = alumnoId;
                        })
                        .catch(function (error) {
                            console.error('Error al obtener detalles del alumno:', error);
                        });
                }
            });
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var formEditarAlumno = document.getElementById('formEditarAlumno');

            formEditarAlumno.addEventListener('submit', function (e) {
                e.preventDefault();

                // Obtener solo los campos necesarios del formulario
                var nombre = document.getElementById('editNombre').value;
                var app = document.getElementById('editApp').value;
                var apm = document.getElementById('editApm').value;
                var telefono = document.getElementById('editTelefono').value;

                // Crear un objeto FormData solo con los campos necesarios
                var formData = new FormData();
                formData.append('alumnoId', document.getElementById('alumnoId').value);
                formData.append('editNombre', nombre);
                formData.append('editApp', app);
                formData.append('editApm', apm);
                formData.append('editTelefono', telefono);

                fetch('./query/alumnos/actualizar_alumno.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        if (data.success) {
                            // Actualización exitosa, puedes cerrar el modal o realizar otras acciones necesarias
                            Swal.fire({
                                icon: 'success',
                                title: '¡Alumno actualizado con éxito!',
                                showConfirmButton: false,
                                timer: 1000 // 1 segundo
                            }).then(() => {
                                $('#modalEditarAlumno').modal('hide');
                                // Puedes recargar la tabla u otras acciones necesarias

                                // Recargar la página después de 1 segundo
                                setTimeout(function () {
                                    location.reload();
                                }, 500);
                            });
                        } else {
                            alert('Error al actualizar el alumno');
                        }
                    })
                    .catch(function (error) {
                        console.error('Error al actualizar el alumno:', error);
                    });
            });
        });
    </script>





    <script>
        new DataTable('#example');
    </script>
    </body>

    </html>