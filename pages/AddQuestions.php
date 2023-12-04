<?php
// obtiene el id del examen
$idExamen = $_GET["id"];
// obtiene el id de la materia
$selExamen = $conn->query(
    "SELECT * FROM examenes WHERE id_examen = '$idExamen'"
);
$rowExamen = $selExamen->fetch(PDO::FETCH_ASSOC);
?>

    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h1 class="page-title">
                            Agregar preguntas
                        </h1>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                    <form class="form-fieldset p-5">
    <div class="row">
        <h3 class="col text-2xl font-semibold leading-none tracking-tight"></h3>
    </div>
    <div class="row g-3">
        <div class="col mb-3">
            <input type="hidden" name="id_unidad" value="<?php echo $rowExamen[
                "id_unidad"
            ]; ?>">
            <input type="hidden" name="id_examen" value="<?php echo $idExamen; ?>">

            <label for="Enunciado" class="form-label">Enunciado</label>
            <input type="text" maxlength="100" class="form-control" name="Enunciado" required id="Enunciado"
                aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Enunciado de la pregunta</small>
        </div>
        <div class="col mb-3">
            <label for="time" class="form-label">Tiempo de respuesta (en minutos)</label>
            <input type="text" class="form-control" name="time" id="time" aria-describedby="helpId" required
                placeholder="">
            <small id="helpId" class="form-text text-muted">Tiempo que tiene el alumno para responder</small>
        </div>
    </div>
    <div class="row g-3">
        <div class="col mb-3">
            <label for="a" class="form-label">Inciso a</label>
            <input type="text" class="form-control" name="a" id="a" aria-describedby="helpId" required placeholder="">
            <small id="helpId" class="form-text text-muted">Inciso a</small>
        </div>
        <div class="col mb-3">
            <label for="b" class="form-label">Inciso b</label>
            <input type="text" class="form-control" name="b" id="b" aria-describedby="helpId" required placeholder="">
            <small id="helpId" class="form-text text-muted">Inciso b</small>
        </div>
        <div class="col mb-3">
            <label for="c" class="form-label">Inciso c</label>
            <input type="text" class="form-control" name="c" id="c" aria-describedby="helpId" required placeholder="">
            <small id="helpId" class="form-text text-muted">Inciso c</small>
        </div>
        <div class="col mb-3">
            <label for="d" class="form-label">Inciso d</label>
            <input type="text" class="form-control" name="d" id="d" aria-describedby="helpId" required placeholder="">
            <small id="helpId" class="form-text text-muted">Inciso d</small>
        </div>
    </div>
    <div class="row g-3">
        <div class="col mb-3">
            <label for="" class="form-label">Respuesta</label>
            <select class="form-select" name="respuesta" id="respuesta">
                <option value="" selected>Seleccionar respuesta</option>
            </select>
            <small id="helpId" class="form-text text-muted">Respuesta</small>
        </div>
        <div class="col mb-3">
            <label for="multimedia" class="form-label">Multimedia (opcional)</label>
            <input type="file" class="form-control" name="multimedia" id="multimedia" aria-describedby="helpId"
                placeholder="">
            <small id="helpId" class="form-text text-muted">Imagen, video o audio</small>
        </div>
    </div>
    <div class="row g-3">
        <div class="col">
            <a href="direcciones.php?page=ShowExams"> Ver a la lista de exámenes </a>
        </div>
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
</form>
                        <div class="form-fieldset">
                            <h3 class="col text-2xl font-semibold leading-none tracking-tight">Preguntas actuales</h3>
                            <hr class="m-1">
                            <div class="table-responsive-xl">
                                <table class="table table-striped table-hover text-center" id="example">
                                    <thead>
                                        <tr>
                                            <th scope="col">Enunciado</th>
                                            <th scope="col">Tiempo</th>
                                            <th scope="col">Respuesta</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $selPreguntas = $conn->query(
                                            "SELECT * FROM preguntas WHERE id_examen = '$idExamen'"
                                        );
                                        while (
                                            $rowPreguntas = $selPreguntas->fetch(
                                                PDO::FETCH_ASSOC
                                            )
                                        ) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $rowPreguntas[
                                                        "enunciado"
                                                    ]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowPreguntas[
                                                        "tiempo_respuesta"
                                                    ]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowPreguntas[
                                                        "respuesta"
                                                    ]; ?>
                                                </td>
                                                <td scope="row">
                                                        <div class="btn-group gap-2" role="group" aria-label="Basic example">
                                                            <!-- <button type="button" class="btn btn-primary btn-editar" 
                                                                data-id="<?php echo $rowPreguntas[
                                                                    "id_pregunta"
                                                                ]; ?>"
                                                                data-bs-toggle="modal" data-bs-target="#editquestion">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                                    <path d="M13.5 6.5l4 4" />
                                                                </svg>
                                                            </button> -->
                                                            <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#modal-danger-question" data-id="<?php echo $rowPreguntas[
                                                                "id_pregunta"
                                                            ]; ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M4 7h16" />
                                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                    <path d="M10 12l4 4m0 -4l-4 4" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                            </tr>
                                            <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // modificar numero de items a mostrar
        new DataTable('#example');

    </script>

