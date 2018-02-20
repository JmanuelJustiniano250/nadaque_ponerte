<?php

use himiklab\thumbnail\EasyThumbnailImage;


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


<div class="col-sm-6 col-xs-12 linemedioa">

    <div class="cajaperfilmensaje">

        <div class="">


            <div class="imagenusario" align="left">

                <?=
                EasyThumbnailImage::thumbnailImg(
                    Yii::getAlias('@webroot/imagen/usuarios/' . 'perfil.png'),
                    45,
                    45,
                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                    ['style' => ' border-radius: 40px; margin-top: 0px; display: inline-block;      margin-right: 10px;   margin-top: -10px;', 'class' => 'img-responsive']
                );
                ?>

                <span style="color: #ff839a; font-weight: 600;     font-size: 18px;"> Ana Sara </span>

                <br><br>
            </div>

            <div class="comentarios2" style="padding-left: 10px">
                <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                    massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                    quam felis...

                </p>


                <div align="right"><br>
                    <a href="" class="anunciocrear www">RESPONDER</a>
                </div>
                <br>

            </div>
        </div>


    </div>


    <div class="cajaperfilmensaje">

        <div class="">


            <div class="imagenusario" align="left">

                <?=
                EasyThumbnailImage::thumbnailImg(
                    Yii::getAlias('@webroot/imagen/usuarios/' . 'perfil.png'),
                    45,
                    45,
                    EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                    ['style' => ' border-radius: 40px; margin-top: 0px; display: inline-block;      margin-right: 10px;   margin-top: -10px;', 'class' => 'img-responsive']
                );
                ?>

                <span style="color: #ff839a; font-weight: 600;     font-size: 18px;"> Ana Sara </span>

                <br><br>
            </div>

            <div class="comentarios2" style="padding-left: 10px">
                <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                    massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                    quam felis....

                </p>
                <div align="right"><br>
                    <a href="" class="anunciocrear www">RESPONDER</a>
                </div>
                <br>

            </div>
        </div>


    </div>


</div>


<!--
 Mensaje completo
 -->


<div class="col-sm-6 col-xs-12">

    <div class="cajaperfilmensaje2">

        <div class="">


            <div class="imagenusario" align="left">

                <div class="col-sm-2 col-xs-12">
                    <?=
                    EasyThumbnailImage::thumbnailImg(
                        Yii::getAlias('@webroot/imagen/usuarios/' . 'perfil.png'),
                        45,
                        45,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        ['style' => ' border-radius: 40px; margin-top: 0px; display: inline-block;      margin-right: 10px;   margin-top: -10px;', 'class' => 'img-responsive']
                    );
                    ?>
                </div>
                <div class="col-sm-10 col-xs-12">
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        Aenean
                        massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        Donec
                        quam felis....

                    </p>
                </div>
                <br><br>
            </div>


        </div>


    </div>


    <div class="cajaperfilmensaje2">

        <div class="">


            <div class="imagenusario" align="left">


                <div class="col-sm-10 col-xs-12">
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        Aenean
                        massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        Donec
                        quam felis....

                    </p>
                </div>

                <div class="col-sm-2 col-xs-12">
                    <?=
                    EasyThumbnailImage::thumbnailImg(
                        Yii::getAlias('@webroot/imagen/usuarios/' . 'perfil.png'),
                        45,
                        45,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        ['style' => ' border-radius: 40px; margin-top: 0px; display: inline-block;      margin-right: 10px;   margin-top: -10px;', 'class' => 'img-responsive']
                    );
                    ?>
                </div>


                <br><br>
            </div>


        </div>


        <div class="col-xs-12">
        <textarea name="" id="" placeholder="" rows="5" style="width: 100%">
           </textarea>

            <div align="right"><br>
                <a href="" class="anunciocrear www">ENVIAR</a>
            </div>
            <br>


        </div>


    </div>


</div>

