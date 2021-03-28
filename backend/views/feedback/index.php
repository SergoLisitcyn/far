<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список резюме';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Отдел',
                'value' => function ($model) {
                    $result = '';

                    foreach ($model->otdel as $parent) {
                        $result .= $parent['name'];
                    }
                    return $result;
                },
            ],
            'name',
            'surname',
            'patronymic',
            'phone',
            [
                'attribute' => 'file_src_filename',
                'label' => 'Название файла',
                'format' => 'raw',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
                'value' => function ($data) {
                    if($data->filename){
                        return
                            Html::a('Скачать резюме', ['feedback/download', 'id' => $data->id],['class' => 'btn btn-primary']);
                    } else {
                        return 'Без резюме';
                    }
                }
            ],
            [
                'attribute' => 'link',
                'format' => 'raw',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
                'value' => function ($data) {
                    $result = '<a href="'.$data->link.'" style="text-decoration:underline">' . $data->link . '</a>';
                    return $result;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
