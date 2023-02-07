<div class="container box col-6">
    <h1 class="page-header">
        <?php echo $reto->nombre ?>
    </h1>
    <form id="frm-categoria" action="?c=reto&a=guardar" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $reto->id; ?>" />
        <div class="row mb-3">
            <div class="form-group col-5 mb-2">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre reto" value="<?php echo $reto->nombre ?>" required>
            </div>
            <div class="form-group col-5 mb-2">
                <label>Dirigido A:</label>
                <input type="text" name="dirigido" class="form-control" placeholder="Ingrese cursos" value="<?php echo $reto->dirigido ?>" required>
            </div>
            <div class="form-group col-2 mb-2">
                <label>Publicar</label>
                <select class="form-select" aria-label="Select de publicar" name='publicar'>
                    <option selected disabled hidden>---Selecciona---</option>
                    <?php if ($reto->publicado == 1) {
                        echo '
                    <option value="0" >Publicar Reto</option>
                    <option value="1" selected>Guardar Borrador</option>
                    ';
                    }

                    if ($reto->publicado == 0) {
                        echo '
                    <option value="0" selected>Publicar Reto</option>
                    <option value="1">Guardar Borrador</option>
                    ';
                    }

                    ?>
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
            <div class="col-5 form-group">
                <label for="idProf">Profesor</label>
                <select class="form-select" aria-label="Select de profesores" name="idProf">
                    <option selected disabled hidden>---Selecciona---</option>

                    <?php foreach ($profesores as $profesor) : ?>
                        <option value=<?php echo $profesor->id ?>><?php echo $profesor->nombre ?></option>
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
                    <input type="date" name="fechaInicioInscripcion" class="form-control" value="<?php echo $reto->fechaInicioInscripcion ?>" required>
                </div>
                <div class="row form-group">
                    <label>Fin</label>
                    <input type="date" name="fechaFinInscripcion" class="form-control" value="<?php echo $reto->fechaFinInscripcion ?>" required>
                </div>
            </div>
            <div class="col-5 me-2 mx-2">
                <div class="row">
                    <h2>Fecha Reto:</h2>
                </div>
                <div class="row form-group">
                    <label>Inicio</label>
                    <input type="datetime-local" name="fechaInicioReto" class="form-control" value="<?php echo $reto->fechaInicioReto ?>" required>
                </div>
                <div class="row form-group">
                    <label>Fin</label>
                    <input type="datetime-local" name="fechaFinReto" class="form-control" value="<?php echo $reto->fechaFinReto ?>" required>
                </div>
            </div>
            <div class="col-1"></div>
        </div>

        <div class="row">
            <div class="col-12 form-group">
                <label for="descripcion">Descripcion del Reto</label>
                <textarea class="form-control" name="descripcion" rows="6"><?php echo $reto->descripcion ?></textarea>
            </div>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-primary btn-lg mt-4 text-uppercase">Añadir</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#frm-categoria").submit(function() {
            return $(this).validate();
        });
        //console.log($("idCat").attr('id'))
    })
</script>