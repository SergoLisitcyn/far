<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\MainPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'header_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header_subtitle')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'header_desc')->widget(CKEditor::className(),[
        'editorOptions' => [
//        'preset' => 'full',
            'inline' => false,
        ],
    ]); ?>

    <?= $form->field($model, 'name_company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_footer')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
