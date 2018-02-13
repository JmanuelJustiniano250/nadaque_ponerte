<?php

use yii\helpers\Url;

$cat = \app\models\Categorias::findOne(['alias' => 'noticias']);

?>


<div class="section-content portfolio-section cwcww">

    <div class="container">
        <div class="row">

            <div class="portfolio-box">
                <?php $items = [];
                foreach ($cat->categorias as $item) : ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item project-post">
                            <div class="project-gal">
                                <a class=""
                                   href="<?= Url::to(['noticias?' . ((!empty($item['alias'])) ? 'id=' . $item['alias'] : '?cat=' . $item['idcategoria'])]) ?>">
                                    <img alt="" src="<?= Url::to($item['imagen']) ?>">

                                    <h2 CLASS="Ttiel"><?= $item['nombre'] ?></h2>

                                    <div class="hover-box box2">
                                        <p>Ver Más</p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>
