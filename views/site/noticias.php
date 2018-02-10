<?php

use yii\helpers\Url;

?>

    <div class="section-content blog-section with-sidebar">
        <div class="container">
            <div class="blog-box">
                <div class="row">
                    <div class="col-md-9">

                        <?php
                        if (isset($all)) {
                            echo $this->render('noticias/lista', ['model' => $model->getModels(), 'data' => $model]);
                        } else {
                            if (count($model) > 0)
                                echo $this->render('noticias/item', ['model' => $model]);
                        }
                        ?>

                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="sidebar">
                            <div class="search-widget widget">
                                <form action="<?= Url::to(['site/noticias']) ?>" method="get">
                                    <input type="search" placeholder="Buscar:" name="s"/>
                                    <button type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="category-widget widget">
                                <h3>Categorias</h3>
                                <?= $this->render('noticias/sidebar', ['categoria' => $categoria]); ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


<?php
$script = <<<JS

JS;
//$this->registerJs($script, \yii\web\View::POS_END)
?>