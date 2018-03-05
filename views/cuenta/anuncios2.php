<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnunciosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$script = <<<CSS

body{
background-color: #f6f6f6;
}
.nav-tabs {
    border: none;
    margin-top: 0px;
    margin-left: 5px;
}


.cajadeanuncio:hover, .cajadeanuncio:focus, .cajadeanuncio:active {
    background: transparent;
    
    border-color: #ff6d89;
}

.cajadeanuncio:hover > .cajadesc, .cajadeanuncio:focus > .cajadesc, .cajadeanuncio:active > .cajadesc {
    color: #fd839a;
}

.cajadeanuncio:hover p, .cajadeanuncio:focus p, .cajadeanuncio:active p {
    color: #fd839a !important;
}
CSS;


$this->registerCss($script);


?>


<div class="anuncios-index">


    <ul class="nav nav-tabs" id="myTab">
        <li class="active">
            <a href="#trendy" data-toggle="tab">

                <h2>Paquetes</h2>
            </a>
        </li>
        <li>
            <a href="#planning" data-toggle="tab">

                <h2>Anuncios en aprobación</h2>

            </a>
        </li>
        <li>
            <a href="#development" data-toggle="tab">

                <h2>Aprobados vigentes</h2>

            </a>
        </li>
        <li>
            <a href="#support" data-toggle="tab">
                <h2>Rechazados</h2>

            </a>
        </li>

        <li>
            <a href="#support2" data-toggle="tab">
                <h2>Expirados</h2>

            </a>
        </li>


    </ul>


    <div class="tab-content">
        <div class="tab-pane active" id="trendy">

            <?= $this->render('paquetes'); ?>

        </div>


        <div class="tab-pane" id="planning">

            <div class="anuncios-create">
                <div class="paquetesres">
                        <div class="row">
                            <div class="col-xs-12">
                                <?php
                                $tabla = \app\models\Anuncios::find()
                                    ->andWhere(['estado' => 0])
                                    ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
                                    ->distinct()
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
                                    'itemView' => 'aprobacion',
                                    'summary' => false,
                                    'itemOptions' => ['class' => 'item'],

                                ]);
                                \yii\widgets\Pjax::end();
                                ?>
                            </div>
                        </div>
                </div>
            </div>

        </div>


        <div class="tab-pane" id="development">
            <div class="anuncios-create">
                <div class="paquetesres">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $tabla = \app\models\Anuncios::find()
                                ->andWhere(['estado' => 1])
                                ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
                                ->distinct()
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
                                'itemView' => 'vigentes',
                                'summary' => false,
                                'itemOptions' => ['class' => 'item2'],
                            ]);
                            \yii\widgets\Pjax::end();
                            ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="tab-pane" id="support">
            <div class="anuncios-create">
                <div class="paquetesres">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $tabla = \app\models\Anuncios::find()
                                ->andWhere(['or',['estado' => 2],['estado' => 4]])
                                ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
                                ->distinct()
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
                                'itemView' => 'rechazados',
                                'summary' => false,
                                'itemOptions' => ['class' => 'item3'],

                            ]);
                            \yii\widgets\Pjax::end();
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane" id="support2">
            <div class="anuncios-create">
                <div class="paquetesres">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $tabla = \app\models\Anuncios::find()
                                ->andWhere(['estado' => 3])
                                ->andWhere(['idusuario' => Yii::$app->session->get('user')['idusuario']])
                                ->distinct()
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
                                'itemView' => 'expirados',
                                'summary' => false,
                                'itemOptions' => ['class' => 'item4'],

                            ]);
                            \yii\widgets\Pjax::end();
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>
