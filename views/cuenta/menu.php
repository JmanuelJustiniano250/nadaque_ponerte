<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use kartik\sidenav\SideNav;


$script = <<<CSS

.nav-stacked > li + li {
    margin-top: 0px;

        margin-left: -4px;
}
.kv-sidenav li a {
    border-radius: 0;
    border-bottom: 0px solid #ddd;
    text-align: center;
    text-transform: uppercase;
      font-family: 'Raleway', sans-serif;
      color: #333333;
      background: #f6f6f6;
    border-left: 1px solid #dddddd;     padding: 15px 15px;
}
.nav-pills > li {
    margin-left: 0px;
    display: inline-block;
        width: 16.66666%;
}
.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    color: #ff839a;
    background-color: #f6f6f6;
}
@media (max-width: 991px) and (min-width: 768px) {
   .nav-pills > li {
    width: 32.66666%!important;
}
}
@media (max-width: 767px)and (min-width: 470px){
.nav-pills > li {
    
   width: 32.66666%!important;
}
}


@media (max-width: 469px){
.nav-pills > li {
    
   width: 49.66666%!important;
}
}


CSS;
$this->registerCss($script);


$this->params['breadcrumbs'][] = $this->title;
$items = array();
array_push($items,[
    'url' => ['cuenta/principal'],
    'label' => 'Mi Perfil',
]);
array_push($items,[
    'url' => ['cuenta/anuncios2'],
    'label' => 'Anuncios',
]);
/*array_push($items,[
    'url' => '#',
    'label' => 'Muro',
]);*/
array_push($items,[
    'url' => ['/cuenta/calificaciones'],
    'label' => 'Calificaciones',
]);
array_push($items,[
    'url' => ['/cuenta/comentarios'],
    'label' => 'Comentarios',
]);
array_push($items,[
    'url' => '#',
    'label' => 'Mi lista de Deseos',
]);
?>
<?= SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    'heading' => false,
    'items' => $items
        /*[
            'url' => ['cuenta/compras'],
            'label' => 'Mis Compras',
        ],*/
    ,
]);
?>
