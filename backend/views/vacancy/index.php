<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вакансии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать Вакансию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'label' => 'Отдел',
                'value' => function ($model) {
                    $result = '';

                    foreach ($model->parent as $parent) {
                        $result .= $parent['name'];
                    }
                    return $result;
                },
            ],
            'name',
            [
                'label' => 'Статус',
                'value' => function ($model) {
                    $result = '';
                    if($model->status == 1){
                        $result .= 'Активен';
                    } else {
                        $result .= 'Неактивен';
                    }

                    return $result;
                },
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'sort',
                'vAlign' => 'middle',
                'filter' => false,
                'value' => function($model){ return $model->sort; },
            ],


            [
                'label' => 'Действия',
                'format' => 'raw',
                'value' => function ($model, $index, $jobList) {
                    return Html::tag('a', 'Смотреть', ['href' => \yii\helpers\Url::toRoute(['vacancy/view', 'id' => $index]), 'class' => 'btn btn-primary', 'style' => 'font-weight: 100;margin-right:10px'])
                        .Html::tag('a', 'Обновить', ['href' => \yii\helpers\Url::toRoute(['vacancy/update', 'id' => $index]), 'class' => 'btn btn-success', 'style' => 'font-weight: 100;margin-right:10px'])
                        .Html::tag('a', 'Удалить', ['href' => \yii\helpers\Url::toRoute(['vacancy/delete', 'id' => $index]), 'data-method' => 'post', 'data-confirm' => 'Вы точно хотите удалить?', 'class' => 'btn btn-order btn-danger', 'style' => 'font-weight: 100']);
                },
            ],
        ],
    ]); ?>


</div>
