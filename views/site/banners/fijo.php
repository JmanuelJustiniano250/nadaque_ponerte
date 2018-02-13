<?php

use yii\helpers\Url;

?>

<div id="banner_bienvenida" class="top-spacing3">
    <img src=" <?php echo Url::to('@web/web/images/banner-central.jpg') ?>" alt="Banner central">
    <div id="bannercontacto">
        <a href="<?php echo Url::to(['contacto']) ?>" class="bounceIn">
            <img src="<?php echo Url::to('@web/web/images/contact.png') ?> " alt="Contacto" class="img-responsive">
        </a>
    </div>
</div>