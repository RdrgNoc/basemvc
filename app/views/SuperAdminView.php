<?php
include_once '___header.php';
?>
<div class="row">
    <div class="col-12">
        <?php
        if (isset($data['welcome'])) {
        ?>
        <section id="get-a-quote" class="get-a-quote">
            <div class="container" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <h3>Bienvenido a la pagina del admin</h3>
                    </div>
                </div>
            </div>
        </section>
        <?php
        } elseif (isset($data['allUsers'])) {
        ?>
        <section id="get-a-quote" class="get-a-quote">
            <div class="container" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <h3>Muestra todos los registros</h3>
                    </div>
                </div>
            </div>
        </section>
        <?php
        }
        ?>
    </div>
</div>
<?php
include_once '___footer.php';
?>