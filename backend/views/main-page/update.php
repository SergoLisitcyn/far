<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MainPage */

$this->title = 'Update Main Page: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Main Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
