<?php

?>
                    <h3><?= \yii\helpers\Html::a($model->titulo,['/site/item','id'=>$model->idanuncio]) ?></h3>

                    <p>cantidad de comentarios ( <?= \app\models\Mensajes::find()->where(['idanuncio'=>$model->idanuncio])->count()?> )
                    </p>

