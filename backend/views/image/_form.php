<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Image */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php
    $images = \common\models\Image::find()->where(['parent_id' => $model->id])->all();
    $allImg = [];
    $allImgConfig = [];
    if($images) {
        foreach($images as $img){
            $allImg[] = Html::a(Html::img($img->url), $img->url, ['target' => '_blank']);
            $allImgConfig[] = [
                'url' => \yii\helpers\Url::to(['/image/remove-image', 'id' => $img->id]),
            ];
        }
    }

    echo $form->field($model, 'image_files[]')->widget(\kartik\file\FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'initialPreview' => $allImg,
            'initialPreviewConfig' => $allImgConfig,
            'overwriteInitial' => false,

            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,
            'removeClass' => 'btn btn-danger',
            'previewFileType' => 'any',
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
