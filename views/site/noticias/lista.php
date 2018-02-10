<?php

use yii\helpers\Html;
use yii\helpers\Url;

$configuracion = \app\models\Configuracion::find()->one();
$this->render('../widgets/metatags', ['model' => $configuracion]);

?>

<?php foreach ($model as $item): ?>
    <?php
    $href = Url::to(['noticia', 'id' => $item['idnoticia']]);
    $fecha = \app\components\Funcions::fecha($item['fecha_noticia']);
    ?>
    <div class="blog-post">
        <?= Html::img('@web/imagen/noticias/' . $item['foto'], ['class' => 'img-responsive']) ?>
        <div class="post-content">
            <div class="post-date">
                <p class="text-uppercase"><span><?= $fecha['dia'] ?></span><?= $fecha['mes'] ?></p>
            </div>
            <div class="content-data">
                <h2><a href="<?= $href ?>"><?= $item['titulo'] ?></a></h2>
                <p>Por: <a href="#"><?= $item['fuente'] ?></a>
                    | <?= Html::a($item->categoria['nombre'], ['/noticias', 'id' => $item->categoria['alias']]) ?></p>
            </div>
            <p><?= $item['resumen'] ?></p>
            <a class="vertodos" href="<?= $href ?>">Ver</a>
        </div>
    </div>


<?php endforeach; ?>


<div class="link_pag" align="center">
    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $data->pagination,
    ]); ?>
</div>

<!--FIN NOTICIAS-->
<div class="clear"></div>
