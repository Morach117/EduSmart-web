<!-- Modal para la creacion de una nueva materia -->
<div class="modal modal-blur fade" id="modal-subject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear nueva materia</h5>
            </div>
            <div class="modal-body">
                <!-- form para la creacion de la materia -->
                <div class="container">
                    <form id="formCrearMateria" enctype="multipart/form-data">
                        <!-- Agrega un input oculto para el id del docente -->
                        <input type="hidden" name="docenteId" id="docenteId"
                            value="<?php echo $selDocenteData['id_docente']; ?>">

                        <div class="row mb-4">
                            <div class="col">
                                <label for="name">Nombre de la materia</label>
                                <input type="text" class="form-control" maxlength="50" name="name" id="name"
                                    placeholder="Nombre de la materia" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="teacher">Portada de la materia</label>
                                <input type="file" class="form-control" name="cover" accept="image/*" id="cover"
                                    required>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container text-end">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnCargarMateria">Cargar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para la creacion de un nuevo alumno -->

<div class="modal modal-blur fade" id="modal-alumnos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-importar" method="post" action="./query/addCsv.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Importar Datos de Alumnos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dataCliente" class="form-label">Seleccionar archivo Excel</label>
                        <div class="custom-file">
                            <input type="file" name="dataCliente" id="file-input" class="custom-file-input">
                            <label class="custom-file-label" for="file-input">Elegir archivo</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Descargar plantilla:</p>
                        <a href="./files/Plantilla.csv" download="Plantilla.csv"
                            class="btn btn-outline-primary">Descargar Plantilla</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btn-importar" type="submit" class="btn btn-primary">Importar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal eliminar materia -->
<div class="modal modal-blur fade" id="modal-danger" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                    <path d="M12 9v4" />
                    <path d="M12 17h.01" />
                </svg>
                <h3>¿Estas seguro de eliminar esta materia?</h3>
                </h3>
                <div class="text-muted">No podrás revertir esta acción</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Cancelar
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                Eliminar
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-danger-unidad" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                    <path d="M12 9v4" />
                    <path d="M12 17h.01" />
                </svg>
                <h3>¿Estas seguro de eliminar esta unidad?</h3>
                </h3>
                <div class="text-muted">No podrás revertir esta acción</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Cancelar
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                Eliminar
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal para eliminar tema -->
<div class="modal modal-blur fade" id="modal-danger-topic-tema" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                    <path d="M12 9v4" />
                    <path d="M12 17h.01" />
                </svg>
                <h3>¿Estas seguro de eliminar este tema?</h3>
                </h3>
                <div class="text-muted">No podrás revertir esta acción</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Cancelar
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                Eliminar
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal para eliminar pregunta -->
<div class="modal modal-blur fade" id="modal-danger-question" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                    <path d="M12 9v4" />
                    <path d="M12 17h.01" />
                </svg>
                <h3>¿Estás seguro de eliminar esta pregunta?</h3>
                <div class="text-muted">No podrás revertir esta acción</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Cancelar
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-danger w-100" id="btnEliminarPregunta" data-bs-dismiss="modal">
                                Eliminar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal para editar unidad -->
<div class="modal fade" id="modalEditarUnidad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar detalles de la unidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarUnidad" method="post" action="procesar_edicion_unidad.php">
                    <input type="hidden" id="unidadId" name="unidadId" value="">
                    <div class="mb-3">
                        <label for="editNombreUnidad" class="form-label">Nombre de la Unidad</label>
                        <input type="text" class="form-control" id="editNombreUnidad" name="editNombreUnidad" required>
                    </div>
                    <!-- Agrega más campos según sea necesario -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal para editar unidad -->
