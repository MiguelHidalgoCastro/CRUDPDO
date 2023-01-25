<nav class="navbar navbar-dark bg-dark navbar-expand-lg mb-5">
    <a class="navbar-brand" href="#">CRUD PDO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=categoria&a=Crud">Agregar</a>
            </li>
        </ul>
    </div>
</nav>

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
            <?php foreach ($this->modelo->Listar() as $r) : ?>
                <tr>
                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td>
                        <a class="btn btn-warning" href="?c=categoria&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=categoria&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </body>

    </html>