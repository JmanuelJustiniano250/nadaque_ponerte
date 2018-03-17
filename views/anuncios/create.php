<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = 'Crea tu anuncio';
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$bannersp2 = \app\models\Banners::find()
    ->where(['estado' => '1', 'idcategoria' => '32'])
    ->orderBy(['rand()' => SORT_DESC])
    //->limit(2)
    ->all();


?>
<div class="anuncios-create">
    <div class="container">
        <div class="row">

            <div class="blog-post architecture">
                <div class="post-gal">
                    <div class="flexslider">
                        <ul class="slides">

                            <?php foreach ($bannersp2 as $row_bannerp3): ?>


                                <li>
                                    <img alt="" src="<?= Url::to('@web/imagen/banners/' . $row_bannerp3['foto']) ?>" />
                                </li>

                            <?php endforeach; ?>


                        </ul>
                    </div>
                </div>

            </div>
            <br><br>



            <h1 class="text-center" style="font-weight: 600"><?= Html::encode($this->title) ?></h1>
            <p class="text-center">Rellena los campos</p> <br><br>


            <div class="col-md-12  " align="center">
                <a href="" style="color: #ff6d89; font-weight: 600">Ver reglas de publicación</a>
                <br>
            </div>
            <br><br>



            <?= $this->render('_form', [
                'filtro' => $filtro,
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>



<?= $this->registerJsFile('@web/assets_b/js/jquery.flexslider.js');?>
