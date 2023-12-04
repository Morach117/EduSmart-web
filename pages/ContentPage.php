<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insumos</title>
</head>

<body>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <?php
                // Verifica si se ha enviado el parámetro "id" a través de la URL
                if (isset($_GET['id'])) {
                    // Obtén el valor del parámetro "id"
                    $id = $_GET['id'];
                    ?>
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h1 class="page-pretitle">
                                Contenido temático
                            </h1>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                        <form class="form-fieldset" enctype="multipart/form-data" method="post" action="./query/contenido/addContenido.php">
    <div class="row">
        <h3 class="col text-2xl font-semibold leading-none tracking-tight">Añadir contenido temático</h3>
    </div>
    <hr class="m-1">

    <div class="row g-3">
        <div class="col mb-3">
            <div class="form-label">Tipo de Contenido:</div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_contenido" id="videoRadio" value="video">
                <label class="form-check-label" for="videoRadio">Video</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_contenido" id="infografiaRadio" value="infografia">
                <label class="form-check-label" for="infografiaRadio">Infografía</label>
            </div>
        </div>
        <div class="col mb-3" id="multimediaLinkContainer">
            <div class="form-label">Multimedia</div>
            <input type="text" class="form-control" name="multimedia_link" placeholder="YouTube Link" />
        </div>
        <div class="col mb-3" id="tituloContainer">
            <div class="form-label">Titulo:</div>
            <input type="hidden" name="id_subtema" value="<?php echo $id; ?>">
            <input type="text" class="form-control" name="titulo" id="titulo" />
        </div>
        <div class="col mb-3" id="archivoContainer" style="display: none;">
    <div class="form-label">Archivo:</div>
    <input type="file" name="nombre_archivo" class="form-control" multiple="multiple" accept=".pdf, .doc, .docx, .ppt, .pptx" />
</div>

    <div class="col form-group" id="descripcionArchivoContainer" style="display: none;">
        <label for="descripcionArchivo">Descripción del Archivo:</label>
        <textarea class="form-control" name="descripcion" id="descripcionArchivo" rows="2"></textarea>
    </div>
</div>

<div class="row g-3">
    <div class="col">
        <a href="direcciones.php?page=SubjectPage">Volver a la lista de materias</a>
    </div>
    <div class="col">
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Subir multimedia</button>
            <button type="reset" class="btn btn-danger ms-2">Cancelar</button>
        </div>
    </div>
</div>

</form>


                        </div>
                    </div>

                    <div class="form-fieldset">
                        <h3 class="col text-2xl font-semibold leading-none tracking-tight">Contenido Actual</h3>
                        <hr class="m-1">
                        <div class="table-responsive-xl">
                            <table class="table table-striped table-hover text-center" id="example">
                                <thead>
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Nombre archivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- obtiene el contenido actual de la base de datos -->
                                    <?php
                                    $selContenido = $conn->query("SELECT * FROM contenido_tematico WHERE id_subtema = '$id'");
                                    if ($selContenido->rowCount() > 0) {
                                        while ($rowContenido = $selContenido->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $rowContenido['titulo'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowContenido['descripcion'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowContenido['nombre_archivo'] ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="1">No hay contenido registrado</td>
                                            <td colspan="1">No hay contenido registrado</td>
                                            <td colspan="1">No hay contenido registrado</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <?php
                } else {
                    // si no hay id
                    ?>
                    <div class="page page-center">
                        <div class="container-tight py-4">
                            <div class="empty">
                                <div class="empty-header">404</div>
                                <p class="empty-title">Oops… No deberías estas aquí</p>
                                <p class="empty-subtitle text-muted">
                                </p>
                                <div class="empty-action">
                                    <a href="./." class="btn btn-primary">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M5 12l6 6" />
                                            <path d="M5 12l6 -6" />
                                        </svg>
                                        Take me home
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>


</body>
<script>
    // modificar numero de items a mostrar
    new DataTable('#example');

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var videoRadio = document.getElementById('videoRadio');
        var infografiaRadio = document.getElementById('infografiaRadio');
        var multimediaLinkContainer = document.getElementById('multimediaLinkContainer');
        var tituloContainer = document.getElementById('tituloContainer');
        var archivoContainer = document.getElementById('archivoContainer');
        var descripcionArchivoContainer = document.getElementById('descripcionArchivoContainer');

        function toggleElements() {
            if (videoRadio.checked) {
                multimediaLinkContainer.style.display = 'block';
                tituloContainer.style.display = 'block';
                archivoContainer.style.display = 'none';
                descripcionArchivoContainer.style.display = 'block';
            } else if (infografiaRadio.checked) {
                multimediaLinkContainer.style.display = 'none';
                tituloContainer.style.display = 'block';
                archivoContainer.style.display = 'block';
                descripcionArchivoContainer.style.display = 'block';
            }
        }

        toggleElements();

        videoRadio.addEventListener('change', toggleElements);
        infografiaRadio.addEventListener('change', toggleElements);
    });
</script>


<script>
    $(document).ready(function () {
        // Manejar el envío del formulario
        $('form.form-fieldset').submit(function (event) {
            // Evitar el envío tradicional del formulario
            event.preventDefault();

            // Obtener la URL del formulario
            var url = $(this).attr('action');

            // Obtener los datos del formulario
            var formData = new FormData(this);

            // Realizar la solicitud Ajax
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    // Mostrar la alerta SweetAlert según la respuesta
                    if (response.success) {
                        Swal.fire({
                            title: 'Éxito',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function () {
                            // Recargar la página
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function () {
                    // Mostrar una alerta en caso de error de Ajax
                    Swal.fire({
                        title: 'Error',
                        text: 'Error al procesar la solicitud',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>



</html>