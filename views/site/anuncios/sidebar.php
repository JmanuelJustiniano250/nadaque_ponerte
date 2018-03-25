<?php

use kartik\slider\Slider;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$script = <<<CSS
label {
    display: block;
    font-weight: normal;
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
    <div>
        <button type="submit" href="" class="text-center registrarse btn" style="margin-left: 0">FILTRAR</button>
        <br>
        <a class="" href="<?= \yii\helpers\Url::to(['comprar']) ?>"
           style="color: #000;  font-size: 11px;   font-weight: 600;  ">
            quitar filtros </a>
    </div>
    <br>
    <?php
    echo Select2::widget([
        'name' => 'vendedor',
        'value' => ((isset($model['vendedor'])) ? $model['vendedor'] : ''),
        'language' => 'es',
        'data' => ArrayHelper::map(\app\models\Usuarios::find()->where(['estado' => 1, 'tipo' => 1])->all(), 'idusuario', 'nombres'),
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Buscar por vendedor(a)'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <br>

    <?php if (!isset($categorias)) {
        $categorias = array();
    } ?>
    <?php if (!isset($padre)) {
        $padre = '13';
    } ?>
    <h5 class="text-uppercase"><strong></strong></h5>


    <a class="btn  botoncollape" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
       aria-controls="collapseExample">
        Categoria <span style="    font-size: 11px;   padding-left: 5px;">(Ver +) </span> <br>
    </a>


    <div class="collapse" id="collapseExample">
        <div class="" style="padding-top: 10px;">
            <?php $tmp = \app\models\Categorias::findAll(['estado' => 1, 'idPadre' => $padre]) ?>
            <?php $pos = 0?>
            <?= Html::radioList("categorias", isset($model['categorias'])?$model['categorias']:'' , ArrayHelper::map($tmp,'idcategoria','nombre')) ?>
            <?php if(isset($model['categorias'])){$pos=$model['categorias'];}?>
            <?php /* foreach ($tmp as $item): ?>
                <?php //= Html::radio("categorias", ((isset($model['categorias'][$item['idcategoria']])) ? true : false), ['label' => $item['nombre']]) ?>
                <?php if(isset($model['categorias'][$item['idcategoria']])){$pos=$item['idcategoria'];}?>
            <?php endforeach;*/ ?>

        </div>
        <?php if($pos!=0):?>
        <h5 class="text-uppercase"><strong>Sub-categorias</strong></h5>
        <div class="" style="padding-top: 10px;">
            <?php $tmp = \app\models\Categorias::findAll([ 'idPadre' => $pos]) ?>
            <?= Html::checkboxList("subcategorias", (isset($model['subcategorias']) ? $model['subcategorias'] : ''), ArrayHelper::map($tmp,'idcategoria','nombre')) ?>
        </div>
        <?php endif; ?>
    </div>


    <br>


    <a class="btn  botoncollape" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false"
       aria-controls="collapseExample">
        Rango de precio <span style="    font-size: 11px;   padding-left: 5px;">(Ver +) </span> <br>
    </a>


    <div class="collapse" id="collapseExample2">
        <div class="" style="padding-top: 10px;">
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

        </div>
    </div>


    <br>
    <?php $tmp = \app\models\CondicionProducto::find()->all() ?>

    <a class="btn  botoncollape" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false"
       aria-controls="collapseExample">
        Condicion del Producto <span style="    font-size: 11px;   padding-left: 5px;">(Ver +) </span> <br>
    </a>


    <div class="collapse" id="collapseExample3">
        <div class="" style="padding-top: 10px;">
            <?php // foreach ($tmp as $item): ?>
                <?= Html::checkboxList("condicion", ((isset($model['condicion'])) ? $model['condicion'] : ''), ArrayHelper::map($tmp,'id_cp','nombre') ) ?>
            <?php // endforeach; ?>

        </div>
    </div>


    <br>

    <?php $tmp = \app\models\TallasProducto::find()->all() ?>


    <a class="btn  botoncollape" role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="false"
       aria-controls="collapseExample">
        Tallas de los Productos <span style="    font-size: 11px;   padding-left: 5px;">(Ver +) </span> <br>
    </a>


    <div class="collapse" id="collapseExample4">
        <div class="" style="padding-top: 10px;">
            <?= Html::checkboxList("talla", ((isset($model['talla'])) ? $model['talla'] : ''), ArrayHelper::map($tmp,'id_tp','nombre')) ?>
        </div>
    </div>

    <br>


    <?php $tmp = \app\models\MaterialProducto::find()->all() ?>


    <a class="btn  botoncollape" role="button" data-toggle="collapse" href="#collapseExample5" aria-expanded="false"
       aria-controls="collapseExample">
        Material de los Productos <span style="    font-size: 11px;   padding-left: 5px;">(Ver +) </span> <br>
    </a>


    <div class="collapse" id="collapseExample5">
        <div class="" style="padding-top: 10px;">
            <?= Html::checkboxList("material", ((isset($model['material'])) ? $model['material'] : ''),ArrayHelper::map($tmp,'id_mp','nombre')) ?>
        </div>
    </div>


    <br>
    <?php $tmp = \app\models\MarcaProducto::find()->all() ?>


    <a class="btn  botoncollape" role="button" data-toggle="collapse" href="#collapseExample6" aria-expanded="false"
       aria-controls="collapseExample">
        Marcas de los Productos <span style="    font-size: 11px;   padding-left: 5px;">(Ver +) </span> <br>
    </a>


    <div class="collapse" id="collapseExample6">
        <div class="" style="padding-top: 10px;">
                <?= Html::checkboxList("marca", ((isset($model['marca'])) ? $model['marca'] : ''), ArrayHelper::map($tmp,'id_msp','nombre')) ?>
        </div>
    </div>


    <br>


    <?php $tmp = \app\models\ColoresProductos::find()->all() ?>


    <a class="btn  botoncollape" role="button" data-toggle="collapse" href="#collapseExample7" aria-expanded="false"
       aria-controls="collapseExample">
        Colores de los Productos <span style="    font-size: 11px;   padding-left: 5px;">(Ver +) </span> <br>
    </a>


    <div class="collapse" id="collapseExample7">
        <div class="" style="padding-top: 10px;">
                <?= Html::checkboxList("color", ((isset($model['color'])) ? $model['color'] : ''),ArrayHelper::map($tmp,'id_co','nombre')) ?>
        </div>
    </div>


    <br>


    <?php $tmp = \app\models\Ciudad::find()->all() ?>


    <a class="btn  botoncollape" role="button" data-toggle="collapse" href="#collapseExample8" aria-expanded="false"
       aria-controls="collapseExample">
        Ciudad <span style="    font-size: 11px;   padding-left: 5px;">(Ver +) </span> <br>
    </a>


    <div class="collapse" id="collapseExample8">
        <div class="" style="padding-top: 10px;">
                <?= Html::checkboxList("ciudad", ((isset($model['ciudad'])) ? $model['ciudad'] : ''), ArrayHelper::map($tmp,'idciudad','nombre')) ?>
        </div>
    </div>


    <br>


    <div>
        <button type="submit" href="" class="text-center registrarse btn" style="margin-left: 0">FILTRAR</button>
        <br>
        <a class="" href="<?= \yii\helpers\Url::to(['comprar']) ?>"
           style="color: #000;    font-size: 11px;    font-weight: 600;">
            quitar filtros </a>
    </div>
    <br><br>

    <?php $form::end() ?>
</div>