<script>
    $(document).ready(function () {
        $('input[name^="a"]').on('input', function () {
            actualizarRespuestas();
        });

        $('input[name^="b"]').on('input', function () {
            actualizarRespuestas();
        });

        $('input[name^="c"]').on('input', function () {
            actualizarRespuestas();
        });

        $('input[name^="d"]').on('input', function () {
            actualizarRespuestas();
        });
    });

    function actualizarRespuestas() {
        var respuestasA = obtenerRespuestasIngresadas('a');
        var respuestasB = obtenerRespuestasIngresadas('b');
        var respuestasC = obtenerRespuestasIngresadas('c');
        var respuestasD = obtenerRespuestasIngresadas('d');

        var respuestasTotales = [...respuestasA, ...respuestasB, ...respuestasC, ...respuestasD];

        llenarSelectRespuestas(respuestasTotales);
    }

    function obtenerRespuestasIngresadas(inciso) {
        var respuestas = [];
        $('input[name^="' + inciso + '"]').each(function () {
            var respuesta = $(this).val();
            if (respuesta.trim() !== '') {
                respuestas.push(respuesta);
            }
        });
        return respuestas;
    }

    function llenarSelectRespuestas(respuestas) {
        var selectRespuesta = $('#respuesta');
        selectRespuesta.empty();
        respuestas.forEach(function (respuesta) {
            selectRespuesta.append('<option value="' + respuesta + '">' + respuesta + '</option>');
        });
        selectRespuesta.append('<option value="" selected>Seleccionar respuesta</option>');
    }
</script>

<script>
    $(document).ready(function () {
        // Maneja el envío del formulario al hacer clic en el botón "Subir examen"
        $('form').submit(function (e) {
            e.preventDefault();

            // Serializa los datos del formulario
            var formData = new FormData(this);

            // Envía la solicitud AJAX al archivo insertar_pregunta.php
            $.ajax({
                type: 'POST',
                url: './query/preguntas/insertar_pregunta.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Analiza la respuesta JSON
                    var result = JSON.parse(response);

                    // Muestra una alerta de SweetAlert según el estado de la respuesta
                    if (result.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: result.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            // Recargar la página después de 1.5 segundos
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: result.message
                        });
                    }
                },
                error: function () {
                    // Muestra un mensaje de error en caso de problemas con la solicitud AJAX
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al enviar la solicitud AJAX'
                    });
                }
            });
        });

    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Asignar el evento a un contenedor existente (por ejemplo, el cuerpo de la tabla)
        var tableBody = document.getElementById('example').getElementsByTagName('tbody')[0];

        // Usar un selector para filtrar los clics a los botones de eliminación
        tableBody.addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-eliminar')) {
                var preguntaId = event.target.getAttribute('data-id');

                // Asignar el id de la pregunta al botón de confirmación en el modal
                var confirmButton = document.querySelector('#modal-danger-question .btn-danger');
                confirmButton.setAttribute('data-id', preguntaId);
                confirmButton.addEventListener('click', function () {
                    eliminarPregunta(preguntaId);
                });
            }
        });
    });

    function eliminarPregunta(preguntaId) {
        // Realizar la solicitud de eliminación al servidor (puedes usar fetch o jQuery.ajax)
        // Aquí se muestra un ejemplo usando fetch
        fetch('./query/preguntas/eliminar_pregunta.php?id=' + preguntaId, {
            method: 'GET'
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.success) {
                // Eliminación exitosa, puedes recargar la página o realizar otras acciones necesarias
                Swal.fire({
                    icon: 'success',
                    title: '¡Pregunta eliminada con éxito!',
                    showConfirmButton: false,
                    timer: 1000 // 1 segundo
                }).then(() => {
                    // Recargar la página después de 1 segundo
                    setTimeout(function () {
                        location.reload();
                    }, 500);
                });
            } else {
                alert('Error al eliminar la pregunta');
            }
        })
        .catch(function(error) {
            console.error('Error al eliminar la pregunta:', error);
        });
    }
