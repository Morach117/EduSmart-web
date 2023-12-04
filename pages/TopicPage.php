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
                            <h2 class="page-title">
                                <?php
                                // Obtiene el nombre de la materia
                                $selMateria = $conn->query("SELECT * FROM materias WHERE id_materia = '$id'");
                                $rowMateria = $selMateria->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <span class="text-uppercase">
                                    <?php echo $rowMateria['nombre_materia']; ?>
                                </span>
                            </h2>
                            <h1 class="page-pretitle">
                                Temas y subtemas
                            </h1>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                        <form class="form-fieldset" method="post" action="procesar_formulario.php">
    <div class="row">
        <h3 class="col text-2xl font-semibold leading-none tracking-tight">Añadir Temas</h3>
    </div>
    <hr class="m-1">
    <!-- Agrega un campo hidden para el ID de la materia -->
    <input type="hidden" name="id_materia" value="<?php echo $id; ?>">
    <div class="mb-3">
        <label for="unidadSelect" class="form-label">Unidad</label>
        <select class="form-select" name="unidad" id="unidadSelect" aria-label="Default select example" required>
            <option value="" selected disabled>Selecciona la unidad</option>
            <?php
            $selUnidades = $conn->query("SELECT * FROM unidades_tematicas WHERE id_materia = '$id'");
            while ($rowUnidades = $selUnidades->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?php echo $rowUnidades['id_unidad']; ?>">
                    <?php echo $rowUnidades['nombre_unidad']; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <div id="emailHelp" class="form-text">Selecciona la unidad a la que pertenece el tema nuevo.</div>
    </div>
    <div class="mb-3">
        <label for="nombreTema" class="form-label">Nombre del nuevo tema</label>
        <input type="text" class="form-control" id="nombreTema" name="nombre_tema" maxlength="30" required
            placeholder="Nuevo tema">
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


                            <div class="form-fieldset container text-center ">
                                <h3 class="col text-2xl font-semibold leading-none tracking-tight">Temas Actuales</h3>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col">Unidad</th>
                                                <th scope="col">Tema</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $selTemas = $conn->query("SELECT * FROM tema WHERE materia = '$id'");
                                            while ($rowTemas = $selTemas->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr class="">
                                                    <td scope="row">
                                                        <?php
                                                        $idUnidad = $rowTemas['id_unidad'];
                                                        $selUnidad = $conn->query("SELECT * FROM unidades_tematicas WHERE id_unidad = '$idUnidad'");
                                                        $rowUnidad = $selUnidad->fetch(PDO::FETCH_ASSOC);
                                                        echo $rowUnidad['nombre_unidad'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $rowTemas['nombre']; ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                        <button type="button" class="btn btn-danger btn-eliminar" data-bs-toggle="modal" data-bs-target="#modal-danger-topic-tema" data-id="<?php echo $rowTemas['id_tema']; ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M4 7h16" />
                                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                    <path d="M10 12l4 4m0 -4l-4 4" />
                                                                </svg>
                                                            </button>
                                                            <a href="direcciones.php?page=SubtopicsPage&id=<?php echo $rowTemas['id_tema'] ?>"
                                                                class="btn btn-link text-secondary text-decoration-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-list" width="24"
                                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <line x1="9" y1="6" x2="20" y2="6" />
                                                                    <line x1="9" y1="12" x2="20" y2="12" />
                                                                    <line x1="9" y1="18" x2="20" y2="18" />
                                                                    <line x1="5" y1="6" x2="5" y2="6.01" />
                                                                    <line x1="5" y1="12" x2="5" y2="12.01" />
                                                                    <line x1="5" y1="18" x2="5" y2="18.01" />
                                                                </svg>
                                                            </a>
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
    $(document).ready(function () {
        // Asignar el evento al formulario
        $('form').submit(function (e) {
            e.preventDefault();

            // Obtener los datos del formulario
            var formData = $(this).serialize();

            // Realizar la solicitud de inserción al servidor usando AJAX
            $.ajax({
                type: 'POST',
                url: './query/tema/addTema.php',
                data: formData,
                success: function (response) {
                    // Manejar la respuesta del servidor
                    Swal.fire({
                        icon: 'success',
                        title: 'Tema añadido correctamente',
                        showConfirmButton: false,
                        timer: 1500 // 1.5 segundos
                    }).then(function () {
                        // Recargar la página después de la alerta
                        location.reload();
                    });
                },
                error: function (error) {
                    console.error('Error en la solicitud AJAX:', error);
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
                var temaId = event.target.getAttribute('data-id');

                // Asignar el id de la unidad al botón de confirmación en el modal
                document.querySelector('#modal-danger-topic-tema .btn-danger').setAttribute('data-id', temaId);
            }
        });

        // Asignar el evento al botón de confirmación en el modal
        document.querySelector('#modal-danger-topic-tema .btn-danger').addEventListener('click', function () {
            // Obtener el id de la unidad desde el atributo data-id del botón
            var temaId = this.getAttribute('data-id');

            // Realizar la solicitud de eliminación al servidor (puedes usar fetch o jQuery.ajax)
            // Aquí se muestra un ejemplo usando fetch
            fetch('./query/tema/eliminar_tema.php?id=' + temaId, {
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
                        title: '¡Tema eliminado con éxito!',
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