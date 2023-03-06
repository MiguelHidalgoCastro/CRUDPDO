<div class="container-fluid box col-12">

    <div class="page-header mb-5 text-center">
        <h1>Listado de todos los retos</h1>
    </div>


    <div class=" container-fluid mb-3 col-xl-10 col-12">
        <form id="frm-filtro" action="?c=reto&a=filtrado" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 col-lg-3 mt-2">
                    <h5>Filtrar por Categoría:</h5>
                </div>
                <div class="col-md-12 col-lg-5 mt-2">
                    <select class="form-select" aria-label="Select de categorias" name="filtrado" id="filtrado">
                        <option value='0' selected>Todas las categorias</option>
                        <?php foreach ($categorias as $categoria) : ?>
                            <option value=<?php echo $categoria->id ?>>
                                <?php echo $categoria->nombre ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-12 col-lg-4 mt-2">
                    <button id="buscar" class="btn btn-secondary">BUSCAR</button>
                </div>
            </div>
        </form>
    </div>

    <!--Separados por categorias en tablas diferentes-->
    <div class="container-fluid col-xl-10 col-12">
        <div class="page-header mb-3 mt-5 text-center">
            <h3>Publicados</h3>
        </div>
        <?php foreach ($categorias as $categoria) : ?>
            <h4 class="h4 mb-2"><?php echo $categoria->nombre ?></h4>
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
                    <?php foreach ($this->listarPublicadosPorCategoria($categoria->id) as $r) : ?>
                        <tr>
                            <td><?php echo $r->nombre; ?></td>
                            <td><?php echo $this->getCategoria($r->idCategoria)->nombre; ?></td>
                            <td><?php echo $r->dirigido ?></td>
                            <td>
                                <a class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Consultar Reto" href="?c=reto&a=consultar&id=<?php echo $r->id; ?>"><em class="bi bi-search"></em></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    </div>
    <hr class="hr my-5" />
    <div class="container-fluid col-xl-10 col-12">
        <div class="page-header mb-3 text-center">
            <h3>No Publicados</h3>
        </div>
        <?php foreach ($categorias as $categoria) : ?>
            <h4 class="h4 mb-2"><?php echo $categoria->nombre ?></h4>
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
                    <?php foreach ($this->listarNoPublicadosPorCategoria($categoria->id) as $r) : ?>
                        <tr>
                            <td><?php echo $r->nombre; ?></td>
                            <td><?php echo $this->getCategoria($r->idCategoria)->nombre; ?></td>
                            <td><?php echo $r->dirigido ?></td>
                            <td>
                                <a class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Consultar Reto" href="?c=reto&a=consultar&id=<?php echo $r->id; ?>"><em class="bi bi-search"></em></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>

    </div>
    <!--Publicados, no se muestran-->
    <div class="page-header mb-3 d-none">
        <h3>Publicados</h3>
    </div>
    <table class="table table-striped table-hover text-center d-none" id="tabla">
        <thead class="table-dark">
            <tr>
                <th>Reto</th>
                <th>Categoría</th>
                <th>Dirigido</th>
                <th>Opciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->listarPublicados() as $r) : ?>
                <tr>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $this->getCategoria($r->idCategoria)->nombre; ?></td>
                    <td><?php echo $r->dirigido ?></td>
                    <td>
                        <a class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Consultar Reto" href="?c=reto&a=consultar&id=<?php echo $r->id; ?>"><em class="bi bi-search"></em></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!--Borradores, no se muestran, estan en display none-->
    <div class="page-header mb-3 d-none">
        <h3>No publicados</h3>
    </div>
    <table class="table table-striped table-hover text-center d-none" id="tabla">
        <thead class="table-dark">
            <tr>
                <th>Reto</th>
                <th>Categoría</th>
                <th>Dirigido</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->listarNoPublicados() as $r) : ?>
                <tr>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $this->getCategoria($r->idCategoria)->nombre; ?></td>
                    <td><?php echo $r->dirigido ?></td>
                    <td>
                        <a class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Consultar Reto" href="?c=reto&a=consultar&id=<?php echo $r->id; ?>"><em class="bi bi-search"></em></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



</div>
</body>

<script>
    /**
     * Es una función que validar los campos del reto para que estén rellenos
     */
    $(document).ready(function() {
        $("#frm-filtro").submit(function() {
            return $(this).validate();
        });
    })
</script>

</html>