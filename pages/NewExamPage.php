<body>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h1 class="page-title">
                            Crear nuevo examen
                        </h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form class="form-fieldset p-5" id="formSubirExamen">
                                <input type="hidden" name="id_docente" value="<?php echo $selDocenteData['id_docente']; ?>">
                                <div class="row">
                                    <h3 class="col text-2xl font-semibold leading-none tracking-tight"></h3>
                                    <a class="col text-end cursor-pointer" data-bs-toggle="modal"
                                        data-bs-target="#modal-unidades">Ver unidades</a>
                                </div>
                                <hr class="m-1">
                                <div class="row g-3">
                                    <div class="col mb-3">
                                        <label for="materia" class="form-label">Materias</label>
                                        <select class="form-select form-select-md" name="materia" id="materia" onchange="cargarUnidades()">
                                            <option selected>Abrir menu de materias</option>
                                            <?php
                                            $selMaterias = $conn->query("SELECT * FROM materias WHERE id_docente = '$docenteId'");
                                            while ($rowMaterias = $selMaterias->fetch(PDO::FETCH_ASSOC)) {
                                                $idMateria = $rowMaterias['id_materia'];
                                                $nombreMateria = $rowMaterias['nombre_materia'];
                                                echo "<option value='$idMateria'>$nombreMateria</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="unidad" class="form-label">Unidad</label>
                                        <select class="form-select form-select-md" name="unidad" id="unidad">
                                            <option selected>Abrir menu de unidades</option>
                                            <!-- Las opciones de unidades se cargarán dinámicamente mediante JavaScript -->
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col mb-3">
                                        <label for="" class="form-label">Tipo de examen</label>
                                        <select class="form-select form-select-md" name="tipo" id="tipo">
                                            <option selected>Abrir menu</option>
                                            <option value="equipo">Equipo</option>
                                            <option value="individual">Individual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col mb-3">
                                        <div class="mb-3">
                                            <label for="fecha" class="form-label">Fecha</label>
                                            <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="helpId">
                                            <small id="helpId" class="form-text text-muted">Seleccione la fecha del examen</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <a href="direcciones.php?page=ShowExams"> Ver a la lista de exámenes </a>
                                    </div>
                                    <div class="col">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary" id="btnSubirExamen">
                                                Subir examen
                                            </button>
                                            <button type="reset" class="btn btn-danger ms-2">
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
        </div>
    </div>


    <script>
        // modificar numero de items a mostrar
        new DataTable('#units');

    </script>

    <script>
        function cargarUnidades() {
            var materiaSelect = document.getElementById('materia');
            var unidadSelect = document.getElementById('unidad');

            // Obtener el valor seleccionado en el primer select (Materias)
            var idMateriaSeleccionada = materiaSelect.value;

            // Realizar una solicitud AJAX para obtener las unidades de la materia seleccionada
            // Aquí deberías adaptar el código para realizar la consulta a tu base de datos y obtener las unidades

            // Ejemplo de cómo podrías hacer la solicitud AJAX con JavaScript puro (sin jQuery)
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Limpiar el contenido actual del segundo select (Unidad)
                    unidadSelect.innerHTML = '<option selected>Abrir menu de unidades</option>';

                    // Parsear la respuesta JSON (deberías ajustar la estructura según tu respuesta)
                    var unidades = JSON.parse(xhr.responseText);

                    // Iterar sobre las unidades y agregarlas al segundo select
                    for (var i = 0; i < unidades.length; i++) {
                        var idUnidad = unidades[i].id_unidad;
                        var nombreUnidad = unidades[i].nombre_unidad;
                        unidadSelect.innerHTML += "<option value='" + idUnidad + "'>" + nombreUnidad + "</option>";
                    }
                }
            };

            // Configurar y enviar la solicitud AJAX
            xhr.open('GET', './query/examen/obtener_unidades.php?id_materia=' + idMateriaSeleccionada, true);
            xhr.send();
        }
    </script>

    <script>
        $(document).ready(function () {
            // Manejar clic en el botón "Subir examen"
            $("#btnSubirExamen").click(function (e) {
                // Prevenir el envío del formulario predeterminado
                e.preventDefault();

                // Crear un objeto FormData para enviar datos del formulario
                var formData = new FormData($("#formSubirExamen")[0]);

                // Realizar una solicitud AJAX
                $.ajax({
                    url: './query/examen/addExamen.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Manejar la respuesta del servidor
                        var result = JSON.parse(response);

                        if (result.success) {
                            // Mostrar SweetAlert con un mensaje de éxito
                            Swal.fire({
                                icon: 'success',
                                title: 'Examen subido exitosamente',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                // Redireccionar a la página de lista de exámenes
                                window.location.href = 'direcciones.php?page=ShowExams';
                            });
                        } else {
                            // Mostrar SweetAlert con un mensaje de error
                            Swal.fire({
                                icon: 'error',
                                title: 'Error al subir el examen',
                                text: result.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function () {
                        // Mostrar SweetAlert con un mensaje de error en caso de fallo
                        Swal.fire({
                            icon: 'error',
                            title: 'Error en la solicitud AJAX',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });
        });
    </script>

