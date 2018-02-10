<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets_b;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets_b';
    public $css = [
        'css/animate.css',
        'css/flexslider.css',
        'css/jquery.bxslider.css',
        'css/main.css',
        'css/settings.css',
        'css/style.css',
        'css/owl.carousel.css',
        'css/owl.theme.css',

        'plugin/galeria/highslide/highslide.css',
        'plugin/carro/lib/jquery.bxslider.css',
        'plugin/carro/lib/jquery.bxslider2.css',
        'plugin/carro/lib/jquery.bxslider3.css',
        'plugin/acordeon/css/style.css',
        'plugin/visor/css/base/advanced-slider-base.css',
        'plugin/visor/css/glossy-square/gray/glossy-square-gray.css',
        'plugin/visor/css/responsive-slider.css',

    ];
    public $js = [
        //'js/vendor/modernizr-2.8.3-respond-1.4.2.min.js',
        'js/jquery.migrate.js',
        'js/owl.carousel.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.bxslider.min.js',
       // 'js/jquery.appear.js',
        //'js/jquery.stellar.min.js',
        //'js/bootstrap.js',
        // 'js/jquery.imagesloaded.min.js',
        'js/retina-1.1.0.min.js',
        'js/plugins-scroll.js',
        'js/waypoint.min.js',
        'js/jquery.countTo.js',
        //'js/jquery.themepunch.tools.min.js',
        //'js/jquery.themepunch.revolution.min.js',
        'js/script.js',


    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
    ];
}