<?php

use kartik\slider\Slider;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$script = <<<CSS
label {
    display: block;
  
}
.slider-handle {
    position: absolute;
    width: 12px;
    height: 20px;
    background-color: #ececec;
    background-image: -webkit-linear-gradient(top, #ececec 0%, #0480be 100%);
    background-image: -o-linear-gradient(top, #149bdf 0%, #0480be 100%);
    background-image: linear-gradient(to bottom, #ececec 0%, #ececec 100%);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff149bdf', endColorstr='#ff0480be', GradientType=0);
    filter: none;
    /* -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.2), 0 1px 2px rgba(0,0,0,.05); */
    /* box-shadow: inset 0 1px 0 rgba(255,255,255,.2), 0 1px 2px rgba(0,0,0,.05); */
    /* border: 0px solid transparent; */
    border: 1px solid #bababa;
}




.slider.slider-horizontal .slider-track {
    height: 5px;
    width: 100%;
    margin-top: -3px;
    top: 50%;
    left: 0;
}
.slider.slider-horizontal {
    width: 150px;
    height: 20px;
    
       margin-left: 10px;
    margin-right: 5px;
}
.slider-handle.round {
    border-radius: 0%;
}

.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 5px;
    font-size: 11px;
    font-weight: bold;
    line-height: 1;
    color: #525252;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #ececec;
    border-radius: 0px;
}


.slider.slider-horizontal .slider-tick, .slider.slider-horizontal .slider-handle {
  
    margin-top: -8px;
}

CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::className()]);

$filtros = array();
$index = 0;
?>
<div>
    <?php $form = ActiveForm::begin(['method' => 'get', 'action' => ['site/comprar']]); ?>
    <?php
    echo Select2::widget([
        'name' => 'vendedor',
        'value' => ((isset($model['vendedor'])) ? $model['vendedor'] : ''),
        'language' => 'es',
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Usuarios::find()->where(['estado' => 1, 'tipo' => 1])->all(), 'idusuario', 'nombres'),
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Buscar por vendedor(a)'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <br>
    <div>
        <button type="submit" href="" class="text-center registrarse btn" style="margin-left: 0">FILTRAR</button>
    </div>
    <br>
    <?php if (!isset($categorias)) {
        $categorias = array();
    } ?>
    <?php if (!isset($padre)) {
        $padre = '13';
    } ?>
    <h5 class="text-uppercase"><strong>Sub Categoria</strong></h5>
    <?php $tmp = \app\models\Categorias::findAll(['estado' => 1, 'idPadre' => $padre]) ?>
    <?php foreach ($tmp as $item): ?>
        <?= Html::checkbox("categorias[" . $item['idcategoria'] . "]", ((isset($model['categorias'][$item['idcategoria']])) ? $model['categorias'][$item['idcategoria']] : ''), ['label' => $item['nombre']]) ?>
    <?php endforeach; ?>
    <br>
    <h5 class="text-uppercase"><strong>Rango de precio</strong></h5>
    <?php echo '<b class="badge">' . $model['precios']['min'] . ' Bs</b> ' . Slider::widget([
            'name' => 'precio',
            'value' => $model['precio'],
            'sliderColor' => Slider::TYPE_GREY,
            'pluginOptions' => [
                'min' => (double)$model['precios']['min'],
                'max' => (double)$model['precios']['max'],
                'step' => 10,
                'range' => true
            ],
        ]) . ' <b class="badge">' . $model['precios']['max'] . ' Bs</b>';
    ?>
    <br><br>
    <?php $tmp = \app\models\CondicionProducto::find()->all() ?>
    <h5 class="text-uppercase"><strong>Condicion del Producto</strong></h5>
    <?php foreach ($tmp as $item): ?>
        <?= Html::checkbox("condicion[" . $item['id_cp'] . "]", ((isset($model['condicion'][$item['id_cp']])) ? $model['condicion'][$item['id_cp']] : ''), ['label' => $item['nombre']]) ?>
    <?php endforeach; ?>
    <br>

    <?php $tmp = \app\models\TallasProducto::find()->all() ?>
    <h5 class="text-uppercase"><strong>Tallas de los Productos</strong></h5>
    <?php foreach ($tmp as $item): ?>
        <?= Html::checkbox("talla[" . $item['id_tp'] . "]", ((isset($model['talla'][$item['id_tp']])) ? $model['talla'][$item['id_tp']] : ''), ['label' => $item['nombre']]) ?>
    <?php endforeach; ?>
    <br>
    <?php $tmp = \app\models\MaterialProducto::find()->all() ?>
    <h5 class="text-uppercase"><strong>Material de los Productos</strong></h5>
    <?php foreach ($tmp as $item): ?>
        <?= Html::checkbox("material[" . $item['id_mp'] . "]", ((isset($model['material'][$item['id_mp']])) ? $model['material'][$item['id_mp']] : ''), ['label' => $item['nombre']]) ?>
    <?php endforeach; ?>
    <br>
    <?php $tmp = \app\models\MarcaProducto::find()->all() ?>
    <h5 class="text-uppercase"><strong>Marcas de los Productos</strong></h5>
    <?php foreach ($tmp as $item): ?>
        <?= Html::checkbox("marca[" . $item['id_msp'] . "]", ((isset($model['marca'][$item['id_msp']])) ? $model['marca'][$item['id_msp']] : ''), ['label' => $item['nombre']]) ?>
    <?php endforeach; ?>
    <br>
    <?php $tmp = \app\models\ColoresProductos::find()->all() ?>
    <h5 class="text-uppercase"><strong>Colores de los Productos</strong></h5>
    <?php foreach ($tmp as $item): ?>
        <?= Html::checkbox("color[" . $item['id_cp'] . "]", ((isset($model['color'][$item['id_cp']])) ? $model['color'][$item['id_cp']] : ''), ['label' => $item['nombre']]) ?>
    <?php endforeach; ?>
    <br>
    <?php $tmp = \app\models\Ciudad::find()->all() ?>
    <h5 class="text-uppercase"><strong>Ciudad</strong></h5>
    <?php foreach ($tmp as $item): ?>
        <?= Html::checkbox("ciudad[" . $item['idciudad'] . "]", ((isset($model['ciudad'][$item['idciudad']])) ? $model['ciudad'][$item['idciudad']] : ''), ['label' => $item['nombre']]) ?>
    <?php endforeach; ?>
    <br>
    <div>
        <button type="submit" href="" class="text-center registrarse btn" style="margin-left: 0">FILTRAR</button>
        <br>
    </div>
    <br><br>

    <?php $form::end() ?>
</div>