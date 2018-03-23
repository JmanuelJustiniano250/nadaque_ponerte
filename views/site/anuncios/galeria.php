<?php

use kartik\widgets\FileInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

?>

<style>
    .btn-primary {
        color: #fff;
        background-color: #ff6d89;
        border-color: #ff6d89;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #fd879e;
        border-color: #fd879e;
    }


</style>

<br><br>
<h1 class="text-center" style="    color: #3a3d41;
    font-size: 28px;
    font-family: 'Raleway', sans-serif;
    font-weight: 700;
    margin: 0 0 7px;">Sube mas fotos de tu prenda</h1>
<br><br>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!-- Main content -->
<div class="col-xs-12 col-lg-10 col-lg-offset-1">
    <?php
    $initial = [];
    $config = [];
    if (isset($galeria)) {
        foreach ($galeria as $item) {
            array_push($initial, Html::img(\yii\helpers\Url::to('@web/imagen/anuncios/' . $item->foto), ['class' => 'kv-preview-data krajee-init-preview file-preview-image', 'style' => 'max-height:160px']));
            array_push($config, ["previewAsData" => false, "caption" => $item->foto, "url" => Url::to(['delete']), "key" => $item->idgaleria]);
        }
    }

    $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']]); // important
    echo $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => [
            'multiple' => true,
            'accept' => 'image/*',
        ],
        'pluginOptions' => [
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' => 'Sube tus imagenes (*.jpg)',

            'uploadUrl' => Url::to(['upload2']),
            'uploadExtraData' => [
                'id' => $id,
            ],
            'initialPreviewFileType' => 'image',
            'initialPreview' => $initial,
            'initialPreviewConfig' => $config,
            'maxFileCount' => 5,
            'allowedFileExtensions' => ['jpg', 'png', 'gif'],
            'language' => 'es-ES'
        ]
    ])->label(false);
    ActiveForm::end();
    ?>
    <br><br>


    <div style="" class="col-xs-12" align="center">

        <? //= Html::submitButton('Anuncio listo, Publicar', ['class' => 'btn enviarsus ']) ?>
        <br><br><br>

    </div>
</div>
<br><br>

<?php
$script = <<<JS
function galeria() {
  $.pjax.reload({container:'#galeria'}); //refresh the grid
}
JS;
//$this->registerJs($script, \yii\web\View::POS_HEAD)
?>
