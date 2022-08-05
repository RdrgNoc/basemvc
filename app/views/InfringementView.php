<?php include_once '___header.php';
    $z = 1;
    $x = 1;
?>
    <script>
        $(document).ready(function () {
            var table002 = $('#tableInfringements').DataTable({
                responsive: true,
            });
        });
    </script>

<section id="get-a-quote" class="get-a-quote">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-12">
            <?php if (isset($data['displayAllInfringements'])) { ?>
                <table id="tableInfringements" class="display table table-hover" style="width:100%">
                    <thead class="TituloTabla">
                        <tr>
                            <th>No.</th>
                            <th>Motivo</th>
                            <th>Monto</th>
                            <th>Fecha</th>
                            <th>Persona</th>
                            <th>Vehiculo</th>
                            <th>Matricula</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="CuerpoTabla">
                <?php foreach ($data['infringements'] as $key => $value) { ?>
                    <tr>
                        <td><?php echo $z ?></td>
                        <td><?php echo $value['motivo']; ?></td>
                        <td><?php echo $value['multa']; ?></td>
                        <td><?php echo $value['fecha']; ?></td>
                        <td><?php echo $value['nomCompleto']; ?></td>
                        <td><?php echo $value['vehiculo']; ?></td>
                        <td><?php echo $value['matricula']; ?></td>
                        <?php if ($value['conditions'] === "No pagado") { ?>
                            <td><span class="badge bg-dark"><?php echo $value['conditions']; ?></span></td>
                        <?php } else if ($value['conditions'] === "Pagado") { ?>
                            <td><span class="badge bg-success"><?php echo $value['conditions']; ?></span></td>
                        <?php } else if ($value['conditions'] === "Eliminado") { ?>
                            <td><span class="badge bg-danger"><?php echo $value['conditions']; ?></span></td>
                        <?php } else if ($value['conditions'] === "Cancelado") { ?>
                            <td><span class="badge bg-warning"><?php echo $value['conditions']; ?></span></td>
                        <?php } else { ?>
                            <td><span class="badge bg-secondary"><?php echo $value['conditions']; ?></span></td>
                        <?php } ?>
                        <td>
                            <a class="badge text-bg-light" title="Editar" href="<?php echo BASE_URL_ROUTE ?>infringement/edit/<?php echo $value['idInfringement']; ?>">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            <!--<a class="badge text-bg-light" title="Eliminar" href="<?php echo BASE_URL_ROUTE ?>infringement/delete/<?php echo $value['idInfringement']; ?>">
                                <i class="fa fa-trash-can"></i>
                            </a>-->
                        </td>
                    </tr>
                <?php $z++; } ?>
                    </tbody>
                    <tfoot class="TituloTabla">
                        <tr>
                            <th>No.</th>
                            <th>Motivo</th>
                            <th>Monto</th>
                            <th>Fecha</th>
                            <th>Persona</th>
                            <th>Vehiculo</th>
                            <th>Matricula</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            <?php } elseif(isset($data['displayCreateInfringements'])) { ?>
                    
                    <div class="row" >
                        <div class="col-lg-10 offset-lg-1 panel panel-default p-sm-2 border-0 shadow" style="background: rgba(179, 219, 221, 0.2);">
                            <div class="panel-heading text-center" id="titulos">
                                <h3 class="panel-title text-center" id="titulos" style="margin-top: 40px;">REGISTRAR NUEVA INFRACCIÓN</h3>
                                <hr id="linea">
                            </div>
                            <div class="row gy-4 panel-body ">
                                <div class="col-lg-12 ">
                                    <div class=" aos-init aos-animate " data-aos="fade-up">
                                        <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                            <div class="col-lg-12">
                                                <form action="<?php echo BASE_URL_ROUTE ?>registerInfringement" id="form" method="POST" class="php-email-form" style="background: rgba(179, 219, 221, 0.2);">
                                                    <h1></h1>
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="flexRadioDefault" class="preguntas-ch">¿Registrara una nueva persona/vehiculo para la infracción?</label>
                                                                <div class="form-check">
                                                                    <input class="" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" >
                                                                    <label class="form-check-label preguntas-ch" for="flexRadioDefault1">
                                                                        Si
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2" >
                                                                    <label class="form-check-label preguntas-ch" for="flexRadioDefault2">
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <h1></h1>
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-lg-12 panel panel-default p-sm-2 bordes">
                                                                <div class="panel-heading text-center" id="titulos">
                                                                    <h3 class="panel-title text-center" id="titulos">Registrar infracción</h3>
                                                                    <hr>
                                                                </div>
                                                                <div class="row gy-3 panel-body">
                                                                    <div class="col-md-6 form-floating">
                                                                        <input type="number" name="multaNA" class="form-control" id="multaNA" placeholder="$ Multa" />
                                                                        <label for="floatingInput"> $Multa:</label>
                                                                    </div>
                                                                    <div class="col-md-6 form-floating">
                                                                        <input class="form-control" list="datalistOptions3" name="conditions" id="conditions" placeholder="Estado">
                                                                        <datalist id="datalistOptions3">
                                                                            <?php foreach ($data['conditionsInput'] as $key => $condition) { ?>
                                                                                <option value="<?php echo $condition['id']; ?>" ><?php echo $condition['conditions']; ?></option>
                                                                                <?php $x++; } ?>
                                                                        </datalist>
                                                                        <label for="floatingInput"> Estado de multa:</label>
                                                                    </div>
                                                                    <div class="col-md-12 form-floating">
                                                                        <input type="text" name="motivoNA" class="form-control" id="motivoNA" placeholder="Motivo / Descripción" />
                                                                        <label for="floatingInput"> Motivo/Descripción:</label>
                                                                    </div>
                                                                    <div class="col-md-6 form-floating">
                                                                        <!--<input type="text" name="people" class="form-control" id="people" placeholder="Persona" />-->
                                                                        <input class="form-control" list="datalistOptions1" name="people" id="people" placeholder="Persona">
                                                                        <datalist id="datalistOptions1">
                                                                            <?php foreach ($data['peoplesInput'] as $key => $people) { ?>
                                                                                <option value="<?php echo $people['id']; ?>" ><?php echo $people['nombre'] . " " . $people['paterno'] . " " . $people['materno']; ?></option>
                                                                                <?php $x++; } ?>
                                                                        </datalist>
                                                                        <label for="floatingInput"> Nombre persona:</label>
                                                                    </div>
                                                                    <div class="col-md-6 form-floating">
                                                                        <!--<input type="text" name="vehicle" class="form-control" id="vehicle" placeholder="Vehiculo" />-->
                                                                        <input class="form-control" list="datalistOptions2" name="vehicle" id="vehicle" placeholder="Vehiculo">
                                                                        <datalist id="datalistOptions2">
                                                                            <?php foreach ($data['vehiclesInput'] as $key => $vehicle) { ?>
                                                                                <option value="<?php echo $vehicle['id']; ?>" ><?php echo "Modelo: " . $vehicle['modelo'] . " Matricula: " . $vehicle['matricula'] ?></option>
                                                                            <?php $x++; } ?>
                                                                        </datalist>
                                                                        <label for="floatingInput"> Vehículo:</label>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </fieldset>

                                                    <h1></h1> 
                                                    <fieldset>
                                                        <div class="row ">
                                                                <div class="col-lg-12 panel panel-default p-sm-2 bordes">
                                                                    <div class="panel-heading text-center" id="titulos">
                                                                        <h3 class="panel-title text-center" id="titulos">Registrar nueva persona</h3>
                                                                        <hr>
                                                                    </div>
                                                                    <div class="row  gy-3 panel-body ">
                                                                        <div class="col-md-6 form-floating">
                                                                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" />
                                                                            <label for="floatingInput"> Nombre(s):</label>
                                                                        </div>
                                                                        <div class="col-md-6 form-floating">
                                                                            <input type="text" name="paterno" class="form-control" id="paterno" placeholder="Apellido paterno" />
                                                                            <label for="floatingInput"> Apellido paterno:</label>
                                                                        </div>
                                                                        <div class="col-md-6 form-floating">
                                                                            <input type="text" name="materno" class="form-control" id="materno" placeholder="Apellido materno" />
                                                                            <label for="floatingInput"> Apellido materno:</label>
                                                                        </div>
                                                                        <div class="col-md-6 form-floating">
                                                                            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" />
                                                                            <label for="floatingInput"> Dirección:</label>
                                                                        </div>
                                                                        <div class="col-md-4 form-floating">
                                                                            <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono" />
                                                                            <label for="floatingInput"> Teléfono:</label>
                                                                        </div>
                                                                        <div class="col-md-4 form-floating">
                                                                            <input type="text" name="edad" class="form-control" id="edad" placeholder="Edad" />
                                                                            <label for="floatingInput"> Edad:</label>
                                                                        </div>
                                                                        <div class="col-md-4 form-floating">
                                                                            <input class="form-control" list="datalistOptions4" name="sexo" id="sexo" placeholder="Sexo">
                                                                            <datalist id="datalistOptions4">
                                                                                    <option value="H" >Masculino</option>
                                                                                    <option value="F" >Femenino</option>
                                                                            </datalist>
                                                                            <label for="floatingInput"> Sexo:</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </fieldset>

                                                    <h1></h1>
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-lg-12 panel panel-default p-sm-2 bordes">
                                                                <div class="panel-heading text-center" id="titulos">
                                                                    <h3 class="panel-title text-center" id="titulos">Registrar nuevo vehículo</h3>
                                                                    <hr>
                                                                </div>
                                                                <div class="row gy-3 panel-body">
                                                                    <div class="col-md-6 form-floating">
                                                                        <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Modelo" />
                                                                        <label for="floatingInput"> Modelo:</label>
                                                                    </div>
                                                                    <div class="col-md-6 form-floating">
                                                                        <input type="text" name="marca" class="form-control" id="marca" placeholder="Marca" />
                                                                        <label for="floatingInput"> Marca:</label>
                                                                    </div>
                                                                    <div class="col-md-6 form-floating">
                                                                        <input type="textarea" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción" />
                                                                        <label for="floatingInput"> Descripción:</label>
                                                                    </div>
                                                                    <div class="col-md-6 form-floating">
                                                                        <input type="text" name="no_circulacion" class="form-control" id="no_circulacion" placeholder="No. Circulacion" />
                                                                        <label for="floatingInput"> No. circulación:</label>
                                                                    </div>
                                                                    <div class="col-md-6 form-floating">
                                                                        <input type="text" name="no_licencia" class="form-control" id="no_licencia" placeholder="No. Licencia" />
                                                                        <label for="floatingInput"> No. Licencia:</label>
                                                                    </div>
                                                                    <div class="col-md-6 form-floating">
                                                                        <input type="text" name="matricula" class="form-control" id="matricula" placeholder="Matricula" />
                                                                        <label for="floatingInput"> Matricula:</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <h1></h1>
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-lg-12 panel panel-default p-sm-2 bordes">
                                                                <div class="panel-heading text-center" id="titulos">
                                                                    <h3 class="panel-title text-center" id="titulos">Registrar infracción</h3>
                                                                    <hr>
                                                                </div>
                                                                <div class="row gy-3 panel-body">
                                                                <div class="col-md-3 form-floating">
                                                                        <input type="number" name="multaNF" class="form-control" id="multaNF" placeholder="$ Multa" />
                                                                        <label for="floatingInput">$ Multa:</label>
                                                                    </div>
                                                                    <div class="col-md-9 form-floating">
                                                                        <input type="text" name="motivoNF" class="form-control" id="motivoNF" placeholder="Motivo / Descripción" />
                                                                        <label for="floatingInput"> Motivo/Descripción:</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <h1></h1>
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-lg-12 panel panel-default p-sm-2 bordes">
                                                                <div class="panel-heading text-center" id="titulos">
                                                                    <h3 class="panel-title text-center" id="titulos">Finalizar</h3>
                                                                    <hr>
                                                                </div>
                                                        <input
                                                                id="acceptTerms"
                                                                name="acceptTerms"
                                                                type="checkbox"
                                                                class="required"
                                                        />
                                                        <label for="acceptTerms">Ingresar registro(s)</label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">

                </div>
            <?php } elseif(isset($data['editInfringement'])) { ?>
                <div class="row" >
                    <div class="col-lg-10 offset-lg-1 panel panel-default p-sm-2 border-0 shadow" style="background-color: #b1bcc6; ">
                        <div class="panel-heading text-center" id="titulos">
                            <h3 class="panel-title text-center" id="titulos" style="margin-top: 40px;">Editar infracción</h3>
                            <hr id="linea">
                            <div class="alert alert-info" role="alert">
                                <p class="display-6">* Para editar el registro, elimine el texto dentro de cada cajon que desee editar con un nuevo dato, para que este genere una lista por cada campo</p>
                            </div>
                        </div>
                        <div class="row gy-4 panel-body ">
                            <div class="col-lg-12 ">
                                <div class=" aos-init aos-animate " data-aos="fade-up">
                                    <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                        <div class="col-lg-12">
                                            <form id="formUser" action="<?php echo BASE_URL_ROUTE ?>editInfringement">
                                                <?php
                                                if (isset($data['editInfringement'])) {
                                                    ?>
                                                    <input type="hidden" name="id_vehicle" value="<?php echo $data['info_infringement']['id']; ?>" />
                                                    <?php
                                                }
                                                ?>
                                                <div class="row gy-3 panel-body">
                                                    <div class="col-md-6 form-floating">
                                                        <input disabled type="number" name="multaEdit" class="form-control" id="multaEdit" placeholder="$ Multa" value="<?php if (isset($data['info_infringement'])) {echo $data['info_infringement']['multa'];} ?>" />
                                                        <label for="floatingInput"> $Multa:</label>
                                                    </div>
                                                    <div class="col-md-6 form-floating">
                                                        <?php if (isset($data['editInfringement'])) { ?>
                                                            <?php foreach ($data['conditionsInput'] as $key => $condition) { ?>
                                                                <?php if ($data['info_infringement']['conditions'] === $condition['id']) { ?>
                                                                    <input class="form-control" list="datalistOptions3" name="conditionsEdit" id="conditionsEdit" placeholder="Estado" value="<?php echo $condition['conditions']; ?>">
                                                                <?php } ?>
                                                                <?php $x++; } ?>
                                                            <datalist id="datalistOptions3">
                                                                <?php foreach ($data['conditionsInput'] as $key => $condition) { ?>
                                                                    <option value="<?php echo $condition['id']; ?>" ><?php echo $condition['conditions']; ?></option>
                                                                    <?php $x++; } ?>
                                                            </datalist>
                                                            <label for="floatingInput"> Estado de multa:</label>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-md-12 form-floating">
                                                        <input disabled type="text" name="motivoEdit" class="form-control" id="motivoEdit" placeholder="Motivo / Descripción" value="<?php if (isset($data['info_infringement'])) {echo $data['info_infringement']['motivo'];} ?>" />
                                                        <label for="floatingInput"> Motivo/Descripción:</label>
                                                    </div>
                                                    <div class="col-md-6 form-floating">
                                                        <?php if (isset($data['editInfringement'])) { ?>
                                                            <?php foreach ($data['peoplesInput'] as $key => $people) { ?>
                                                                <?php if ($data['info_infringement']['people'] === $people['id']) { ?>
                                                                    <input disabled class="form-control" list="datalistOptions1" name="peopleEdit" id="peopleEdit" placeholder="Persona" value="<?php echo $people['nombre'] . " " . $people['paterno'] . " " . $people['materno']; ?>">
                                                                <?php } ?>
                                                                <?php $z++; } ?>
                                                            <!--<datalist id="datalistOptions1">
                                                                <?php /*foreach ($data['peoplesInput'] as $key => $people) { */?>
                                                                    <option value="<?php /*echo $people['id']; */?>" ><?php /*echo $people['nombre'] . " " . $people['paterno'] . " " . $people['materno']; */?></option>
                                                                    <?php /*$z++; } */?>
                                                            </datalist>-->
                                                        <?php } ?>
                                                        <label for="floatingInput"> Nombre persona:</label>
                                                    </div>
                                                    <div class="col-md-6 form-floating">
                                                        <?php if (isset($data['editInfringement'])) { ?>
                                                            <?php foreach ($data['vehiclesInput'] as $key => $vehicle) { ?>
                                                                <?php if ($data['info_infringement']['vehicle'] === $vehicle['id']) { ?>
                                                                    <input disabled class="form-control" list="datalistOptions2" name="vehicleEdit" id="vehicleEdit" placeholder="Vehiculo" value="<?php echo "Modelo: " . $vehicle['modelo'] . " Matricula: " . $vehicle['matricula'] ?>">
                                                                <?php } ?>
                                                                <?php $z++; } ?>
                                                            <!--<datalist id="datalistOptions2">
                                                                <?php /*foreach ($data['vehiclesInput'] as $key => $vehicle) { */?>
                                                                    <option value="<?php /*echo $vehicle['id']; */?>" ><?php /*echo "Modelo: " . $vehicle['modelo'] . " Matricula: " . $vehicle['matricula'] */?></option>
                                                                    <?php /*$x++; } */?>
                                                            </datalist>-->
                                                        <?php } ?>
                                                        <label for="floatingInput"> Vehículo:</label>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit" name="action" class="btn btn-login text-uppercase btn-block fw-bold acceder">Editar</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</section>
    <script>
        $(document).ready(function(){
            console.log("Hola, registra una infracción");
        });
    </script>
<?php include_once '___footer.php'; ?>