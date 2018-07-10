<?php include "partials/head.php"; ?>

<div class="container">
    <div class="row my-3">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Editar usuario</h3>
                </div>
                <form id="editar" method="POST">
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $datos['id'];?>">
                    <input type="hidden" name="direccion_id" value="<?= $datos['direccion_id'];?>">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre..." class="form-control" value="<?= $datos['nombre'];?>">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Apellido..." class="form-control" value="<?= $datos['apellido'];?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email..." class="form-control" value="<?= $datos['email'];?>">
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="number" name="edad" id="edad" placeholder="Edad..." class="form-control" value="<?= $datos['edad'];?>">
                    </div>
                    <div class="form-group">
                        <label for="calle">Calle</label>
                        <input type="text" name="calle" id="calle" placeholder="Calle..." class="form-control" value="<?= $datos['calle'];?>">
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad..." class="form-control" value="<?= $datos['ciudad'];?>">
                    </div>
                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <input type="text" name="provincia" id="provincia" placeholder="Provincia..." class="form-control" value="<?= $datos['provincia'];?>">
                    </div>
                    <div class="form-group">
                        <label for="pais">País</label>
                        <input type="text" name="pais" id="pais" placeholder="País..." class="form-control" value="<?= $datos['pais'];?>">
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Actualizar datos" class="btn btn-primary btn-block">
                    <a href="/" class="btn btn-danger btn-block">Cancelar</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "partials/footer.php"; ?>