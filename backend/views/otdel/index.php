<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OtdelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отдел';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="otdel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
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
            'sort',
            [
                'label' => 'Действия',
                'format' => 'raw',
                'value' => function ($model, $index, $jobList) {
                    return Html::tag('a', 'Смотреть', ['href' => \yii\helpers\Url::toRoute(['otdel/view', 'id' => $index]), 'class' => 'btn btn-primary', 'style' => 'font-weight: 100;margin-right:10px'])
                        .Html::tag('a', 'Обновить', ['href' => \yii\helpers\Url::toRoute(['otdel/update', 'id' => $index]), 'class' => 'btn btn-success', 'style' => 'font-weight: 100;margin-right:10px'])
                        .Html::tag('a', 'Удалить', ['href' => \yii\helpers\Url::toRoute(['otdel/delete', 'id' => $index]), 'data-method' => 'post', 'data-confirm' => 'Вы точно хотите удалить?', 'class' => 'btn btn-order btn-danger', 'style' => 'font-weight: 100']);
                },
            ],
        ],
    ]); ?>


</div>
