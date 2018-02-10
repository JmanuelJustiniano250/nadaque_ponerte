<?php

use app\components\Funcions;
use yii\helpers\Html;
use yii\helpers\Url;

$configuracion = \app\models\Configuracion::find()->one();
$fecha = Funcions::fecha($model['fecha_noticia']);

$script = <<<CSS
CSS;
$this->registerCssFile('@web/assets_b/css/flexslider.css', ['media' => 'screen', '']);
$this->registerjsFile('@web/assets_b/js/jquery.flexslider.js', ['position' => \yii\web\View::POS_END]);
$this->registerjsFile('@web/assets_b/js/jquery.isotope.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerjsFile('@web/assets_b/js/jquery.flexslider.js', ['position' => \yii\web\View::POS_END]);

$configuracion['titulo_pagina'] = $model['titulo'];
$configuracion['resumen_pagina'] = strip_tags($model['contenido']);
$this->render('../widgets/metatags', ['model' => $configuracion, 'foto' => Url::to($model['foto'])]);
?>
<div class="blog-post single-post">


    <div class="flexslider">
        <ul class="slides">

            <?php if ($model->galeria): ?>
                <?php foreach ($model->galeria as $item) : ?>
                    <li>
                        <?= Html::img('@web/imagen/noticias/' . $item['archivo'], ['class' => 'img-responsive']) ?>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>
                    <?= Html::img('@web/imagen/noticias/' . $model['foto'], ['class' => 'img-responsive']) ?>
                </li>
            <?php endIf; ?>

        </ul>
    </div>

    <div class="post-content">
        <div class="post-date">
            <p><span><?= $fecha['dia'] ?></span><?= $fecha['mes'] ?></p>
        </div>
        <div class="content-data">
            <h2><?= $model['titulo'] ?></h2>
            <p>Por: <a href="#"><?= $model['fuente'] ?></a>
                | <?= Html::a($model->categoria['nombre'], ['/noticias', 'id' => $model->categoria['alias']]) ?></p>
        </div>
        <div><br> <?php echo $model['contenido'] ?></div>


        <br>

        <div class="text">
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript"
                    src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53e2c6583afe0ece"></script>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="sociales top-spacing3 bottom-spacing3">
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript"
                        src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54f678625eb57483"
                        async="async"></script>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_native_toolbox"></div>
            </div>


        </div>

    </div>


</div>


<?php
$script = <<<JS
	var SliderPost = $('.flexslider');

		SliderPost.flexslider({
			slideshowSpeed: 3000,
			easing: "swing"
		});
JS;
$this->registerJs($script, \yii\web\View::POS_END);

?>
