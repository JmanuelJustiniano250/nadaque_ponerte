<?php

use app\models\SuscribeForm;
use yii\helpers\Url;

$model = new SuscribeForm();


$script = <<<CSS

CSS;
//$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);

$bannersp2 = \app\models\Banners::find()
    ->where(['estado' => '1', 'idcategoria' => '23'])
    ->orderBy(['rand()' => SORT_DESC])
    //->limit(2)
    ->all();
?>

    <div class="section-content team-section">

        <div class="team-3">

            <div id="owl-demo4" class="owl-carousel owl-theme">
                <?php foreach ($bannersp2 as $row_bannerp3): ?>
                    <div class="blog-post architecture print ">

                        <a href="<?= Url::to($row_bannerp3['url']) ?>" target="_blank">
                            <div class="post-gal">
                                <img src="<?= Url::to('@web/imagen/banners/' . $row_bannerp3['foto']) ?>" alt=""
                                     style="    padding-right: 15px; margin: 0 auto; display: block; max-width: 100%; margin-bottom: 10px;">
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>

    </div>
<?php
$script = <<<JS
try {
    var blogcarousel = $("#owl-demo4");
    blogcarousel.owlCarousel({
        navigation : true,
        afterInit : function(elem){
            var that = this;
            that.owlControls.appendTo(elem);
        },
        
        items: 1,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });
} catch(err) {

}
JS;
$this->registerJs($script, \yii\web\View::POS_READY);

?>