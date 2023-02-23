<div class="container-fluid box col-12">
    <div class="page-header mb-3">
        <h1>Tus retos, <?php echo $profesor->nombre ?></h1>
    </div>
    <!--Publicados-->
    <div class="page-header mb-3">
        <h3>Publicados</h3>
    </div>
    <table class="table table-striped table-hover text-center" id="tabla">
        <thead class="table-dark">
            <tr>
                <th>Reto</th>
                <th>Categoría</th>
                <th>Dirigido</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retosPublicados as $r) : ?>
                <tr>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $this->getCategoria($r->idCategoria)->nombre; ?></td>
                    <td><?php echo $r->dirigido ?></td>
                    <td>
                        <a class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar Reto" href="?c=reto&a=mod&id=<?php echo $r->id; ?>&idProf=<?php echo $idProfesor; ?>&idCat=<?php echo $r->idCategoria; ?>"><em class="bi bi-pencil"></em></a>
                        <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar Reto" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=reto&a=eliminar&id=<?php echo $r->id; ?>"><em class="bi bi-trash3"></em></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!--Guardados en Borrador-->
    <div class="page-header mb-3">
        <h3>No publicados</h3>
    </div>
    <table class="table table-striped table-hover text-center" id="tabla">
        <thead class="table-dark">
            <tr>
                <th>Reto</th>
                <th>Categoría</th>
                <th>Dirigido</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($retosBorrador as $r) : ?>
                <tr>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $this->getCategoria($r->idCategoria)->nombre; ?></td>
                    <td><?php echo $r->dirigido ?></td>
                    <td>
                        <a class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Publicar Reto"><em class="bi bi-clipboard-check"></em></a>
                        <a class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar Reto" href="?c=reto&a=mod&id=<?php echo $r->id; ?>&idProf=<?php echo $idProfesor; ?>&idCat=<?php echo $r->idCategoria; ?>"><em class="bi bi-pencil"></em></a>
                        <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar Reto" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=reto&a=eliminar&id=<?php echo $r->id; ?>"><em class="bi bi-trash3"></em></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>

</html>