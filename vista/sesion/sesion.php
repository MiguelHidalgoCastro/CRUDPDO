<div class="container-fluid">
    <div class="page-header mb-5 text-center">
        <h1>Inicio Sesion</h1>
    </div>

    <div class="container-fluid mb-3 col-lg-4 col-md-12">
        <form id="frm-sesion" action="?c=sesion&a=iniciarsesion" method="post" enctype="multipart/form-data">

            <div class="form-group w-100 mb-2">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control" placeholder="example@email.com" required>
            </div>
            <div class="form-group mb-2">
                <label>Contraseña</label>
                <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
            </div>

            <div class="row w-50 float-end">
                <button type="submit" class="btn btn-secondary mt-4 text-uppercase">Iniciar Sesion</button>
            </div>
        </form>
    </div>


</div>
</body>
<script>
    $(document).ready(function() {
        $("#frm-sesion").submit(function() {
            return $(this).validate();
        });
    })
</script>

</html>