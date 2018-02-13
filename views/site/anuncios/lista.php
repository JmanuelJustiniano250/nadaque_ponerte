<?php


$c = 0;

?>
<div id="resultado">
    <?php foreach ($model as $item): ?>
        <?php $c += 1; ?>

        <div class="col-lg-4 col-sm-6 col-xs-12 paddres" style=" padding-left: 5px">
            <?= $this->render('caja', ['item' => $item]) ?>
        </div>

        <?php
        if ($c < 7) {
            if (($c % 6) == 0) {
                echo $this->render('../banners/anuncios2');
            } elseif (($c % 3) == 0) {
                echo $this->render('../banners/anuncios');
            }
        }
        ?>
    <?php endforeach; ?>
    <?php
    if ($c < 6) {
        if ($c < 3) {
            echo $this->render('../banners/anuncios');
        }
        echo $this->render('../banners/anuncios2');
    }
    ?>

</div>