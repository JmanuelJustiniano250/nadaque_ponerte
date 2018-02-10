<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Carrito */

$this->title = $model->idcompra;
$this->params['breadcrumbs'][] = ['label' => 'Carritos', 'url' => ['index']];
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
                    <a class="btn btn-default" href="<?= \yii\helpers\Url::to(['index']) ?>">Atras</a>
                </div>

                <div class="box-body ">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'idcarrito',
                            [
                                'attribute' => 'idusuario',
                                //'format'=>'raw',
                                'value' => $model->usuario['nombres'] . ' ' . $model->usuario['apellidos'],
                            ],
                            'fecha_registro',
                            'precio',
                        ],
                    ]) ?>


                </div>
            </div>

            <div class="box">

                <div class="box-header">
                    <h3>Detalle</h3>
                </div>

                <div class="box-body ">
                    <?php
                    $items = \app\models\Paquetes::find()->where(['idpaquete' => $model->idpaquete]);
                    $dataProvider = new \yii\data\ActiveDataProvider([
                        'query' => $items,
                        'pagination' => false,
                    ]);

                    ?>
                    <?= \yii\grid\GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            //'idcarrito',
                            [
                                'header' => 'producto',
                                'value' => function ($model) {

                                    return $model['nombre'];
                                },
                            ],
                            'descripcion:html',
                            'precio',
                        ],
                    ]) ?>


                </div>
            </div>
        </div>
</section>

