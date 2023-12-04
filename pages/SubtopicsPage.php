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

                    <div class="card">
                        <div class="card-body">
                            <form class="form-fieldset" method="post" action="./query/subtema/addSubtema.php">
                                <div class="row">
                                    <h3 class="col text-2xl font-semibold leading-none tracking-tight">Añadir Subtemas</h3>
                                </div>
                                <hr class="m-1">
                                <!-- Agregando un campo oculto para almacenar el ID del tema -->
                                <input type="hidden" name="id_tema" value="<?php echo $id; ?>">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nombre del nuevo subtema</label>
                                        <input type="text" class="form-control" name="nuevoSubtema" id="exampleFormControlInput1" maxlength="30" required placeholder="Nuevo tema">
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
                                            $selSubtemas = $conn->query("SELECT * FROM subtemas WHERE id_tema = '$id'");
                                            while ($rowSubtemas = $selSubtemas->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $rowSubtemas['id_subtema'] ?></td>
                                                    <td><?php echo $rowSubtemas['nombre'] ?></td>
                                                    <td>
                                                        <a href="direcciones.php?page=ContentPage&id=<?php echo $rowSubtemas['id_subtema'] ?>" class="btn btn-primary">Ver contenido</a>
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

    <script>
        // modificar numero de items a mostrar
        new DataTable('#example');
    </script>

    <script>
        $(document).ready(function() {
            $('form.form-fieldset').submit(function(event) {
                event.preventDefault();
                var url = $(this).attr('action');
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Éxito',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function() {
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
</body>

</html>
