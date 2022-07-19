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
                    <tr>
                        <th>ID</th>
                        <th>Motivo</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Persona</th>
                        <th>Vehiculo</th>
                        <th>Estado</th>
                    </tr>
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
            <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php include_once '___footer.php'; ?>