<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnunciosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="anuncios-index">

    <h1>Mis compras</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('realizar compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'Paquete',
                'filter' => \kartik\widgets\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'estado',
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Paquetes::findAll(['estado' => 1]), 'idpaquete', 'nombre'),
                    'language' => 'es',
                    'options' => [
                        'placeholder' => 'Paquetes',
                        //'multiple' => true,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'value' => function ($model) {
                    if ($model->paquete)
                        return $model->paquete['nombre'];
                    return '';
                }
            ],
            'fecha_aprovacion',
            'precio',
            // 'estado',
            [
                'header' => 'Estado',
                'filter' => \kartik\widgets\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'estado',
                    'data' => (new \app\models\Compra())->getEstado(true),
                    'language' => 'es',
                    'options' => [
                        'placeholder' => 'Estados',
                        //'multiple' => true,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'value' => function ($model) {
                    return $model->getEstado();
                }
            ],

        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
