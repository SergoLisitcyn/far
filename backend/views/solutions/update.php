<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Solutions */

$this->title = 'Обновить';
$this->params['breadcrumbs'][] = ['label' => 'Решения', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="solutions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
