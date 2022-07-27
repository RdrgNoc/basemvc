<?php include_once '___header.php'; ?>

    <script>
        $(document).ready(function () {
            var table004 = $('#tablePeoples').DataTable({
                responsive: true,
                compact: false,
            });
        });
    </script>

    <section id="get-a-quote" class="get-a-quote">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12">
                    <?php if (isset($data['displayAllPeoples'])) { ?>
                        <table id="tablePeoples" class="display table table-hover" style="width:100%">
                            <thead class="TituloTabla" >
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Ap. Paterno</th>
                                    <th>Ap. Materno</th>
                                    <th>Edad</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th>
                                    <th>Sexo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="CuerpoTabla">
                            <?php foreach ($data['peoples'] as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['nombre']; ?></td>
                                    <td><?php echo $value['paterno']; ?></td>
                                    <td><?php echo $value['materno']; ?></td>
                                    <td><?php echo $value['edad']; ?></td>
                                    <td><?php echo $value['telefono']; ?></td>
                                    <td><?php echo $value['direccion']; ?></td>
                                    <td><?php echo $value['sexo']; ?></td>
                                    <td>
                                        <a class="badge text-bg-light" title="Editar" href="<?php echo BASE_URL_ROUTE ?>people/edit/<?php echo $value['id']; ?>">
                                            <i class="fa fa-pen-to-square"></i>
                                        </a>
                                        <a class="badge text-bg-light" title="Eliminar" href="<?php echo BASE_URL_ROUTE ?>people/delete/<?php echo $value['id']; ?>">
                                            <i class="fa fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot class="TituloTabla">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Ap. Paterno</th>
                                    <th>Ap. Materno</th>
                                    <th>Edad</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th>
                                    <th>Sexo</th>
                                    <th>Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
                    <?php } elseif (isset($data['createPeople']) || isset($data['editPeople'])) { ?>
                        <form id="formUser" action="<?php echo BASE_URL_ROUTE ?><?php echo isset($data['createPeople']) ? 'registerPeople' : 'editPeople'; ?>" method="POST" class="php-email-form">
                        <h3>Registrar persona</h3>
                            <?php
                            if (isset($data['editPeople'])) {
                                ?>
                                <input type="hidden" name="id_people" value="<?php echo $data['info_people']['id']; ?>" />
                                <?php
                            }
                            ?>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?php if (isset($data['info_people'])) {echo $data['info_people']['nombre'];} ?>" placeholder="Nombre" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="paterno" class="form-control" id="paterno" value="<?php if (isset($data['info_people'])) {echo $data['info_people']['paterno'];} ?>" placeholder="Apellido paterno" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="materno" class="form-control" id="materno" value="<?php if (isset($data['info_people'])) {echo $data['info_people']['materno'];} ?>" placeholder="Apellido materno" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="direccion" class="form-control" id="direccion" value="<?php if (isset($data['info_people'])) {echo $data['info_people']['direccion'];} ?>" placeholder="Dirección" />
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="telefono" class="form-control" id="telefono" value="<?php if (isset($data['info_people'])) {echo $data['info_people']['telefono'];} ?>" placeholder="Telefono" />
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="edad" class="form-control" id="edad" value="<?php if (isset($data['info_people'])) {echo $data['info_people']['edad'];} ?>" placeholder="Edad" />
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="sexo" class="form-control" id="sexo" value="<?php if (isset($data['info_people'])) {echo $data['info_people']['sexo'];} ?>" placeholder="Sexo" />
                                </div>
                                
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="action" class="btn btn-primary btn-block"><?php echo isset($data['createPeople']) ? 'Registro' : 'Editar'; ?></button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php include_once '___footer.php'; ?>