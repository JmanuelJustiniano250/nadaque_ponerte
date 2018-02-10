<?php

use kartik\widgets\SideNav;
use yii\helpers\Url;


$script = <<<CSS
.nav-pills > li > a {
    padding: 0px 0px 5px;
}
.nav-pills > li > a:hover, .nav-pills > li > a:focus, .nav-pills > li > a:active  {
    color: #ff5a96;
    background: transparent;
}

.nav-pills > li > a.active {
    color: #ff5a96;
    background: transparent;
}

div.col-md-3 > div > .panel.panel-default {
    border-color: transparent;
}

.kv-sidenav li a {
    display: inline-block;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    padding-left: 20px;
    text-transform: uppercase;
    color: #3a3d41;
    font-size: 12px;
    font-family: 'Raleway', sans-serif;
    position: relative;
    font-weight: 700;
    border-bottom: 0px solid #ddd;
}

.kv-sidenav li a:before {
    position: absolute;
    content: '';
    width: 10px;
    height: 10px;
    border: 2px solid #e5e5e5;
    left: 0;
    top: 2px;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
}

.kv-sidenav .indicator {
    color: #337ab7;
    font-weight: 300;
}

.panel-default {
    border-color: rgba(221, 221, 221, 0);
}

.accordion .panel {
    box-shadow: none;
     border-bottom: 0px solid #000000; 
    border-radius: 0px;
}

.kv-sidenav > li.active > a.kv-toggle  {
    color: #ff5a96;
    background: transparent;
}

.kv-sidenav > li:hover > a.kv-toggle  {
    color: #ff5a96;
    background: transparent;
}
.kv-sidenav > li:focus > a.kv-toggle  {
    color: #ff5a96;
    background: transparent;
}

.kv-sidenav > li:active > a.kv-toggle  {
    color: #ff5a96;
    background: transparent;
}

.kv-sidenav > li.active:hover > a.kv-toggle  {
    color: #ff5a96;
    background: transparent;
}

.kv-sidenav > li.active:focus > a.kv-toggle  {
    color: #ff5a96;
    background: transparent;
}

.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    color: #ff5a96;
    background: transparent;
}

ul.kv-sidenav > li.active > a{
    color: #ff5a96;
    background: transparent;
}

ul.kv-sidenav > li.active:hover > a{
    color: #ff5a96;
    background: transparent;
}

ul.kv-sidenav > li.active:focus > a{
    color: #ff5a96;
    background: transparent;
}

ul.kv-sidenav > li.active:active > a{
    color: #ff5a96;
    background: transparent;
}

CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);

$menu = \app\models\Categorias::findOne(['alias' => 'noticias']);

?>

<div id="accordion" class="panel-group accordion">
    <?php
    $items = [];
    foreach ($menu->categorias as $item) {

        $sub = $item->categorias;
        if (count($sub) > 0) {
            $values = [];
            foreach ($sub as $value) {
                $sub2 = $value->categorias;

                if (count($sub2) > 0) {
                    $tmp = [];
                    foreach ($sub2 as $value2) {
                        array_push($tmp, ['label' => $value2['nombre'], 'icon' => '', 'url' => Url::to([$menu['alias'] . ((!empty($value2['alias'])) ? '?id=' . $value2['alias'] : '?cat=' . $value2['idcategoria'])]), 'active' => ($value2['idcategoria'] == $categoria['idcategoria'])]);
                    }
                    array_push($values, ['label' => $value['nombre'], 'icon' => '', 'items' => $tmp]);
                } else {
                    array_push($values, ['label' => $value['nombre'], 'icon' => '', 'url' => Url::to([$menu['alias'] . ((!empty($value['alias'])) ? '?id=' . $value['alias'] : '?cat=' . $value['idcategoria'])]), 'active' => ($value['idcategoria'] == $categoria['idcategoria'])]);
                }
            }
            array_push($items, ['label' => $item['nombre'], 'icon' => '', 'items' => $values]);
        } else {
            array_push($items, ['label' => $item['nombre'], 'icon' => '', 'url' => Url::to([$menu['alias'] . ((!empty($item['alias'])) ? '?id=' . $item['alias'] : '?cat=' . $item['idcategoria'])]), 'active' => ($item['idcategoria'] == $categoria['idcategoria']),]);

        }

    }
    ?>
    <div class='sidebarpcat'>
        <?= SideNav::widget([
            'encodeLabels' => false,
            'heading' => false,
            'items' => $items,
            'containerOptions' => ['class' => ''],

        ]); ?>

    </div>
</div>
