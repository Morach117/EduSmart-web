<body>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $selMateria = $conn->query("SELECT * FROM materias WHERE id_materia = '$id'");
                    $rowMateria = $selMateria->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                <span class="text-uppercase">
                                    <?php echo $rowMateria['nombre_materia']; ?>
                                </span>
                            </h2>
                            <h1 class="page-pretitle">
                                Unidades temáticas
                            </h1>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form class="form-fieldset" action="./query/unidad/add_unidad.php?id=<?php echo $id ?>" method="post">
                                <div class="row">
                                    <h3 class="col text-2xl font-semibold leading-none tracking-tight">Añadir unidad</h3>
                                    <a href="direcciones.php?page=TopicPage&id=<?php echo $id ?>" class="col text-end link-primary"> Añadir tema </a>
                                </div>
                                <hr class="m-1">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nombre la nueva unidad</label>
                                        <input type="text" class="form-control" name="unidad" id="exampleFormControlInput1" maxlength="30" required placeholder="Nuevo tema">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a href="direcciones.php?page=SubjectPage"> Volver a la lista de materias </a>
                                    </div>
                                    <div class="col text-end">
                                        <button type="submit" class="btn btn-primary">Añadir</button>
                                        <button type="reset" class="btn btn-danger">Cancelar</button>
                                    </div>
                                </div>
                            </form>

                            <div class="form-fieldset">
                                <h3 class="col text-2xl font-semibold leading-none tracking-tight">Unidades actuales</h3>
                                <hr class="m-1">
                                <div class="table-responsive-xl">
                                    <table class="table table-striped table-hover text-center" id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre de la unidad</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $selUnidades = $conn->query("SELECT * FROM unidades_tematicas WHERE id_materia = '$id'");
                                            while ($rowUnidades = $selUnidades->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr class="">
                                                    <td scope="row">
                                                        <?php echo $rowUnidades['nombre_unidad'] ?>
                                                    </td>
                                                    <td scope="row">
                                                        <div class="btn-group gap-2" role="group" aria-label="Basic example">
                                                            <button type="button" class="btn btn-primary btn-editar" 
                                                                data-id="<?php echo $rowUnidades['id_unidad']; ?>"
                                                                data-bs-toggle="modal" data-bs-target="#modalEditarUnidad">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                                    <path d="M13.5 6.5l4 4" />
                                                                </svg>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#modal-danger-unidad" data-id="<?php echo $rowUnidades['id_unidad']; ?>">
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
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="page page-center">
                        <div class="container-tight py-4">
                            <div class="empty">
                                <div class="empty-header">404</div>
                                <p class="empty-title">Oops… No deberías estar aquí</p>
                                <p class="empty-subtitle text-muted">
                                </p>
                                <div class="empty-action">
                                    <a href="./." class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M5 12l6 6" />
                                            <path d="M5 12l6 -6" />
                                        </svg>
                                        Llévame a casa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

<script>
    // modificar numero de items a mostrar
    new DataTable('#example');

</script>

<!-- Script de Ajax -->
<script>
$(document).ready(function() {
    // Captura el envío del formulario
    $('form.form-fieldset').submit(function(event) {
        // Evita el envío tradicional del formulario
        event.preventDefault();

        // Obtiene la URL del formulario
        var url = $(this).attr('action');

        // Obtiene los datos del formulario
        var formData = $(this).serialize();

        // Realiza la solicitud Ajax
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            success: function(response) {
                // Muestra la alerta SweetAlert según la respuesta
                if (response.success) {
                    Swal.fire({
                        title: 'Éxito',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        // Recarga la página
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
            error: function() {
                // Muestra una alerta en caso de error de Ajax
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Asignar el evento a un contenedor existente (por ejemplo, el cuerpo de la tabla)
    var tableBody = document.getElementById('example').getElementsByTagName('tbody')[0];

    // Usar un selector para filtrar los clics a los botones de edición
    tableBody.addEventListener('click', function (event) {
        if (event.target.classList.contains('btn-editar')) {
            var unidadId = event.target.getAttribute('data-id');

            // Realizar una llamada AJAX para obtener los detalles de la unidad
            fetch('./query/unidad/obtener_detalle_unidad.php?id=' + unidadId)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    // Llenar el formulario de edición con los datos obtenidos
                    document.getElementById('editNombreUnidad').value = data.nombre_unidad;
                    // Agrega más campos según sea necesario
                    document.getElementById('unidadId').value = unidadId;

                    // Abre el modal
                    $('#modalEditarUnidad').modal('show');
                })
                .catch(function (error) {
                    console.error('Error al obtener detalles de la unidad:', error);
                });
        }
    });
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var formEditarUnidad = document.getElementById('formEditarUnidad');

        formEditarUnidad.addEventListener('submit', function (e) {
            e.preventDefault();

            // Obtener solo los campos necesarios del formulario
            var nombreUnidad = document.getElementById('editNombreUnidad').value;

            // Crear un objeto FormData solo con los campos necesarios
            var formData = new FormData();
            formData.append('unidadId', document.getElementById('unidadId').value);
            formData.append('editNombreUnidad', nombreUnidad);

            fetch('./query/unidad/actualizar_unidad.php', {
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
                            title: '¡Unidad actualizada con éxito!',
                            showConfirmButton: false,
                            timer: 1000 // 1 segundo
                        }).then(() => {
                            $('#modalEditarUnidad').modal('hide');
                            // Puedes recargar la tabla u otras acciones necesarias

                            // Recargar la página después de 1 segundo
                            setTimeout(function () {
                                location.reload();
                            }, 500);
                        });
                    } else {
                        alert('Error al actualizar la unidad');
                    }
                })
                .catch(function (error) {
                    console.error('Error al actualizar la unidad:', error);
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
                var unidadId = event.target.getAttribute('data-id');

                // Asignar el id de la unidad al botón de confirmación en el modal
                document.querySelector('#modal-danger-unidad .btn-danger').setAttribute('data-id', unidadId);
            }
        });

        // Asignar el evento al botón de confirmación en el modal
        document.querySelector('#modal-danger-unidad .btn-danger').addEventListener('click', function () {
            // Obtener el id de la unidad desde el atributo data-id del botón
            var unidadId = this.getAttribute('data-id');

            // Realizar la solicitud de eliminación al servidor (puedes usar fetch o jQuery.ajax)
            // Aquí se muestra un ejemplo usando fetch
            fetch('./query/unidad/eliminar_unidad.php?id=' + unidadId, {
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
                        title: '¡Unidad eliminada con éxito!',
                        showConfirmButton: false,
                        timer: 1000 // 1 segundo
                    }).then(() => {
                        // Recargar la página después de 1 segundo
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    });
                } else {
                    alert('Error al eliminar la unidad');
                }
            })
            .catch(function(error) {
                console.error('Error al eliminar la unidad:', error);
            });
        });
    });
</script>






</html>