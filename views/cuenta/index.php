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

.item4{
background: #f6f6f6;
    padding: 30px 30px;
    margin-bottom: 20px;
}


.item4 h3 {
    color: #ff6d89;

    font-size: 18px;
    font-weight: 600;
    text-align: left;
    padding-left: 80px;

}

.item4 p {
    font-size: 13px;
    text-align: left;
    padding-left: 80px;

}

.kv-sidenav li a{
font-weight: 600;
}

CSS;
$this->registerCss($script);


?>

<?= $this->render('../site/widgets/perfilus'); ?>
<?php $compra = \app\models\Compra::find()->where(['idusuario' => Yii::$app->session->get('user')['idusuario']])->count() ?>


<div class="section-content blog-section with-sidebar">


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
                                        ->joinWith(['paquete', 'paquete.paquete'])
                                        ->andWhere(['<=', '(fecha_aprovacion+tiempo_vida)', 'NOW()'])
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
                            Yii::getAlias('@webroot/imagen/usuarios/') . $model['foto'],
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
                                        ->andWhere(['>', '(fecha_aprovacion+tiempo_vida)', 'NOW()'])
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
                                        ->andWhere(['<=', '(fecha_aprovacion+tiempo_vida)', 'NOW()'])
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
                        $query = \app\models\Calificaciones::find()
                            ->where(['idusuario' => Yii::$app->session->get('user')['idusuario']]);
                        $valor = ($query->sum('puntaje') / (!empty($query->count()) ? $query->count() : 1));
                        echo StarRating::widget([
                            'name' => 'rating_21',
                            'value' => ($valor / 5),
                            'pluginOptions' => [
                                'readonly' => true,
                                'showClear' => false,
                                'showCaption' => false,
                            ],
                        ]); ?>
                    </div>

                    <div class="col-sm-4 col-xs-12">
                        <p class="nomcom">

                            <?php echo $model['alias'] ?>
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
                                <?php else: ?>
                                <?php endif; ?>
                            <?php endif; ?>





                            <?php if ($model['twitter']): ?>
                                <?php if ($model['visibletwittwe']): ?>
                                    <li>
                                        <a href="<?= $model['twitter'] ?>" target="_blank"><i
                                                    class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                <?php else: ?>
                                <?php endif; ?>
                            <?php endif; ?>



                            <?php if ($model['youtube']): ?>

                                <?php if ($model['visibleyoutu']): ?>
                                    <li>
                                        <a href="<?= $model['youtube'] ?>" target="_blank"><i
                                                    class="fa fa-youtube" aria-hidden="true"></i></a>
                                    </li>
                                <?php else: ?>
                                <?php endif; ?>
                            <?php endif; ?>



                            <?php if ($model['instagram']): ?>

                                <?php if ($model['visibleinsta']): ?>

                                    <li>
                                        <a href="<?= $model['instagram'] ?>" target="_blank"><i class="fa fa-instagram"
                                                                                                aria-hidden="true"></i></a>
                                    </li>
                                <?php else: ?>

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
                        ?>
                        <div class="anuncios-create">

                            <div class="row" align="center">

                                <div class="col-xs-12 col-sm-8" style="float: initial!important;">
                                    <?php
                                    $tabla = \app\models\Calificaciones::find()
                                        ->andWhere(['idvendedor' => Yii::$app->session->get('user')['idusuario']])
                                        ->orderBy(['fecha_creacion' => SORT_DESC])
                                        ->all();
                                    $provider = new \yii\data\ArrayDataProvider([
                                        'allModels' => $tabla,
                                        'pagination' => [
                                            'pageSize' => 9,
                                        ],
                                    ]);
                                    \yii\widgets\Pjax::begin();

                                    echo \yii\widgets\ListView::widget([
                                        'dataProvider' => $provider,
                                        'itemView' => 'calificaciones',
                                        'summary' => false,
                                        'itemOptions' => ['class' => 'item4'],

                                    ]);
                                    \yii\widgets\Pjax::end();
                                    ?>

                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                    case '4':
                        $tabla = \app\models\Anuncios::find()
                            ->andWhere(['estado' => 1])
                            ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
                            ->all();
                        $provider = new \yii\data\ArrayDataProvider([
                            'allModels' => $tabla,
                            'pagination' => [
                                'pageSize' => 9,
                            ],
                        ]);
                        \yii\widgets\Pjax::begin();
                        ?>
                        <div class="anuncios-create">

                            <div class="row" align="center">

                                <div class="col-xs-12 col-sm-8" style="float: initial!important;">


                                    <div class="calificaciones">
                                        <?= \yii\widgets\ListView::widget([
                                            'dataProvider' => $provider,
                                            'itemView' => 'comentarios',
                                            'summary' => false,
                                            'itemOptions' => ['class' => 'item4'],

                                        ]);
                                        ?>

                                    </div>

                                </div>

                                <br><br>

                            </div>

                        </div>

                        <?php
                        \yii\widgets\Pjax::end();
                        break;
                    case '5':
                        echo $this->render('form_anuncio', ['model' => $model]);
                        break;
                    case '6':
                        echo $this->render('anuncios', ['searchModel' => $searchModel,
                            'dataProvider' => $dataProvider, 'model' => $model]);
                        break;

                    case '7':
                        echo $this->render('mensajeria', ['model' => $model, 'mensaje' => $mensaje, 'chat' => $chat]);
                        break;


                    case '8':
                        ?>
                        <div class="paquetesres">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                    $tabla = \app\models\Deseo::find()
                                        ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
                                        ->all();
                                    $provider = new \yii\data\ArrayDataProvider([
                                        'allModels' => $tabla,
                                        'pagination' => [
                                            'pageSize' => 9,
                                        ],
                                    ]);
                                    \yii\widgets\Pjax::begin();

                                    echo \yii\widgets\ListView::widget([
                                        'dataProvider' => $provider,
                                        'itemView' => 'listadeseos',
                                        'summary' => false,
                                        'itemOptions' => ['class' => 'item4 col-md-3 col-sm-6 col-xs-12'],

                                    ]);
                                    \yii\widgets\Pjax::end();
                                    ?>

                                </div>
                            </div>
                        </div>
                        <?php
                        break;


                    case '9':
                        echo $this->render('changepassword', ['model' => $model]);
                        break;


                }

                ?>


            </div>
        </div>
    </div>

</div>
<br><br><br><br><br>