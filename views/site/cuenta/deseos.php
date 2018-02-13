<?php

use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */

$model = new \app\models\Usuarios();


?>

<div class="section-content blog-section with-sidebar">
    <div class="container">
        <h2 class="bold text-center"
            style="font-weight: 600;  font-size: 35px;   margin-bottom: 24px;  margin-top: -5px;">Lista de Deseos</h2>
        <div class="blog-box">
            <?php Pjax::begin(['id' => 'table']); ?>
            <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        [
                            'attribute' => 'idnuncio',
                            'value' => function ($model) {
                                if (!empty($model->anuncio))
                                    return Html::a($model->anuncio['titulo'], ['anuncio' => '']);
                                return '';
                            },
                        ],
                        'fecha_registro',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Operaciones',
                            'template' => '<div class="btn-group btn-group-justified" role="group">{delete}</div>',
                            'buttons' => [
                                'delete' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-trash"></i>', ['/site/deseos-delete', 'id' => $key], ['class' => 'btn btn-danger', 'data' => [
                                        'confirm' => 'Esta seguro?.'
                                    ], "title" => "quitar"]);
                                },
                            ],
                            'contentOptions' => ['class' => 'col-sm-1']
                        ],
                    ],
                ]); ?>
            </div>
            <?php Pjax::end(); ?>
        </div>
    </div>

</div>