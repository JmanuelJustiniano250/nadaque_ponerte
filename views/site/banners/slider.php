<?php

use app\models\SuscribeForm;
use yii\helpers\Url;

$model = new SuscribeForm();

$script = <<<CSS

CSS;
$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::className()]);

?>
<div class="fullwidthbanner-container" id="banner">
    <div id="revolution_slider_1" class="fullwidthbanner">
        <ul>
            <li data-transition="fade" data-slotamount="7" data-link="http://www.google.de">
                <img src=" <?php echo Url::to('@web/web/images/slider1.jpg') ?> ">
                <div class="caption lfr" data-x="689" data-y="120" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <img src="<?php echo Url::to('@web/web/images/slider1_titulo1.jpg ') ?>" alt="Contacto">
                </div>
                <div class="caption lfr" data-x="831" data-y="200" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <img src=" <?php echo Url::to('@web/web/images/slider1_titulo2.jpg ') ?> " alt="Contacto">
                </div>
                <div class="caption lfr" data-x="1060" data-y="286" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <a href="<?php echo Url::to(['contacto']) ?>" class="bounceIn"><img
                                src=" <?php echo Url::to('@web/web/images/contact.png') ?> " alt="Contacto"></a>
                </div>
            </li>
            <li data-transition="boxfade" data-slotamount="6" data-link="http://www.google.de">
                <img src=" <?php echo Url::to('@web/web/images/slider2.jpg') ?> ">
                <div class="caption lfr" data-x="689" data-y="120" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <img src=" <?php echo Url::to('@web/web/images/slider2_titulo1.jpg') ?>" alt="Contacto">
                </div>
                <div class="caption lfr" data-x="791" data-y="200" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <img src="<?php echo Url::to('@web/web/images/slider2_titulo2.jpg') ?>" alt="Contacto">
                </div>
                <div class="caption lfr" data-x="1060" data-y="298" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <a href="<?php echo Url::to(['contacto']) ?>" class="bounceIn"><img
                                src="<?php echo Url::to('@web/web/images/contact.png') ?>" alt="Contacto"></a>
                </div>
            </li>

            <li data-transition="boxfade" data-slotamount="6" data-link="http://www.google.de">
                <img src=" <?php echo Url::to('@web/web/images/slider3.jpg') ?>">
                <div class="caption lfr" data-x="456" data-y="120" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <img src=" <?php echo Url::to('@web/web/images/slider3_tit1.jpg') ?> " alt="Contacto">
                </div>
                <div class="caption lfr" data-x="742" data-y="200" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <img src="<?php echo Url::to('@web/web/images/slider3_tit2.jpg') ?>" alt="Contacto">
                </div>
                <div class="caption lfr" data-x="1060" data-y="298" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <a href="<?php echo Url::to(['contacto']) ?>" class="bounceIn"><img
                                src="<?php echo Url::to('@web/web/images/contact.png') ?>" alt="Contacto"></a>
                </div>
            </li>

            <li data-transition="boxfade" data-slotamount="6" data-link="http://www.google.de">
                <img src="<?php echo Url::to('@web/web/images/slider4.jpg') ?> ">
                <div class="caption lfr" data-x="575" data-y="120" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <img src="<?php echo Url::to('@web/web/images/slider4_tit1.jpg') ?>" alt="Contacto">
                </div>
                <div class="caption lfr" data-x="742" data-y="200" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <img src=" <?php echo Url::to('@web/web/images/slider4_tit2.jpg') ?>" alt="Contacto">
                </div>
                <div class="caption lfr" data-x="1060" data-y="298" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <a href="<?php echo Url::to(['contacto']) ?>" class="bounceIn"><img
                                src="<?php echo Url::to('@web/web/images/contact.png') ?>" alt="Contacto"></a>
                </div>
            </li>

            <li data-transition="boxfade" data-slotamount="6" data-link="http://www.google.de">
                <img src="<?php echo Url::to('@web/web/images/slider5.jpg') ?>">
                <div class="caption lfr" data-x="575" data-y="120" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <img src=" <?php echo Url::to('@web/web/images/slider5_tit1.jpg') ?>" alt="Contacto">
                </div>
                <div class="caption lfr" data-x="742" data-y="200" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <img src=" <?php echo Url::to('@web/web/images/slider5_tit2.jpg') ?> " alt="Contacto">
                </div>
                <div class="caption lfr" data-x="1060" data-y="298" data-speed="300" data-start="1300"
                     data-easing="easeOutExpo">
                    <a href="<?php echo Url::to(['contacto']) ?>" class="bounceIn"><img
                                src="<?php echo Url::to('@web/web/images/contact.png') ?>" alt="Contacto"></a>
                </div>
            </li>


        </ul>
    </div>
</div>

<?php
$script = <<<JS
 var tpj=jQuery;               // MAKE JQUERY PLUGIN CONFLICTFREE
      tpj.noConflict();
                
      tpj(document).ready(function() {                
           if (tpj.fn.cssOriginal!=undefined)   // CHECK IF fn.css already extended
           tpj.fn.css = tpj.fn.cssOriginal;

            tpj('.fullwidthbanner').revolution(
                {    
                    delay:9000,												
					startwidth:1280,
					startheight:600,
					
					onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off
					
					thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
					thumbHeight:50,
					thumbAmount:4,
					
					hideThumbs:200,
					navigationType:"both",					//bullet, thumb, none, both	 (No Shadow in Fullwidth Version !)
					navigationArrows:"verticalcentered",		//nexttobullets, verticalcentered, none
					navigationStyle:"round",				//round,square,navbar
					
					touchenabled:"on",						// Enable Swipe Function : on/off
					
					navOffsetHorizontal:0,
					navOffsetVertical:70,
					fullWidth:"on",
					
					shadow:0    
                                                
                });
            
        });
JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>
