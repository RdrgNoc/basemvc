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
                        <table id="tableVehicles" class="display table table-hover" style="width:100%;" >
                            <thead class="TituloTabla" >
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
                            </thead>
                                    <tbody class="CuerpoTabla">
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
                                        <a class="badge text-bg-light" title="Editar" href="<?php echo BASE_URL_ROUTE ?>vehicle/edit/<?php echo $value['id']; ?>">
                                            <i class="fa fa-pen-to-square"></i>
                                        </a>
                                        <a class="badge text-bg-light" title="Eliminar" href="<?php echo BASE_URL_ROUTE ?>vehicle/delete/<?php echo $value['id']; ?>">
                                            <i class="fa fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                                    </tbody>
                            <tfoot class="TituloTabla">
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
                            </tfoot>
                        </table>
                    <?php } elseif (isset($data['createVehicle']) || isset($data['editVehicle'])) { ?>
                        <div class="row">
                            <div class="">
                            <form id="formUser" action="<?php echo BASE_URL_ROUTE ?><?php echo isset($data['createVehicle']) ? 'registerVehicle' : 'editVehicle'; ?>" method="POST" class="php-email-form sborder-0 shadow col-md-10 offset-md-1" style="background: rgba(179, 219, 221, 0.2);">
                            <div class="panel panel-default p-sm-2">
                            <div class="panel-heading text-center" id="titulos">
                                <h3 id="titulos">Registrar nuevo vehículo</h3>
                                <hr>
                            </div>
                            <br>
                                <?php
                                if (isset($data['editVehicle'])) {
                                    ?>
                                    <input type="hidden" name="id_vehicle" value="<?php echo $data['info_vehicle']['id']; ?>" />
                                    <?php
                                }
                                ?>
                                <div class="row gy-4 panel-body">
                                    <div class="col-md-6 form-floating" >
                                        <input type="text" name="modelo" class="form-control" id="modelo" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['modelo'];} ?>" placeholder="Modelo" />
                                        <label for="floatingInput"> Modelo:</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" name="marca" class="form-control" id="marca" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['marca'];} ?>" placeholder="Marca" />
                                        <label for="floatingInput"> Marca:</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="textarea" name="descripcion" class="form-control" id="descripcion" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['descripcion'];} ?>" placeholder="Descripción" />
                                        <label for="floatingInput"> Descripción:</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" name="no_circulacion" class="form-control" id="no_circulacion" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['no_circulacion'];} ?>" placeholder="No. Circulacion" />
                                        <label for="floatingInput"> No. Circulación:</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" name="no_licencia" class="form-control" id="no_licencia" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['no_licencia'];} ?>" placeholder="No. Licencia" />
                                        <label for="floatingInput"> No. Licencia:</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" name="matricula" class="form-control" id="matricula" value="<?php if (isset($data['info_vehicle'])) {echo $data['info_vehicle']['matricula'];} ?>" placeholder="Matricula" />
                                        <label for="floatingInput"> Matricula:</label>
                                    </div>
                                    <br>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" name="action" class="btn btn-login text-uppercase btn-block fw-bold acceder"><?php echo isset($data['createVehicle']) ? 'Registrar' : 'Editar'; ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>


<?php include_once '___footer.php'; ?>