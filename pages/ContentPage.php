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
                            <form class="form-fieldset">
                                <div class="row">
                                    <h3 class="col text-2xl font-semibold leading-none tracking-tight">Añadir contenido
                                        temático</h3>
                                </div>
                                <hr class="m-1">
                                <div class="row g-3">
                                    <div class="col mb-3">
                                        <div class="form-label">Multimedia</div>
                                        <input type="text" class="form-control" placeholder="YouTube Link" />
                                    </div>
                                    <div class="col form-group">
                                        <label htmlFor="descripcion">Descripción:</label>
                                        <textarea class="form-control" id="descripcion" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col mb-3">
                                        <div class="form-label">Multimedia</div>
                                        <input type="file" class="form-control" multiple="multiple" />
                                    </div>
                                    <div class="col form-group">
                                        <label htmlFor="descripcion">Descripción:</label>
                                        <textarea class="form-control" id="descripcion" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row g-3 ps-2">
                                    <div class="list-group col">
                                        <div class="file-list list-group list-group-numbered">
                                        </div>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <a href="direcciones.php?page=SubjectPage"> Volver a la lista de materias </a>
                                    </div>
                                    <div class="col">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">
                                                Subir multimedia
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

</html>