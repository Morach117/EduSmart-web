<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Materias Actuales
                        </h2>
                        <div class="text-muted mt-1">
                            <?php
                            $docenteId = $selDocenteData['id_docente'];

                            $selMaterias = $conn->query("SELECT COUNT(*) AS total FROM materias WHERE id_docente = '$docenteId'");
                            $rowMaterias = $selMaterias->fetch(PDO::FETCH_ASSOC);
                            echo $rowMaterias['total'];
                            echo ($rowMaterias['total'] == 1) ? " materia" : " materias";
                            ?>
                        </div>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <button data-bs-toggle="modal" data-bs-target="#modal-subject" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Nueva materia
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <?php
                    $docenteId = $selDocenteData['id_docente'];
                    $selMaterias = $conn->query("SELECT * FROM materias WHERE id_docente = '$docenteId'");
                    if ($selMaterias->rowCount() == 0) {
                        echo "<div class='col-12'><div class='alert alert-important alert-danger'>No hay materias registradas</div></div>";
                    } else {
                        while ($rowMaterias = $selMaterias->fetch(PDO::FETCH_ASSOC)) {
                            $idMateria = $rowMaterias['id_materia']
                                ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end text-warning">
                                        <button data-bs-toggle="modal" data-id="<?php echo $rowMateria['id_materia'] ?>"
                                            data-bs-target="#modal-danger" class="btn btn-link a text-center" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="card-body p-4 text-center">
                                        <span class="cursor-pointer avatar avatar-xl mb-3 rounded"
                                            style="background-image: url(./files/uploads/<?php echo $rowMaterias['img'] ?>)"></span>
                                        <h3 class="m-0 mb-1">
                                            <a>
                                                <?php echo $rowMaterias['nombre_materia'] ?>
                                            </a>
                                        </h3>
                                    </div>

                                    <div class="d-flex">
                                        <?php
                                        // verifica en la base de datos si existen unidades para esta materia
                                        $selUnidades = $conn->query("SELECT * FROM unidades_tematicas WHERE id_materia = '$idMateria'");
                                        if ($selUnidades->rowCount() > 0) {
                                            ?>
                                            <a href="direcciones.php?page=TopicPage&id=<?php echo $rowMaterias['id_materia']; ?>"
                                                class=" card-btn">
                                                Gestionar temas
                                            </a>
                                            <?php
                                        }
                                        ?>
                                        <a href="direcciones.php?page=UnitPage&id=<?php echo $rowMaterias['id_materia']; ?>"
                                            class=" card-btn">
                                            Gestionar unidades
                                        </a>
                                        <!-- <a href="direcciones.php?page=ContentPage&id=<?php echo $rowMaterias['id_materia']; ?>"
                                                class="card-btn">
                                                Gestionar contenido
                                            </a> -->
                                    </div>

                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Manejar clic en el botón "Cargar"
            $("#btnCargarMateria").click(function () {
                // Crear un objeto FormData para enviar datos del formulario
                var formData = new FormData($("#formCrearMateria")[0]);

                // Realizar una solicitud AJAX
                $.ajax({
                    url: './query/materia/add_materia.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Manejar la respuesta del servidor
                        console.log(response);

                        // Mostrar SweetAlert con un mensaje
                        Swal.fire({
                            icon: 'success',
                            title: 'Materia cargada con éxito',
                            showConfirmButton: false,
                            timer: 500, // 0.5 segundos
                        }).then(() => {
                            // Cerrar el modal o realizar otras acciones según sea necesario
                            $('#modal-subject').modal('hide');

                            // Recargar la página después de mostrar SweetAlert
                            location.reload(true); // Usa true para forzar una recarga desde el servidor
                        });
                    },
                    error: function (error) {
                        // Manejar errores
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>

</html>