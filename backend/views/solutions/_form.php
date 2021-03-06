<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Solutions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solutions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?php if($model->image) :?>
    <div class="row">
        <div class="col-xs-12">
            <img src="<?= $model->image ?>" style="height: 100px">
        </div>
    </div>
    <?php endif; ?>
    <?php
    echo $form->field($model, 'solutions_file')->widget(\kartik\file\FileInput::classname(), [
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

    <?= $form->field($model, 'sort')->dropDownList([
        '0' => 'Картинка справа - текст слева',
        '1' => 'Картинка слева - текст справа'
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
