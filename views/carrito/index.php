<?php

use yii\helpers\Html;
use yii\helpers\Url;


$script = <<<CSS
.desactivadow{
pointer-events: none;   cursor: default;   opacity: 0.5;
}

.activadow{
pointer-events: initial;   cursor: pointer;   opacity: 1;
}
CSS;
$this->registerCss($script);


$this->registerCssFile('@web/assets_b/web/css/easy-responsive-tabs.css', ['media' => 'screen', '']);
$this->registerjsFile('@web/assets_b/web/js/easyResponsiveTabs.js', ['depends' => \app\assets_b\AppAsset::className(), 'position' => \yii\web\View::POS_END]);

echo $this->render('../site/widgets/metatags', ['model' => \app\models\Configuracion::find()->one()]);
?>

<div id="mainbody">

    <h1 class="text-center">Carrito</h1> <br><br>
    <div class=" top-spacing4 bottom-spacing3">

        <div class="col-md-7 col-lg-6 col-lg-offset-1">

            <?php \yii\widgets\Pjax::begin() ?>


            <div class="table-responsive carw">

                <table class="table table-hover table-condensed text-cener">
                    <thead>
                    <tr>
                        <td class="pad20">
                            <div align="center"><strong>Producto</strong></div>
                        </td>
                        <td class="pad20">
                            <div align="center"><strong>Descripción</strong></div>
                        </td>
                        <td class="pad20">
                            <div align="center"><strong>Cantidad</strong></div>
                        </td>
                        <td class="pad20">
                            <div align="center"><strong>Precio (Bs.)</strong></div>
                        </td>

                        <td class="pad20">
                            <div align="center"></div>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (Yii::$app->cart->positions as $item):
                        ?>
                        <tr>
                            <td align="center" class="pad20"><?= $item['nombre'] ?></td>
                            <td align="center" class="pad20"><?= $item['descripcion'] ?></td>
                            <td align="center" class="pad20"><?= $item->quantity ?></td>
                            <td align="center" class="pad20"><?= $item->precio ?></td>

                            <td align="center" class="pad20"><a
                                        href="<?= \yii\helpers\Url::to(['remove', 'id' => $item->id]) ?>"
                                        class="btn btn-sm btn-danger"><i class="fa fa-trash fa-lg"></i></a></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>
        </div>

    </div>


    <div class="col-md-5 col-lg-4 col-xs-11 padlew" style="padding-left: 40px;">


        <div class="panel panel-default carw">

            <div class="panel-body">
                <div class="col-md-12">
                    <strong>Cantidad Artículos</strong>
                    <div class="pull-right">
                        <span>
                <?= Yii::$app->cart->getCount() ?>

                         </span>
                    </div>
                    <hr>
                </div>


                <div class="col-md-12">
                    <strong>Monto total</strong>
                    <div class="pull-right"><span>Bs. </span><span><?= Yii::$app->cart->getCost() ?> </span></div>
                    <hr>
                </div>

                <div class="col-md-12 text-center">
                    <div class="" role="group" aria-label="...">


                        <div class="col-xs-12">
                            <input  type="checkbox" name="check" id="check" value="1"
                                    onchange="javascript:showContent()"/>

                            <a href="<?= Url::to(['/site/pages', 'id' => 'condiciones']) ?>" target="_blank" class="tardetncon" style="font-size: 12px; margin-bottom: 10px;">

                                Aceptar condiciones de uso

                            </a>
                            <br>
                        </div>


                        <?php
                        if (empty(Yii::$app->session->get('user'))) {
                            echo Html::a('CONTINUAR', Url::to(['site/login']), ['class' => 'btn enviarsus btnpag', 'data-target' => '#squarespaceModal']);
                        } else {
                            echo Html::a('CONTINUAR', Url::to(['pasos', 'pasos' => '1']), ['class' => 'btn enviarsus btnpag desactivadow', 'style' => '', 'id' => 'content']);
                        }
                        ?>
                    </div>
                    <br>


                    <a href="<?= Url::to(Yii::$app->request->referrer); ?>" class="cea " style="    color: #ff6d89;
    font-weight: 600;  "><span style="font-size: 1.5em;"><i
                                    class="fa fa-angle-left" aria-hidden="true"></i>&nbsp;
                    </span> Volver a ofertas de anuncios </a>

                </div>

            </div>

        </div>


        <?php \yii\widgets\Pjax::end() ?>


    </div>


</div>
<br><br><br>


<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {

            $("#content").addClass("activadow");
            $("#content").removeClass("desactivadow");
        }
        else {


            $("#content").addClass("desactivadow");
            $("#content").removeClass("activadow");
        }
    }
</script>


<?php
$script = <<<JS
   $('#ChildVerticalTab_1').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_1', // The tab groups identifier
            activetab_bg: '#fff', // background color for active tabs in this group
            inactive_bg: '#fff', // background color for inactive tabs in this group
            //active_border_color: '#c1c1c1', // border color for active tabs heads in this group
           // active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
        });
JS;
$this->registerJs($script, \yii\web\View::POS_READY); ?>
