<?php

use kartik\widgets\SideNav;
use yii\helpers\Url;


$script = <<<CSS
/*
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 0px solid transparent;
    border-radius: 0px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}
.nav-pills > li > a {
    border-radius: 0px;
}

.kv-sidenav li a {
    border-radius: 0;
    border-bottom: 0px solid #ddd;
}


ul.nav-stacked > li > a{
    background: black;
    color: white;
     border-top: 1px solid rgba(0, 0, 0, 0.3);
        box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.05) inset;
        text-align: left;
            border-bottom: 1px solid;

}


ul.nav-stacked > li.active > a{
   
  background: TRANSPARENT;
    color: red;
}

ul.nav-stacked > li:hover > a{
      background: rgb(228, 52, 46);
    color: white;
}

ul.nav-stacked > li:focus > a{
   background: rgb(228, 52, 46);
    color: white;
}


ul.nav-stacked > li.active:hover > a{
    background: rgb(228, 52, 46);
    color: white;
}

ul.nav-stacked > li.active:focus > a{
  background: rgb(228, 52, 46);
    color: white;
}




.kv-sidenav > li > a.kv-toggle  {
      background: black;
    color: white;
    border-top: 1px solid rgba(0, 0, 0, 0.3);
        box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.05) inset;
        text-align: left;
            font-weight: 600;
    
}

.kv-sidenav .indicator {
    color: white;
}





.nav-stacked > li + li {
    margin-top: 0px;
    margin-left: 0;
}

.kv-sidenav > li.active > a.kv-toggle  {
      background: rgb(242, 145, 44);
    color: white;
}

.kv-sidenav > li:hover > a.kv-toggle  {
           background: rgb(242, 145, 44);
    color: white;
}
.kv-sidenav > li:focus > a.kv-toggle  {
           background: rgb(242, 145, 44);
    color: white;
}

.kv-sidenav > li:active > a.kv-toggle  {
        background: rgb(242, 145, 44);
    color: white;
}

.kv-sidenav > li.active:hover > a.kv-toggle  {
          background: rgb(242, 145, 44);
    color: white;
}
  .kv-sidenav > li.active:focus > a.kv-toggle  {
      background: rgb(242, 145, 44);
    color: white;
}
    
    .nav > li > a {
    position: relative;
    display: block;
    padding: 14px 15px;
}
    */
.nav-pills > li > a {
    padding: 5px 0px 0px;
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
    border-radius: 0;
    border-bottom: 0px solid #000;
    font-size: 14px;
  font-family: 'Raleway', sans-serif;
  font-weight: 500;
  color: #505050;
}

.kv-sidenav .indicator {
    color: #505050;
    font-weight: 100;
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
.kv-sidenav .active > a > span > .indicator {
    color: #ff5a96;
}


ul.kv-sidenav > li.active:focus > a{

color: #ff5a96;
background: transparent;
}




ul.kv-sidenav > li.active:active > a{
color: #ff5a96;
background: transparent;
}

.todosn:hover, .todosn:focus, .todosn:active{
    text-decoration: none;
    color: #ff5a96;
}
.todosn{
border-radius: 0;
    border-bottom: 0px solid #000;
    font-size: 14px;
    font-family: 'Raleway', sans-serif;
    font-weight: 500;
    color: #505050;
    padding-left: 5px;
}


CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);


?>


<?php


$categoria = \app\models\Categorias::findOne(['alias' => 'anuncios']);
$cats = $categoria->categorias;


?>

    <h5 class="menu-left sidebarpr text-uppercase"><!--<?//= $categoria['nombre'] ?>--> CATEGORÍAS</h5>
    <a class="menu-left sidebarpcat " href="<?= Url::to(['comprar']) ?>" style="color: #505050">
        <!--<?//= $categoria['nombre'] ?>--> Todos los productos</a>


    <!--<span style="color: #3565b5;">POR CIUDAD</span>-->
    <div id="accordion" class="panel-group accordion">
        <!--<div class="panel">
            <div class="panel-heading">
                <a href="<? /*= site_url($this->uri->segment(1)); */ ?>">
                    <h5 class="panel-title">Ver Todo<span class="pull-right glyphicon glyphicon-menu-right"></span></h5>
                </a>
            </div>
        </div>-->

        <?php $items = [];
        foreach ($cats as $item) {


            $sub = [];
            if (count($sub) > 0) {
                $values = [];
                foreach ($sub as $value) {
                    $sub2 = $value->categorias;


                    if (count($sub2) > 0) {
                        $tmp = [];
                        foreach ($sub2 as $value2) {
                            array_push($tmp, ['label' => $value2['nombre'], 'icon' => '', 'url' => Url::to(['comprar' . '?cat=' . $value2['idcategoria']]), 'active' => ($value2['idcategoria'] == Yii::$app->getRequest()->getQueryParam('cat'))]);
                        }
                        array_push($values, ['label' => $value['nombre'], 'icon' => '', 'items' => $tmp]);
                    } else {
                        array_push($values, ['label' => $value['nombre'], 'icon' => '', 'url' => Url::to(['comprar' . '?cat=' . $value['idcategoria']]), 'active' => ($value['idcategoria'] == Yii::$app->getRequest()->getQueryParam('cat'))]);
                    }
                }
                array_push($items, ['label' => $item['nombre'], 'icon' => '', 'items' => $values]);
            } else {
                array_push($items, ['label' => $item['nombre'], 'icon' => 'indicator glyphicon glyphicon-menu-right pull-right', 'url' => Url::to(['comprar' . '?cat=' . $item['idcategoria']]), 'active' => ($item['idcategoria'] == Yii::$app->getRequest()->getQueryParam('cat')),]);

            }


        } ?>

        <?php
        echo "<div class='sidebarpcat'>" . SideNav::widget([
                'encodeLabels' => false,
                'heading' => false,
                'items' => $items,
                'containerOptions' => ['class' => ''],

            ]) . "</div>"; ?>

    </div>

<?php









