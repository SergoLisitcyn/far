<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Advantages */

$this->title = 'Обновить Преимущество: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Преимущества', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="advantages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
