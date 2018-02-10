<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Contenido_search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contenidos';
$this->params['breadcrumbs'][] = $this->title;
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


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                </div>

                <div class="box-body ">
                    <?php Pjax::begin(); ?>
                    <div class="table-responsive">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'idcontenido',
                                'titulo',
                                //'idcategoria',
                                [
                                    'header' => 'categoria',
                                    'value' => function ($model) {
                                        if (!empty($model->idcategoria))
                                            return \app\models\Categorias::findOne(['=', 'idcategoria', $model->idcategoria])['nombre'];
                                        return '';
                                    },
                                    'filter' => \kartik\widgets\Select2::widget([
                                        'model' => $searchModel,
                                        'attribute' => 'idcategoria',
                                        'data' => \app\models\Categorias::getSelectMenu('contenido'),
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
                                //'resumen:ntext',
                                //'descripcion:ntext',
                                'fecha_modificacion',
                                // 'estado',
                                // 'disponible',
                                // 'tags:ntext',
                                // 'posicion',
                                // 'alias',
                                // 'foto',
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'Operaciones',
                                    'template' => '<div class="btn-group btn-group-justified" role="group">{update}</div>',
                                    'buttons' => [
                                        'update' => function ($url, $model, $key) {
                                            return Html::a('<i class="fa fa-pencil"></i>', $url, ['class' => 'btn btn-info']);
                                        },
                                    ],
                                    'contentOptions' => ['class' => 'col-sm-1']
                                ],
                            ],
                        ]); ?>
                    </div>
                    <?php Pjax::end(); ?></div>
            </div>
        </div>
    </div>
</section>