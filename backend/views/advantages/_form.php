<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Advantages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advantages-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?php if($model->image) :?>
        <div class="row">
            <div class="col-xs-12">
                <img src="<?= $model->image ?>" style="height: 50px">
            </div>
        </div>
    <?php endif; ?>
    <?php
    echo $form->field($model, 'advantages_file')->widget(\kartik\file\FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
            'multiple' => false
        ],
        'pluginOptions' => [
            'showPreview' => false,
            'showRemove' => true,
            'showUpload' => false
        ]
    ]);
    ?>
    <?= $form->field($model, 'alt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Активен',
        '0' => 'Неактивен'
    ]) ?>

    <?= $form->field($model, 'sort')->textInput()->hint('Сортировка по убыванию(если 0 то первый в списке)') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
