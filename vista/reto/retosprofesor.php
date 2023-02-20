<div class="container box col-6">
    <h1 class="page-header">
        <h1 class="mb-3">Tus retos, <?php echo $profesor->nombre ?></h1>
    </h1>
    <table class="table table-striped table-hover text-center" id="tabla">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Reto</th>
                <th>Categoría</th>
                <th>Dirigido</th>
                <th>Opciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($retos as $r) : ?>
                <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $this->getCategoria($r->idCategoria)->nombre; ?></td>
                    <td><?php echo $r->dirigido ?></td>
                    <td>
                        <a class="btn btn-warning" href="?c=reto&a=mod&id=<?php echo $r->id; ?>&idProf=<?php echo $idProfesor; ?>&idCat=<?php echo $r->idCategoria; ?>">Modificar</a>
                        <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=reto&a=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>