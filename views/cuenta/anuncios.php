<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnunciosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>


<div class="anuncios-index">

    <h1>Mis productos</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Anuncios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'Categoria',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->categoria)
                        return $model->categoria['nombre'];
                    return '';
                }
            ],
            'titulo',
            'codigo',
            [
                'header' => 'Foto Portada',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img('@web/imagen/anuncios/' . $model->foto, ['class' => 'img-responsive', 'style' => 'width:150px']);
                }
            ],
            // 'precio',
            // 'estado',
            [
                'header' => 'Estado',
                'filter' => \kartik\widgets\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'estado',
                    'data' => (new \app\models\Anuncios())->getEstado(true),
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


            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Operaciones',
                'template' => '<div class="btn-group btn-group-justified" role="group">{update}{delete}</div>',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-pencil"></i>', $url, ['class' => 'btn btn-info']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-trash"></i>', $url, ['class' => 'btn btn-danger', 'data' => [
                            'confirm' => 'Esta seguro?.'
                        ], "title" => "Eliminar"]);
                    },
                ],
                'contentOptions' => ['class' => 'col-sm-1']
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
