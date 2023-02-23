<div class="container box col-6">
    <div class="page-header mb-3">
        <h1><?php echo $categoria->id != null ? $categoria->nombre : 'Nuevo Registro'; ?></h1>
    </div>
    <form id="frm-categoria" action="?c=categoria&a=guardar" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $categoria->id; ?>" />

        <div class="form-group mb-2">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $categoria->nombre; ?>" class="form-control" placeholder="Ingrese nombre categoria" required>
        </div>

        <div class="text-right">
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