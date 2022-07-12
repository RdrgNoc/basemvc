<?php require_once '___header.php'; ?>
<section id="get-a-quote" class="get-a-quote">
    <div class="container" data-aos="fade-up">
        <div class="row g-0">
            <div class="col-lg-12">
                <table id="example001" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Info</th>
                            <th>Fecha</th>
                            <th>Origen</th>
                            <th>Mensaje</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data["lines"] as $key => $value): ?>
                        <tr>
                            <?php if ($value['type'] === INFO_LOG) { ?>
                            <td>INFO</td>
                            <?php } else if ($value['type'] === ERROR_LOG) { ?>
                            <td>ERROR</td>
                            <?php } ?>
                            <td><?= $value['date']; ?></td>
                            <td><?= $value['origin']; ?></td>
                            <td><?= $value['message']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Info</th>
                            <th>Fecha</th>
                            <th>Origen</th>
                            <th>Mensaje</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row g-0">
            <a class="btn btn-danger btn-icon btn-block" href="<?php echo BASE_URL_ROUTE ?>log/delete-log">
                <i class="fa fa-trash" aria-hidden="true"></i> Borrar contenido Log
            </a>
        </div>
    </div>
</section>
<?php require_once '___footer.php'; ?>