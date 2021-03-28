<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Otdel */

$this->title = 'Создать Отдел';
$this->params['breadcrumbs'][] = ['label' => 'Отделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="otdel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
