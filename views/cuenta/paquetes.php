<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = 'Crear Anuncios';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$compras = \app\models\Compra::find()
    ->andWhere(['>=', 'estado', 1])
    ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
    ->distinct()
    ->all();
$tabla = array();
foreach ($compras as $item) {
    $row = array();
    $row['codigo'] = $item->paquete['codig'];
    $paquete = $item->paquete;
    $row['nro_anuncios'] = $item->paquete['nro_anuncios'];
    $row['nro_anuncios_restantes'] = $item->paquete['nro_anuncios'] - \app\models\Anuncios::find()->where(['idcompra' => $item['idcompra']])->count();
    if (empty($item['fecha_pago'])) {
        $row['fecha_expiracion'] = 'aun no se cancelo el pago';
        $row['fecha_pago'] = 0;

    } else {
        $row['fecha_pago'] = $item['fecha_pago'];
        $dia = date("d", strtotime($item['fecha_pago'])) + (int)$item->paquete['tiempo_vida'];
        $row['fecha_expiracion'] = mktime(0, 0, 0, date("m", strtotime($item['fecha_pago'])), $dia, date("Y", strtotime($item['fecha_pago'])));
    }
    array_push($tabla, $row);
}
$provider = new \yii\data\ArrayDataProvider([
    'allModels' => $tabla,
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<div class="anuncios-create">

    <div class="paquetesres">

        <div class="table-responsive">
            <?=
            yii\grid\GridView::widget([
                'dataProvider' => $provider,
                'tableOptions' => ['class' => 'table table-hover'],
                'showHeader' => false,
                'columns' => [
                    [
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::tag(
                                'p',
                                'Código del Paquete ' . Html::tag(
                                    'span',
                                    $model['codigo']

                                )
                            );
                        },
                    ],
                    [
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::tag(
                                'p',
                                'Anuncios remanentes ' . Html::tag(
                                    'span',
                                    $model['nro_anuncios_restantes']
                                )
                            );
                        },
                    ],
                    [
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::tag(
                                'p',
                                'Fecha de expiración ' . Html::tag(
                                    'span',
                                    ((is_integer($model['fecha_expiracion'])) ? \app\components\Funcions::fecha(date('Y-m-d H:i:s', $model['fecha_expiracion']), true, true) : $model['fecha_expiracion'])

                                ) .
                                '<br>' .
                                Html::tag(
                                    'span',
                                    '(Fecha de compra : ' . ((!empty($model['fecha_pago'])) ? \app\components\Funcions::fecha($model['fecha_pago'], true, true) : ' - ') . ' )',
                                    ['style' => "font-size: 11px;"]
                                ),
                                ['style' => "border-right: 1px solid transparent"]
                            );
                        },
                    ],
                    // ...
                ],
            ]);
            ?>
            <!--<tr>
                <td>
                    <p>Codigo del Paquete <span>25464</span> <br>
                    <span style="font-size: 11px;">(Fecha de compra : <span></span>05 Mar 2018 )</span>
                    </p>
                </td>

                <td>
                    <p>Anuncios totales <span>7</span></p>
                </td>

                <td>
                    <p>Anuncios remanentes <span>4</span></p>
                </td>

                <td>
                    <p style="border-right: 1px solid transparent">Fecha de expiracion
                        <br> <span>05 Mar 2018</span>
                    </p>
                </td>
            </tr>-->

        </div>

    </div>
</div>
