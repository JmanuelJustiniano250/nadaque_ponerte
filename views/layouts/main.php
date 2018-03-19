<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets_b\AppAsset;
use rmrevin\yii\fontawesome\FA;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?= \yii\helpers\Url::to('@web/web/images/favicon.png') ?>"/>
    <?php $this->head() ?>
</head>
<?php
$configuracion = \app\models\Configuracion::find()->one();
$model = New \app\models\SuscribeForm();
?>
<!--
<?php/*
if($configuracion['google_analitics']) {
    echo GoogleAnalytics::widget([
        'id'=>$configuracion['google_analitics'],
        'domain'=>Url::home(true)
    ]);
}*/
?>-->


<body>

<?php $this->beginBody() ?>

<div id="header" class="titulo1">

    <div id="menu">

        <?php
        $css = ".help-block{display:none !important;}";
        $this->registerCss($css);


        $items = [];
        $user = Yii::$app->session->get('user');
        if (!empty($user)) {
            $cmensages = \app\models\Mensajes::find()
                ->andWhere(['idvendedor' => Yii::$app->session->get('user')['idusuario']])
                ->andWhere(['tipo' => 0])
                ->andWhere(['estado' => 0])
                ->count();
            //$mensages = Html::tag('span',(int)$cmensages,['class'=>'badge bg-red']);
            $mensages = '<i data-count="'.((int)$cmensages).'" class="fa fa-envelope-o notification-icon"></i>';
            //$mensages = Html::a($mensages,['/cuenta/mensajeria']);
            $items[] = ['label' => FA::icon(FA::_USER) . ' ' . $user['nombres'] , 'url' => ['/site/deseos/'],
                'items' => [
                    ['label' => FA::icon(FA::_USER) . ' Mi cuenta', 'url' => ['/cuenta/principal']],
                    ['label' => FA::icon(FA::_KEY) . ' Cambiar contraseña', 'url' => ['/cuenta/changepassword']],
                    ['label' => FA::icon(FA::_SIGN_OUT) . ' Salir', 'url' => ['/site/logout/']],
                ]];
            $items[] = ['label' => $mensages, 'url' => ['/cuenta/mensajeria']];
        } else {
            $items[] = ['label' => FA::icon(FA::_USER) . ' Ingresar', 'url' => ['/site/login']];
            $items[] = ['label' => FA::icon(FA::_EDIT) . ' Regístrate', 'url' => ['/site/register/']];
        }
        $items[] = ['label' => FA::icon(FA::_QUESTION_CIRCLE_O) . ' FAQ', 'url' => ['/site/faq']];

        $txt_count = FA::icon(FA::_HEARTBEAT) . ' ' . Html::tag('strong', \app\models\Anuncios::find()->where(['estado' => 1])->count()) . ' anuncios de prendas disponibles para tí';
        ?>

        <div class="menuprin">


            <div class="container hidden-xs ">
                <!-- Menu principal -->
                <ul class="nav navbar-nav navbar-left padding-title">
                    <li><p class="plomo-1t"><?= $txt_count ?></p></li>
                </ul><?php echo \yii\bootstrap\Nav::widget([
                    'options' => ['class' => ' navbar-nav navbar-right plomo-1t padding-title leftes'],
                    'encodeLabels' => false,
                    'items' => $items,
                ]);
                ?>
            </div>
        </div>

        <nav class="navbar navbar-default visible-xs">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header menuprin">
                    <div class="col-xs-9"><p class="plomo-1t pull-left" style="padding-top: 5px"><?= $txt_count ?></p>
                    </div>
                    <div class="col-xs-3">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>


                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php echo \yii\bootstrap\Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right plomo-1t leftes2'],
                        'encodeLabels' => false,
                        'items' => $items,
                    ]);
                    ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


        <a class="visible-sm visible-xs hidden-md hidden-lg logores" href="<?= Url::home() ?>"><img
                    src="<?= Url::to(['assets_b/images/logo.png']) ?>" class="logo" style="margin: 0 auto; display: block;
    max-width: 100%;" alt=""></a>


        <div class="container-fluid">
            <div class="row">


                <?php \yii\bootstrap\NavBar::begin(['brandLabel' => '']); ?>


                <?php
                $categoria2 = \app\models\Categorias::findOne(['alias' => 'noticias']);

                //$cat = \app\models\Categoria::findOne(['alias' => 'noticias']);
                $cats2 = $categoria2->categorias;
                $items_p2 = [];

                foreach ($cats2 as $item2) {
                    // array_push($items_p, ['label' => $item['nombre'], 'url' => Url::to([$categoria['alias'] .  '?cat=' .   $item['idcategoria']]), 'active' => ($item['idcategoria'] == Yii::$app->getRequest()->getQueryParam('cat')),]);
                    array_push($items_p2, ['label' => $item2['nombre'], 'url' => Url::to([$categoria2['alias'] . ((!empty($item2['alias'])) ? '?id=' . $item2['alias'] : '?cat=' . $item2['idcategoria'])])]);
                }

                ?>

                <?php echo \yii\bootstrap\Nav::widget([
                    'options' => ['class' => 'navbar-nav memnupd'],
                    'encodeLabels' => false,

                    // 'submenuTemplate' => "\n<ul class=\" dropdown-menu \" >\n{items}\n</ul>\n",


                    'items' => [
                        ['label' => 'VER ANUNCIOS', 'url' => ['/site/comprar']],
                        ['label' => 'ANUNCIAR ' . FA::icon(FA::_CAMERA), 'url' => ['/site/opciones']],
                        ['label' => '¿CÓMO FUNCIONA?', 'url' => ['/site/pages', 'id' => 'como-funciona']],
                        ['label' => "<img class='logover'  src='" . Yii::$app->request->baseUrl . "/assets_b/images/logo" . ".png' alt='Image Missing'>", 'url' => ['/site/index'], 'options' => ['class' => 'hidden-xs hidden-sm logovera'],],

                        ['label' => '¿QUIÉNES SOMOS?', 'url' => ['/site/pages', 'id' => 'quienes-somos']],
                        ['label' => 'NOTICIAS', 'template' => '<a href="{url}" id="servicio-menu" data-toggle="dropdown">{label}</a>', 'options' => ['class' => 'dropdown'], 'url' => '#', 'items' => $items_p2],
                        ['label' => 'CONTACTO', 'url' => ['/site/contacto']],
                    ],
                ]);
                ?>


                <!--<form action="<? //= Url::to(['site/productos'])?>" class="navbar-form navbar-right" role="search" method="get">
                    <div class="form-group">
                        <input type="text" placeholder="BUSCAR..." id="s" class="texto" name="s">
                    </div>
                    <input type="submit" class="btn btn-info" value="">
                </form>
                -->


                <?php \yii\bootstrap\NavBar::end() ?>
            </div>
        </div>
    </div>

