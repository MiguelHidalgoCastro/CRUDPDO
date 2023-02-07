<div class="container box col-6">
    <div class="row mb-2">
        <div class="col-3 h-auto">
            <a class="nav-link btn btn-outline-success" href="?c=categoria&a=crud">Añadir Categoría</a>
        </div>

    </div>

    <table class="table  table-striped table-hover text-center " id="tabla">
        <thead class="table-dark">
            <tr>
                <th style="width:120px">ID</th>
                <th style="width:180px">Nombre Categoría</th>
                <th style="width:60px"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->listar() as $r) : ?>
                <tr>
                    <td class="mb-2"><?php echo $r->id; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td>
                        <a class="btn btn-warning me-2" href="?c=categoria&a=crud&id=<?php echo $r->id; ?>">Editar</a>
                        <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=categoria&a=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>

</html>