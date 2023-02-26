<div class="container-fluid">
    <div class="page-header mb-5 text-center">
        <h1>Crear Usuario</h1>
    </div>

    <div class="container-fluid mb-3 col-md-12 col-lg-4">
        <form id="frm-adduser" action="?c=sesion&a=adduser" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre y Apellidos" required>
            </div>
            <div class="form-group mb-2">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control" placeholder="example@email.com" required>
            </div>
            <div class="form-group mb-2">
                <label>Contraseña</label>
                <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
            </div>

            <div class="row w-50 float-end">
                <button type="submit" class="btn btn-primary mt-4 text-uppercase">Añadir Usuario</button>
            </div>
        </form>
    </div>


</div>
</body>
<script>
    $(document).ready(function() {
        $("#frm-adduser").submit(function() {
            return $(this).validate();
        });
    })
</script>

</html>