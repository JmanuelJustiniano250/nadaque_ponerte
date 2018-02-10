<?php

use dosamigos\ckeditor\CKEditor;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$user = Yii::$app->session->get('user');
?>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
    /*'type' => ActiveForm::TYPE_HORIZONTAL,
    'formConfig' => ['labelSpan' => 4, 'deviceSize' => ActiveForm::SIZE_SMALL
    ] */// important
]); ?>
    <div class="row">
        <div class="col-md-6">


            <?php $form->field($model, 'idusuario')->hiddenInput(['value'=> $user['idusuario']])->label(false); ?>


            <?= $form->field($model, 'idcategoria')->widget(Select2::classname(), [

                'data' => \yii\helpers\ArrayHelper::map(\app\models\Categorias::findOne(['alias' => 'anuncios'])->categorias, 'idcategoria', 'nombre'),
                'language' => 'es',
                'options' => [
                    'placeholder' => 'Categorias',
                    //'multiple' => true,
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <?php if ($model->isNewRecord): ?>
            <div class="col-md-6">
                <?php

                $tmp = array();
                $tmp_model = \app\models\Compra::find()->where(['paquetes.estado' => 1, 'idusuario' => Yii::$app->session->get('user')['idusuario']])->joinWith(['paquete'])->distinct()->all();
                foreach ($tmp_model as $item) {
                    $cant = \app\models\Anuncios::find()->where(['idcompra' => $item->idcompra, 'idusuario' => Yii::$app->session->get('user')['idusuario']])->distinct()->count();
                    if ($item->paquete->nro_anuncios > $cant)
                        $tmp[] = ['id' => $item->idcompra, 'nombre' => $item->paquete->nombre];
                }
                $array = \yii\helpers\ArrayHelper::map(
                    $tmp,
                    'id',
                    'nombre'
                );
                echo $form->field($model, 'idcompra')->widget(Select2::classname(), [

                    'data' => $array,
                    'language' => 'es',
                    'options' => [
                        'placeholder' => 'compras',
                        //'multiple' => true,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]) ?>
            </div>
        <?php endif; ?>
        <div class="col-md-6">
            <?= $form->field($model, 'titulo') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'precio') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'decripcion')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'basic'
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'otra_descripcion')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'basic'
            ]) ?>
        </div>
        <div class="col-md-6">
            <?php
            $initial = [];
            array_push($initial, Html::img('@web/imagen/anuncios/' . $model->foto, ['class' => 'kv-preview-data krajee-init-preview file-preview-image', 'style' => 'max-height:160px']));
            ?>
            <?= $form->field($model, 'file')->widget(\kartik\widgets\FileInput::classname(), [
                'options' => [
                    'multiple' => true,
                    'accept' => 'image/*',
                ],
                'pluginOptions' => [
                    'initialPreviewFileType' => 'image',
                    'initialPreview' => $initial,
                    'maxFileCount' => 5,
                    'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                    "language" => "es",
                    'browseClass' => 'btn enviarsus',
                ]
            ]); ?>
        </div>
        <div class="col-md-6">
            <?php
            if ($model->anunciosFiltros) {
                $tmp = array();
                foreach ($model->anunciosFiltros as $item)
                    $tmp[] = $item->idfiltro;
                $model['filtro'] = $tmp;
            }
            ?>
            <?= $form->field($model, 'filtro')->widget(Select2::classname(), [

                'data' => \yii\helpers\ArrayHelper::map(\app\models\Filtros::find()->where(['estado' => 1])->andWhere(['IS NOT', 'idpadre', NULL])->all(), 'idfiltro', 'nombre'),
                'language' => 'es',
                'options' => [
                    'placeholder' => 'compras',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

    </div>

    <div class="row text-center">
        <?= Html::submitButton('Guardar', ['class' => 'btn enviarsus ']) ?>
    </div>
    <br>
    <br>
<?php ActiveForm::end(); ?>