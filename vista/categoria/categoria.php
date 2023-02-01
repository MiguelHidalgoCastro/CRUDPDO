
<div class="container box col-6">
    <table class="table  table-striped table-hover text-center " id="tabla">
        <thead>
            <tr>
                <th style="width:120px; background-color:gray; color:white">ID</th>
                <th style="width:180px; background-color:gray; color:white">Nombre Categoría</th>
                <th style="width:60px; background-color:gray; color:white">Editar</th>
                <th style="width:60px; background-color:gray; color:white">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->listar() as $r) : ?>
                <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td>
                        <a class="btn btn-warning" href="?c=categoria&a=crud&id=<?php echo $r->id; ?>">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=categoria&a=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </body>

    </html>