<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Advantages */

$this->title = 'Создать Преимущество';
$this->params['breadcrumbs'][] = ['label' => 'Преимущества', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advantages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
