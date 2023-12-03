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

<!-- modal para eliminar tema -->
<div class="modal modal-blur fade" id="modal-danger-topic" data-bs-backdrop="static" tabindex="-1" role="dialog"
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

<!-- Modal para ver las unidades -->
<div class="modal fade" id="modal-unidades" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Lista de unidades</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="units" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Unidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selUnidades = $conn->query("SELECT * FROM unidades_tematicas");
                        while ($rowUnidades = $selUnidades->fetch(PDO::FETCH_ASSOC)) {
                            $idUnidad = $rowUnidades['id_unidad'];
                            $nombreUnidad = $rowUnidades['nombre_unidad'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $nombreUnidad ?>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" data-bs-dismiss="modal" data-value="<?php echo $idUnidad ?>"
                                            class="copy-button btn btn-outline-primary">Copiar</button>
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