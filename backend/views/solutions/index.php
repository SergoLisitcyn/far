<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SolutionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Решения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solutions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать Решение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',
            'image',
            'status',
            //'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
