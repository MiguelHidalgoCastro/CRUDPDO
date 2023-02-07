<div class="container box col-6">

    <div class="container-fluid mb-3">
        <div class="row">

            <div class="col">
                <h5>Filtrar por Categoría:</h5>
            </div>
            <div class="col">
                <select class="form-select" aria-label="Select de categorias" name="filtrado" id="filtrado" onchange="filtrado()">
                    <option value='0' selected>Todas las categorias</option>

                    <?php foreach ($categorias as $categoria) : ?>
                        <option value=<?php echo $categoria->id ?>><?php echo $categoria->nombre ?></option>
                    <?php endforeach; ?>


                </select>
            </div>

        </div>
    </div>

    <table class="table table-striped table-hover text-center" id="tabla">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Reto</th>
                <th>Categoría</th>
                <th>Opciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->listar() as $r) : ?>
                <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $this->getCategoria($r->idCategoria)->nombre; ?></td>
                    <td>
                        <a class="btn btn-secondary" href="?c=reto&a=consultar&id=<?php echo $r->id; ?>">Consultar</a>
                        <a class="btn btn-warning" href="?c=reto&a=mod&id=<?php echo $r->id; ?>">Modificar</a>
                        <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=reto&a=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
<script>
    function filtrado() {
        console.log($('#filtrado option:selected').text())
    }
</script>

</html>