<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarritoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carritos';
$this->params['breadcrumbs'][] = $this->title;
$tmp = new \app\models\Carrito();
?>
<?php
$format = <<< SCRIPT
function format(state) {
if (!state.id) return state.text; // optgroup
return state.text;
}
SCRIPT;
$escape = new \yii\web\JsExpression("function(m) { return m; }");
$this->registerJs($format, \yii\web\View::POS_HEAD);
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
                        <?php // = Html::a('Nuevo Producto', ['create'], ['class' => 'btn btn-success']) ?>
                    </div>

                    <div class="box-body ">

                        <?php Pjax::begin(['id' => 'table']); ?>
                        <div class="table-responsive">   <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    [
                                        'header' => 'Usuario',
                                        'value' => function ($model) {
                                            return $model->usuario['nombre'] . " " . $model->usuario['apellido'];
                                        },
                                    ],
                                    [
                                        'header' => 'Estado',
                                        'value' => function ($model) {
                                            return $model->getEstado();
                                        },
                                        'filter' => \kartik\widgets\Select2::widget([
                                            'model' => $searchModel,
                                            'attribute' => 'estado',
                                            'data' => $tmp->estados,
                                            'language' => 'es',
                                            'options' => [
                                                'placeholder' => 'Categorias',
                                                //'multiple' => true,
                                            ],
                                            'pluginOptions' => [
                                                'templateResult' => new \yii\web\JsExpression('format'),
                                                'templateSelection' => new \yii\web\JsExpression('format'),
                                                'escapeMarkup' => $escape,
                                                'allowClear' => true
                                            ],
                                        ])
                                    ],
                                    'fecha_registro',
                                    'nit',
                                    // 'razon_social',
                                    // 'session',
                                    'monto_total',
                                    // 'fecha_pago',
                                    [
                                        'header' => 'Tipo Pago',
                                        'value' => function ($model) {
                                            return $model->getTipoPago();
                                        },
                                        'filter' => \kartik\widgets\Select2::widget([
                                            'model' => $searchModel,
                                            'attribute' => 'tipo_pago',
                                            'data' => $tmp->tipoPagos,
                                            'language' => 'es',
                                            'options' => [
                                                'placeholder' => 'Categorias',
                                                //'multiple' => true,
                                            ],
                                            'pluginOptions' => [
                                                'templateResult' => new \yii\web\JsExpression('format'),
                                                'templateSelection' => new \yii\web\JsExpression('format'),
                                                'escapeMarkup' => $escape,
                                                'allowClear' => true
                                            ],
                                        ])
                                    ],
                                    // 'tipo_carro',

                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header' => 'Operaciones',
                                        'template' => '<div class="btn-group btn-group-justified" role="group">{view}{delete}</div>',
                                        'buttons' => [
                                            'view' => function ($url, $model, $key) {
                                                return Html::a('<i class="fa fa-eye"></i>', $url, ['class' => 'btn btn-info', "title" => "Editar"]);
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

