<?php

$c = 0;

?>
<?php foreach ($model as $item): ?>
    <?php $c += 1; ?>

    <div class="col-lg-3 col-sm-6 col-xs-12 paddres" style=" padding-left: 0">
        <?= $this->render('caja', ['item' => $item]) ?>
    </div>

    <?php
    if (($c % 4) == 0) {
        echo $this->render('../banners/anuncios2');
    } elseif (($c % 4) == 0) {
        echo $this->render('../banners/anuncios');
    }
    ?>
<?php endforeach; ?>
<?php
if ($c < 8) {
    if ($c < 4) {
        echo $this->render('../banners/anuncios');
    }
    echo $this->render('../banners/anuncios2');
}
