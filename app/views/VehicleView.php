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
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php include_once '___footer.php'; ?>