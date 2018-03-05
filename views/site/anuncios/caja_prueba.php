<?php

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\helpers\Url;

$script = <<<CSS

.list2 p {
    font-size: 13px;
    font-family: Calibri;
    line-height: 20px;
    margin: 0 0 24px;
    color: white;
    margin-bottom: 10px;
    font-weight: 300;}
CSS;
$this->registerCss($script);

$items = $data->getModels()

?>

<?php foreach ($items as $item): ?>
    <div class="col-lg-4 col-sm-6 col-xs-12 paddres" style=" padding-left: 0">
        <div class="tituloanun">
            <h3 class="text-center"> Mariana Montenegro Carvajal</h3>
        </div>

        <div class="imgprove project-gal">
            <img src="<?= Url::to('@web/imagen/anuncios/anuncio1.jpg') ?>" class="img-responsive"
                 style="margin: 0 auto; ">
            <div class="hover-box box2">
                <a href="">
                    <?= FA::icon(FA::_EYE) ?>
                </a>
            </div>
        </div>


        <div class="cajadesc">

            <div class="row">
                <div class="list1">
                    <div class="fl1 ">
                        <span>Cod : 2158841</span>
                    </div>
                    <div class=" fl2" align="center">

                        <img src="<?php echo Url::to('@web/imagen/anuncios/usuario1.jpg') ?>" class="img-responsive"
                             style="margin: 0 auto;     border-radius: 40px" width="51px" height="51px">

                    </div>
                    <div class=" fl3">
                        <p style="    margin-bottom: -5px;  margin-top: 0;"><a href=""><?= FA::icon(FA::_HEART) ?></a>
                        </p>
                        <p style="    margin-bottom: 0px;   margin-top: 0;"><a href=""><?= FA::icon(FA::_ARROWS_H) ?>

                            </a>
                        </p>
                    </div>
                </div>

                <div class="list2">

                    <h3 class="text-center">VESTIDO DE MEZCLILLA COLOR AZUL EN TELA JEAN </h3>
                    <p class="text-center">Talla : M &nbsp; Nuevo con etiqueta &nbsp; <br> Bs. 10.000 <span
                                style="    text-decoration: line-through;">Bs. 22.000</span></p>
                </div>


            </div>
        </div>


    </div>

<?php endforeach; ?>

<div class="col-xs-12" align="center">
    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $data->pagination,
    ]); ?>
</div>
