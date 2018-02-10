<?php

use app\models\SuscribeForm;
use yii\helpers\Url;

$model = new SuscribeForm();

$script = <<<CSS
CSS;
//$this->registerCss($script, ['depends' => \app\assets_b\AppAsset::class]);

$banners = \app\models\Banners::find()
    ->where(['estado' => '1', 'idcategoria' => '8'])
    //->orderBy(['rand()' => SORT_DESC])
    ->limit(3)
    ->all();
?>

<div class="container">
    <div class="row">
        <div class="lien">
            <?php foreach ($banners as $row_banner): ?>
                <div class="col-sm-4 col-xs-12">
                    <a href="<?= Url::to($row_banner['url']) ?>" target="_blank">
                        <img src="<?= Url::to('@web/imagen/banners/' . $row_banner['foto']) ?>" alt=""
                             style="margin: 0 auto; display: block; max-width: 100%">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php
$script = <<<JS
 
JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>
