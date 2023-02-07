<div class="container box col-6">
    <h1 class="page-header">
        <?php echo $reto->nombre?>
    </h1>
    <form id="frm-categoria" action="?c=reto&a=guardar" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $reto->id; ?>" />

        <div class="form-group mb-2">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $reto->nombre; ?>" class="form-control" placeholder="Ingrese nombre reto" required>
        </div>
        <div class="form-group mb-2">
            <label>Dirigido A:</label>
            <input type="text" name="nombre" value="<?php echo $reto->dirigido; ?>" class="form-control" placeholder="Ingrese nombre reto" required>
        </div>
        <div class="form-group mb-2">
            <h2>Fecha Inscripciones:</h2>
            <label>Inicio</label>
            <input type="date" name="nombre" value="<?php echo $reto->fechaInicioInscripcion; ?>" class="form-control" placeholder="Ingrese nombre reto" required>
            <label>Fin</label>
            <input type="date" name="nombre" value="<?php echo $reto->fechaFinInscripcion; ?>" class="form-control" placeholder="Ingrese nombre reto" required>

        </div>
        <div class="form-group mb-2">
            <h2>Fecha Reto:</h2>
            <label>Inicio</label>
            <input type="datetime-local" name="nombre" value="<?php echo $reto->fechaInicioReto; ?>" class="form-control" placeholder="Ingrese nombre reto" required>
            <label>Fin</label>
            <input type="datetime-local" name="nombre" value="<?php echo $reto->fechaFinReto; ?>" class="form-control" placeholder="Ingrese nombre reto" required>

        </div>
        <div class="form-group mb-2">
            <label>Publicado</label>
            <input type="text" name="nombre" value="<?php echo $reto->publicado; ?>" class="form-control" placeholder="Ingrese nombre reto" required>
            <!--Radio Buttons-->
        </div>
        <div class="form-group mb-2">
            <label>Dirigido A:</label>
            <input type="text" name="nombre" value="<?php echo $reto->dirigido; ?>" class="form-control" placeholder="Ingrese nombre reto" required>
        </div>
        <div class="form-group mb-2">
            <label>Descripcion</label>
            <textarea id="" cols="30" rows="3"><?php echo $reto->descripcion; ?></textarea>
        </div>
        <!--CATEGORIA Y PROFESOR-->

        <div class="text-right mt-4">
            <button class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#frm-categoria").submit(function() {
            return $(this).validate();
        });
    })
</script>