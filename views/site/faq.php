<?php

$script = <<<CSS
.panel-heading {
    padding: 13px 15px;
    border-bottom: 1px solid #e6eaed;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom: 1px solid #e6eaed;
}

.panel-default {
    border-color: transparent;
}


.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 15px;
    color: black;
    font-weight: 600;
}

.panel-body {
    padding: 20px;
    border: 1px solid #e6eaed;
    background: #f5f5f5;
}

.panel-default > .panel-heading {
    border: 1px solid #e6eaed;
    color: #333;
    background-color: transparent;
    border-color: #e6eaed;
    margin-bottom: 10px;
}


CSS;
$this->registerCss($script);

$configuracion = \app\models\Configuracion::find()->one();
$this->render('widgets/metatags', ['model' => $configuracion]);

?>
<!--=============== wrapper ===============-->
<?= $this->render('widgets/breadcrumbs'); ?>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="text-center">Preguntas Frecuentes</h1> <br>



            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">




                <?php foreach ($model as $item): ?>
                   <!--- <div class="accord-elem">
                        <div class="accord-title">
                            <h2><?//= $item['titulo'] ?></h2>
                            <a class="accord-link" href="#"></a>
                        </div>
                        <div class="accord-content">
                            <?//= $item['contenido'] ?>
                        </div>
                    </div>-->


                    <div class="panel-heading" role="tab" id="headingOne<?= $item['idfaq'] ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" class="respet" data-parent="#accordion" href="#collapseOne<?= $item['idfaq'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                <?= $item['titulo'] ?>
                            </a>
                        </h4>
                    </div>



                    <div id="collapseOne<?= $item['idfaq'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?= $item['idfaq'] ?>">
                        <div class="panel-body">
                            <?= $item['contenido'] ?>

                         </div>
                    </div>



                <?php endforeach; ?>








                </div>

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



