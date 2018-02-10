<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$script = <<<CSS
label {
    display: block;
  
}
CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);



$filtros = \app\models\Filtros::findAll(['estado' => 1, 'idPadre' => null]);
$index = 0;
?>
<div>
    <?php $form = ActiveForm::begin(['method' => 'get', 'action' => ['site/comprar']]); ?>
    <div>
        <button type="submit" href="" class="text-center registrarse btn" style="margin-left: 0">FILTRAR</button>
    </div>
    <br>
    <?php foreach ($filtros as $filtro): ?>
        <?php if (\app\models\Filtros::find()->where(['estado' => '1', 'idPadre' => $filtro['idfiltro']])->count() > 0): ?>
            <h5 class="text-uppercase"><strong><?= $filtro['nombre'] ?></strong></h5>
            <?php $tmp = \app\models\Filtros::findAll(['estado' => '1', 'idPadre' => $filtro['idfiltro']]) ?>
            <?php foreach ($tmp as $item): ?>
                <?= Html::checkbox("filtro[" . $item['idfiltro'] . "]", ((isset($model[$item['idfiltro']])) ? $model[$item['idfiltro']] : ''), ['label' => $item['nombre']]) ?>
                <?php $index++; ?>
            <?php endforeach; ?>
        <?php endif; ?><br>
    <?php endforeach; ?>

    <?php $form::end() ?>

</div>