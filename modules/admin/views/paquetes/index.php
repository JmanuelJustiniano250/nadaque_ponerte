<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paquetes';
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
                        <?= Html::a('Nuevo Paquete', ['create'], ['class' => 'btn btn-success']) ?>

                    </div>

                    <div class="box-body ">
                        <?php Pjax::begin(['id' => 'table']); ?>
                        <div class="table-responsive">
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'nombre',
                                    'nro_anuncios',
                                    'tiempo_vida',

                                    //'idcategoria',
                                    //'descripcion:ntext',
                                    //'imagen',
                                    // 'link1',
                                    // 'link2',
                                    // 'imagen3',
                                    // 'idpadre',

                                    // 'modulo',
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
