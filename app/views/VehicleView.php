<?php include_once '___header.php'; ?>

    <script>
        $(document).ready(function () {
            var table003 = $('#tableVehicles').DataTable({
                responsive: true,
            });
        });
    </script>

    <section id="get-a-quote" class="get-a-quote">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12">
                    <?php if (isset($data['displayAllVehicles'])) { ?>
                        <table id="tableVehicles" class="display" style="width:100%">
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Descripción</th>
                                <th>No. Circulación</th>
                                <th>No. Licencia</th>
                                <th>Matricula</th>
                                <th>Acciones</th>
                            </tr>
                            <?php foreach ($data['vehicles'] as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['modelo']; ?></td>
                                    <td><?php echo $value['marca']; ?></td>
                                    <td><?php echo $value['descripcion']; ?></td>
                                    <td><?php echo $value['no_circulacion']; ?></td>
                                    <td><?php echo $value['no_licencia']; ?></td>
                                    <td><?php echo $value['matricula']; ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-icon" title="Editar" href="<?php echo BASE_URL_ROUTE ?>vehicle/edit/<?php echo $value['id']; ?>">
                                            <i class="fa fa-pen-to-square" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-danger btn-icon" title="Eliminar" href="<?php echo BASE_URL_ROUTE ?>vehicle/delete/<?php echo $value['id']; ?>">
                                            <i class="fa fa-trash-can" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } elseif (isset($data['createVehicle']) || isset($data['editVehicle'])) { ?>
                        <form id="formUser" action="<?php echo BASE_URL_ROUTE ?><?php echo isset($data['createVehicle']) ? 'registerVehicle' : 'editVehicle'; ?>" method="POST" class="php-email-form">
                        <h3>Registrar vehiculo</h3>
                            <?php
                            if (isset($data['editVehicle'])) {
                                ?>
                                <input type="hidden" name="id_vehicle" value="<?php echo $data['info_vehicle']['id']; ?>" />
                                <?php
                            }
                            ?>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="modelo" class="form-control" id="modelo" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['modelo'];} ?>" placeholder="Modelo" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="marca" class="form-control" id="marca" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['marca'];} ?>" placeholder="Marca" />
                                </div>
                                <div class="col-md-6">
                                    <input type="textarea" name="descripcion" class="form-control" id="descripcion" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['descripcion'];} ?>" placeholder="Descripción" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="no_circulacion" class="form-control" id="no_circulacion" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['no_circulacion'];} ?>" placeholder="No. Circulacion" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="no_licencia" class="form-control" id="no_licencia" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['no_licencia'];} ?>" placeholder="No. Licencia" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="matricula" class="form-control" id="matricula" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['matricula'];} ?>" placeholder="Matricula" />
                                </div>
                                
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="action" class="btn btn-primary btn-block"><?php echo isset($data['createVehicle']) ? 'Registro' : 'Editar'; ?></button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            console.log("Hola");
        });
    </script>
<?php include_once '___footer.php'; ?>