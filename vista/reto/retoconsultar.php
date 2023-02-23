<div class="container box col-10 shadow p-4 mb-5 rounded">
    <div class="row mb-3">
        <h1><?php echo $reto->nombre ?></h1>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label>Para los grupos de:</label>
            <input type="text" value="<?php echo $reto->dirigido ?>" readonly>
        </div>
        <div class="col">
            <label>Categoría:</label>
            <input type="text" value="<?php echo $categoria->nombre ?>" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <legend>Inscripciones</legend>
        <div class="col">
            <label>Empieza:</label>
            <input type="text" value="<?php echo $reto->fechaInicioInscripcion ?>" readonly>
        </div>
        <div class="col">
            <label>Finaliza:</label>
            <input type="text" value="<?php echo $reto->fechaFinInscripcion ?>" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <legend>Fechas Reto</legend>
        <div class="col">
            <label>Empieza:</label>
            <input type="text" value="<?php echo $reto->fechaInicioReto ?>" readonly>
        </div>
        <div class="col">
            <label>Finaliza:</label>
            <input type="text" value="<?php echo $reto->fechaFinReto ?>" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label>Descripción</label>
        <textarea name="" id="" rows="8" readonly><?php echo $reto->descripcion ?></textarea>
    </div>

    <button class="btn btn-secondary" id="btnAtras">ATRÁS</button>
    <button class="btn btn-success" id="btnAtras">INSCRIBIR GRUPO</button>
</div>
</body>
<script>
    /**
     * Es una función que validar los campos del reto para que estén rellenos
     */
    $(document).ready(function() {
        $("#btnAtras").click(function() {
            history.back()
        })
    })
</script>

</html>