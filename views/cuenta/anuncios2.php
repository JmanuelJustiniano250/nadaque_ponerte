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
            <?= $this->render('aprobacion'); ?>

        </div>


        <div class="tab-pane" id="development">
            <?= $this->render('vigentes'); ?>


        </div>


        <div class="tab-pane" id="support">
            <?= $this->render('rechazados'); ?>

        </div>

        <div class="tab-pane" id="support2">
            <?= $this->render('expirados'); ?>

        </div>

    </div>

</div>
