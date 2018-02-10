<?php
$categorias = \app\models\Categoria::getMenu($modulo);

use kartik\widgets\SideNav;
use yii\helpers\Url;

$items = [];
foreach ($categorias as $item) {
    $sub = $item->categorias;
    if (count($sub) > 0) {
        $values = [];
        foreach ($sub as $value) {
            $sub2 = $value->categorias;


            if (count($sub2) > 0) {
                $tmp = [];
                foreach ($sub2 as $value2) {
                    array_push($tmp, ['label' => $value2['nombre'], 'icon' => '', 'url' => Url::to([$modulo . '?cat=' . $value2['idcategoria']]), 'active' => ($value2['idcategoria'] == Yii::$app->getRequest()->getQueryParam('cat'))]);
                }
                array_push($values, ['label' => $value['nombre'], 'icon' => '', 'items' => $tmp]);
            } else {
                array_push($values, ['label' => $value['nombre'], 'icon' => '', 'url' => Url::to([$modulo . '?cat=' . $value['idcategoria']]), 'active' => ($value['idcategoria'] == Yii::$app->getRequest()->getQueryParam('cat'))]);
            }
        }
        array_push($items, ['label' => $item['nombre'], 'icon' => '', 'items' => $values]);
    } else {
        array_push($items, ['label' => $item['nombre'], 'icon' => '', 'url' => Url::to([$modulo . '?cat=' . $item['idcategoria']]), 'active' => ($item['idcategoria'] == Yii::$app->getRequest()->getQueryParam('cat')),]);
    }
}

echo "<div class='row'>" . SideNav::widget([
        'encodeLabels' => false,
        'heading' => false,
        'items' => $items,
        'containerOptions' => ['class' => ''],

    ]) . "</div>";

