<?php

$script = <<<CSS
CSS;
//$this->registerCss($script);

$configuracion = \app\models\Configuracion::find()->one();
$this->render('widgets/metatags', ['model' => $configuracion]);

?>
<!--=============== wrapper ===============-->
<?= $this->render('widgets/breadcrumbs'); ?>


<div class="container">
    <div class="row">


        <div class="col-md-3 col-xs-12">

            <!--<h5><strong>CATEGORÍA</strong></h5>
            <h4 class="colortemp"><strong>Vestidos</strong></h4>-->

            <!--<? /*= $form->field($model, 'pais')->label(false)->dropDownList(
                ['f1' => 'Filtrar por vendedores']

            ) */ ?> -->


            <?= $this->render('anuncios/sidebar', ['model' => $datos]) ?>

        </div>


        <div class="col-md-9 col-xs-12">

            <?= $this->render('anuncios/lista', ['model' => $data->getModels()]); ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    echo \yii\widgets\LinkPager::widget([
                        'pagination' => $data->pagination,
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<br>



