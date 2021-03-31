<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\About */

$this->title = '';
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="about-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