<div class="modal fade" id="editquestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar detalles de la pregunta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-fieldset p-5" id="editQuestionForm">
                    <!-- Agrega un campo oculto para almacenar el ID de la pregunta -->
                    <input type="hidden" name="preguntaId" id="preguntaId">

                    <div class="row">
                        <h3 class="col text-2xl font-semibold leading-none tracking-tight"></h3>
                    </div>
                    <div class="row g-3">
                        <div class="col mb-3">
                            <label for="Enunciado" class="form-label">Enunciado</label>
                            <input type="text" maxlength="100" class="form-control" name="Enunciado" required
                                id="editEnunciado" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Enunciado de la pregunta</small>
                        </div>
                        <div class="col mb-3">
                            <label for="time" class="form-label">Tiempo de respuesta (en minutos)</label>
                            <input type="text" class="form-control" name="time" id="editTime" aria-describedby="helpId"
                                required placeholder="">
                            <small id="helpId" class="form-text text-muted">Tiempo que tiene el alumno para
                                responder</small>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col mb-3">
                            <label for="a" class="form-label">Inciso a</label>
                            <input type="text" class="form-control" name="a" id="editA" aria-describedby="helpId" required
                                placeholder="">
                            <small id="helpId" class="form-text text-muted">Inciso a</small>
                        </div>
                        <div class="col mb-3">
                            <label for="b" class="form-label">Inciso b</label>
                            <input type="text" class="form-control" name="b" id="editB" aria-describedby="helpId" required
                                placeholder="">
                            <small id="helpId" class="form-text text-muted">Inciso b</small>
                        </div>
                        <div class="col mb-3">
                            <label for="c" class="form-label">Inciso c</label>
                            <input type="text" class="form-control" name="c" id="editC" aria-describedby="helpId" required
                                placeholder="">
                            <small id="helpId" class="form-text text-muted">Inciso c</small>
                        </div>
                        <div class="col mb-3">
                            <label for="d" class="form-label">Inciso d</label>
                            <input type="text" class="form-control" name="d" id="editD" aria-describedby="helpId" required
                                placeholder="">
                            <small id="helpId" class="form-text text-muted">Inciso d</small>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col mb-3">
                            <label for="respuesta" class="form-label">Respuesta</label>
                            <input type="text" class="form-control" name="respuesta" id="editRespuesta" aria-describedby="helpId" required
                                placeholder="">
                            <small id="helpId" class="form-text text-muted">Respuesta</small>
                        </div>
                        <div class="col mb-3">
                            <label for="multimedia" class="form-label">Multimedia (opcional)</label>
                            <input type="file" class="form-control" name="multimedia" id="editMultimedia" aria-describedby="helpId"
                                placeholder="">
                            <small id="helpId" class="form-text text-muted">Imagen, video o audio</small>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <!-- <a href="direcciones.php?page=ShowExams"> Ver a la lista de exámenes </a> -->
                        </div>
                        <div class="col">
                            <div class="text-end">
                                
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                                <button type="button" class="btn btn-danger ms-2" data-bs-dismiss="modal">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade modal-blur" data-bs-backdrop="static" id="modal-equipos" tabindex="-1" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Gestionar equipos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="form-fieldset">
                        <div class="row">
                            <h3 class="col text-2xl font-semibold leading-none tracking-tight"></h3>
                        </div>
                        <div class="row g-3">
                            <div class="col mb-3">
                                <label for="nombre" class="form-label">Nombre del equipo</label>
                                <input type="text" maxlength="100" class="form-control" name="nombre" required
                                    id="nombre" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="col mb-3">
                                <label for="time" class="form-label">Numero de integrantes</label>
                                <input type="number" class="form-control" name="time" id="time"
                                    aria-describedby="helpId" required placeholder="">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        Subir examen
                                    </button>
                                    <button type="reset" class="btn btn-danger ms-2">
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <h4>Alumnos Disponibles</h4>
                        <div class="table-responsive">
                            <table id="alumnos-table" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Matricula</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th class="text-center">Seleccionar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $selAlumno = $conn->query("SELECT * FROM alumnos ORDER BY id_alumno");
                                    if ($selAlumno->rowCount() > 0) {
                                        while ($selAlumnoRow = $selAlumno->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $selAlumnoRow['matricula'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $selAlumnoRow['nombre'] ?>
                                                </td>
                                                <td>
                                                    <?php $Apellidos = $selAlumnoRow['app'] . " " . $selAlumnoRow['apm'];
                                                    echo $Apellidos ?>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name="" id="">
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "No hay alumnos registrados.";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-blur fade" id="modal-danger-examen" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                    <path d="M12 9v4" />
                    <path d="M12 17h.01" />
                </svg>
                <h3>¿Estas seguro de eliminar esta materia?</h3>
                </h3>
                <div class="text-muted">No podrás revertir esta acción</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Cancelar
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                Eliminar
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    new DataTable('#alumnos-table');
</script>
<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>
<script>
    var copyButtons = document.getElementsByClassName("copy-button");
    for (var i = 0; i < copyButtons.length; i++) {
        copyButtons[i].addEventListener("click", function () {
            var valueToCopy = this.getAttribute("data-value");
            document.getElementById("unidad").value = valueToCopy;
        });
    }
</script>