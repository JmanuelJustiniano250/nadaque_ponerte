<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = $model->idanuncio;
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$url = Url::to(['anuncios/comentario', 'id' => $model->idanuncio]);
$script = <<<JS
function rechazo(definitivo) {
    estado = 2;
    if(definitivo)
        estado = 4;
    opcion = prompt("Razón:","Datos incorrectos");
    form = new FormData;
jQuery.ajax({
    url:'$url',
    data: {'com':opcion,'est':estado},
    success:function(data) {
      location.href=document.referrer;
    }
});  
}
JS;
$this->registerJs($script, \yii\web\View::POS_BEGIN);
?>

<section class="content-header">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>

        <?= Html::a('rechazar', '#', [
            'class' => 'btn btn-danger',
            'onClick' => 'rechazo(false)',
        ]) ?>

        <?= Html::a('rechazo-definitivo', '#', [
            'class' => 'btn bg-maroon',
            'onClick' => 'rechazo(true)',
        ]) ?>

        <?= Html::a('Aprobar', ['aprove', 'id' => $model->idanuncio], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Esta seguro?',
            ],
        ]) ?>
    </p>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'idanuncio',
                            [
                                'label' => 'Categoria',
                                'value' => $model->categoria->nombre,
                            ],
                            'decripcion:html',
                            'otra_descripcion:html',
                            'codigo',
                            'precio',
                            [
                                'label' => 'estado',
                                'value' => $model->getEstado(),
                            ],
                            'fecha_registro',
                        ],
                    ]) ?>
                    <?= FileInput::widget([
                        'name' => 'images[]',
                        'options' => [
                            'multiple' => true
                        ],
                        'pluginOptions' => [
                            'initialPreview' => [
                                Url::to(['imagen/anuncios/' . $model->foto]),
                                Url::to(['imagen/anuncios/' . $model->foto2]),
                                Url::to(['imagen/anuncios/' . $model->foto3]),
                                Url::to(['imagen/anuncios/' . $model->foto4]),
                                Url::to(['imagen/anuncios/' . $model->foto5]),
                            ],
                            'initialPreviewAsData' => true,
                            'overwriteInitial' => false,
                            'maxFileSize' => 2800,
                            'showCaption' => false,
                            'showRemove' => false,
                            'showUpload' => false,
                            'showBrowse' => false,

                        ]
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

