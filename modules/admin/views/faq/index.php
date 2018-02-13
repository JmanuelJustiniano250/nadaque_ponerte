<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faqs';
$this->params['breadcrumbs'][] = $this->title;
?>
    <section class="content-header">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        <?= Html::a('Nuevo FAQ', ['create'], ['class' => 'btn btn-success']) ?>
                    </div>

                    <div class="box-body ">
                        <?php Pjax::begin(['id' => 'table']); ?>
                        <div class="table-responsive">
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    'titulo',
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header' => 'Estado',
                                        'template' => '<div class="btn-group btn-group-justified" role="group">{estado}</div>',
                                        'buttons' => [
                                            'estado' => function ($url, $model, $key) {
                                                switch ($model->estado) {
                                                    case '1':
                                                        $model->estado = 'success';
                                                        break;
                                                    case '2':
                                                        $model->estado = 'warning';
                                                        break;
                                                    default:
                                                        $model->estado = 'default';
                                                        break;
                                                }
                                                return Html::a('<i class="toggle fa fa-eye"></i>', "#", ['class' => 'btn btn-' . $model->estado, 'onclick' => "action('{$url}'); return false;", "title" => "Visible"]);
                                            },

                                        ],
                                        'contentOptions' => ['class' => 'col-sm-1']
                                    ],
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header' => 'Operaciones',
                                        'template' => '<div class="btn-group btn-group-justified" role="group">{update}{delete}</div>',
                                        'buttons' => [
                                            'update' => function ($url, $model, $key) {
                                                return Html::a('<i class="fa fa-pencil"></i>', $url, ['class' => 'btn btn-info', "title" => "Editar"]);
                                            },
                                            'delete' => function ($url, $model, $key) {

                                                return Html::a('<i class="fa fa-trash"></i>', $url, ['class' => 'btn btn-danger', 'data' => [
                                                    'confirm' => 'Esta seguro?.'
                                                ], "title" => "Eliminar"]);
                                            },
                                        ],
                                        'contentOptions' => ['class' => 'col-sm-2']
                                    ],
                                ],
                            ]); ?>
                        </div>
                        <?php Pjax::end(); ?></div>
                </div>
            </div>
        </div>
    </section>

<?php
$script = <<<JS
    function action(url)
    {
    $.get(url, function(data) {
      $.pjax.reload({container:"#table"});
    });
    }

JS;
$this->registerJs($script, \yii\web\View::POS_HEAD);
