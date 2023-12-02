
<div class="modal modal-blur fade" id="modal-subject" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Crear nueva materia</h5>
            </div>
            <div class="modal-body">
              <!-- form para la creacion de la materia -->
              <div class="container">
                <form action="./" method="POST">
                  <div class="row mb-4">
                    <div class="col">
                      <label for="name">Nombre de la materia</label>
                      <input type="text" class="form-control" maxlength="20" name="name" id="name"
                        placeholder="Nombre de la materia" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="teacher">Portada de la materia</label>
                      <input type="file" class="form-control" name="cover" size="220kb" accept="image/*" id="cover"
                        required>
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="container text-end">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Cargar</button>
              </div>
            </div>
          </div>
        </div>
      </div>

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
                        <a href="./Plantilla.csv" download="Plantilla.csv" class="btn btn-outline-primary">Descargar Plantilla</a>
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