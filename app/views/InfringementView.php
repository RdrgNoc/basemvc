<?php include_once '___header.php'; ?>
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
                <table id="tableInfringements" class="display" style="width:100%">
                    <thead>
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
                    <tbody>
                <?php foreach ($data['infringements'] as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
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
                <?php } ?>
                    </tbody>
                    <tfoot>
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


                                <form id="form" action="POST" enctype="multipart/form-data">
                                    <h1>Account</h1>
                                    <fieldset>
                                        <legend>Account Information</legend>

                                        <label for="userName">User name *</label>
                                        <input id="userName" name="userName" type="text" class="required" />
                                        <label for="password">Password *</label>
                                        <input id="password" name="password" type="text" class="required" />
                                        <label for="confirm">Confirm Password *</label>
                                        <input id="confirm" name="confirm" type="text" class="required" />
                                        <p>(*) Mandatory</p>
                                    </fieldset>

                                    <h1>Profile</h1>
                                    <fieldset>
                                        <legend>Profile Information</legend>

                                        <label for="name">First name *</label>
                                        <input id="name" name="name" type="text" class="required" />
                                        <label for="surname">Last name *</label>
                                        <input id="surname" name="surname" type="text" class="required" />
                                        <label for="email">Email *</label>
                                        <input id="email" name="email" type="text" class="required email" />
                                        <label for="address">Address</label>
                                        <input id="address" name="address" type="text" />
                                        <label for="age"
                                        >Age (The warning step will show up if age is less than 18) *</label
                                        >
                                        <input id="age" name="age" type="text" class="required number" />
                                        <p>(*) Mandatory</p>
                                    </fieldset>

                                    <h1>Warning</h1>
                                    <fieldset>
                                        <legend>You are to young</legend>

                                        <p>Please go away ;-)</p>
                                    </fieldset>

                                    <h1>Finish</h1>
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