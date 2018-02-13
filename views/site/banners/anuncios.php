<?php

use yii\helpers\Url;

$banners = \app\models\Banners::find()
    ->where(['estado' => '1', 'idcategoria' => '26'])
    //->orderBy(['rand()' => SORT_DESC])
    ->limit(1)
    ->all();
?>
<div class="row">
    <?php foreach ($banners as $row_banner): ?>
        <div class="col-xs-12">
            <a href="<?= Url::to($row_banner['url']) ?>" target="_blank">
                <img src="<?= Url::to('@web/imagen/banners/' . $row_banner['foto']) ?>" alt=""
                     style="margin: 0 auto; display: block; max-width: 100%">
            </a>
        </div>
    <?php endforeach; ?>
</div>
<br>
