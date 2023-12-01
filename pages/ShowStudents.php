<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <!-- cabecera de la card donde iran botones para expotar el csv de la tabla y para agregar un nuevo alumno -->
                <div class="card-header">
                    <div class="page-tittle col">
                        <h2 class="page-tittle-text">Lista de alumnos</h2>
                    </div>
                    <div class="text-end col">
                        <button data-bs-toggle="modal" data-bs-target="#modal-team" class="btn btn-primary">Subir nueva
                            lista</button>
                        <!-- <a href="index.php?page=AddStudent" class="btn btn-primary">Agregar nueva lista</a> -->
                        <a href="index.php?page=ExportStudents" class="btn btn-primary">Exportar CSV</a>
                    </div>
                </div>
                <!-- tabla donde se mostraran los alumnos -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="example">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selProspecto = $conn->query("SELECT * FROM alumnos ORDER BY id_alumno ASC");
                            if ($selProspecto->rowCount() > 0) {
                                $i = 1;
                                while ($selProspectoRow = $selProspecto->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $selProspectoRow['matricula']; ?>
                                        </td>
                                        <td>
                                            <?php echo $selProspectoRow['nombre']; ?>
                                        </td>
                                        <td>
                                            <?php $apellidos = $selProspectoRow['app'] . " " . $selProspectoRow['apm'];
                                            echo $apellidos ?>
                                        </td>
                                        <td>
                                            <?php echo $selProspectoRow['telefono']; ?>
                                        </td>
                                        <td>
                                            <?php echo $selProspectoRow['correo']; ?>
                                        </td>
                                        <td>
                                            <!-- Opción para visualizar información extra del alumno -->
                                            <a href="index.php?page=ViewStudent&id=<?php echo $selProspectoRow['id_alumno']; ?>"
                                                class="btn btn-primary btn-sm">Ver</a>
                                            <a href="index.php?page=ViewStudent&id=<?php echo $selProspectoRow['id_alumno']; ?>"
                                                class="btn btn-primary btn-sm">Editar</a>
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

    <script>
        new DataTable('#example');
    </script>