</script>



<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Asignar el evento a un contenedor existente (el cuerpo de la tabla)
        var tableBody = document.getElementById('example').getElementsByTagName('tbody')[0];

        // Usar un selector para filtrar los clics a los botones de edición
        tableBody.addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-editar')) {
                var preguntaId = event.target.getAttribute('data-id');

                // Realizar una llamada AJAX para obtener los detalles de la pregunta
                fetch('./query/preguntas/obtener_detalle_pregunta.php?id=' + preguntaId)
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        // Llenar el formulario de edición con los datos obtenidos
                        document.getElementById('editEnunciado').value = data.enunciado;
                        document.getElementById('editTime').value = data.tiempo_respuesta;
                        document.getElementById('editA').value = data.inciso_a;
                        document.getElementById('editB').value = data.inciso_b;
                        document.getElementById('editC').value = data.inciso_c;
                        document.getElementById('editD').value = data.inciso_d;
                        document.getElementById('editRespuesta').value = data.respuesta;
                        document.getElementById('preguntaId').value = preguntaId;
                    })
                    .catch(function (error) {
                        console.error('Error al obtener detalles de la pregunta:', error);
                    });
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var formEditarPregunta = document.getElementById('formEditarPregunta');

        formEditarPregunta.addEventListener('submit', function (e) {
            e.preventDefault();

            // Obtener solo los campos necesarios del formulario
            var enunciado = document.getElementById('editEnunciado').value;
            var tiempoRespuesta = document.getElementById('editTime').value;
            var incisoA = document.getElementById('editA').value;
            var incisoB = document.getElementById('editB').value;
            var incisoC = document.getElementById('editC').value;
            var incisoD = document.getElementById('editD').value;
            var respuesta = document.getElementById('editRespuesta').value;

            // Crear un objeto FormData solo con los campos necesarios
            var formData = new FormData();
            formData.append('preguntaId', document.getElementById('preguntaId').value);
            formData.append('editEnunciado', enunciado);
            formData.append('editTime', tiempoRespuesta);
            formData.append('editA', incisoA);
            formData.append('editB', incisoB);
            formData.append('editC', incisoC);
            formData.append('editD', incisoD);
            formData.append('editRespuesta', respuesta);

            fetch('./query/preguntas/actualizar_pregunta.php', {
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
                            title: '¡Pregunta actualizada con éxito!',
                            showConfirmButton: false,
                            timer: 1000 // 1 segundo
                        }).then(() => {
                            $('#editquestion').modal('hide');
                            // Puedes recargar la tabla u otras acciones necesarias

                            // Recargar la página después de 1 segundo
                            setTimeout(function () {
                                location.reload();
                            }, 500);
                        });
                    } else {
                        alert('Error al actualizar la pregunta');
                    }
                })
                .catch(function (error) {
                    console.error('Error al actualizar la pregunta:', error);
                });
        });
    });
</script> -->





</body>

</html>