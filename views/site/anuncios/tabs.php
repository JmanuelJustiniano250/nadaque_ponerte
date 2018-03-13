<?php

?>

<div class="container">
    <div class="row">

        <div class="col-xs-12">


            <div class="shortcodes-elem">

                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a href="#destacados" data-toggle="tab">
                            <p>DESTACADOS</p>
                        </a>
                    </li>
                    <li>
                        <a href="#ultimos" data-toggle="tab">
                            <p>ÚLTIMO</p>
                        </a>
                    </li>
                    <li>
                        <a href="#vistos" data-toggle="tab">
                            <p>MÁS VISTOS</p>
                        </a>
                    </li>

                </ul>

                <div class="tab-content">


                    <div class="tab-pane active" id="destacados">
                        <?php $productos = \app\models\Anuncios::find()->where(['enable' => '1', 'estado' => '5'])->limit(8)->all(); ?>
                        <?= $this->render('inicio', ['model' => $productos]); ?>
                    </div>


                    <div class="tab-pane" id="ultimos">
                        <?php $productos = \app\models\Anuncios::find()->where(['enable' => '1','estado' => '1'])->orderBy(['fecha_registro' => SORT_DESC])->limit(8)->all(); ?>
                        <?= $this->render('inicio', ['model' => $productos]); ?>
                    </div>


                    <div class="tab-pane" id="vistos">
                        <?php $productos = \app\models\Anuncios::find()->where(['enable' => '1','estado' => '1'])->orderBy(['visitas' => SORT_DESC])->limit(8)->all(); ?>
                        <?= $this->render('inicio', ['model' => $productos]); ?>
                    </div>


                </div>
            </div>


        </div>
    </div>
</div>