<?php

$script = <<<CSS
CSS;
//$this->registerCss($script);

$configuracion = \app\models\Configuracion::find()->one();
$this->render('widgets/metatags', ['model' => $configuracion]);

?>
<!--=============== wrapper ===============-->
<?= $this->render('widgets/breadcrumbs'); ?>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Preguntas Frecuentes</h1>


            <div class="accordion-box">

                <?php foreach ($model as $item): ?>
                    <div class="accord-elem">
                        <div class="accord-title">
                            <h2><?= $item['titulo'] ?></h2>
                            <a class="accord-link" href="#"></a>
                        </div>
                        <div class="accord-content">
                            <?= $item['contenido'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!--<div class="accord-elem active">
                    <div class="accord-title">
                        <h2>Our Mission</h2>
                        <a class="accord-link" href="#"></a>
                    </div>
                    <div class="accord-content">
                        <p>Donec ornare mattis suscipit. Praesent fermentum accumsan vulputate. Sed velit nulla, sagittis non erat id, dictum vestibulum ligula. Maecenas sed enim sem. Etiam scelerisque gravida purus nec interdum. </p>
                    </div>
                </div>-->


            </div>
        </div>

    </div>
</div>
<br>



