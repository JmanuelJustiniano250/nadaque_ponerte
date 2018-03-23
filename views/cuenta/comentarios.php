<?php

?>
<h3><?= ((\app\models\Mensajes::haveNew(1, null, $model->idanuncio)) ? '<i class="fa fa-circle" aria-hidden="true"></i>' : '') ?> <?= \yii\helpers\Html::a($model->titulo, ['/site/item', 'id' => $model->idanuncio]) ?></h3>

<!--<p>cantidad de comentarios
    ( <?php /*= \app\models\Mensajes::find()->where(['idanuncio' => $model->idanuncio, 'tipo' => 1])->count() */ ?> )
</p>-->

