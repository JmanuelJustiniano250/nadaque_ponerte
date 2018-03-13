<?php

use kartik\export\ExportMenu;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnunciosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anuncios';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$format = <<< SCRIPT
function format(state) {
//Sif (!state.id) return state.text; // optgroup
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
                                'codigo',
                                'titulo',
                                'fecha_registro',
                                'estado',
                                'precio',
                                'idcategoria',
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
                        <div class="table-responsive">
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'codigo',
                                    'titulo',
                                    [
                                        'header' => 'Foto',
                                        'format' => 'raw',
                                        'value' => function ($model) {

                                            return Html::img('@web/imagen/anuncios/' . $model->foto, ['class' => 'img-thumbnail']);;
                                        },
                                        'contentOptions' => ['class' => 'col-md-2']
                                    ],
                                    [
                                        'header' => 'Usuario',
                                        'format' => 'raw',
                                        'value' => function ($model) {
                                            if ($model->usuario)
                                                return $model->usuario['alias'];
                                        },
                                        'filter' => \kartik\widgets\Select2::widget([
                                            'model' => $searchModel,
                                            'attribute' => 'idusuario',
                                            'data' => \yii\helpers\ArrayHelper::map(\app\models\Usuarios::findAll(['estado' => 1, 'tipo' => 1]), 'idusuario', 'alias'),
                                            'language' => 'es',
                                            'options' => [
                                                'placeholder' => 'Usuarios',
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

                                    [
                                        'header' => 'Estado',
                                        'format' => 'raw',
                                        'value' => function ($model) {
                                                return $model->getEstado();
                                        },
                                        'filter' => \kartik\widgets\Select2::widget([
                                            'model' => $searchModel,
                                            'attribute' => 'estado',
                                            'data' => (new \app\models\Anuncios())->getEstado(true),
                                            'language' => 'es',
                                            'options' => [
                                                'placeholder' => 'Estado',
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

                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header' => 'Destacado',
                                        'template' => '<div class="btn-group btn-group-justified" role="group">{estado}</div>',
                                        'buttons' => [
                                            'estado' => function ($url, $model, $key) {
                                                switch ($model->estado) {
                                                   case '5':
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
                                        'template' => '<div class="btn-group btn-group-justified" role="group">{view}</div>',
                                        'buttons' => [
                                            'view' => function ($url, $model, $key) {
                                                return Html::a('<i class="fa fa-edit"></i>', $url, ['class' => 'btn btn-info', "title" => "Ver"]);
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