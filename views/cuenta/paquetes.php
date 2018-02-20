<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = 'Crear Anuncios';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$compras = \app\models\Compra::find()
    ->andWhere(['>=','estado',1])
    ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
    ->distinct()
    ->all();
$tabla = array();
foreach ($compras as $item){
    $row['codigo'] = $item->paquete['codig'];
    $row['fecha_pago'] = $item['fecha_pago'];
    $row['nro_anuncios'] = $item->paquete['nro_anuncios'];
    $row['nro_anuncios_restantes'] = $item->paquete['nro_anuncios']-\app\models\Anuncios::find()->where(['idcompra'=>$item['idcompra']])->count();
    $row['fecha_expiracion'] = mktime(0, 0, 0, date("m", $item['fecha_pago']), date("d", $item['fecha_pago'])+$item->paquete['tiempo_vida'], date("Y", $item['fecha_pago']));
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
                     'tableOptions'=>['class' => 'table table-hover'],
                     'showHeader'=>false,
                     'columns' => [
                         [
                             'format' => 'raw',
                             'value' => function ($model) {
                                 return Html::tag(
                                     'p',
                                     'Codigo del Paquete '.Html::tag(
                                         'span',
                                         $model['codigo']
                                     ).
                                     '<br>'.
                                     Html::tag(
                                         'span',
                                         '(Fecha de compra :'.$model['codigo'].')',
                                         ['style'=>"font-size: 11px;"]
                                     )
                                 );
                             },
                         ],
                         [
                             'format' => 'raw',
                             'value' => function ($model) {
                                 return Html::tag(
                                     'p',
                                     'Anuncios remanentes '.Html::tag(
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
                                     'Fecha de expiracion '.Html::tag(
                                         'span',
                                         \app\components\Funcions::fecha($model['fecha_expiracion'],true,true)
                                     ).
                                     '<br>'.
                                     Html::tag(
                                         'span',
                                         '(Fecha de compra :'.$model['codigo'].')',
                                         ['style'=>"font-size: 11px;"]
                                     ),
                                     ['style'=>"border-right: 1px solid transparent"]
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
