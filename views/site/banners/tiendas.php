<?php

use app\models\SuscribeForm;
use yii\helpers\Url;

$model = new SuscribeForm();

$script = <<<CSS

CSS;
//$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);

$banners2 = \app\models\Banners::find()
    ->where(['estado' => '1', 'idcategoria' => '9'])
    //->orderBy(['rand()' => SORT_DESC])
    ->limit(3)
    ->all();
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12" align="center">
            <h3 class="text-center tiendatitu"> TIENDAS Y FAMOSOS QUE NOS ENCANTAN ACCEDE A SUS VESTIDORES</h3> <br>
        </div>

        <div class="lien">
            <?php foreach ($banners2 as $row_banner2): ?>
                <div class="col-sm-4 col-xs-12">
                    <a href="<?= Url::to($row_banner2['url']) ?>" target="_blank">
                        <img src="<?= Url::to('@web/imagen/banners/' . $row_banner2['foto']) ?>" alt=""
                             style="margin: 0 auto; display: block; max-width: 100%; margin-bottom: 10px;">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
$script = <<<JS
 
JS;
//$this->registerJs($script, \yii\web\View::POS_END);
?>
