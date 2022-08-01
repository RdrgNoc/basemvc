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
                    <div class="container aos-init aos-animate faq" data-aos="fade-up">
                        <div class="section-header">
                            <h2>Registrar infracción</h2>
                        </div>
                        <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="col-lg-10">
                                <div class="accordion accordion-flush" id="faqlist">
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1" aria-expanded="false">
                                                <i class="bi bi-question-circle question-icon"></i>
                                                Añadir nueva infracción
                                            </button>
                                        </h3>
                                        <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist" style="">
                                            <div class="accordion-body">
                                                Hola, se despliega un formulario bastante amplio
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container aos-init aos-animate faq" data-aos="fade-up">
                        <div class="section-header">
                            <h2>WIZARD</h2>
                        </div>
                        <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="col-lg-10">


                                <form action="<?php echo BASE_URL_ROUTE ?>registerInfringement" id="form" method="POST" class="php-email-form">
                                    <h1>0: ¿Nueva persona/vehiculo?</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="flexRadioDefault">¿Registrara una nueva persona/vehiculo para la infracción?</label>
                                                <div class="form-check">
                                                    <input class="" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" >
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2" >
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h1>1: (NO) Registrar infracción (registrando sin nuevos datos)</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="motivoNA" class="form-control" id="motivoNA" placeholder="Motivo / Descripción" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" name="multaNA" class="form-control" id="multaNA" placeholder="$ Multa" />
                                            </div>
                                            <div class="col-md-6">
                                                <!--<input type="text" name="people" class="form-control" id="people" placeholder="Persona" />-->
                                                <input class="form-control" list="datalistOptions1" name="people" id="people" placeholder="Persona">
                                                <datalist id="datalistOptions1">
                                                    <?php foreach ($data['peoplesInput'] as $key => $people) { ?>
                                                        <option value="<?php echo $people['id']; ?>" ><?php echo $people['nombre'] . " " . $people['paterno'] . " " . $people['materno']; ?></option>
                                                        <?php $x++; } ?>
                                                </datalist>
                                            </div>
                                            <div class="col-md-6">
                                                <!--<input type="text" name="vehicle" class="form-control" id="vehicle" placeholder="Vehiculo" />-->
                                                <input class="form-control" list="datalistOptions2" name="vehicle" id="vehicle" placeholder="Vehiculo">
                                                <datalist id="datalistOptions2">
                                                    <?php foreach ($data['vehiclesInput'] as $key => $vehicle) { ?>
                                                        <option value="<?php echo $vehicle['id']; ?>" ><?php echo $vehicle['modelo']; ?></option>
                                                    <?php $x++; } ?>
                                                </datalist>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" list="datalistOptions3" name="conditions" id="conditions" placeholder="Estado">
                                                <datalist id="datalistOptions3">
                                                    <?php foreach ($data['conditionsInput'] as $key => $condition) { ?>
                                                        <option value="<?php echo $condition['id']; ?>" ><?php echo $condition['conditions']; ?></option>
                                                        <?php $x++; } ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h1>2: (SI) Registrar nueva persona</h1>
                                    <fieldset>
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="paterno" class="form-control" id="paterno" placeholder="Apellido paterno" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="materno" class="form-control" id="materno" placeholder="Apellido materno" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" />
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono" />
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="edad" class="form-control" id="edad" placeholder="Edad" />
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="sexo" class="form-control" id="sexo" placeholder="Sexo" />
                                                </div>
                                        </div>
                                    </fieldset>

                                    <h1>3: (SI) Registrar nuevo vehiculo</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Modelo" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="marca" class="form-control" id="marca" placeholder="Marca" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="textarea" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="no_circulacion" class="form-control" id="no_circulacion" placeholder="No. Circulacion" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="no_licencia" class="form-control" id="no_licencia" placeholder="No. Licencia" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="matricula" class="form-control" id="matricula" placeholder="Matricula" />
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h1>4: (SI) Registrar infracción (registrando con nuevos datos)</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="motivoNF" class="form-control" id="motivoNF" placeholder="Motivo / Descripción" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" name="multaNF" class="form-control" id="multaNF" placeholder="$ Multa" />
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h1>5: (SI)(NO) Finish</h1>
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