</div>

<?= $content ?>

<div class="col-xs-12" style="padding-left: 0; padding-right: 0">

<div class="newslatter">

    <div class="container">
        <div class="row">


            <div class="col-md-5 col-xs-12">
                <?= FA::icon(FA::_ENVELOPE_O)->pullRight()->size('2x') ?>
                <p><span>SUSCRIBETE AQUÍ PARA SIEMPRE ENTERARTE DE NUESTRAS NOVEDADES Y OFERTAS.</span></p>
            </div>
            <div class="col-md-7 col-xs-12">

                <?php $model = new \app\models\Newsletter(); ?>
                <?php $form = ActiveForm::begin(['options' => ['class' => 'newslrwe'], 'action' => ['cuenta/suscribe'], 'method' => 'post']); ?>
                <div class="col-md-9 col-xs-12">
                    <?= $form->field($model, 'email')->label(false)->input('email')->textInput(['class' => 'form-control', 'placeholder' => 'MAIL']) ?>

                </div>
                <div class="col-md-3 col-xs-12">
                    <input type="submit" name="enviar" class="btn enviarsus" value="ENVIAR">
                </div>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>

</div>
</div>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 text-center border-br" style="  border-right: 1px solid #c5c5c5;">

                <div class="">
                    <img src="<?= Url::to(['assets_b/images/logo2.png']) ?>" class="logo"
                         style="margin: 0 auto; display: block;  max-width: 100%; padding-bottom: 12px;" alt="">
                    <p style="font-size: 11px; color: #ff5a96;">"Hecho con cariño y sol en Santa Cruz de la Sierra"</p>

                    <p class="colorfonw"><?= $configuracion['direccion']; ?></p>
                    <a href="">Ver Mapa</a>
                    <p class="colorfonw"> Tel.: <?= $configuracion['telefono']; ?> &nbsp; - &nbsp;
                        Cel.: <?= $configuracion['movil']; ?> <i class="fa fa-whatsapp" aria-hidden="true"></i></p>
                    <p class="colorfonw"><?= $configuracion['email']; ?></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 border-br"
                 style="  border-right: 1px solid #c5c5c5;     padding-bottom: 90px;">

                <div class="columna2">
                    <h3>CONÓCENOS</h3>

                    <?php echo Menu::widget([
                        'options' => ['class' => 'nolist',],
                        'activeCssClass' => 'active',
                        'encodeLabels' => false,
                        'lastItemCssClass' => '',
                        'submenuTemplate' => "\n<ul class=\" dropdown-menu \" >\n{items}\n</ul>\n",

                        'items' => [
                            ['label' => 'Quiénes somos', 'url' => ['site/pages', 'id' => 'quienes-somos'], 'options' => ['class' => ''],],
                            ['label' => 'Cómo funciona NQP', 'url' => ['site/pages', 'id' => 'como-funciona'], 'options' => ['class' => ''],],
                            ['label' => 'Condiciones de uso ', 'url' => ['site/pages', 'id' => 'condiciones'], 'options' => ['class' => ''],],
                            ['label' => 'Preguntas frecuentes', 'url' => ['site/faq'], 'options' => ['class' => ''],],
                            ['label' => 'Contacto', 'url' => ['/site/contacto'], 'options' => ['class' => ''],],

                        ],
                    ]);
                    ?>


                </div>

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 border-br"
                 style="  border-right: 1px solid #c5c5c5;     padding-bottom: 70px;">

                <div class="columna2">
                    <h3>NADA QUE PONERTE</h3>

                    <?php echo Menu::widget([
                        'options' => ['class' => 'nolist',],
                        'activeCssClass' => 'active',
                        'encodeLabels' => false,
                        'lastItemCssClass' => '',
                        'submenuTemplate' => "\n<ul class=\" dropdown-menu \" >\n{items}\n</ul>\n",

                        'items' => [
                            ['label' => 'Cómo vender?', 'url' => ['/site/pages', 'id' => 'como-vender'], 'options' => ['class' => ''],],
                            ['label' => 'Cómo comprar?', 'url' => ['/site/pages', 'id' => 'como-comprar'], 'options' => ['class' => ''],],
                            ['label' => 'Testimonios', 'url' => ['/site/tertimonios'], 'options' => ['class' => ''],],
                            ['label' => 'Videos tutoriales', 'url' => ['/site/tutoriales'], 'options' => ['class' => ''],],
                            ['label' => 'Formas de pago', 'url' => ['/site/pages', 'id' => 'formas-pago'], 'options' => ['class' => ''],],
                            ['label' => 'Reglas de publicación', 'url' => ['/site/pages', 'id' => 'reglas-publicacion'], 'options' => ['class' => ''],],

                        ],
                    ]);
                    ?>

                    <a href="" class="text-center registrarse ">REGÍSTRATE</a>

                </div>

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 border-br" style="   padding-bottom: 70px;">

                <div class="columna2">
                    <h3 style="    FONT-SIZE: 17PX;"> MANTENTE INFORMADA</h3>

                    <?php echo Menu::widget([
                        'options' => ['class' => 'nolist',],
                        'activeCssClass' => 'active',
                        'encodeLabels' => false,
                        'lastItemCssClass' => '',
                        'submenuTemplate' => "\n<ul class=\" dropdown-menu \" >\n{items}\n</ul>\n",

                        'items' => [
                            ['label' => 'Noticias', 'url' => ['/site/noticias'], 'options' => ['class' => ''],],
                            ['label' => 'Blog', 'url' => ['/site/noticias', 'id' => 'blog'], 'options' => ['class' => ''],],


                        ],
                    ]);
                    ?>


                    <ul class="redes">
                        <?php if ($configuracion['facebook']): ?>
                            <li>
                                <a href="<?= $configuracion['facebook'] ?>" target="_blank"><i
                                            class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if ($configuracion['twitter']): ?>
                            <li>
                                <a href="<?= $configuracion['twitter'] ?>" target="_blank"><i
                                            class="fa fa-twitter-square" aria-hidden="true"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if ($configuracion['youtube']): ?>
                            <li>
                                <a href="<?= $configuracion['youtube'] ?>" target="_blank"><i
                                            class="fa fa-youtube-square" aria-hidden="true"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if ($configuracion['instagram']): ?>
                            <li>
                                <a href="<?= $configuracion['instagram'] ?>" target="_blank"><i class="fa fa-instagram"
                                                                                                aria-hidden="true"></i></a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>

            </div>
        </div>
    </div>


    <div class="lineaadrono"></div>


    <img src="<?= Url::to(['assets_b/images/adorno.png']) ?>" class="logo" style="margin: 0 auto; display: block;
    max-width: 100%; padding-bottom: 10px; padding-top: 10px;" alt="">


    <div class="container">
        <div class="text-center">
            2017 &copy; Copyright By Nada Que Ponerte. All rights reserved.
            <br>
            Design & Development <a href="http://marcaymercado.com">Marca&Mercado</a>
            <br> <br>
            <?= Html::img('@web/assets_b/images/pagosnetf.jpg') ?>
            <?= Html::img('@web/assets_b/images/tarjetaf.jpg') ?>
            <?= Html::img('@web/assets_b/images/tarjetaf2.jpg') ?>
            <?= Html::img('@web/assets_b/images/sslf.jpg') ?>
        </div>
    </div>
</div>

	<a href="#0" class="cd-top" title="Go to top">Top</a>
	
	
<?php foreach (Yii::$app->session->getAllFlashes() as $message): ?>
    <?php /*= \kartik\widgets\Growl::widget([
        'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
        'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
        'body' => (!empty($message['message'])) ? \yii\helpers\Html::encode($message['message']) : 'Message Not Set!',
        'delay' => 1, //This delay is how long before the message shows
        'pluginOptions' => [
            'delay' => (!empty($message['duration'])) ? $message['duration'] : 5000, //This delay is how long the message shows for
            'placement' => [
                'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
            ]
        ]
    ]);*/
    \yii2mod\alert\Alert::widget([
        'useSessionFlash' => false,
        'options' => [
            'type' => (!empty($message['type'])) ? $message['type'] : 'error',
            'title' => (!empty($message['message'])) ? \yii\helpers\Html::encode($message['message']) : 'Message Not Set!',
            'animation' => "slide-from-top",
        ],
    ]); ?>
<?php endforeach; ?>

<?php
$script = "
	
";

$this->registerJs($script, \yii\web\View::POS_END);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
