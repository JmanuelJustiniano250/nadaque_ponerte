<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Filtros';
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
                        <?php //= $this->render('_form', ['model' => new \app\models\Filtros()]); ?>

                    </div>

                    <div class="box-body ">
                        <?php Pjax::begin(['id' => 'table']); ?>
                        <?php foreach ($tablas as $item): ?>
                            <div class="col-sm-6 col-md-4">
                                <h2><?= $item['titulo']?></h2>
                                <?= $this->render('_form', ['model' => $item['model']]); ?>
                                <div class="table-responsive">
                                    <?= GridView::widget([
                                        'dataProvider' => $item['data'],
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            'nombre',
                                            'value',

                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'header' => '',
                                                'template' => '<div class="btn-group" role="group">{delete}</div>',
                                                'buttons' => [
                                                    'delete' => function ($url, $model, $key) {
                                                        return Html::a('<i class="fa fa-trash"></i>', $url, ['class' => 'btn btn-danger', 'data' => [
                                                            'confirm' => 'Esta seguro?.'
                                                        ], "title" => "Eliminar"]);
                                                    },

                                                ],
                                            ],
                                        ],
                                    ]); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
