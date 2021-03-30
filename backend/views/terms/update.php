<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Terms */

$this->title = 'Обновить: ';
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="terms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
