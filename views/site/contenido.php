<?php

$configuracion = \app\models\Configuracion::find()->one();
$this->render('widgets/metatags', ['model' => $configuracion]);
?>


    <div class="section-content blog-section with-sidebar">
        <div class="container">
            <div class="blog-box">

                <?= $contenido['contenido'] ?>

            </div>
        </div>

    </div>


<?php
$script = <<<JS

JS;
//$this->registerJs($script, \yii\web\View::POS_END)
?>