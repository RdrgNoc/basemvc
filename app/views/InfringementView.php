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
                            <th>ID</th>
                            <th>Motivo</th>
                            <th>Monto</th>
                            <th>Fecha</th>
                            <th>Persona</th>
                            <th>Vehiculo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody class="CuerpoTabla">
                <?php foreach ($data['infringements'] as $key => $value) { ?>
                    <tr>
                        <td><?php echo $z ?></td>
                        <td><?php echo $value['motivo']; ?></td>
                        <td><?php echo $value['multa']; ?></td>
                        <td><?php echo $value['date']; ?></td>
                        <td><?php echo $value['nombre']; ?></td>
                        <td><?php echo $value['modelo']; ?></td>
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
                    </tr>
                <?php $z++; } ?>
                    </tbody>
                    <tfoot class="TituloTabla">
                        <tr>
                            <th>ID</th>
                            <th>Motivo</th>
                            <th>Monto</th>
                            <th>Fecha</th>
                            <th>Persona</th>
                            <th>Vehiculo</th>
                            <th>Estado</th>
                        </tr>
                    </tfoot>
                </table>
            <?php } elseif(isset($data['displayCreateInfringements'])) { ?>
                    
                    <div class="row" >
                        <div class="col-lg-10 offset-lg-1 panel panel-default p-sm-2 border-0 shadow" style="background-color: #b1bcc6; ">
                            <div class="panel-heading text-center" id="titulos">
                                <h3 class="panel-title text-center" id="titulos" style="margin-top: 40px;">REGISTRAR NUEVA INFRACCIÓN</h3>
                                <hr id="linea">
                            </div>
                            <div class="row gy-4 panel-body ">
                                <div class="col-lg-12 ">
                                    <div class=" aos-init aos-animate " data-aos="fade-up">
                                        <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                            <div class="col-lg-12">
                                                <form action="<?php echo BASE_URL_ROUTE ?>registerInfringement" id="form" method="POST" class="php-email-form" style="background-color: #b1bcc6;">
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
                                                                                <option value="<?php echo $vehicle['id']; ?>" ><?php echo $vehicle['modelo']; ?></option>
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
                                                                            <input type="text" name="sexo" class="form-control" id="sexo" placeholder="Sexo" />
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
                                                        <legend>Terms and Conditions</legend>

                                                        <input
                                                                id="acceptTerms"
                                                                name="acceptTerms"
                                                                type="checkbox"
                                                                class="required"
                                                        />
                                                        <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                                    </fieldset>
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