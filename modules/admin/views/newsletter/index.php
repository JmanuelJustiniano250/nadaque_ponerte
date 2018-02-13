<?php

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

//use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsletterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newsletters';
$this->params['breadcrumbs'][] = $this->title;
?>
    <section class="content-header">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        <?php /* Html::a('Nuevo Banner', ['create'], ['class' => 'btn btn-success'])*/
                        echo ExportMenu::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'nombre',
                                'email:email',
                                'fecha_registro',
                            ],
                            'target' => ExportMenu::TARGET_BLANK,
                            'fontAwesome' => true,
                            'stream' => false,
                            'filename' => 'newsletter'
                        ]);
                        ?>
                    </div>

                    <div class="box-body ">
                        <?php Pjax::begin(['id' => 'table']); ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'responsive' => true,
                            'hover' => true,

                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                'nombre',
                                'email:email',
                                'fecha_registro',

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'Operaciones',
                                    'template' => '<div class="btn-group btn-group-justified" role="group">{delete}</div>',
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
                        <?php Pjax::end(); ?>

                    </div>
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
