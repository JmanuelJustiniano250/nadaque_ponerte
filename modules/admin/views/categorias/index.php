<?php

use app\models\Modulos;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
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
                    <?= Html::a('Nueva Categoria', ['create'], ['class' => 'btn btn-success']) ?>

                </div>

                <div class="box-body ">
                    <?php Pjax::begin(); ?>
                    <div class="table-responsive">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'nombre',

                                [
                                    'header' => 'Modulo',
                                    'filter' => \kartik\widgets\Select2::widget([
                                        'model' => $searchModel,
                                        'attribute' => 'idmodulo',
                                        'data' => \yii\helpers\ArrayHelper::map(Modulos::findAll(['estado' => '1']), 'idmodulo', 'nombre'),
                                        'options' => ['placeholder' => 'Modulos'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]),
                                    'value' => function ($model) {
                                        if (!empty($model->modulo))
                                            return $model->modulo['nombre'];
                                        return '';
                                    },
                                ],

                                //'idcategoria',
                                //'descripcion:ntext',
                                //'imagen',
                                // 'link1',
                                // 'link2',
                                // 'imagen3',
                                // 'idpadre',

                                [
                                    'header' => 'Depende de',
                                    'value' => function ($model) {
                                        if (!empty($model->padre)) {
                                            return $model->padre['nombre'];
                                        }
                                        return '';
                                    },
                                    'filter' => \kartik\widgets\Select2::widget([
                                        'model' => $searchModel,
                                        'attribute' => 'idpadre',
                                        'data' => \yii\helpers\ArrayHelper::map(\app\models\Categorias::find()->orderBy('nombre')->all(), 'idcategoria', 'nombre'),
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

                                // 'modulo',
                                // 'estado',

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
                                            ],]);
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

