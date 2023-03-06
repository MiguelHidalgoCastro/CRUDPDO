<div class="container box col-10 shadow p-4 mb-5 rounded">
    <h1>Crear Reto</h1>
    <form id="frm-reto" action="?c=reto&a=guardar" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="form-group col-5 mb-2">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre reto" required>
            </div>
            <div class="form-group col-5 mb-2">
                <label>Dirigido A:</label>
                <input type="text" name="dirigido" class="form-control" placeholder="Ingrese cursos" required>
            </div>
            <div class="form-group col-2 mb-2">
                <label>Publicar</label>
                <select class="form-select" aria-label="Select de publicar" name='publicar'>
                    <option value="1">Publicar Reto</option>
                    <option value="0" selected>Guardar Borrador</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-5 form-group">
                <label for="idCat">Categoría</label>
                <select class="form-select" aria-label="Select de categorias" name="idCat">
                    <option selected disabled hidden>---Selecciona---</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value=<?php echo $categoria->id ?>><?php echo $categoria->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-5 me-2 mx-2">
                <div class="row">
                    <h2>Fecha Inscripciones:</h2>
                </div>
                <div class="row form-group">
                    <label>Inicio</label>
                    <input type="date" name="fechaInicioInscripcion" class="form-control" required>
                </div>
                <div class="row form-group">
                    <label>Fin</label>
                    <input type="date" name="fechaFinInscripcion" class="form-control" required>
                </div>
            </div>
            <div class="col-5 me-2 mx-2">
                <div class="row">
                    <h2>Fecha Reto:</h2>
                </div>
                <div class="row form-group">
                    <label>Inicio</label>
                    <input type="datetime-local" name="fechaInicioReto" class="form-control" required>
                </div>
                <div class="row form-group">
                    <label>Fin</label>
                    <input type="datetime-local" name="fechaFinReto" class="form-control" required>
                </div>
            </div>
            <div class="col-1"></div>
        </div>

        <div class="row">
            <div class="col-12 form-group">
                <label for="descripcion">Descripcion del Reto</label>
                <textarea class="form-control" name="descripcion" rows="6"></textarea>
            </div>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-primary btn-lg mt-4 text-uppercase">Añadir</button>
        </div>
    </form>
</div>
</body>
<script>
    /**
     * Es una función que validar los campos del reto para que estén rellenos
     */
    $(document).ready(function() {
        $("#frm-reto").submit(function() {
            return $(this).validate();
        });
    })
</script>
</html>