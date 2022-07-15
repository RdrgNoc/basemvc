<?php include_once '___header.php'; ?>

    <script>
        $(document).ready(function () {
            var table004 = $('#tablePeoples').DataTable({
                responsive: true,
            });
        });
    </script>

    <section id="get-a-quote" class="get-a-quote">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12">
                    <?php if (isset($data['displayAllPeoples'])) { ?>
                        <table id="tablePeoples" class="display" style="width:100%">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Ap. Paterno</th>
                                <th>Ap. Materno</th>
                                <th>Edad</th>
                                <th>Telefono</th>
                                <th>Dirección</th>
                                <th>Sexo</th>
                            </tr>
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
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php include_once '___footer.php'; ?>