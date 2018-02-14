<?php

use kartik\slider\Slider;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$script = <<<CSS
label {
    display: block;
  
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
        'language' => 'es',
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Usuarios::find()->where(['estado' => 1, 'tipo' => 1])->all(), 'idusuario', 'nombres'),
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Filtrar por vendedora'],
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
    <?php if (!isset($categorias)){
        $categorias = array();
    } ?>
    <?php if (!isset($padre)){
        $padre = '13';
    } ?>
    <h5 class="text-uppercase"><strong>Sub Categoria</strong></h5>
    <?= Html::checkboxList('categorias',$categorias,ArrayHelper::map(\app\models\Categorias::findAll(['estado'=>1,'idPadre'=>$padre]),'idcategoria','nombre'))?>
    <?php $tmp = \app\models\Categorias::findAll(['estado'=>1,'idPadre'=>$padre]) ?>
    <?php foreach ($tmp as $item): ?>
        <?= Html::checkbox("filtro[" . $item['idfiltro'] . "]", ((isset($model[$item['idfiltro']])) ? $model[$item['idfiltro']] : ''), ['label' => $item['nombre']]) ?>
        <?php $index++; ?>
    <?php endforeach; ?>
    <br>
    <h5 class="text-uppercase"><strong>Rango de precio</strong></h5>
    <?php echo '<b class="badge">10 Bs</b> ' . Slider::widget([
    'name'=>'precio',
    'value'=>'250,650',
    'sliderColor'=>Slider::TYPE_GREY,
    'pluginOptions'=>[
    'min'=>10,
    'max'=>1000,
    'step'=>10,
    'range'=>true
    ],
    ]) . ' <b class="badge">1,000 Bs</b>';
    ?>
    <br>
    <?php $condiciones = \app\models\CondicionProducto::find()->all()?>
    <?php if(count($condiciones)>0):?>
        <h5 class="text-uppercase"><strong>Condicion del Producto</strong></h5>
        <?php if (!isset($condicion)){
            $condicion = array();
        } ?>
        <?= Html::checkboxList('condicion',$condicion,ArrayHelper::map($condiciones,'id_cp','nombre'))?>
        <br>
    <?php endif;?>
    <?php $tallas = \app\models\TallasProducto::find()->all()?>
    <?php if(count($tallas)>0):?>
        <h5 class="text-uppercase"><strong>Tallas de los Productos</strong></h5>
        <?php if (!isset($talla)){
            $talla = array();
        } ?>
        <?= Html::checkboxList('talla',$talla,ArrayHelper::map($tallas,'id_tp','nombre'))?>
        <br>
    <?php endif;?>
    <?php $materiales = \app\models\MaterialProducto::find()->all()?>
    <?php if(count($materiales)>0):?>
        <h5 class="text-uppercase"><strong>Material de los Productos</strong></h5>
        <?php if (!isset($material)){
            $material = array();
        } ?>
        <?= Html::checkboxList('material',$material,ArrayHelper::map($materiales,'id_mp','nombre'))?>
        <br>
    <?php endif;?>
    <?php $marcas = \app\models\MarcaProducto::find()->all()?>
    <?php if(count($marcas)>0):?>
        <h5 class="text-uppercase"><strong>Marcas de los Productos</strong></h5>
        <?php if (!isset($marca)){
            $marca = array();
        } ?>
        <?= Html::checkboxList('marca',$marca,ArrayHelper::map($marcas,'id_msp','nombre'))?>
        <br>
    <?php endif;?>
    <?php $colores = \app\models\ColoresProductos::find()->all()?>
    <?php if(count($colores)>0):?>
        <h5 class="text-uppercase"><strong>Colores de los Productos</strong></h5>
        <?php if (!isset($color)){
            $color = array();
        } ?>
        <?= Html::checkboxList('color',$color,ArrayHelper::map($colores,'id_cp','nombre'))?>
        <br>
    <?php endif;?>
    <?php $ciudades = \app\models\Ciudad::find()->all()?>
    <?php if(count($ciudades)>0):?>
        <h5 class="text-uppercase"><strong>Ciudad</strong></h5>
        <?php if (!isset($ciudad)){
            $ciudad = array();
        } ?>
        <?= Html::checkboxList('ciudad',$ciudad,ArrayHelper::map($ciudades,'idciudad','nombre'))?>
        <br>
    <?php endif;?>


    <?php $form::end() ?>
</div>