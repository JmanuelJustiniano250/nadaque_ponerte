<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

$configuracion = \app\models\Configuracion::find()->one();
$this->render('../site/widgets/metatags', ['model' => $configuracion]);

use himiklab\thumbnail\EasyThumbnailImage;
use kartik\widgets\StarRating;

$script = <<<CSS

.blog-section.with-sidebar {
    padding: 0px 0;
}
CSS;
$this->registerCss($script);


?>

<?= $this->render('../site/widgets/perfilus'); ?>


<div class="section-content blog-section with-sidebar">


    <div class="shortcodes-elem">
        <!-- Nav tabs -->
        <div class="statistic-box style2">


            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">

                        <div class="statistic-post">
                            <div class="statistic-counter">
                                <?php $tmp = \app\models\Anuncios::find()->where(['estado' => 1, 'idusuario' => Yii::$app->session->get('user')['idusuario']])->count() ?>
                                <p><span class="timer" data-from="0" data-to="<?= $tmp ?>"><?= $tmp ?></span></p>
                                <p>VENDIDOS</p>

                            </div>
                        </div>


                        <div class="statistic-post">
                            <div class="statistic-counter">
                                <?php $tmp = \app\models\Anuncios::find()->where(['estado' => 1, 'idusuario' => Yii::$app->session->get('user')['idusuario']])->sum('visitas') ?>
                                <p><span class="timer" data-from="0" data-to="<?= $tmp ?>"><?= $tmp ?></span></p>
                                <p>ANUNCIOS VIGENTES</p>

                            </div>
                        </div>


                    </div>


                    <div class="col-sm-4 col-xs-12">

                        <?=
                        EasyThumbnailImage::thumbnailImg(
                            Yii::getAlias('@webroot/imagen/usuarios/') . $model['foto'],
                            205,
                            205,
                            EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                            ['style' => ' border-radius: 140px; margin: 0 auto; margin-top:20px;', 'class' => 'img-responsive']
                        );
                        ?>


                    </div>


                    <div class="col-sm-4 col-xs-12">

                        <div class="statistic-post">
                            <div class="statistic-counter">
                                <?php $tmp = \app\models\Anuncios::find()->where(['estado' => 2, 'idusuario' => Yii::$app->session->get('user')['idusuario']])->count() ?>

                                <p><span class="timer" data-from="0" data-to="<?= $tmp ?>"><?= $tmp ?></span></p>
                                <p>EXPIRADOS</p>

                            </div>
                        </div>
                        <div class="statistic-post">
                            <div class="statistic-counter">
                                <?php $tmp = \app\models\Anuncios::find()->where(['estado' => 3, 'idusuario' => Yii::$app->session->get('user')['idusuario']])->select('COUNT(visitas) as visitas')->count() ?>
                                <p><span class="timer" data-from="0" data-to="<?= $tmp ?>"><?= $tmp ?></span></p>
                                <p>PAQUETES VIGENTES</p>

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

                        <p class="aliasestrela">  <?php echo $model['alias'] ?> </p>


                        <?php

                        echo StarRating::widget([
                            'name' => 'rating_21',
                            'value' => 2,
                            'pluginOptions' => [
                                'readonly' => true,
                                'showClear' => false,
                                'showCaption' => false,
                            ],
                        ]); ?>
                    </div>

                    <div class="col-sm-4 col-xs-12">
                        <p class="nomcom">

                            <?php echo $model['nombres'] ?>
                        </p>
                    </div>

                    <div class="col-sm-4 col-xs-12">
                        <ul class="redespergil">
                            <?php if ($model['facebook']): ?>

                                <?php if ($model['visiblefacebook']): ?>
                                <li>
                                    <a href="<?= $model['facebook'] ?>" target="_blank"><i
                                                class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                    <?php else:?>
                                <?php endif; ?>
                            <?php endif; ?>





                            <?php if ($model['twitter']): ?>
                                <?php if ($model['visibletwittwe']): ?>
                                <li>
                                    <a href="<?= $model['twitter'] ?>" target="_blank"><i
                                                class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                            <?php else:?>
                            <?php endif; ?>
                            <?php endif; ?>



                            <?php if ($model['youtube']): ?>

                                <?php if ($model['visibleyoutu']): ?>
                                <li>
                                    <a href="<?= $model['youtube'] ?>" target="_blank"><i
                                                class="fa fa-youtube" aria-hidden="true"></i></a>
                                </li>
                            <?php else:?>
                            <?php endif; ?>
                            <?php endif; ?>



                            <?php if ($model['instagram']): ?>

                                <?php if ($model['visibleinsta']): ?>

                                <li>
                                    <a href="<?= $model['instagram'] ?>" target="_blank"><i class="fa fa-instagram"
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


        <div class="tabsperof">
            <div class="row">
                <?= $this->render('menu') ?>
            </div>
        </div>


    </div>
    <div class="container">
        <div class="row">

            <div class="col-xs-12" style="padding-top: 60px">
                <?php
                switch ($op) {
                    case '1':
                        echo $this->render('register', ['model' => $model]);
                        break;
                    case '2':
                        echo $this->render('anuncios2', ['searchModel' => $searchModel,
                            'dataProvider' => $dataProvider, 'model' => $model]);
                        break;
                    case '3':
                        echo $this->render('calificaciones');
                        break;
                    case '4':
                        echo $this->render('calificaciones', ['searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,]);
                        break;
                    case '5':
                        echo $this->render('form_anuncio', ['model' => $model]);
                        break;
                    case '6':
                        echo $this->render('anuncios', ['searchModel' => $searchModel,
                            'dataProvider' => $dataProvider, 'model' => $model]);
                        break;

                }
                ?>
            </div>
        </div>
    </div>

</div>
<br><br><br><br><br>