<div class="container box col-6">
    <h1 class="page-header">
        <?php echo $reto->nombre ?>
    </h1>
    <!--&idProf=&idCat="-->
    <form id="frm-mod" action="?c=reto&a=guardar" method="post" enctype="multipart/form-data">
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
                    <?php if ($reto->publicado == 0) {
                        echo '
                    <option value="0" selected>Guardar Borrador</option>
                    <option value="1" >Publicar Reto</option>
                    ';
                    }

                    if ($reto->publicado == 1) {
                        echo '
                    <option value="0">Guardar Borrador</option>
                    <option value="1" selected>Publicar Reto</option>
                    ';
                    }

                    ?>
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
            <input type="hidden" name="idProf" value="<?php echo $_GET['idProf']; ?>">
            <input type="hidden" name="idCat" value="<?php echo $_GET['idCat']; ?>">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-warning btn-lg mt-4 text-uppercase">Modificar</button>
        </div>
    </form>
</div>
</body>
<script>
    $(document).ready(function() {
        $("#frm-categoria").submit(function() {
            return $(this).validate();
        });
    })
</script>
</html>