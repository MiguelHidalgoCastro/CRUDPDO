<div class="container-fluid box col-12">
    <div class="row mb-2">
        <div class="col-md-8 col-lg-2 h-auto">
            <a class="nav-link btn btn-outline-success" href="?c=categoria&a=crud">Añadir Categoría</a>
        </div>

    </div>

    <table class="table  table-striped table-hover text-center " id="tabla">
        <thead class="table-dark">
            <tr>
                <th>Nombre Categoría</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->listar() as $r) : ?>
                <tr>
                    <td><?php echo $r->nombre; ?></td>
                    <td>
                        <a class="btn btn-warning me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar Categoria" href="?c=categoria&a=crud&id=<?php echo $r->id; ?>"><em class="bi bi-pencil"></em></a>
                        <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar Reto" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=categoria&a=eliminar&id=<?php echo $r->id; ?>"><em class="bi bi-trash3"></em></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>

</html>