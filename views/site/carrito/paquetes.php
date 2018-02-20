<?php

use kartik\widgets\ActiveForm;
use himiklab\thumbnail\EasyThumbnailImage;
use kartik\widgets\StarRating;
use yii\bootstrap\Nav;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Anunciantes */
/* @var $form ActiveForm */

$configuracion = \app\models\Configuracion::find()->one();
$this->render('../widgets/metatags', ['model' => $configuracion]);

$script = <<<CSS
.nav-pills > li.active > a{
    background-color: #ff5a96;
}

.nav-pills > li > a{
    color: #ff5a96;
}

.nav-tabs > li, .nav-pills > li {
    float:none;
    display:inline-block;
    *display:inline; /* ie7 fix */
}

CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);
?>

<!-- pricing-section
            ================================================== -->
<div class="section-content pricing-section">
    <!--<div class="text-center">
        <?=
        // Usage with bootstrap nav pills.
        Nav::widget([
                'options' => ['class' => 'nav nav-pills '],
                'items' => [
                    ['label' => 'Comprar', 'url' => ['site/vender', 'page' => 'comprar']],
                    ['label' => 'Publicar', 'url' => ['site/vender', 'page' => 'publicar']]
                ]
            ]
        );
        ?>
    </div> -->


    <?php $compra = \app\models\Compra::find()->where(['idusuario' => Yii::$app->session->get('user')['idusuario']])->count() ?>


    <div class="shortcodes-elem">
        <!-- Nav tabs -->
        <div class="statistic-box style2">


            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">

                        <div class="statistic-post">
                            <div class="statistic-counter">
                                <?php if ($compra): ?>
                                    <?php $tmp = \app\models\Anuncios::find()->where(['estado' => 1, 'idusuario' => Yii::$app->session->get('user')['idusuario']])->count() ?>
                                    <p><span class="timer" data-from="0" data-to="<?= $tmp ?>"><?= $tmp ?></span></p>
                                    <p>ANUNCIOS EN LINEA</p>

                                <?php else: ?>

                                <?php endif; ?>

                            </div>
                        </div>


                        <div class="statistic-post">
                            <div class="statistic-counter">
                                <?php if ($compra): ?>
                                    <?php $tmp = \app\models\Anuncios::find()
                                        ->joinWith(['paquete','paquete.paquete'])
                                        ->andWhere(['<=','(fecha_aprovacion+tiempo_vida)','NOW()'])
                                        ->andWhere(['anuncios.idusuario' => Yii::$app->session->get('user')['idusuario']])
                                        ->distinct()
                                        ->count() ?>
                                    <p><span class="timer" data-from="0" data-to="<?= $tmp ?>"><?= $tmp ?></span></p>
                                    <p>ANUNCIOS VIGENTES</p>

                                <?php else: ?>

                                <?php endif; ?>

                            </div>
                        </div>


                    </div>


                    <div class="col-sm-4 col-xs-12">

                        <?=
                        EasyThumbnailImage::thumbnailImg(
                            Yii::getAlias('@webroot/imagen/usuarios/') . $model2['foto'],
                            205,
                            205,
                            EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                            ['style' => ' border-radius: 140px; margin: 0 auto;', 'class' => 'img-responsive']
                        );
                        ?>


                    </div>


                    <div class="col-sm-4 col-xs-12">

                        <div class="statistic-post">
                            <div class="statistic-counter">


                                <?php if ($compra): ?>

                                    <?php $tmp = \app\models\Compra::find()
                                        ->joinWith('paquete')
                                        ->andWhere(['>','(fecha_aprovacion+tiempo_vida)','NOW()'])
                                        ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
                                        ->distinct()
                                        ->count() ?>

                                    <p><span class="timer" data-from="0" data-to="<?= $tmp ?>"><?= $tmp ?></span></p>
                                    <p>EXPIRADOS</p>

                                <?php else: ?>

                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="statistic-post">
                            <div class="statistic-counter">
                                <?php if ($compra): ?>
                                    <?php $tmp = \app\models\Compra::find()
                                        ->joinWith('paquete')
                                        ->andWhere(['<=','(fecha_aprovacion+tiempo_vida)','NOW()'])
                                        ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
                                        ->distinct()
                                        ->count() ?>
                                    <p><span class="timer" data-from="0" data-to="<?= $tmp ?>"><?= $tmp ?></span></p>
                                    <p>PAQUETES VIGENTES</p>
                                <?php else: ?>

                                <?php endif; ?>

                            </div>
                        </div>

                    </div>


                </div>
            </div>


        </div>


        <div class="submenuper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12 esor">


                        <?php

                        echo StarRating::widget([
                            'name' => 'rating_21',
                            'value' => 0,
                            'pluginOptions' => [
                                'readonly' => true,
                                'showClear' => false,
                                'showCaption' => false,
                            ],
                        ]); ?>
                    </div>

                    <div class="col-sm-4 col-xs-12">
                        <p class="nomcom">

                            <?php echo $model2['alias'] ?>
                        </p>
                    </div>

                    <div class="col-sm-4 col-xs-12">
                        <ul class="redespergil">
                            <?php if ($model2['facebook']): ?>

                                <?php if ($model2['visiblefacebook']): ?>
                                    <li>
                                        <a href="<?= $model2['facebook'] ?>" target="_blank"><i
                                                    class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                <?php else:?>
                                <?php endif; ?>
                            <?php endif; ?>





                            <?php if ($model2['twitter']): ?>
                                <?php if ($model2['visibletwittwe']): ?>
                                    <li>
                                        <a href="<?= $model2['twitter'] ?>" target="_blank"><i
                                                    class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                <?php else:?>
                                <?php endif; ?>
                            <?php endif; ?>



                            <?php if ($model2['youtube']): ?>

                                <?php if ($model2['visibleyoutu']): ?>
                                    <li>
                                        <a href="<?= $model2['youtube'] ?>" target="_blank"><i
                                                    class="fa fa-youtube" aria-hidden="true"></i></a>
                                    </li>
                                <?php else:?>
                                <?php endif; ?>
                            <?php endif; ?>



                            <?php if ($model2['instagram']): ?>

                                <?php if ($model2['visibleinsta']): ?>

                                    <li>
                                        <a href="<?= $model2['instagram'] ?>" target="_blank"><i class="fa fa-instagram"
                                                                                                aria-hidden="true"></i></a>
                                    </li>
                                <?php else:?>

                                <?php endif; ?>

                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>







    <div class="title-section white">
        <div class="container">
            <h1>Oferta de anuncios</h1> <br>
            <p>Seleccione el anuncio suelto o el paquete que te convenga</p>
        </div>
    </div>












    <div class="container">
        <div class="pricing-box">
            <?php foreach ($model as $item): ?>
                <div class="pricing-item">
                    <ul class="pricing-table basic">
                        <li class="title">
                            <h1><?= $item['nombre'] ?></h1>
                            <p>Bs <span><?= $item['precio'] ?></span> / <?= $item['tiempo_vida'] ?> Dias</p>
                        </li>
                        <li>
                            <p>Nro. de anuncios <?= $item['nro_anuncios'] ?> </p>
                        </li>
                        <li>
                            <p><?= $item['descripcion'] ?></p>
                        </li>
                        <li>
                            <a href="<?= Url::to(['site/carrito', 'id' => $item['idpaquete']]) ?>" class="button-third">Elegir</a>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>

        </div>
    </div>









</div>

