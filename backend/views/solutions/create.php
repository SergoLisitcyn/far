<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Solutions */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Решения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solutions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
