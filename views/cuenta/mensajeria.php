<?php

use himiklab\thumbnail\EasyThumbnailImage;
use yii\widgets\ActiveForm;

$script = <<<CSS

.anunciocrear.www {
   
    border: 1px solid #ff6d89;
  
    background: #ff6d89;
}

.cajaperfilmensaje{

padding: 5px;

border-bottom: 2px solid  #ff839a  ;
margin-bottom: 40px;
}


.cajaperfilmensaje2{

padding: 5px;


margin-bottom: 40px;
}

.cajaperfilmensaje2 p{
font-size: 13px; margin-bottom: 50px;
}
CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::className()]);


?>


<div class="col-sm-3 col-xs-12 linemedioa">

    <div class="list-group">
        <?php foreach ($mensaje as $item): ?>
            <?php if($model['tipo']): ?>
                <a href="<?= \yii\helpers\Url::to(['cuenta/mensajeria','id'=>$item['idusuario']])?>" class="list-group-item imagenusario <?= ((Yii::$app->request->get('id')==$item['idusuario'])?'active':'') ?>">
                    <?=
                    EasyThumbnailImage::thumbnailImg(
                        Yii::getAlias('@webroot/imagen/usuarios/' . $item->usuario['foto']),
                        45,
                        45,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        ['style' => ' border-radius: 40px; margin-top: 0px; display: inline-block;      margin-right: 10px;   margin-top: -10px;', 'class' => 'img-responsive']
                    );
                    ?>

                    <span style="color: #ff839a; font-weight: 600;     font-size: 18px;"> <?= $item->usuario['alias'] ?> </span>
                </a>
            <?php else:?>
                <a href="<?= \yii\helpers\Url::to(['cuenta/mensajeria','id'=>$item['idvendedor']])?>" class="list-group-item imagenusario <?= ((Yii::$app->request->get('id')==$item['idvendedor'])?'active':'') ?>">
                    <?=
                    EasyThumbnailImage::thumbnailImg(
                        Yii::getAlias('@webroot/imagen/usuarios/' . $item->vendedor['foto']),
                        45,
                        45,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        ['style' => ' border-radius: 40px; margin-top: 0px; display: inline-block;      margin-right: 10px;   margin-top: -10px;', 'class' => 'img-responsive']
                    );
                    ?>

                    <span style="color: #ff839a; font-weight: 600;     font-size: 18px;"> <?= $item->vendedor['alias'] ?> </span>
                </a>
            <?php endif;?>
        <?php endforeach;?>

    </div>


</div>


<!--
 Mensaje completo
 -->


<div class="col-sm-9 col-xs-12">
    <?php if(count($chat)>0):?>
        <?php foreach ($chat as $item):?>
            <div class="cajaperfilmensaje2">

                <div class="imagenusario" align="left">

                    <?php if($model['idusuario']==$item['idusuario']):?>
                        <div class="col-sm-2 col-xs-12">
                            <?=
                            EasyThumbnailImage::thumbnailImg(
                                Yii::getAlias('@webroot/imagen/usuarios/' . $item->usuario['foto']),
                                45,
                                45,
                                EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                ['style' => ' border-radius: 40px; margin-top: 0px; display: inline-block;      margin-right: 10px;   margin-top: -10px;', 'class' => 'img-responsive']
                            );
                            ?>
                        </div>
                        <div class="col-sm-10 col-xs-12">
                            <p><?= $model['detalle']?></p>
                        </div>
                    <?php else:?>
                        <div class="col-sm-10 col-xs-12">
                            <p><?= $model['detalle']?></p>
                        </div>
                        <div class="col-sm-2 col-xs-12">
                            <?=
                            EasyThumbnailImage::thumbnailImg(
                                Yii::getAlias('@webroot/imagen/usuarios/' . $item->usuario['foto']),
                                45,
                                45,
                                EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                ['style' => ' border-radius: 40px; margin-top: 0px; display: inline-block;      margin-right: 10px;   margin-top: -10px;', 'class' => 'img-responsive']
                            );
                            ?>
                        </div>
                    <?php endif;?>

                    <br><br>
                </div>



            </div>
        <?php endforeach;?>



        <div class="cajaperfilmensaje2">

            <div class="col-xs-12">
                <?php $modmess= new \app\models\Mensajes();?>
                <?php $modmess->idvendedor = Yii::$app->request->get('id');?>
                <?php $modmess->tipo = 0;?>
                <?php $form = ActiveForm::begin([
                    'action' => ['/cuenta/mensaje'],
                    'id' => 'login-form',
                    /*'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-md-8\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-md-4 control-label'],
                    ],*/
                ]); ?>
                <?= $form->field($modmess,'detalle')->textarea(['class'=>'form-control cajadesct','placeholder'=>'Dejanos tus consultas y comentarios'])->label(false)?>
                <?= $form->field($modmess,'idvendedor')->hiddenInput()->label(false)?>
                <?= $form->field($modmess,'tipo')->hiddenInput()->label(false)?>

                <div class="submit-area" align="left"><br>
                    <input type="submit" name="enviar" id="" class="btnregister" style="text-transform: none"
                           value="Dejar Mensaje">
                </div>

                <?php ActiveForm::end(); ?>
                <br>

            </div>


        </div>

    <?php endif;?>
</div>

