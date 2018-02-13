<?php

use kartik\widgets\FileInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

?>

<h1>Galeria de Anuncio</h1>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!-- Main content -->
<div class="col-md-12">
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

</div>
</div>

</div>
</section>

<?php
$script = <<<JS
function galeria() {
  $.pjax.reload({container:'#galeria'}); //refresh the grid
}
JS;
//$this->registerJs($script, \yii\web\View::POS_HEAD)
?>
