<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MainPageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-page-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'header_title') ?>

    <?= $form->field($model, 'header_subtitle') ?>

    <?= $form->field($model, 'header_desc') ?>

    <?= $form->field($model, 'name_company') ?>

    <?php // echo $form->field($model, 'site') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email_contact') ?>

    <?php // echo $form->field($model, 'email_footer') ?>

    <?php // echo $form->field($model, 'advantages') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
