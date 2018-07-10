<?php include('partials/head.php');?>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Lista de Usuarios</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Edad</th>
                                <th>Calle</th>
                                <th>Ciudad</th>
                                <th>Provincia</th>
                                <th>País</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <form id="agregar" method="POST">
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="text" name="nombre" id="nombre" placeholder="Nombre..." class="form-control form-control-sm">
                                    </td>
                                    <td>
                                        <input type="text" name="apellido" id="apellido" placeholder="Apellido..." class="form-control form-control-sm">
                                    </td>
                                    <td>
                                        <input type="email" name="email" id="email" placeholder="Email..." class="form-control form-control-sm">
                                    </td>
                                    <td>
                                        <input type="number" name="edad" id="edad" placeholder="Edad..." class="form-control form-control-sm">
                                    </td>
                                    <td>
                                        <input type="text" name="calle" id="calle" placeholder="Calle..." class="form-control form-control-sm">
                                    </td>
                                    <td>
                                        <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad..." class="form-control form-control-sm">
                                    </td>
                                    <td>
                                        <input type="text" name="provincia" id="provincia" placeholder="Provincia..." class="form-control form-control-sm">
                                    </td>
                                    <td>
                                        <input type="text" name="pais" id="pais" placeholder="País..." class="form-control form-control-sm">
                                    </td>
                                    <td colspan="2">
                                        <input type="submit" value="Enviar" class="btn btn-primary btn-sm btn-block">
                                    </td>
                                </tr>
                            </form>
                        </tfoot>
                        <tbody>
                        <?php foreach ($datos as $i => $dato) { ?>
                            <tr>
                                <td><?= $i + 1;?></td>
                                <td><?= $dato['nombre'];?></td>
                                <td><?= $dato['apellido'];?></td>
                                <td><?= $dato['email'];?></td>
                                <td><?= $dato['edad'];?></td>
                                <td><?= $dato['calle'];?></td>
                                <td><?= $dato['ciudad'];?></td>
                                <td><?= $dato['provincia'];?></td>
                                <td><?= $dato['pais'];?></td>
                                <td>
                                    <a href="app/edit/<?= $dato['id'];?>" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form class="delete" method="POST">
                                        <input type="hidden" name="id" value="<?= $dato['id'];?>">
                                        <input type="hidden" name="direccion_id" value="<?= $dato['direccion_id'];?>">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('partials/footer.php');?>